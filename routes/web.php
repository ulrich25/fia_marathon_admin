<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ParticipantController;
use App\Models\Course;
use App\Models\Participant;
use Illuminate\Support\Facades\Route;

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

Route::get('/etatPaiement', function(){
    return view("etat_paiement");
})->name("etatPaiement");

Route::get('/selectParticipations',[AdminController::class, 'triParticipant'])->name("selectParticipation");
Route::post('/addParticipant',[ParticipantController::class, 'insertParticipant'])->name("insertParticipant");
Route::post('/deleteParticipant',[ParticipantController::class, 'deleteParticipation'])->name("deleteParticipation");
Route::get('/participant', [ParticipantController::class, 'Participant'])->name("participant");
Route::post('/participantDetail', [ParticipantController::class, 'DetailParticipant'])->name("detailParticipant");
Route::post('/participants', [ParticipantController::class,'paiementMAJ'])->name("updateRef");
Route::post('/participantUpdate', [ParticipantController::class,'updateParticipant'])->name("updateParticipant");
Route::post('/participant.connect', [ParticipantController::class,'loginParticipant'])->name("loginParticipant");
Route::get('/participant/connect', function () { return view("client.login"); });
Route::get('/participant.deconnect', [ParticipantController::class, 'logOut']);


Route::get('/', function () {
    return view('inscription', ["listeCourse"=>Course::all()]);
});

Route::get('/admin', [AdminController::class, "connect"])->name("connect");

Route::post('connect', [AdminController::class, 'Login'])->name("Login");
Route::get('/deconnect', [AdminController::class, 'logOut']);

Route::get('/dashboard', function () {
    if (session()->has("NomPrenom")) {
        # code...
        return view('admin.dashboard');
    }
    return view('login');
});

