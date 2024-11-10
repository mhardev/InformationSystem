<?php

use App\Http\Controllers\CHECKS_Controller;
use App\Http\Controllers\CHECKS_BC_Controller;
use App\Http\Controllers\CHECKS_E5Controller;
use App\Http\Controllers\CHECKS_PRC_Controller;
use App\Http\Controllers\CHECKS_Subjects_Controller;
use App\Http\Controllers\NavController;
use App\Http\Controllers\OSDS_schol_programController;
use App\Http\Controllers\OSDS_ScholarshipPolicyController;
use App\Http\Controllers\OSDS_ScholarshipProgramController;
use App\Http\Controllers\OSDS_SlotsDistributionController;
use App\Http\Controllers\Schol_ScholarsMasterlistController;
use App\Http\Controllers\Schol_ScholarsProfileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('osds-dashboard');
});

Route::get('/schol-dashboard', [NavController::class, 'schol_dashboard'])->name('schol-dashboard');
Route::get('/schol-scholars-masterlist', [Schol_ScholarsMasterlistController::class, 'index'])->name('schol-scholars-masterlist');
Route::get('/schol-scholars-profile', [Schol_ScholarsProfileController::class, 'fetch_scholars_data_allowance'])->name('schol-scholars-profile');

Route::get('/dashboard', [NavController::class, 'dashboard'])->name('dashboard');
Route::get('menu', [ClientController::class, 'subject']);
Route::get('/osds-dashboard', [NavController::class, 'osds_dashboard'])->name('osds-dashboard');
Route::get('/application', [NavController::class, 'application'])->name('application');
Route::get('/osds-schol-program', [NavController::class, 'osds_schol_program'])->name('osds-schol-program');
Route::get('/osds-schol-attachments', [NavController::class, 'osds_schol_attachments'])->name('osds-schol-attachments');
Route::get('/osds-priority-course', [NavController::class, 'osds_priority_course'])->name('osds-priority-course');

//CHECKS route

Route::get('/checks', [NavController::class, 'checks'])->name('checks');
Route::get('/checks-bc', [NavController::class, 'checks_bc'])->name('checks-bc');
Route::get('/checks-e5', [NavController::class, 'checks_e5'])->name('checks-e5');
Route::get('/checks-prc', [NavController::class, 'checks_prc'])->name('checks-prc');

Route::post('/scholarship', [OSDS_schol_programController::class, 'store'])->name('scholarship.create');
Route::post('/save-scholarship', [OSDS_schol_programController::class, 'save_scholarship'])->name('save-scholarship');
Route::post('/scholarship-details', [OSDS_schol_programController::class, 'scholarship_details'])->name('scholarship-details');
Route::post('/edit-scholarship', [OSDS_schol_programController::class, 'edit_scholarship'])->name('edit-scholarship');
Route::post('/delete-scholarship', [OSDS_schol_programController::class, 'delete_scholarship'])->name('delete-scholarship');

Route::post('/fetch-scholarship-program', [OSDS_ScholarshipPolicyController::class, 'fetch_scholarship_program'])->name('fetch-scholarship-program');
Route::get('/osds-schol-policy', [OSDS_ScholarshipPolicyController::class, 'scholarship_policy'])->name('osds-schol-policy');
Route::post('/save-schol-policy', [OSDS_ScholarshipPolicyController::class, 'save_scholarship_policy'])->name('save-schol-policy');
Route::post('/scholarship-policy-details', [OSDS_ScholarshipPolicyController::class, 'scholarship_policy_details'])->name('scholarship-policy-details');
Route::post('/update-schol-policy', [OSDS_ScholarshipPolicyController::class, 'update_scholarship_policy'])->name('update-schol-policy');
Route::post('/delete-schol-policy', [OSDS_ScholarshipPolicyController::class, 'delete_scholarship_policy'])->name('delete-schol-policy');

Route::get('/osds-schol-scholprogram', [OSDS_ScholarshipProgramController::class, 'scholarship_program'])->name('osds-schol-scholprogram');
Route::post('/save-schol-program', [OSDS_ScholarshipProgramController::class, 'save_scholarship_program'])->name('save-schol-program');
Route::post('/delete-schol-program', [OSDS_ScholarshipProgramController::class, 'delete_scholarship_program'])->name('delete-schol-program');
Route::post('/update-schol-program', [OSDS_ScholarshipProgramController::class, 'update_scholarship_program'])->name('update-schol-program');

