 <?php

    use App\Http\Controllers\FilterController;
    use App\Http\Controllers\VerificationController;
    use App\Http\Controllers\ProfileController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\CrudController;
    use App\Http\Controllers\Auth\RegisteredUserController;
    use App\Http\Controllers\GoogleCalendarController;
    /*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

    Route::get('/', function () {
        return view('auth.login');
    });

    Route::get('/app', function () {
        return view('app');
    });

    //email verification
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');

    //route multirole
    Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
    Route::get('/userpost', [HomeController::class, 'userpost'])->middleware(['auth', 'admin']);
    //testing checklist get
    Route::post('/result', [CrudController::class, 'insertcheckbox'])->name('crudtest');
    Route::post('/restest', [CrudController::class, 'insertclienttable'])->name('restest');
    Route::post('/insertfiletable', [CrudController::class, 'insertfiletable'])->name('insertfiletable');
    //search
    Route::get("/search", [HomeController::class, 'search'])->name('search');
    Route::get('/autocomplete', [HomeController::class, 'autocompleteIndex']);
    Route::get('/autocomplete/fetch', [HomeController::class, 'autocomplete'])->name('autocomplete.fetch');
    Route::get('/autocomplete-search', [HomeController::class, 'autocompleteSearch'])->name('autocompleteSearch');
    Route::get('/typeahead_autocomplete', [HomeController::class, 'typeahead']);
    Route::get('/typeahead_autocomplete/action', [HomeController::class, 'action'])->name('typeahead_autocomplete.action');
    //for verification testing
    Route::get('/verify', [VerificationController::class, 'showVerificationForm'])->name('verification.form');
    Route::post('/verify', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::get('/admin/file-table', [HomeController::class, 'adminfiletable'])->name('adminfiletable');

    // Make sure this route is protected so only verified users can access it
    Route::middleware(['verified'])->group(function () {
        Route::get('/dashboard', function () {
            // Your dashboard code here
        })->name('dashboard');
    });


    Route::get('/client/billing/{id}', [HomeController::class, 'billing'])->name('billing');
    Route::get('/client/view-history/{id}', [HomeController::class, 'viewhistory'])->name('viewhistory');
    Route::get('/client/archived-history/{id}', [HomeController::class, 'archivedhistory'])->name('archivedhistory');
    Route::get('/client/archived-history/{id}/{client_id}/{case_id}/{case_title}/{b_clientbalance}/{b_casetype}/{b_paymethod}/{created_at}/{file_submittedby}', [CrudController::class, 'setaspaid'])->name('setaspaid');

    Route::get('/file/archived/{file_id}/{file_idID}/{file_submittedby}/{file_authoredby}/{file_name}/{file_docketnum}/{file_casestatus}/{file_casetype}/{file_casetypetype}/{file_genID}/{file}/{file_client}/{file_court}/{file_branch}/{created_at}/{updated_at}', [CrudController::class, 'setasarchive'])->name('setasarchive');

    Route::get('/user/force-activate/{id}/{name}/{submittedby}', [CrudController::class, 'forceactivate'])->name('forceactivate');
    Route::get('/user/force-delete/{id}/{name}/{submittedby}', [CrudController::class, 'userdelete'])->name('deleteuser');


    Route::get('/file/archived/history', [HomeController::class, 'archivedfiletable'])->name('archivedfiletable');

    Route::get('/file/update/{id}/{file_client}/{file_idID}', [CrudController::class, 'fileupdateview'])->name('fileupdateview');
    Route::post('/file/updating/{id}/{file_idID}', [CrudController::class, 'updatefile'])->name('update');

    //for print
    Route::get('/file/update/{id}/{file_client}/{file_idID}', [CrudController::class, 'fileupdateview'])->name('fileupdateview');
    Route::get('/print/preview/{client_id}', [HomeController::class, 'printview'])->name('printview');




    //encryption aes 256
    Route::get('/encrypt', [CrudController::class, 'encrypt']);
    Route::get('/decrypt', [CrudController::class, 'decrypt']);
    Route::get('/aesview', [CrudController::class, 'aesview']);
    Route::POST('/aestest', [CrudController::class, 'aestest'])->name('aestest');


    Route::middleware('auth', 'verified')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/user', [HomeController::class, 'usertable'])->name('usertable');
        Route::get('/user/search-client', [HomeController::class, 'useraddfileclientsearch'])->name('useraddfileclientsearch');
        Route::get('/user/search-client/user-add-file/{id}', [HomeController::class, 'useraddfile'])->name('useraddfile');
        Route::get('/user/user-add-client', [HomeController::class, 'useraddclient'])->name('useraddclient');
        Route::get('/user/client-table', [HomeController::class, 'userclienttable'])->name('userclienttable');
        Route::get('/user/client-table/view-full-details/{id}', [HomeController::class, 'clientfulldetails'])->name('clientfulldetails');

        //register client
        Route::get('/register-client/{id}', [CrudController::class, 'registerclientview'])->name('registerclientview');
        Route::post('/register-client/{submitted_by}', [CrudController::class, 'registerclient'])->name('registerclient');

        //edit client
        Route::get('/edit-client/{id}', [CrudController::class, 'editclientview'])->name('editclientview');
        Route::post('/edit-client/update/{id}', [CrudController::class, 'editclient'])->name('editclient');

        //for verify aes password
        Route::get('/file-tables/verify-view/{id}/{file_client}', [CrudController::class, 'verify'])->name('verify');
        Route::post('/file-tables/verify-view/verify-process/{file_client}', [CrudController::class, 'verifyprocess'])->name('verifyprocess');
        Route::post('/file-tables/verify-view/verified-view', [CrudController::class, 'verifiedview'])->name('verifiedview');
        //for id generation test
        Route::get('/generateCaseID', [CrudController::class, 'generateCaseID'])->name('generateCaseID');
        Route::get('/ticket_number', [CrudController::class, 'ticket_number'])->name('ticket_number');

        //for case docket color types
        Route::get('/docket-blu', [HomeController::class, 'docketblu'])->name('docketblu');
        Route::get('/docket-red', [HomeController::class, 'docketred'])->name('docketred');
        Route::get('/docket-yel', [HomeController::class, 'docketyel'])->name('docketyel');

        //click client name from full details
        Route::get('/client-cases/{client_id}', [HomeController::class, 'clientall'])->name('clientall');

        //etc

    });

    Route::middleware('auth', 'admin')->group(function () {
        Route::get('/post', [HomeController::class, 'post'])->name('post');
        Route::get('/admin/user-table', [HomeController::class, 'adminusertable'])->name('adminusertable');

        Route::get('/admin/client-table', [HomeController::class, 'adminclienttable'])->name('adminclienttable');
        //misc

        // Route::get('/admin/file-table', [HomeController::class, 'adminfiletable'])->name('adminfiletable');

        Route::get('register', [RegisteredUserController::class, 'create'])
            ->middleware(['auth', 'admin'])
            ->name('register');
        Route::post('register', [RegisteredUserController::class, 'store']);
    });

    Route::middleware('auth', 'client')->group(function () {
        Route::get('/clientboard', [HomeController::class, 'clientboard'])->name('clientobard');
        Route::get('/client/history', [HomeController::class, 'clientviewhistory'])->name('clientviewhistory');
        Route::get('/client/history/archived', [HomeController::class, 'clientarchivedhistory'])->name('clientarchivedhistory');
    });
    //google calendar api
    Route::get('/google/calendar', [GoogleCalendarController::class, 'index'])->name('google.calendar');
    Route::get('/google/login', [GoogleCalendarController::class, 'login'])->name('google.login');
    Route::get('/google/callback', [GoogleCalendarController::class, 'callback'])->name('google.callback');
    Route::get('/google/logout', [GoogleCalendarController::class, 'logout'])->name('google.logout');

    require __DIR__ . '/auth.php';
