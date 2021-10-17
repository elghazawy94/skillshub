<?php

use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\ExamController;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\LangController;
use App\Http\Controllers\web\SkillController;
use App\Http\Controllers\web\ContactController;
use App\Http\Controllers\web\ProfileController;
use App\Http\Controllers\web\CategoryController;
use App\Http\Controllers\admin\MessageController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\ExamController as AdminExamController;
use App\Http\Controllers\admin\HomeController as AdminHomeController;
use App\Http\Controllers\admin\SkillController as AdminSkillController;
use App\Http\Controllers\admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\admin\GroupController;

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

Route::middleware('Lang')->group(function () {
    Route::get('/' , [HomeController::class , 'index']);
    Route::get('/categories/{id}' , [CategoryController::class , 'index']);
    Route::get('/skills/{id}' , [SkillController::class , 'show']);
    Route::get('/exams/{id}' , [ExamController::class , 'show']);
    Route::get('/exams/questions/{id}' , [ExamController::class , 'Questions'])->middleware(['auth' , 'verified']);
    Route::post('/exams/start/{id}' , [ExamController::class , 'start'])->middleware(['auth' , 'verified' , 'Can-Enter-Exam']);
    Route::post('/exams/finished/{id}' , [ExamController::class , 'finished'])->middleware(['auth' , 'verified']);
    Route::get('/contact' , [ContactController::class , 'index'])->middleware(['auth' , 'verified']);
    Route::post('/contact/send',  [ContactController::class , 'send']);
    Route::get('/profile',  [ProfileController::class , 'index'])->middleware(['auth' , 'verified']);
});

Route::get('/lang/set/{lang}' , [LangController::class , 'set']);

Route::prefix('dashboard')->middleware(['auth' , 'verified' ,'Can-Enter-Dashbord'])->group(function () {
    Route::get('/', [AdminHomeController::class , 'index']);

    Route::get('/setting', [SettingController::class , 'index']);
    Route::post('/setting/update/{id}', [SettingController::class , 'update']);

    Route::get('/messages', [MessageController::class , 'index']);
    Route::get('/messages/show/{id}', [MessageController::class , 'show']);
    Route::post('/messages/response/{id}', [MessageController::class , 'response']);
    Route::get('/messages/delete/{id}', [MessageController::class , 'delete']);


    Route::get('/categories', [AdminCategoryController::class , 'index']);
    Route::post('/categories/store', [AdminCategoryController::class , 'store']);
    Route::post('/categories/update', [AdminCategoryController::class , 'update']);
    Route::get('/categories/delete/{id}', [AdminCategoryController::class , 'delete']);

    Route::get('/skills', [AdminSkillController::class , 'index']);
    Route::post('/skills/store', [AdminSkillController::class , 'store']);
    Route::post('/skills/update', [AdminSkillController::class , 'update']);
    Route::get('/skills/delete/{id}', [AdminSkillController::class , 'delete']);

    Route::get('/exams', [AdminExamController::class , 'index']);
    Route::get('/exams/show/{id}', [AdminExamController::class , 'show']);
    Route::get('/exams/show/{id}/questions', [AdminExamController::class , 'showQuestions']);
    Route::get('/exams/create', [AdminExamController::class , 'create']);
    Route::post('/exams/store', [AdminExamController::class , 'store']);

    Route::get('/exams/{id}/questions/create', [AdminExamController::class , 'createQuestions']);
    Route::post('/exams/{id}/questions/store', [AdminExamController::class , 'storeQuestions']);
    Route::post('/exams/questions/update', [AdminExamController::class , 'updateQuestion']);

    Route::get('/exams/edit/{id}', [AdminExamController::class , 'edit']);
    Route::post('/exams/update/{id}', [AdminExamController::class , 'update']);
    Route::get('/exams/delete/{id}', [AdminExamController::class , 'delete']);

    Route::get('/students', [StudentController::class , 'index']);
    Route::get('/students/show/{id}', [StudentController::class , 'show']);
    Route::get('/students/open/{studentId}/{examId}', [StudentController::class , 'openExam']);
    Route::get('/students/close/{studentId}/{examId}', [StudentController::class , 'closeExam']);



    Route::middleware('superamin')->group(function () {
        Route::get('/admins', [AdminController::class , 'index']);
        Route::get('/admins/create', [AdminController::class , 'create']);
        Route::post('/admins/create', [AdminController::class , 'store']);

        Route::get('/groups', [GroupController::class , 'index']);
        Route::get('/groups/create', [GroupController::class , 'create']);
        Route::post('/groups/create', [GroupController::class , 'store']);
    });

});