Route::get('/osds-slots-distribution', [OSDS_SlotsDistributionController::class, 'scholarship_distribution'])->name('osds-slots-distribution');
//Route::post('/save-schol-distribution', [OSDS_ScholarshipDistributionController::class, 'save_scholarship_distribution'])->name('save-schol-distribution');
//Route::post('/delete-schol-distribution', [OSDS_ScholarshipDistributionController::class, 'delete_scholarship_distribution'])->name('delete-schol-distribution');
//Route::post('/update-schol-distribution', [OSDS_ScholarshipDistributionController::class, 'update_scholarship_distribution'])->name('update-schol-distribution');

// Route::get('/', [UserController::class, 'index'])->name('index');

// Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/checks', [CHECKS_Controller::class, 'checks'])->name('checks');
// Route for CHECKS-BC
Route::get('/form-bc', [CHECKS_BC_Controller::class, 'checks_bc'])->name('checks-bc');
Route::get('/checks-bc-details', [CHECKS_BC_Controller::class, 'checks_bc_details'])->name('checks-bc-details');
Route::get('/update-checks-bc', [CHECKS_BC_Controller::class, 'update_checks_bc'])->name('update-checks-bc');

// Route for CHECKS-E5
Route::get('/form-e5', [CHECKS_E5Controller::class, 'checks_e5'])->name('checks-e5');
Route::post('/save-checks-e5', [CHECKS_E5Controller::class, 'save_checks_e5'])->name('save-checks-e5');
Route::post('/delete-checks-e5', [CHECKS_E5Controller::class, 'delete_checks_e5'])->name('delete-checks-e5');
Route::get('/checks-e5-details', [CHECKS_E5Controller::class, 'checks_e5_details'])->name('checks-e5-details');
Route::post('/update-checks-e5', [CHECKS_E5Controller::class, 'update_checks_e5'])->name('update-checks-e5');

// Route for CHECKS-List of Graduates
Route::get('/form-prc',[CHECKS_PRC_Controller::class, 'checks_prc'])->name('checks-prc');
Route::post('/save-checks-prc', [CHECKS_PRC_Controller::class, 'save_checks_prc'])->name('save-checks-prc');
Route::post('/update-checks-prc', [CHECKS_PRC_Controller::class, 'update_checks_prc'])->name('update-checks-prc');
Route::post('/delete-checks-prc', [CHECKS_PRC_Controller::class, 'delete_checks_prc'])->name('delete-checks-prc');
Route::get('/checks-prc-details', [CHECKS_PRC_Controller::class, 'checks_prc_details'])->name('checks-prc-details');
Route::get('/authority-number', [CHECKS_PRC_Controller::class, 'authority_number'])->name('authority-number');
Route::post('/import-checks-prc', [CHECKS_PRC_Controller::class, 'import_checks_prc'])->name('import-checks-prc');

//Route for CHECKS-Subject taught
Route::get('/form-subjects', [CHECKS_Subjects_Controller::class, 'checks_subjects'])->name('checks-subjects');
Route::post('/save-checks-subjects', [CHECKS_Subjects_Controller::class, 'save_checks_subjects'])->name('save-checks-subjects');
Route::post('/delete-checks-subjects', [CHECKS_Subjects_Controller::class, 'delete_checks_subjects'])->name('delete-checks-subjects');
// Route::get('/logout', function(){
//     Session::flush();
//     return view('login');
// })->name('logout');

// Route::get('/masterlist', [MasterlistController::class, 'masterlist'])->name('masterlist');

// Route::get('/my_profile', [MyprofileController::class, 'my_profile'])->name('my_profile');

// Route::get('/users', [UsersController::class, 'users'])->name('users');

// Route::post('/update_profile', [MyprofileController::class, 'update_profile'])->name('update_profile');

// Route::post('/update_pw', [MyprofileController::class, 'update_pw'])->name('update_pw');

// Route::post('/full', [MasterlistController::class, 'full_scan'])->name('full');

// Route::post('/selective', [MasterlistController::class, 'selective_scan'])->name('selective');

// Route::post('/export', [MasterlistController::class, 'export_excel'])->name('export');

// Route::post('/edit_user', [UsersController::class, 'edit_user'])->name('edit_user');

// Route::post('/add_user', [UsersController::class, 'add_user'])->name('add_user');

// Route::post('/reset_pw', [UsersController::class, 'reset_pw'])->name('reset_pw');


