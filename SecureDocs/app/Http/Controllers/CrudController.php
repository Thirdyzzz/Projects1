<?php

namespace App\Http\Controllers;

use App\Models\checkoxtest;
use App\Models\ClientModel;
use App\Models\ArchivedModel;
use App\Models\ArchivedBilling;
use App\Models\FileModel;
use App\Models\User;
use App\Models\RecentlyAdded;
use App\Models\BillingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class CrudController extends Controller
{
    //code
    public function insertcheckbox(request $request)
    {


        $casename = new checkoxtest;

        $casename->casename = $request->name;

        $yawa = json_encode($request->casetype);
        $yawa2 = json_decode($yawa);

        $string = implode(", ", $yawa2);

        $casename->casetype = $string;
        $casename->save();

        dd($request->all());
    }

    public function addclientbalance(request $request)
    {

        $bclient = new BillingModel;

        $bclient->client_id = $request->client_id;
        $bclient->b_casetype = $request->b_casetype;
        $bclient->b_paymethod = $request->b_paymethod;
        $bclient->bclient_paystatus = $request->bclient_paystatus;
        $bclient->b_clientbalance = $request->b_clientbalance;

        $bclient->save();

        return dd($request->all());
    }

    public function insertclienttable(request $request)
    {

        $request->validate([
            'client_lawyer' => 'required|string|max:255',
            'client_fname' => 'required|string|max:255',

            'client_sname' => 'required|string|max:255',
            'client_contactnum' => 'required|string|digits:11',
            'client_emailadd' => 'required|string|email|max:255|unique:clients',
            'client_permadd' => 'required|string|max:255',
            // 'client_bill_status' => 'required|string|max:255',
            'client_emcontactnum' => 'required|string|digits:11',
            'client_type' => 'required|string|max:255',
            'client_ememailadd' => 'required|string|max:255',
            'client_empermadd' => 'required|string|max:255',
            // 'client_oppsfname' => 'required|string|max:255',

            // 'client_oppssname' => 'required|string|max:255',
            // 'client_oppslawyer' => 'required|string|max:255',
            // 'client_oppsfirmaddress' => 'required|string|max:255',
        ]);

        $client = new ClientModel;

        $client->client_submitby = $request->client_submitby;
        $client->client_lawyer = $request->client_lawyer;
        $client->client_fname = $request->client_fname;
        $client->client_mname = $request->client_mname;
        $client->client_sname = $request->client_sname;
        $client->client_contactnum = $request->client_contactnum;
        $client->client_emailadd = $request->client_emailadd;
        $client->client_permadd = $request->client_permadd;
        //  $client->client_bill_status = $request->client_bill_status;
        //  $client->client_bill = $request->client_bill;
        $client->client_type = $request->client_type;
        $client->client_emcontactnum = $request->client_emcontactnum;
        $client->client_ememailadd = $request->client_ememailadd;
        $client->client_empermadd = $request->client_empermadd;
        $client->client_oppsfname = $request->client_oppsfname;
        $client->client_oppsmname = $request->client_oppsmname;
        $client->client_oppssname = $request->client_oppssname;
        $client->client_oppslawyer = $request->client_oppslawyer;
        $client->client_oppsfirmaddress = $request->client_oppsfirmaddress;
        $client->save();

        $ra_data = new RecentlyAdded();

        // Concatenate the values of client_fname and client_mname
        $ra_filename = $request->client_fname . ' ' . $request->client_mname . ' ' . $request->client_sname;
        $ra_data->ra_filename = $ra_filename;
        $ra_data->ra_description = 'CLIENT SUBMITTED';
        $ra_data->ra_by_author = $request->client_submitby;

        $ra_data->save();

        return redirect()->back()->with('message', 'Client added successfully!');
    }
    public function fileupdateview($client_id, $file_client, $file_idID)
    {
        $fileData = FileModel::find($client_id);
        $clientData = ClientModel::find($file_client);
        $billingData = BillingModel::where('case_id', $file_idID)->first();
        $archivedBillingData = ArchivedBilling::where('case_id', $file_idID)->first();
        $this->passdata = [
            'fileData' => $fileData,
            'billingData' => $billingData,
            'clientData' => $clientData,
            'archivedBillingData' => $archivedBillingData,
        ];
        return view('user.userupdatefile', compact('fileData', 'billingData', 'clientData', 'archivedBillingData'));
    }

    public function editclientview($client_id)
    {
        $clientData = ClientModel::find($client_id);
        $billingData = BillingModel::find($client_id);
        $this->passdata = [
            'clientData' => $clientData,
            'billingData' => $billingData,
        ];
        return view('user.editclient', compact('clientData', 'billingData'));
    }

    public function editclient(Request $request, $client_id)
    {
        $request->validate([
            'client_lawyer' => 'required|string|max:255',
            'client_fname' => 'required|string|max:255',

            'client_sname' => 'required|string|max:255',
            'client_contactnum' => 'required|string|digits:11',
            'client_emailadd' => 'required|string|email|max:255|unique:clients,client_emailadd,' . $client_id . ',client_id',
            'client_permadd' => 'required|string|max:255',
            'client_emcontactnum' => 'required|string|digits:11',
            'client_type' => 'required|string|max:255',
            'client_ememailadd' => 'required|string|max:255',
            'client_empermadd' => 'required|string|max:255',
            'client_oppsfname' => 'required|string|max:255',

            'client_oppssname' => 'required|string|max:255',
            'client_oppslawyer' => 'required|string|max:255',
            'client_permadd' => 'required|string|max:255',
        ]);

        $client = ClientModel::find($client_id);

        if (!$client) {
            // Handle the case where the client record with the provided ID is not found.
            // You can return an error message or redirect as needed.
        }

        // Update the client record with the new values
        $client->client_lawyer = $request->client_lawyer;
        $client->client_fname = $request->client_fname;
        $client->client_mname = $request->client_mname;
        $client->client_sname = $request->client_sname;
        $client->client_contactnum = $request->client_contactnum;
        $client->client_emailadd = $request->client_emailadd;
        $client->client_permadd = $request->client_permadd;
        $client->client_type = $request->client_type;
        $client->client_emcontactnum = $request->client_emcontactnum;
        $client->client_ememailadd = $request->client_ememailadd;
        $client->client_empermadd = $request->client_empermadd;
        $client->client_oppsfname = $request->client_oppsfname;
        $client->client_oppsmname = $request->client_oppsmname;
        $client->client_oppssname = $request->client_oppssname;
        $client->client_oppslawyer = $request->client_oppslawyer;
        $client->client_oppsfirmaddress = $request->client_oppsfirmaddress;

        $client->save();

        //under this line is for recentlyadded table
        $ra_data = new RecentlyAdded();

        $ra_filename = $request->client_fname . ' ' . $request->client_mname . ' ' . $request->client_sname;

        $ra_data->ra_filename = $ra_filename;
        $ra_data->ra_description = 'UPDATED';
        $ra_data->ra_by_author = $request->client_submitby;

        $ra_data->save();

        return redirect()->back()->with('message', 'Client updated successfully!');
    }

    public function registerclientview($client_id)
    {
        $clientData = ClientModel::find($client_id);
        $billingData = BillingModel::find($client_id);
        $this->passdata = [
            'clientData' => $clientData,
            'billingData' => $billingData,
        ];
        return view('user.registerclient', compact('clientData', 'billingData'));
    }

    public function registerclient(request $request, $submitted_by)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            // other validation rules...
        ], [
            'email.required' => 'Email already exists!',
            'email.email' => 'Email  duplicated or must be a valid address.',
            'email.max' => 'Email already exists!',
            'email.unique' => 'Email already exists!',
            // other custom error messages...
        ]);

        $uclient = new User;

        $uclient->client_id = $request->client_id;
        $uclient->name = $request->name;
        $uclient->email = $request->email;
        $uclient->email_verified_at = now();
        $uclient->password = Hash::make($request->password);
        $uclient->usertype = 'client';

        $uclient->save();
        //adding recent added table
        $ra_data = new RecentlyAdded();

        // Concatenate the values of client_fname and client_mname

        $ra_data->ra_filename = $request->name;
        $ra_data->ra_description = 'CLIENT REGISTERED';
        $ra_data->ra_by_author = $submitted_by;

        $ra_data->save();


        return redirect()->back()->with('message', 'Client registered successfully!');
    }

    public function insertfiletable(request $request)
    {
        $request->validate([
            'file' => 'required',
            //'file_idID' => 'required|string|max:255',
            'file_idID' => 'required|string|max:255|unique:files,file_idID',
            'file_name' => 'required|string|max:255',
            'file_submittedby' => 'required|string|max:255',
            'file_authoredby' => 'required|string|max:255',
            'file_docketnum' => 'required|string|max:255',
            'b_clientbalance' => 'required|string|max:255',
            'b_paymethod' => 'required|string|max:255',
            // 'client_bill_status' => 'required|string|max:255',
            //'file_casestatus' => 'required|string|digits:11',
            'file_casetype' => 'required|string|max:255',
            'file_casestatus' => 'required|string|max:255',
            'file_casetypetype' => 'required|string|max:255',
            'file_client' => 'required|string|max:255',
            'file_court' => 'required|string|max:255',
            'file_branch' => 'required|string|max:255',
        ]);


        //code...
        $data = new FileModel();
        $file_file = $request->file;

        $filetag = time() . '.' . $file_file->getClientOriginalName();
        $data->file = $filetag;
        // Define the path for the uploaded file in the "encfls" directory
        $encflspath = public_path('encfls/' . $filetag);

        // Move the uploaded file directly to the "encfls" directory
        $file_file->move('encfls', $filetag);

        // Read the content of the uploaded file
        $fileContent = file_get_contents($encflspath);

        // Encrypt the file content
        $encryptedContent = Crypt::encrypt($fileContent);

        // Save the encrypted content back to the same encrypted file
        file_put_contents($encflspath, $encryptedContent);


        $data->file_idID = $request->file_idID;
        $data->file_name = $request->file_name;
        $data->file_submittedby = $request->file_submittedby;
        $data->file_authoredby = $request->file_authoredby;
        $data->file_docketnum = $request->file_docketnum;
        $data->file_casestatus = $request->file_casestatus;

        $casetypeForUID = $request->file_casetype;


        if (strcasecmp($casetypeForUID, 'Criminal Case') === 0) {
            // Generate a random unique ID
            do {
                $number = random_int(1000, 9999); // You can adjust the range as needed
                $uniqueID = 'Red-' . $number;
            } while (FileModel::where('file_genID', '=', $uniqueID)->exists());

            // Store the unique ID in the database
            $data->file_genID = $uniqueID;
        } elseif (strcasecmp($casetypeForUID, 'Civil Case') === 0) {
            // Generate a random unique ID if casetypeuid is equals to Civil Case
            do {
                $number = random_int(1000, 9999); // You can adjust the range as needed
                $uniqueID = 'Blu-' . $number;
            } while (FileModel::where('file_genID', '=', $uniqueID)->exists());

            // Store the unique ID in the database
            $data->file_genID = $uniqueID;
        } else {
            // Handle other cases here (if needed)
            // Generate a random unique ID if casetypeuid is equals to Civil Case
            do {
                $number = random_int(1000, 9999); // You can adjust the range as needed
                $uniqueID = 'Yel-' . $number;
            } while (FileModel::where('file_genID', '=', $uniqueID)->exists());

            // Store the unique ID in the database
            $data->file_genID = $uniqueID;
        }


        $data->file_casetype = $request->file_casetype;
        $data->file_casetypetype = $request->file_casetypetype;
        $data->file_client = $request->file_client;
        $data->file_court = $request->file_court;
        $data->file_branch = $request->file_branch;
        $data->save();

        //under this line is for recentlyadded table

        $ra_data = new RecentlyAdded();
        $ra_data->ra_filename = $request->file_name;
        //$ra_data->ra_description = 'FILE ADDED';
        $ra_data->ra_description = $request->file_casetypetype;
        $ra_data->ra_by_author = $request->file_submittedby;
        $ra_data->save();

        //under this is for billing details
        $bclient = new BillingModel;

        $bclient->client_id = $request->file_client;
        $bclient->case_id = $request->file_idID;
        $bclient->case_title = $request->file_name;
        $bclient->b_casetype = $request->file_casetype;

        $bclient->b_paymethod = $request->b_paymethod;
        $bclient->bclient_paystatus = 'Unpaid';
        $bclient->b_clientbalance = $request->b_clientbalance;

        $bclient->save();


        return redirect()->back()->with('message', 'File added successfully!');
    }

    public function updatefile(Request $request, $file_id, $file_idID)
    {
        //under this line is for recentlyadded table
        $ra_data = new RecentlyAdded();
        $ra_data->ra_filename = $request->file_name;
        $ra_data->ra_description = 'UPDATED';
        $ra_data->ra_by_author = $request->file_submittedby;

        $ra_data->save();

        // Fetch the existing file record by ID
        $data = FileModel::find($file_id);

        if (!$data) {
            // Handle the case where the file record with the provided ID is not found.
            // You can return an error message or redirect as needed.
        }

        $request->validate([
            'file_idID' => 'required|string|max:255',
            'file_name' => 'required|string|max:255',
            'file_submittedby' => 'required|string|max:255',
            'file_authoredby' => 'required|string|max:255',
            'file_docketnum' => 'required|string|max:255',
            'file_casetype' => 'required|string|max:255',
            'file_casestatus' => 'required|string|max:255',
            'file_casetypetype' => 'required|string|max:255',
            'file_remarks' => 'required|string|max:255',
            'file_client' => 'required|string|max:255',
            'file_court' => 'required|string|max:255',
            'file_branch' => 'required|string|max:255',
        ]);

        // Update the file record with the new values
        if ($request->hasFile('file')) {
            // Handle file replacement
            $file_file = $request->file;
            $filetag = time() . '.' . $file_file->getClientOriginalName();
            $data->file = $filetag;
            $encflspath = public_path('encfls/' . $filetag);
            $file_file->move('encfls', $filetag);
            $fileContent = file_get_contents($encflspath);
            $encryptedContent = Crypt::encrypt($fileContent);
            file_put_contents($encflspath, $encryptedContent);
        }
        $data->file_casestatus = $request->file_casestatus;
        $data->file_idID = $request->file_idID;
        $data->file_name = $request->file_name;
        $data->file_submittedby = $request->file_submittedby;
        $data->file_authoredby = $request->file_authoredby;
        $data->file_docketnum = $request->file_docketnum;
        $data->file_casetype = $request->file_casetype;
        $data->file_casetypetype = $request->file_casetypetype;
        $data->file_remarks = $request->file_remarks;
        $data->file_client = $request->file_client;
        $data->file_court = $request->file_court;
        $data->file_branch = $request->file_branch;
        $data->save();

        // Find the BillingModel record based on case_id
        $bclient = BillingModel::where('case_id', $file_idID)->first();

        if (!$bclient) {
            // Handle the case where the BillingModel record is not found.
            // You can create a new BillingModel or return an error response.
            // For example, creating a new BillingModel:
            // $bclient->delete();
            // $bclient = new BillingModel;
            $bclient = new BillingModel;
        }

        // Update the attributes of $bclient.
        $bclient->client_id = $request->file_client;
        $bclient->case_id = $request->file_idID;
        $bclient->case_title = $request->file_name;
        $bclient->b_casetype = $request->file_casetype;
        $bclient->b_paymethod = $request->b_paymethod;
        $bclient->bclient_paystatus = $request->bclient_paystatus;
        $bclient->b_clientbalance = $request->b_clientbalance;

        $bclient->save();



        //return dd($request->all());
        return redirect()->back()->with('message', 'File updated successfully!');
    }


    public function encrypt()
    {


        // Get the binary content of the PDF file
        $filePath = public_path('files\testfile.docx');
        $pdfContent = file_get_contents($filePath);

        // Encrypt the PDF content// Encrypt the PDF content
        $encryptedPdfContent = Crypt::encryptString($pdfContent);
        // Save the encrypted content to a new PDF file
        $encryptedFilePath = public_path('encfls\testfile.docx'); // Change this to the desired path for the encrypted PDF
        file_put_contents($encryptedFilePath, $encryptedPdfContent);
    }


    public function decrypt()
    {

        // Get the binary content of the PDF file - getting from file path and file content
        $filePath = public_path('encfls\type_enc_1695289620_UHRS_User_Guide.pdf');
        $pdfContent = file_get_contents($filePath);

        // Encrypt the PDF content// Encrypt the PDF content
        $decryptedPdfContent = Crypt::decryptString($pdfContent);
        // Save the encrypted content to a new PDF file
        $decryptedFilePath = public_path('decfls\type_enc_1695289620_UHRS_User_Guide.pdf'); // Change this to the desired path for the encrypted PDF
        file_put_contents($decryptedFilePath, $decryptedPdfContent);
    }


    public function aesview()
    {

        return view('user.aestest');
    }
    public function aestest(Request $request)
    {

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $label = 'type_enc';
            $content = file_get_contents($file);
            $encryptContent = Crypt::encryptString($content);

            $filetag = $label . '_' . time() . '_' . $file->getClientOriginalName(); // Use $file, not $encryptContent

            // Store the encrypted content in a file (optional)
            $encryptedFilePath = public_path('encfls/' . $filetag);
            file_put_contents($encryptedFilePath, $encryptContent);

            // Set a success message and redirect
            return redirect()->back()->with('success', $encryptedFilePath . " " . 'Encrypted successfully');
        }

        // If no file was selected, set an error message and redirect
        return redirect()->back()->with('error', 'No file was selected');
    }

    //for locking of pages
    public function verify($file_id, $file_client)
    {
        $this->passdata = FileModel::find($file_id);
        $datafromclient = ClientModel::where('client_id', $file_client)->first();


        $dataFromVerifyMethod = $this->passdata;
        return view('verification.verify', compact('dataFromVerifyMethod', 'datafromclient'));
    }

    public function verifyprocess(Request $request, $file_client)
    {

        $adminUser = User::where('usertype', 'admin')->first();


        $hiddendata = $request->input('hiddendata'); // Get the value from the hidden input field
        $userpassText = $request->input('userpass'); // Get the value from the input field

        // Don't use $request->userpassText; change it to $request->input('userpass')
        $plainTextPassword = $request->input('userpass'); // Get the plain text password from the request
        $hashedPassword = $adminUser->password; // Get the hashed password from your user model

        if ($adminUser && Hash::check($plainTextPassword, $hashedPassword)) {
            // Passwords match, so the user is authenticated
            // You can proceed with whatever action you need here
            $viewfile = FileModel::find($hiddendata);
            $fromclientdata = ClientModel::find($file_client);

            return view('verification.viewfile', compact('viewfile', 'fromclientdata'));
        } else {
            // Passwords do not match, handle the error or authentication failure
            //return view('verification.viewfile');
            return redirect()->back()->withErrors(['password' => 'Invalid password']);
            //return dd($userpassText);
        }
    }
    public function verifiedview(Request $request)
    {

        $dataFromVerifyMethod = $this->passdata;

        $viewfile = FileModel::find($dataFromVerifyMethod);

        return view('verification.viewfile', compact('viewfile'));
    }

    //for delete set as paid archive

    public function setaspaid($id, $client_id, $case_id, $case_title, $b_clientbalance, $b_casetype, $b_paymethod, $created_at, $file_submittedby)
    {


        //add to archive
        $archive = new ArchivedBilling();
        $archive->id = $id;
        $archive->client_id = $client_id;
        $archive->case_id = $case_id;
        $archive->case_title = $case_title;
        $archive->b_clientbalance = $b_clientbalance;
        $archive->b_casetype = $b_casetype;
        $archive->b_paymethod = $b_paymethod;
        $archive->bclient_paystatus = 'Paid';
        $archive->created_at = $created_at;

        $archive->save();

        //under this line is for recentlyadded table
        $ra_data = new RecentlyAdded();
        $ra_data->ra_filename = $case_title;
        $ra_data->ra_description = 'BILL SET AS PAID';
        $ra_data->ra_by_author = $file_submittedby;

        $ra_data->save();
        //claer from billing model
        $deletefrombillingModel = BillingModel::find($id);

        $deletefrombillingModel->delete();

        return redirect()->back()->with('success', 'Data marked as paid and copied successfully');
    }

    public function setasarchive($file_id, $file_idID, $file_submittedby, $file_authoredby, $file_name, $file_casestatus, $file_docketnum, $file_casetype, $file_casetypetype, $file_genID, $file, $file_client, $file_court, $file_branch, $created_at, $updated_at)
    {


        $archive = new ArchivedModel();
        $archive->file_id = $file_id;
        $archive->file_idID = $file_idID;
        $archive->file_submittedby = $file_submittedby;
        $archive->file_authoredby = $file_authoredby;
        $archive->file_name = $file_name;
        $archive->file_casestatus = $file_casestatus;
        $archive->file_docketnum = $file_docketnum;
        $archive->file_casetype = $file_casetype;
        $archive->file_casetypetype = $file_casetypetype;
        $archive->file_genID = $file_genID;
        $archive->file = $file;

        $archive->file_client = $file_client;
        $archive->file_court = $file_court;
        $archive->file_branch = $file_branch;
        $archive->created_at = $created_at;
        $archive->updated_at = $updated_at;

        $archive->save();

        //under this line is for recentlyadded table
        $ra_data = new RecentlyAdded();
        $ra_data->ra_filename = $file_name;
        $ra_data->ra_description = 'FILE ARCHIVED';
        $ra_data->ra_by_author = $file_submittedby;

        $ra_data->save();

        $deletefrombillingModel = FileModel::find($file_id);

        $deletefrombillingModel->delete();

        return redirect()->back()->with('success', 'Data marked as paid and copied successfully');
    }

    public function forceactivate($id, $name, $submittedby)
    {


        //update to verified
        $data = User::find($id);

        if (!$data) {
            // Handle the case where the file record with the provided ID is not found.
            // You can return an error message or redirect as needed.
        }
        $currentTimestamp = now(); // This gets the current timestamp
        $data->email_verified_at = $currentTimestamp;
        $data->save();


        //under this line is for recentlyadded table
        $ra_data = new RecentlyAdded();
        $ra_data->ra_filename = $name;
        $ra_data->ra_description = 'USER FORCE ACTIVATED';
        $ra_data->ra_by_author = $submittedby;

        $ra_data->save();

        return redirect()->back()->with('success', 'User marked as force activated successfully');
    }

    public function userdelete($id, $name, $submittedby)
    {


        //update to verified
        $deletefromuser = User::find($id);

        $deletefromuser->delete();

        //under this line is for recentlyadded table
        $ra_data = new RecentlyAdded();
        $ra_data->ra_filename = $name;
        $ra_data->ra_description = 'USER FORCE DELETED';
        $ra_data->ra_by_author = $submittedby;

        $ra_data->save();

        return redirect()->back()->with('success', 'Data deleted successfully');
    }

    function ticket_number()
    {
        do {
            $number = random_int(1000000, 9999999);
            $uniqueNumber = 'B-' . $number;
        } while (FileModel::where("file_genID", "=", $uniqueNumber)->first());

        return $uniqueNumber;
    }
}
