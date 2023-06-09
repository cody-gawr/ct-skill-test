<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\TaskDetail;
use App\Http\Livewire\Projects;

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

Route::get('/', Projects::class);
Route::get('/project/{project}/task/{task}', TaskDetail::class)->name('task.detail');
