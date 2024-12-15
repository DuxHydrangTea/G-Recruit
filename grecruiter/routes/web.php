<?php

use App\Http\Controllers\Admin\AuthAdminController;
use App\Http\Controllers\Admin\EsportController;
use App\Http\Controllers\Admin\EsportTeamController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\RankController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\MyTimeLinesController;
use App\Http\Controllers\User\ClientTopicController;
use App\Http\Controllers\User\InteractionController;
use App\Http\Controllers\User\MyApplyController;
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
use App\Http\Controllers\User\EsportTeamsController;
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
        Route::get('/approve-teams/deny-team/{id}', [EsportTeamController::class, 'denyTeam'])->name('esport_team.deny');

        Route::get('/approve-teams/approve-team/{id}', [EsportTeamController::class, 'approveTeam'])->name('esport_team.approve');
        Route::get('/non-approve-teams/index', [EsportTeamController::class, 'nonApproveTeams'])->name('esport_team.non_approved_teams');

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

    Route::controller(MyApplyController::class)->group(function () {
        Route::prefix('my-actions')->group(function () {
            Route::get('/my-applies', 'myApplies')->name('client.my_applies.list');
            Route::get('/my-invites', 'myInvites')->name('client.my_invites.list');
            Route::put('/my-applies/update-apply/{id}', 'handleMyUpdateApply')->name('client.my_applies.handle_update');
            Route::delete('/my-applies/remove-apply/{id}', 'removeMyUpdateApply')->name('client.my_applies.remove_apply');
            Route::get('/my-invites/accept/{id}', 'acceptInvite')->name('client.my_invites.accept');
            Route::put('/my-invites/deny/{id}', 'denyInvite')->name('client.my_invites.deny');
        });
    });
    Route::controller(ClientTopicController::class)->prefix('my-topic')->group(function () {
        Route::post('/add-topic', 'addTopic')->name('client.my_topic.add');
    });
    Route::controller(SiteController::class)->group(function () {
        Route::get('/', 'index')->name('client.index');
        Route::prefix('blog')->group(
            function () {
                Route::get('/create-blog', 'write')->name('client.write');
                Route::get('/create-blog/{esport_id}', 'writeByEsport')->name('client.write_by_esport');
                Route::post('/create-blog/{esport_id}', 'handleWriteByEsport')->name('client.handle_write_by_esport');
                Route::post('/create-blog', 'handleWrite')->name('client.handle-write');
            }
        );

    });
    Route::get('/list-posts', [ClientPostController::class, 'index'])->name('client.post.index');
    Route::get('/detail-post/{slug}', [ClientPostController::class, 'show'])->name('client.post.show');

    //

    Route::controller(InteractionController::class)->prefix('interaction')->group(function () {
        Route::post('comment/{post_id}', 'comment')->name('client.interaction.comment');
        Route::get('like/{post_id}', 'like')->name('client.interaction.like');
    });
    //profile
    Route::prefix('profile')->group(function () {
        Route::post('/my-profile/change-avatar', [ProfileController::class, 'changeAvatar'])->name('client.my_profile.change_avatar');
        Route::get('/my-profile-v2/{id}', [ProfileController::class, 'myProfileV2'])->name('client.my_profile_v2');
        Route::get('/my-profile-change', [ProfileController::class, 'myProfileChange'])->name('client.my_profile_change_ui');
        Route::post('/my-profile/change-password', [ProfileController::class, 'changePassword'])->name('client.my_profile.change_password');

        Route::get('/other-profile/{id}', [ProfileController::class, 'otherProfile'])->name('client.other_profile');
        Route::post('/change-my-profile', [ProfileController::class, 'changeProfile'])->name('client.my_profile_change');

        Route::get('/update-status/{slug}', [PostController::class, 'setPrivate'])->name('client.my_post.private');
        Route::get('/edit-post/{slug}', [ClientPostController::class, 'edit'])->name('client.my_post.edit');
        Route::post('/edit-post/{slug}', [ClientPostController::class, 'update'])->name('client.my_post.update');
        Route::get('/delete-post/{slug}', [PostController::class, 'forceDelete'])->name('client.my_post.force_delete');

        Route::controller(MyTimeLinesController::class)->prefix('my-time-lines')->group(function () {
            Route::post('/add-a-timeline', 'addATimeline')->name('client.my_timelines.add');
            Route::put('/update-a-timeline/{id}', 'updateATimeline')->name('client.my_timelines.update');
            Route::delete('/delete-a-timeline/{id}', 'deleteATimeline')->name('client.my_timelines.delete');
        });
    });

    // my team
    Route::prefix("my-team")->group(function () {
        Route::get('/show-info', [MyTeamController::class, 'showInfoMyTeam'])->name('client.my_team.show_info');
        Route::post('/update-avatar-team', [MyTeamController::class, 'handleAvatar'])->name('my_team.handle_avatar');
        Route::post("/update-epsort-for-team", [MyTeamController::class, 'updateEsportMyTeam'])->name('client.update_esport_my_team');
        Route::post('/update-name-team', [MyTeamController::class, 'updateNameTeam'])->name('client.update_name_team');
        Route::get('/kick-member/{user_id}', [MyTeamController::class, 'kickMyMember'])->name('client.kick_my_member');
        Route::post('/update-information-team', [MyTeamController::class, 'updateInformationTeam'])->name('client.update_information_team');
        Route::post('/action/accept/{applyUser}', [MyTeamController::class, 'acceptApply'])->name('client.my_team.accept');
        Route::post('/action/deny/{applyUser}', [MyTeamController::class, 'denyApply'])->name('client.my_team.deny');
        Route::get('/action/consider/{applyUser}', [MyTeamController::class, 'considerApply'])->name('client.my_team.consider');
        Route::get('/action/un-invte/{applyUser}', [MyTeamController::class, 'unInvite'])->name('client.my_team.un_invite');
        Route::post('/action/change-message-invte/{applyUser}', [MyTeamController::class, 'changeMessageInvite'])->name('client.my_team.change_message_invite');
        Route::post('/update-status-recruiting', [MyTeamController::class, 'updateStatusRecruiting'])->name('client.update_recruit_my_team');

    });

    Route::get('/users', [UsersController::class, 'index'])->name('client.users.index');
    Route::get('/users/recruit/{id}', [UsersController::class, 'recruit'])->name('client.users.recruit');
    Route::post('/users/recruit-with-message/{id}', [UsersController::class, 'recruitWithMessage'])->name('client.users.recruit_with_message');

    // esport teams
    Route::get('/esport-teams', [EsportTeamsController::class, 'index'])->name('client.esport_teams.index');
    Route::get('/esport-team/apply/{id}', [EsportTeamsController::class, 'apply'])->name('client.esport_teams.apply');
    Route::post('/esport-team/apply/{id}', [EsportTeamsController::class, 'apply'])->name('client.esport_teams.apply_with_form');
    Route::get('/esport-teams/register', [EsportTeamsController::class, 'registerEsportTeam'])->name('client.esport_team.register');
    Route::post('/esport-teams/register', [EsportTeamsController::class, 'handleRegisterEsportTeam'])->name('client.esport_team.handle_register');
    Route::get('/esport-teams/info/{id}', [EsportTeamsController::class, 'info'])->name('client.esport.info');
});


Route::get('login', [AuthClientController::class, 'login'])->name('client.login');
Route::post('login', [AuthClientController::class, 'handleLogin'])->name('client.handleLogin');
Route::get('register', [AuthClientController::class, 'register'])->name('client.register');
Route::post('register', [AuthClientController::class, 'handleRegister'])->name('client.handle_register');
Route::get('logout', [AuthClientController::class, 'logout'])->name('logout');