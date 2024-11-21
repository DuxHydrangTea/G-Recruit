<?php

use App\Http\Controllers\Admin\AuthAdminController;
use App\Http\Controllers\Admin\EsportController;
use App\Http\Controllers\Admin\EsportTeamController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\RankController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\AuthClientController;
use App\Http\Controllers\User\ClientPostController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TopicController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TimeLineController;
use App\Http\Controllers\User\SiteController;
use \App\Http\Controllers\User\MyTeamController;
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

//

Route::prefix('admin/auth')->group(function () {
    Route::get('register', [AuthAdminController::class, 'register'])->name('admin.auth.register');
    Route::post('register', [AuthAdminController::class, 'handleRegister'])->name('admin.auth.handle-register');
    Route::get('login', [AuthAdminController::class, 'login'])->name('admin.auth.login');
    Route::post('login', [AuthAdminController::class, 'handleLogin'])->name('admin.auth.handle-login');
});


Route::prefix("admin")->middleware('admin.auth')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');
    //
    //
    Route::resource('esport', EsportController::class);
    Route::prefix('esport')->group(function () {
        Route::get('trash/index', [EsportController::class, 'trashCan'])->name('esport-trash.index');
        Route::get('trash/restore/{id}', [EsportController::class, 'restore'])->name('esport-trash.restore');
        Route::delete('trash/force-delete/{id}', [EsportController::class, 'forceDelete'])->name('esport-trash.force-delete');

    });
    //
    Route::resource('rank', RankController::class);
    Route::prefix('rank')->group(function () {
        Route::get('trash/index', [RankController::class, 'trashCan'])->name('rank-trash.index');
        Route::get('trash/restore/{id}', [RankController::class, 'restore'])->name('rank-trash.restore');
        Route::delete('trash/force-delete/{id}', [RankController::class, 'forceDelete'])->name('rank-trash.force-delete');
    });
    //
    Route::resource('position', PositionController::class)->except(['show']);
    Route::prefix('position')->group(function () {
        Route::get('trash/index', [PositionController::class, 'trashCan'])->name('position-trash.index');
        Route::get('trash/restore/{id}', [PositionController::class, 'restore'])->name('position-trash.restore');
        Route::delete('trash/force-delete/{id}', [PositionController::class, 'forceDelete'])->name('position-trash.force-delete');

    });
    //
    Route::resource('user', UserController::class);
    Route::prefix('user')->group(function () {
        Route::get('trash/index', [UserController::class, 'trashCan'])->name('user-trash.index');
        Route::get('trash/restore/{id}', [UserController::class, 'restore'])->name('user-trash.restore');
        Route::delete('trash/force-delete/{id}', [UserController::class, 'forceDelete'])->name('user-trash.force-delete');
    });
    //
    Route::resource('esport-team', EsportTeamController::class);
    Route::prefix('esport-team')->group(function () {
        Route::get('trash/index', [EsportTeamController::class, 'trashCan'])->name('esport-team-trash.index');
        Route::get('trash/restore/{id}', [EsportTeamController::class, 'restore'])->name('esport-team-trash.restore');
        Route::delete('trash/force-delete/{id}', [EsportTeamController::class, 'forceDelete'])->name('esport-team-trash.force-delete');
    });
    //
    Route::resource('menu', MenuController::class);
    //
    Route::resource('topic', TopicController::class);
    //
    Route::prefix('post')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('post.index');
        Route::get('/{slug}', [PostController::class, 'show'])->name('post.show');
        Route::get('/update-status/{slug}', [PostController::class, 'setPrivate'])->name('post.private');
        Route::delete('/{slug}', [PostController::class, 'forceDelete'])->name('post.forceDelete');
    });
});




Route::middleware('client.auth')->group(function () {
    Route::controller(SiteController::class)->group(function () {
        Route::get('', 'index')->name('client.index');
        Route::get('/create-blog', 'write')->name('client.write');
        Route::get('/create-blog/{esport_id}', 'writeByEsport')->name('client.write_by_esport');
        Route::post('/create-blog/{esport_id}', 'handleWriteByEsport')->name('client.handle_write_by_esport');
        Route::post('/create-blog', 'handleWrite')->name('client.handle-write');
    });
    Route::get('/list-posts', [ClientPostController::class, 'index'])->name('client.post.index');
    Route::get('/detail-post/{slug}', [ClientPostController::class, 'show'])->name('client.post.show');

    //

    //profile
    Route::get('/my-profile', [ProfileController::class, 'myProfile'])->name('client.my_profile');
    Route::get('/other-profile/{id}', [ProfileController::class, 'otherProfile'])->name('client.other_profile');
    Route::post('/change-my-profile', [ProfileController::class, 'changeProfile'])->name('client.my_profile_change');
    // team
    Route::post('/update-avatar-team', [MyTeamController::class, 'handleAvatar'])->name('my_team.handle_avatar');
    Route::post("/update-epsort-for-team", [MyTeamController::class, 'updateEsportMyTeam'])->name('client.update_esport_my_team');
    Route::post('/update-name-team', [MyTeamController::class, 'updateNameTeam'])->name('client.update_name_team');
    Route::get('/kick-member/{user_id}', [MyTeamController::class, 'kickMyMember'])->name('client.kick_my_member');
    Route::post('/update-information-team', [MyTeamController::class, 'updateInformationTeam'])->name('client.update_information_team');

    //users
    Route::get('/users', [UsersController::class, 'index'])->name('client.users.index');
    Route::get('/users/recruit/{id}', [UsersController::class, 'recruit'])->name('client.users.recruit');
    Route::post('/users/recruit-with-message/{id}', [UsersController::class, 'recruitWithMessage'])->name('client.users.recruit_with_message');
});


Route::get('login', [AuthClientController::class, 'login'])->name('client.login');
Route::post('login', [AuthClientController::class, 'handleLogin'])->name('client.handleLogin');
Route::get('register', [AuthClientController::class, 'register'])->name('client.register');