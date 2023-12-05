<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PemasukkanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\JenisBankController;
use App\Http\Controllers\RekeningBankController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\JenisJabatanController;
use App\Http\Controllers\PenawaranController;
use App\Http\Controllers\StatusPenawaranController;
use App\Http\Controllers\JenisPrioritasController;
use App\Http\Controllers\JenisProdukController;
use App\Http\Controllers\KontrakController;
use App\Http\Controllers\UserSet;
use App\Models\User;
use GuzzleHttp\Middleware;  
use Illuminate\Support\Facades\DB;
use Laravel\Jetstream\Rules\Role;

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
    return view('index');
})->middleware(['auth']);
Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth']);


//Route Project
Route::post('/project/add', [ProjectController::class, 'AddProject'])->name('store.project');
Route::get('/project', [ProjectController::class, 'AllProject'])->name('all.project');
Route::get('/softdelete/project/{id}', [ProjectController::class, 'SoftDelete']);
Route::get('/user/logout', [ProjectController::class, 'Logout'])->name('user.logout');
Route::get('/trachproject', [ProjectController::class, 'TrachProject'])->name('all.trash');
Route::get('/project/restore/{id}', [ProjectController::class, 'Restore']);
Route::get('deletepermanent/project/{id}', [ProjectController::class, 'DeleteP']);

//Route Modul
Route::get('/project/modul/{id}', [ModulController::class, 'AllModul'])->name('all.modul');
Route::post('/project/addmodul', [ModulController::class, 'AddModul'])->name('store.modul');
Route::get('delete/modul/{id}', [ModulController::class, 'DeleteM']);

//Route Task 

Route::get('/project/modul/task/{id}', [TaskController::class, 'AllTask'])->name('view.task');
Route::post('/project/modul/task/addtask', [TaskController::class, 'AddTask'])->name('store.task');
Route::get('/detail/task/middle/{id}', [TaskController::class, 'DetailM'])->name('detailM.task');
Route::get('/detail/task/VeryHigh/{id}', [TaskController::class, 'DetailVh'])->name('detailVh.task');
Route::get('/detail/task/High/{id}', [TaskController::class, 'DetailH'])->name('detailH.task');
Route::get('/detail/task/Low/{id}', [TaskController::class, 'DetailL'])->name('detailL.task');
Route::get('/delete/task/{id}', [TaskController::class, 'DeleteTask']);
Route::get('/modul/{idModul}/edit/task/{id}', [TaskController::class, 'EditTask'])->name('Edit.task');
Route::post('status/update/{id}', [TaskController::class, 'UpdateStatus']);

//Route Schedule
Route::get('/schedule', [TaskController::class, 'Schedule'])->middleware(['auth'])->name('calendar.project');

//Route User
Route::get('/profile/user', [UserSet::class, 'PUpdate'])->name('profile.update');
Route::post('/user/profile/update', [UserSet::class, 'UpdateProfile'])->name('update.user.profile');

Route::get('/user/setting', [UserSet::class, 'SPassword'])->name('setting.password');
Route::post('/password/update', [UserSet::class, 'UpdatePassword'])->name('password.update');


// Route List Finance

Route::resource('pemasukan', PemasukkanController::class);
Route::resource('pengeluaran', PengeluaranController::class);
Route::resource('jenisbank', JenisBankController::class);
Route::resource('rekeningbank', RekeningBankController::class);
Route::resource('invoice', InvoiceController::class);
Route::resource('laporan', LaporanController::class);
Route::resource('transaksi', TransaksiController::class);

//Route List Customer

Route::resource('customer', CustomerController::class);
Route::resource('karyawan', KaryawanController::class);
Route::resource('jenisjabatan', JenisJabatanController::class);
Route::resource('penawaran', PenawaranController::class);
Route::resource('statuspenawaran', StatusPenawaranController::class);
Route::resource('jenisprioritas', JenisPrioritasController::class);
Route::resource('statuspenawaran', StatusPenawaranController::class);
Route::resource('jenisproduk', JenisProdukController::class);
Route::resource('kontrak', KontrakController::class);