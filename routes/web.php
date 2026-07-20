<?php

use App\Livewire\Guru\Users;
use App\Livewire\Auth\LoginForm;
use App\Livewire\Guru\Dashboard;
use App\Livewire\Auth\RegisterForm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomePageController;
use App\Http\Controllers\LearningProgressController;


Route::controller(WelcomePageController::class)->group(function () {
    Route::get("/", "index")->name("welcome.index");
});



Route::get("/test", function () {
    return view("layouts.content-layout");
});


// Route::controller(QuizController::class)->group(function () {
//     Route::get("kuis/start/{materi}", "beforeQuiz")->name("quiz.prepare");
//     Route::get("/kuis/{materi}", "startQuiz")->name("eval.start");
//     Route::post("/evaluasi/submit", "submit")->name("eval.submit");
// });


Route::middleware(['auth'])->group(function () {
    Route::controller(MateriController::class)->group(function () {
        Route::get("/materi/{slug}", "materi")->name("materi");
    });
    Route::controller(QuizController::class)->group(function () {
        Route::get("kuis/start/{materi}", "beforeQuiz")->name("quiz.prepare");
        Route::get("/kuis/{materi}", "startQuiz")->name("eval.start");
        Route::post("/evaluasi/submit", "submit")->name("eval.submit");
    });
    Route::get("/auth/logout", [AuthController::class, "Logout"])->name("auth.logout");
    Route::put("/auth/update", [AuthController::class, "updateUser"])->name("auth.updateProfile");
    Route::get("/dashboard", [DashboardController::class,'index'])->name("dashboard");

});

Route::get("/auth/login", LoginForm::class)->name("login");
Route::get("/auth/register", RegisterForm::class)->name("auth.register");

Route::controller(LearningProgressController::class)->group(function () {
    Route::post("/learning-progress/set", "set_progress")->name("learning-progress.set");
    Route::get("/learning-progress/get/{materi}", "get_progress")->name("learning-progress.get");
    Route::get("learning-progress/count-point", "countPoint")->name("learning-progress.count-point");
});

// Route::get("/guru/dashboard",Dashboard::class)->name("guru.dashboard");

Route::middleware(['auth', 'guru'])->group(function () {
    Route::get("/guru/dashboard", Dashboard::class)->name("guru.dashboard");
    Route::get("/guru/users", Users::class)->name("guru.user");
    Route::get("/guru/users/form", \App\Livewire\Guru\Users\Form::class)->name("guru.user.form");
    Route::get("/guru/users/form/{id}", \App\Livewire\Guru\Users\Form::class)->name("guru.user.edit");
    Route::get("/guru/nilai", \App\Livewire\Guru\Users\Nilai::class)->name("guru.nilai");
    Route::get("/guru/evaluasi", \App\Livewire\Guru\Users\Evaluasi::class)->name("guru.evaluasi");
    Route::get("/guru/siswa", \App\Livewire\Guru\Siswa::class)->name("guru.siswa");
});





