<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use App\Models\ClientModel;
use App\Models\BillingModel;
use App\Models\ArchivedBilling;
use App\Models\ArchivedModel;
use App\Models\FileModel;
use App\Models\CaseClientModel;
use App\Models\RecentlyAdded;
use Google\Client as GoogleClient;
use Google\Service\Calendar;
use DateTime;
use DateInterval;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user' || $usertype == 'admin') {
                $data = FileModel::count();
                $client = ClientModel::count();
                $user = User::count();
                $sum = BillingModel::sum('b_clientbalance');
                $query = RecentlyAdded::query();
                $googleEvents = $this->getGoogleCalendarEvents();
                //for chart data client
                // $defendantCount = ClientModel::whereIn('client_type', ['Deffendant'])->count();
                // $plaintiffCount = ClientModel::whereIn('client_type', ['Plaintiff'])->count();
                //for cases chart data
                $criminalcaseCounts = FileModel::whereIn('file_casetype', ['CRIMINAL CASE'])->count();
                $civilcaseCounts = FileModel::whereIn('file_casetype', ['CIVIL CASE'])->count();
                $othercaseCounts = FileModel::whereIn('file_casetype', ['OTHERS'])->count();
                //for users chart data
                // $userCount = User::whereIn('usertype', ['user'])->count();
                // $clientCount = User::whereIn('usertype', ['client'])->count();

                $startDate = null;
                $endDate = null;

                if (request('startDate') && request('endDate')) {
                    $startDate = request('startDate');
                    $endDate = request('endDate');
                }

                // Filter your chart data based on the date range
                //client
                // $defendantCount = ClientModel::where('client_type', 'Deffendant');
                // $plaintiffCount = ClientModel::where('client_type', 'Plaintiff');
                //case
                $criminalcaseCount = FileModel::where('file_casetype', 'CRIMINAL CASE');
                $civilcaseCount = FileModel::where('file_casetype', 'CIVIL CASE');
                $othercaseCount = FileModel::where('file_casetype', 'OTHERS');
                //users
                $userCount = User::where('usertype', 'user');
                $clientCount = User::where('usertype', 'client');
                //case status
                $defendantCount = FileModel::where('file_casestatus', 'Open');
                $plaintiffCount = FileModel::where('file_casestatus', 'Closed');

                if ($startDate && $endDate) {
                    //client
                    $defendantCount->whereBetween('created_at', [$startDate, $endDate]);
                    $plaintiffCount->whereBetween('created_at', [$startDate, $endDate]);
                    //case
                    $criminalcaseCount->whereBetween('created_at', [$startDate, $endDate]);
                    $civilcaseCount->whereBetween('created_at', [$startDate, $endDate]);
                    $othercaseCount->whereBetween('created_at', [$startDate, $endDate]);
                    //users
                    $userCount->whereBetween('created_at', [$startDate, $endDate]);
                    $clientCount->whereBetween('created_at', [$startDate, $endDate]);
                }
                // Example data, replace this with your actual data
                $chartData = [
                    'labels' => ['Criminal cases', 'Civil cases', 'Others'],
                    'data' => [
                        $criminalcaseCount->count(),
                        $civilcaseCount->count(),
                        $othercaseCount->count()
                    ],
                    // 'data' => [$criminalcaseCount, $civilcaseCount, $othercaseCount],
                ];

                $chartDataClient = [
                    'labels' => ['Open', 'Closed'],
                    'data' => [$defendantCount->count(),  $plaintiffCount->count()],
                ];

                $chartDataUsers = [
                    'labels' => ['User', 'Client'],
                    'data' => [$userCount->count(),  $clientCount->count()],
                ];

                if (request('date_from') && request('date_to')) {
                    $query->whereBetween('created_at', [request('date_from'), request('date_to')])->orderBY('created_at', 'asc');
                }

                $recents = $query->orderBy('created_at', 'desc')->paginate(10);
                //$recents = $query->paginate(10);
                if ($usertype == 'user') {
                    return view('dashboard', [
                        'data' => $data, 'client' => $client, 'sum' => $sum, 'recents' => $recents, 'googleEvents' => $googleEvents, 'chartData' => $chartData, 'chartDataClient' => $chartDataClient, 'chartDataUsers' => $chartDataUsers, 'startDate' => $startDate,
                        'endDate' => $endDate,
                    ]);
                } elseif ($usertype == 'admin') {
                    return view('admin.adminboard', [
                        'data' => $data, 'client' => $client, 'sum' => $sum, 'user' => $user, 'recents' => $recents, 'googleEvents' => $googleEvents, 'chartData' => $chartData, 'chartDataClient' => $chartDataClient, 'chartDataUsers' => $chartDataUsers, 'startDate' => $startDate,
                        'endDate' => $endDate,
                    ]);


                    // return view('admin.adminboard', compact('data', 'client', 'sum', 'recents'));
                }
            } elseif ($usertype == 'client') {
                $client_id = Auth::user()->client_id;

                $dataFromVerifyMethod = ClientModel::find($client_id);
                $filecasesData = FileModel::where('file_client', $client_id)->get();
                $billingRecord = BillingModel::where('client_id', $client_id)->get();
                $archivedBilling = ArchivedBilling::where('client_id', $client_id)->get();
                $filecasesData = FileModel::where('file_client', $client_id)->get();
                $sum = BillingModel::where('client_id', $client_id)->sum('b_clientbalance');

                return view('client.clientboard', [
                    'dataFromVerifyMethod' => $dataFromVerifyMethod,
                    'filecasesData' => $filecasesData,
                    'archivedBilling' => $archivedBilling,
                    'billingRecord' => $billingRecord,
                    'filecasesData' => $filecasesData,
                    'sum' => $sum, // Pass the paginated recent data
                ]);
            } else {
                return redirect()->back();
            }
        }
    }

    private function getGoogleCalendarEvents()
    {
        $client = new GoogleClient();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $client->addScope('https://www.googleapis.com/auth/calendar.readonly');

        // Retrieve the access token from the session
        if (!$token = session('google_token')) {
            return redirect()->route('google.login'); // [] Return an empty array if not authenticated
        }

        $client->setAccessToken($token);

        $service = new Calendar($client);
        $calendarId = 'primary'; // You can change this to your calendar ID
        $events = $service->events->listEvents($calendarId);

        // Process the events as needed
        $googleEvents = $events->getItems();

        usort($googleEvents, function ($a, $b) {
            $startA = new DateTime($a->start->dateTime);
            $startB = new DateTime($b->start->dateTime);
            return $startB->getTimestamp() - $startA->getTimestamp();
        });

        // Filter the events based on the date range
        if (request('start_from') && request('end_to')) {
            // Adjusting the start and end dates for the filter
            $adjustedStartDate = (new DateTime(request('start_from')));
            $adjustedEndDate = (new DateTime(request('end_to')))->add(new DateInterval('P1D'));

            $googleEvents = collect($googleEvents)->filter(function ($event) use ($adjustedStartDate, $adjustedEndDate) {
                $start = new DateTime($event->start->dateTime);
                $end = new DateTime($event->end->dateTime);
                return $start >= $adjustedStartDate && $end <= $adjustedEndDate;
            })->sortByDesc(function ($event) {
                $start = new DateTime($event->start->dateTime);
                return $start->getTimestamp();
            })->toArray();
        }

        // Format the start and end times of each event
        foreach ($googleEvents as $event) {
            $start = new DateTime($event->start->dateTime);
            $end = new DateTime($event->end->dateTime);
            $event->start->dateTime = $start->format('F j, Y g:i:s A');
            $event->end->dateTime = $end->format('F j, Y g:i:s A');
        }

        return $googleEvents;
    }

    //for client routes
    public function clientboard()
    {
        return view("client.clientboard");
    }
    //for admin routes
    public function post()
    {
        return view("admin.adminpost");
    }
    public function adminusertable(Request $request)
    {
        $query = User::where('usertype', 'client')->orWhere('usertype', 'user');

        if ($request->has('search')) {
            $searchTerm = '%' . $request->input('search') . '%';
            $query->where(function ($subquery) use ($searchTerm) {
                $subquery->where('name', 'like', $searchTerm)
                    ->orWhere('email', 'like', $searchTerm)
                    ->orWhere('email_verified_at', 'like', $searchTerm)
                    ->orWhere('usertype', 'like', $searchTerm)
                    ->orWhere('created_at', 'like', $searchTerm);
                // Add other columns as needed
            });
        }
        if (request('name')) {
            $query->where('name', request('name'));
        }

        if (request('email')) {
            $query->where('email', request('email'));
        }

        if (request('usertype')) {
            $query->where('usertype', request('usertype'));
        }
        // Filter by date range
        if (request('date_from') && request('date_to')) {
            $query->whereBetween('created_at', [request('date_from'), request('date_to')]);
        }

        // Sorting logic
        if (request('sort_by') && request('order')) {
            $query->orderBy(request('sort_by'), request('order'));
        }

        $data = $query->get();

        $data = $query->paginate(5);

        return view("admin.adminuserdetails", ['data' => $data]);
    }
    public function adminclienttable(Request $request)
    {
        $query = ClientModel::query();

        if ($request->has('search')) {
            $searchTerm = '%' . $request->input('search') . '%';
            $query->where(function ($subquery) use ($searchTerm) {
                $subquery->where('client_fname', 'like', $searchTerm)
                    ->orWhere('client_mname', 'like', $searchTerm)
                    ->orWhere('client_sname', 'like', $searchTerm)
                    ->orWhere('client_lawyer', 'like', $searchTerm)
                    ->orWhere('client_contactnum', 'like', $searchTerm)
                    ->orWhere('client_emailadd', 'like', $searchTerm)
                    ->orWhere('client_permadd', 'like', $searchTerm)
                    ->orWhere('client_type', 'like', $searchTerm)
                    ->orWhere('client_oppsfname', 'like', $searchTerm)
                    ->orWhere('client_oppsmname', 'like', $searchTerm)
                    ->orWhere('client_oppssname', 'like', $searchTerm)
                    ->orWhere('created_at', 'like', $searchTerm);
                // Add other columns as needed
            });
        }
        // Sorting logic
        if (request('sort_by') && request('order')) {
            $sortColumn = request('sort_by');
            if ($sortColumn === 'client_fname' || $sortColumn === 'client_sname') {
                // Check if the sort request is for the "Full Name" column
                $query->orderBy('client_fname', request('order'))
                    ->orderBy('client_sname', request('order'));
            } else {
                // Sort by other columns as requested
                $query->orderBy($sortColumn, request('order'));
            }
        } else {
            // Default sorting if no sorting request is made
            $query->orderBy('client_id', 'asc');
        }

        $data = $query->get();

        $data = $query->paginate(10);

        return view("admin.adminclientdetails", ['data' => $data]);
    }
    public function adminfiletable(Request $request)
    {
        $selectedTypes = $request->input('file_casetype', []);  // Default to an empty array if not set

        $query = FileModel::query();

        if ($request->has('search')) {
            $searchTerm = '%' . $request->input('search') . '%';

            $query->where(function ($subquery) use ($searchTerm) {
                $subquery->where('file_name', 'like', $searchTerm)
                    ->orWhere('file_casetype', 'like', $searchTerm)
                    ->orWhere('file_casestatus', 'like', $searchTerm)
                    ->orWhere('file_authoredby', 'like', $searchTerm)
                    ->orWhere('file_docketnum', 'like', $searchTerm)
                    ->orWhere('file_submittedby', 'like', $searchTerm)
                    ->orWhere('created_at', 'like', $searchTerm);
                // Add other columns as needed
            });
        }

        // Filter by case type
        if (request('file_docketnum')) {
            $query->where('file_docketnum', request('file_docketnum'));
        }

        // Filter by court office
        if (request('file_casetype')) {
            $query->where(function ($query) use ($selectedTypes) {
                foreach ($selectedTypes as $type) {
                    $query->orWhere('file_casetype', 'LIKE', "%$type%");
                }
            });
        }

        // Filter by case status
        if (request('file_casestatus')) {
            $query->where('file_casestatus', request('file_casestatus'));
        }

        // Filter by date range
        if (request('date_from') && request('date_to')) {
            $query->whereBetween('created_at', [request('date_from'), request('date_to')]);
        }

        // Sorting logic
        if (request('sort_by') && request('order')) {
            $query->orderBy(request('sort_by'), request('order'));
        }
        $data = $query->get();

        //Pagination Logic
        $data = $query->paginate(10);
        // $FileModel->appends(['sort' => 'FileModel']);

        $file_casetypes = FileModel::distinct('file_casetype')->pluck('file_casetype');
        $file_casestatuses = FileModel::distinct('file_casestatus')->pluck('file_casestatus');
        $file_docketnums = FileModel::distinct('file_docketnum')->pluck('file_docketnum');
        return view('admin.adminfiledetails', ['data' => $data, 'file_casetypes' => $file_casetypes, 'file_casestatuses' => $file_casestatuses, 'file_docketnums' => $file_docketnums, 'selectedTypes' => $selectedTypes]);
    }

    // for users route
    public function usertable(Request $request)
    {
        $selectedTypes = $request->input('file_casetype', []);  // Default to an empty array if not set

        $query = FileModel::query();

        if ($request->has('search')) {
            $searchTerm = '%' . $request->input('search') . '%';

            $query->where(function ($subquery) use ($searchTerm) {
                $subquery->where('file_name', 'like', $searchTerm)
                    ->orWhere('file_casetype', 'like', $searchTerm)
                    ->orWhere('file_casestatus', 'like', $searchTerm)
                    ->orWhere('file_authoredby', 'like', $searchTerm)
                    ->orWhere('file_docketnum', 'like', $searchTerm)
                    ->orWhere('file_submittedby', 'like', $searchTerm)
                    ->orWhere('created_at', 'like', $searchTerm);
                // Add other columns as needed
            });
        }

        // Filter by case type
        if (request('file_docketnum')) {
            $query->where('file_docketnum', request('file_docketnum'));
        }

        // Filter by court office
        if (request('file_casetype')) {
            $query->where(function ($query) use ($selectedTypes) {
                foreach ($selectedTypes as $type) {
                    $query->orWhere('file_casetype', 'LIKE', "%$type%");
                }
            });
        }

        // Filter by case status

        if (request('file_casestatus')) {
            $query->where('file_casestatus', request('file_casestatus'));
        }

        // Filter by date range
        if (request('date_from') && request('date_to')) {
            $query->whereBetween('created_at', [request('date_from'), request('date_to')]);
        }

        // Sorting logic
        if (request('sort_by') && request('order')) {
            $query->orderBy(request('sort_by'), request('order'));
        }
        $data = $query->get();

        //Pagination Logic
        $data = $query->paginate(10);
        // $FileModel->appends(['sort' => 'FileModel']);

        $file_casetypes = FileModel::distinct('file_casetype')->pluck('file_casetype');
        $file_casestatuses = FileModel::distinct('file_casestatus')->pluck('file_casestatus');
        $file_docketnums = FileModel::distinct('file_docketnum')->pluck('file_docketnum');
        return view('user.usertable', ['data' => $data, 'file_casetypes' => $file_casetypes, 'file_casestatuses' => $file_casestatuses, 'file_docketnums' => $file_docketnums, 'selectedTypes' => $selectedTypes]);
    }

    public function archivedfiletable(Request $request)
    {
        $selectedTypes = $request->input('file_casetype', []);  // Default to an empty array if not set

        $query = ArchivedModel::query();

        if ($request->has('search')) {
            $searchTerm = '%' . $request->input('search') . '%';

            $query->where(function ($subquery) use ($searchTerm) {
                $subquery->where('file_name', 'like', $searchTerm)
                    ->orWhere('file_casetype', 'like', $searchTerm)
                    ->orWhere('file_casestatus', 'like', $searchTerm)
                    ->orWhere('file_authoredby', 'like', $searchTerm)
                    ->orWhere('file_docketnum', 'like', $searchTerm)
                    ->orWhere('file_submittedby', 'like', $searchTerm)
                    ->orWhere('created_at', 'like', $searchTerm);
                // Add other columns as needed
            });
        }

        // Filter by case type
        if (request('file_docketnum')) {
            $query->where('file_docketnum', request('file_docketnum'));
        }

        // Filter by court office
        if (request('file_casetype')) {
            $query->where(function ($query) use ($selectedTypes) {
                foreach ($selectedTypes as $type) {
                    $query->orWhere('file_casetype', 'LIKE', "%$type%");
                }
            });
        }

        // Filter by case status
        if (request('file_casestatus')) {
            $query->where('file_casestatus', request('file_casestatus'));
        }

        // Filter by date range
        if (request('date_from') && request('date_to')) {
            $query->whereBetween('created_at', [request('date_from'), request('date_to')]);
        }

        // Sorting logic
        if (request('sort_by') && request('order')) {
            $query->orderBy(request('sort_by'), request('order'));
        }
        $data = $query->get();

        //Pagination Logic
        $data = $query->paginate(10);
        // $FileModel->appends(['sort' => 'FileModel']);

        $file_casetypes = FileModel::distinct('file_casetype')->pluck('file_casetype');
        $file_casestatuses = FileModel::distinct('file_casestatus')->pluck('file_casestatus');
        $file_docketnums = FileModel::distinct('file_docketnum')->pluck('file_docketnum');
        return view('admin.adminarchivedfiles', ['data' => $data, 'file_casetypes' => $file_casetypes, 'file_casestatuses' => $file_casestatuses, 'file_docketnums' => $file_docketnums, 'selectedTypes' => $selectedTypes]);
    }

    public function userclienttable(Request $request)
    {

        $query = ClientModel::query();

        if ($request->has('search')) {
            $searchTerm = '%' . $request->input('search') . '%';
            $query->where(function ($subquery) use ($searchTerm) {
                $subquery->where('client_fname', 'like', $searchTerm)
                    ->orWhere('client_mname', 'like', $searchTerm)
                    ->orWhere('client_sname', 'like', $searchTerm)
                    ->orWhere('client_lawyer', 'like', $searchTerm)
                    ->orWhere('client_contactnum', 'like', $searchTerm)
                    ->orWhere('client_emailadd', 'like', $searchTerm)
                    ->orWhere('client_permadd', 'like', $searchTerm)
                    ->orWhere('client_type', 'like', $searchTerm)
                    ->orWhere('client_oppsfname', 'like', $searchTerm)
                    ->orWhere('client_oppsmname', 'like', $searchTerm)
                    ->orWhere('client_oppssname', 'like', $searchTerm)
                    ->orWhere('created_at', 'like', $searchTerm);
                // Add other columns as needed
            });
        }
        // Sorting logic
        if (request('sort_by') && request('order')) {
            $sortColumn = request('sort_by');
            if ($sortColumn === 'client_fname' || $sortColumn === 'client_sname') {
                // Check if the sort request is for the "Full Name" column
                $query->orderBy('client_fname', request('order'))
                    ->orderBy('client_sname', request('order'));
            } else {
                // Sort by other columns as requested
                $query->orderBy($sortColumn, request('order'));
            }
        } else {
            // Default sorting if no sorting request is made
            $query->orderBy('client_id', 'asc');
        }

        $data = $query->get();

        $data = $query->paginate(10);

        return view("user.userclientdetails", ['data' => $data]);
    }

    private $passdata;
    public function clientfulldetails($client_id)
    {

        $dataFromVerifyMethod = ClientModel::find($client_id);
        $filecasesData = FileModel::where('file_client', $client_id)->get();
        $billingRecord = BillingModel::where('client_id', $client_id)->first();
        $sum = (int) BillingModel::where('client_id', $client_id)->sum('b_clientbalance');
        return view('user.userclientsfulldetails', [
            'dataFromVerifyMethod' => $dataFromVerifyMethod,
            'filecasesData' => $filecasesData,
            'sum' => $sum,
        ]);
    }

    public function billing($client_id)
    {
        $clientData = ClientModel::find($client_id);
        $billingData = BillingModel::find($client_id);
        $this->passdata = [
            'clientData' => $clientData,
            'billingData' => $billingData,
        ];

        return view('user.billing', compact(
            'clientData',
            'billingData'
        ));
    }

    public function viewhistory(Request $request, $client_id)
    {

        $clientData = ClientModel::find($client_id); // Replace with your actual retrieval method for the client data
        $query = BillingModel::where('client_id', $client_id);

        if ($request->has('search')) {
            $searchTerm = '%' . $request->input('search') . '%';
            $query->where(function ($subquery) use ($searchTerm) {
                $subquery->where('case_id', 'like', $searchTerm)
                    ->orWhere('case_title', 'like', $searchTerm)
                    ->orWhere('b_clientbalance', 'like', $searchTerm)
                    ->orWhere('b_casetype', 'like', $searchTerm)
                    ->orWhere('b_paymethod', 'like', $searchTerm)
                    ->orWhere('bclient_paystatus', 'like', $searchTerm)
                    ->orWhere('created_at', 'like', $searchTerm)->get();
                // Add other columns as needed
            });
        }

        // Apply filters
        if ($request->has('case_id')) {
            $query->where('case_id', $request->input('case_id'));
        }
        if ($request->has('case_title')) {
            $query->where('case_title', $request->input('case_title'));
        }

        if ($request->has('b_clientbalance')) {
            $query->where('b_clientbalance', $request->input('b_clientbalance'));
        }
        // Filter by date range
        if (request('date_from') && request('date_to')) {
            $query->whereBetween('created_at', [request('date_from'), request('date_to')]);
        }

        // Sorting logic (if needed)
        if ($request->has('sort_by') && $request->has('order')) {
            $query->orderBy($request->input('sort_by'), $request->input('order'));
        } else {
            $query->orderBy('created_at', 'desc'); // Default sorting by 'created_at' in descending order
        }
        // Get the filtered and sorted data
        $billingDatas = $query->paginate(2);

        return view('user.billinghistory', [
            'clientData' => $clientData,
            'billingDatas' => $billingDatas,
        ]);
    }

    public function clientviewhistory(Request $request)
    {
        $client_id = Auth::user()->client_id;

        // Query to get client data
        $clientData = ClientModel::find($client_id);

        // Query to get billing record data with filtering and sorting
        $billingRecordQuery = BillingModel::where('client_id', $client_id);

        // Apply filtering based on the 'search' query parameter
        if ($request->has('search')) {
            $searchTerm = '%' . $request->input('search') . '%';
            $billingRecordQuery->where(function ($subquery) use ($searchTerm) {
                $subquery->where('case_id', 'like', $searchTerm)
                    ->orWhere('id', 'like', $searchTerm)
                    ->orWhere('case_title', 'like', $searchTerm)
                    ->orWhere('b_clientbalance', 'like', $searchTerm)
                    ->orWhere('b_casetype', 'like', $searchTerm)
                    ->orWhere('b_paymethod', 'like', $searchTerm)
                    ->orWhere('bclient_paystatus', 'like', $searchTerm)
                    ->orWhere('created_at', 'like', $searchTerm)->get();
                // Add other columns as needed
            });
        }

        // Apply sorting based on 'sort_by' and 'order' query parameters
        if ($request->has('sort_by') && $request->has('order')) {
            $sortField = $request->input('sort_by');
            $sortOrder = $request->input('order');
            $billingRecordQuery->orderBy($sortField, $sortOrder);
        } else {
            // Default sorting
            $billingRecordQuery->orderBy('created_at', 'desc');
        }

        // Paginate the results
        $perPage = 10; // You can change the number of items per page
        $billingRecords = $billingRecordQuery->paginate($perPage);

        return view('client.clienthistory', [
            'clientData' => $clientData,
            'billingRecords' => $billingRecords,
        ]);
    }


    public function clientarchivedhistory(Request $request)
    {
        $client_id = Auth::user()->client_id;
        $clientData = ClientModel::find($client_id);

        // Query to get archived billing data with filtering and sorting
        $archivedBillingQuery = ArchivedBilling::where('client_id', $client_id);

        // Apply filtering based on the 'search' query parameter
        if ($request->has('search')) {
            $searchTerm = '%' . $request->input('search') . '%';
            $archivedBillingQuery->where(function ($subquery) use ($searchTerm) {
                $subquery->where('case_id', 'like', $searchTerm)
                    ->orWhere('id', 'like', $searchTerm)
                    ->orWhere('case_title', 'like', $searchTerm)
                    ->orWhere('b_clientbalance', 'like', $searchTerm)
                    ->orWhere('b_casetype', 'like', $searchTerm)
                    ->orWhere('b_paymethod', 'like', $searchTerm)
                    ->orWhere('bclient_paystatus', 'like', $searchTerm)
                    ->orWhere('created_at', 'like', $searchTerm)->get();
                // Add other columns as needed
            });
        }

        // Apply sorting based on 'sort_by' and 'order' query parameters
        if ($request->has('sort_by') && $request->has('order')) {
            $sortField = $request->input('sort_by');
            $sortOrder = $request->input('order');
            $archivedBillingQuery->orderBy($sortField, $sortOrder);
        } else {
            // Default sorting
            $archivedBillingQuery->orderBy('updated_at', 'desc');
        }

        // Paginate the results
        $perPage = 5; // You can change the number of items per page
        $archivedBillings = $archivedBillingQuery->paginate($perPage);

        return view('client.clientarchivedhistory', [
            'clientData' => $clientData,
            'archivedBillings' => $archivedBillings,
        ]);
    }


    public function archivedhistory($client_id, Request $request)
    {
        $clientData = ClientModel::find($client_id);
        // Query to get archived billing records with filtering and sorting
        $archivedBillingQuery = ArchivedBilling::where('client_id', $client_id);

        // Apply filtering based on the 'search' query parameter
        if ($request->has('search')) {
            $searchTerm = '%' . $request->input('search') . '%';
            $archivedBillingQuery->where(function ($subquery) use ($searchTerm) {
                $subquery->where('case_id', 'like', $searchTerm)
                    ->orWhere('id', 'like', $searchTerm)
                    ->orWhere('case_title', 'like', $searchTerm)
                    ->orWhere('b_clientbalance', 'like', $searchTerm)
                    ->orWhere('b_casetype', 'like', $searchTerm)
                    ->orWhere('b_paymethod', 'like', $searchTerm)
                    ->orWhere('bclient_paystatus', 'like', $searchTerm)
                    ->orWhere('created_at', 'like', $searchTerm)->get();
                // Add other columns as needed
            });
        }

        // Apply sorting based on 'sort_by' and 'order' query parameters
        if ($request->has('sort_by') && $request->has('order')) {
            $sortField = $request->input('sort_by');
            $sortOrder = $request->input('order');
            $archivedBillingQuery->orderBy($sortField, $sortOrder);
        } else {
            // Default sorting
            $archivedBillingQuery->orderBy('updated_at', 'desc');
        }

        // Paginate the results
        $perPage = 5; // You can change the number of items per page
        $archivedBillings = $archivedBillingQuery->paginate($perPage);

        return view('user.archivedbilling', [
            'clientData' => $clientData,
            'archivedBillings' => $archivedBillings,
        ]);
    }


    public function useraddfileclientsearch()
    {
        return view("user.useraddfileclientsearch");
    }

    public function useraddfile($client_id)
    {

        $clientData = ClientModel::find($client_id);

        $this->passdata = [

            'clientData' => $clientData,
        ];
        return view('user.useraddfile', compact('clientData'));

        // $searchidValue = $request->input('file_client');
        // if ($searchidValue == null) {
        //     $data = ClientModel::find(null);
        //     return view('user.useraddfile', compact('data'));
        // } else {
        //     $searchidValue = $request->input('file_client');
        //     $data = ClientModel::find($searchidValue);
        //     return view('user.useraddfile', compact('data'));
        // }
    }

    public function autocomplete(Request $request)

    {

        $data = ClientModel::select("client_fname")
            ->where('client_fname', 'LIKE', '%' . $request->get('query') . '%')
            ->get();
        return response()->json($data);
    }
    public function search(Request $request)
    {
        $data = ClientModel::select("client_fname")

            ->where('client_fname', 'LIKE', '%' . $request->get('query') . '%')

            ->get();



        return response()->json($data);
    }

    //for case dockets color types
    public function docketblu(Request $request)
    {
        $query = FileModel::query();

        if ($request->has('search')) {
            $searchTerm = '%' . $request->input('search') . '%';

            $query->where(function ($subquery) use ($searchTerm) {
                $subquery->where('file_name', 'like', $searchTerm)
                    ->orWhere('file_casetype', 'like', $searchTerm)
                    ->orWhere('file_casestatus', 'like', $searchTerm)
                    ->orWhere('file_authoredby', 'like', $searchTerm)
                    ->orWhere('file_docketnum', 'like', $searchTerm)
                    ->orWhere('file_submittedby', 'like', $searchTerm)
                    ->orWhere('created_at', 'like', $searchTerm);
                // Add other columns as needed
            });
        }
        $query->where('file_casetype', 'Civil Case')->get();
        // Sorting logic
        if (request('sort_by') && request('order')) {
            $query->orderBy(request('sort_by'), request('order'));
        }

        $data = $query->get();

        $data = $query->paginate(5);
        return view("dockets.caseblue", ['data' => $data]);
    }

    public function docketred(Request $request)
    {
        $query = FileModel::query();

        if ($request->has('search')) {
            $searchTerm = '%' . $request->input('search') . '%';

            $query->where(function ($subquery) use ($searchTerm) {
                $subquery->where('file_name', 'like', $searchTerm)
                    ->orWhere('file_casetype', 'like', $searchTerm)
                    ->orWhere('file_casestatus', 'like', $searchTerm)
                    ->orWhere('file_authoredby', 'like', $searchTerm)
                    ->orWhere('file_docketnum', 'like', $searchTerm)
                    ->orWhere('file_submittedby', 'like', $searchTerm)
                    ->orWhere('created_at', 'like', $searchTerm);
                // Add other columns as needed
            });
        }
        $query->where('file_casetype', 'Criminal Case')->get();
        // Sorting logic
        if (request('sort_by') && request('order')) {
            $query->orderBy(request('sort_by'), request('order'));
        }

        $data = $query->get();

        $data = $query->paginate(5);
        return view("dockets.casered", ["data" => $data]);
    }

    public function docketyel(Request $request)
    {
        $query = FileModel::query();

        if ($request->has('search')) {
            $searchTerm = '%' . $request->input('search') . '%';

            $query->where(function ($subquery) use ($searchTerm) {
                $subquery->where('file_name', 'like', $searchTerm)
                    ->orWhere('file_casetype', 'like', $searchTerm)
                    ->orWhere('file_casestatus', 'like', $searchTerm)
                    ->orWhere('file_authoredby', 'like', $searchTerm)
                    ->orWhere('file_docketnum', 'like', $searchTerm)
                    ->orWhere('file_submittedby', 'like', $searchTerm)
                    ->orWhere('created_at', 'like', $searchTerm);
                // Add other columns as needed
            });
        }
        $query->where('file_casetype', 'Others')->get();
        // Sorting logic
        if (request('sort_by') && request('order')) {
            $query->orderBy(request('sort_by'), request('order'));
        }

        $data = $query->get();

        $data = $query->paginate(5);
        return view("dockets.caseyellow", ["data" => $data]);
    }
    //end for case dockets color types

    //case client all cases
    public function clientall(Request $request, $client_id)
    {
        $data = ClientModel::where('client_id', $client_id)->first();

        $filedataQuery = FileModel::where('file_client', $client_id);

        // Search filter
        if ($request->has('search')) {
            $searchTerm = '%' . $request->input('search') . '%';

            $filedataQuery->where(function ($subquery) use ($searchTerm) {
                $subquery->where('file_name', 'like', $searchTerm)
                    ->orWhere('file_casetype', 'like', $searchTerm)
                    ->orWhere('file_casestatus', 'like', $searchTerm)
                    ->orWhere('file_authoredby', 'like', $searchTerm)
                    ->orWhere('file_docketnum', 'like', $searchTerm)
                    ->orWhere('file_submittedby', 'like', $searchTerm)
                    ->orWhere('created_at', 'like', $searchTerm);
                // Add other columns as needed
            });
        }
        if (request('date_from') && request('date_to')) {
            $filedataQuery->whereBetween('created_at', [request('date_from'), request('date_to')]);
        }

        $filedata = $filedataQuery->get();

        return view("dockets.fullclientcases", ["data" => $data, "filedata" => $filedata]);
    }

    public function printview($client_id)
    {
        $filedata = FileModel::where('file_client', $client_id)->get();
        $data = ClientModel::where('client_id', $client_id)->first();


        return view("dockets.printview", ["data" => $data, "filedata" => $filedata]);
    }

    public function autocompleteSearch(Request $request)
    {
        $term = $request->input('term'); // User input
        $suggestions = ClientModel::where('client_fname', 'LIKE', "%{$term}%")->pluck('client_fname');

        return response()->json($suggestions);
    }

    public function useraddclient()
    {
        return view("user.useraddclient");
    }

    function typeahead()
    {
        return view('typeahead_autocomplete');
    }

    function action(Request $request)
    {
        $data = $request->all();

        $query = $data['query'];

        $filter_data = User::select('email')
            ->where('email', 'LIKE', '%' . $query . '%')
            ->get();

        return response()->json($filter_data);
    }
}
