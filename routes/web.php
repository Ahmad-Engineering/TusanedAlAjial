<?php

use App\Http\Controllers\AdminChangePasswordController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminSocialController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\ApplyIdeaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CPanelController;
use App\Http\Controllers\DeleteAccountController;
use App\Http\Controllers\FollowerAndFollowingController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\PersoneController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TusanedController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('tusaned.index');
// });

Route::get('/', function () {
    return view('tusaned.index');
})->name('home');

Route::prefix('tusaned')->group(function () {
    // Route::get('/', [TusanedController::class, 'showHome'])->name('home');
    Route::get('about', [TusanedController::class, 'showAbout'])->name('about');
    Route::get('idea-bank', [TusanedController::class, 'showIdeaBank'])->name('idea.bank');
    Route::get('actions', [TusanedController::class, 'showActions'])->name('actions');
    Route::get('events', [TusanedController::class, 'showEvents'])->name('events');
    Route::get('contact-us', [TusanedController::class, 'showContactUs'])->name('contact.us');
    Route::get('event-infos', [TusanedController::class, 'showEventsInfo'])->name('events.info');

    // ABOUT US THREE BRANCHES
    Route::get('about-us-one', [TusanedController::class, 'showAboutBrachOne'])->name('about.branch.one');
    Route::get('about-us-two', [TusanedController::class, 'showAboutBrachTwo'])->name('about.branch.two');
    Route::get('about-us-three', [TusanedController::class, 'showAboutBrachThree'])->name('about.branch.three');

    // SHOW SUBMIT IDEA
    Route::get('submit-idea-one', [TusanedController::class, 'showSubmitIdeaOne'])->name('submit.idea.one');
    Route::get('submit-idea-two', [TusanedController::class, 'showSubmitIdeaTwo'])->name('submit.idea.two');
    Route::get('submit-idea-three', [TusanedController::class, 'showSubmitIdeaThree'])->name('submit.idea.three');
    Route::get('submit-idea-four', [TusanedController::class, 'showSubmitIdeaFour'])->name('submit.idea.four');
    Route::get('submit-idea-five', [TusanedController::class, 'showSubmitIdeaFive'])->name('submit.idea.five');

    // SUBMIT IDEA
    Route::post('personal-info', [ApplyIdeaController::class, 'personalInfo']);
    Route::post('delegations-names', [ApplyIdeaController::class, 'delegatesNames']);
    Route::post('idea-desc', [ApplyIdeaController::class, 'ideaDesc']);
    Route::post('idea-outputs', [ApplyIdeaController::class, 'outputs']);
    Route::post('idea-budget', [ApplyIdeaController::class, 'budget']);

    // CONTACT US POST ACTION
    Route::resource('contact-us-sending', ContactController::class);
});

Route::prefix('tusaned-cpanel')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});

Route::prefix('tusaned-cpanel')->middleware('auth:admin')->group(function () {
    Route::get('', [CPanelController::class, 'showDashbord'])->name('admin.dashbord');
    Route::resource('admin', AdminController::class);

    // THIS IS THE ANAYSIS ROUTE
    Route::get('analysis', [AnalysisController::class, 'showAnalysis'])->name('analysis');

    // CHAGNE ADMIN PASSWORD
    Route::get('change-password/{id}/admin', [AdminChangePasswordController::class, 'showChangePassword'])->name('admin.change.password');
    Route::put('change-password/{id}/admin', [AdminChangePasswordController::class, 'changePassword']);

    Route::resource('persones', PersoneController::class);
    Route::resource('idea', IdeaController::class);

    // ROUTE TO BLOCK PERSONE
    Route::put('block-persone/{id}/persone', [PersoneController::class, 'blockPersone'])->name('block-persone');
    Route::put('unblock-persone/{id}/persone', [PersoneController::class, 'unblockPersone'])->name('unblock-persone');
    Route::get('blocked-persone', [PersoneController::class, 'blockedUser'])->name('blocked.persones');

    // DONING IDEA
    Route::put('doing-idea/{id}/idea', [IdeaController::class, 'doingIdea'])->name('doing.idea');
    Route::get('did-ideas', [IdeaController::class, 'didIdeas'])->name('did.ideas');
    Route::get('undone-idea/{id}/idea', [IdeaController::class, 'undoneIdea']);

    // ADMIN PROFILE
    Route::get('profile', [AdminProfileController::class, 'showAdminProfile'])->name('admin.profile');

    // ADMIN SOCAIL MEDIA
    Route::resource('admin-social-media', AdminSocialController::class);

    // AUTHIRIZED DELETE ACCOUNT
    Route::post('delete-my-auth-account/{id}/admin', [DeleteAccountController::class, 'deleteAdminAccount']);

    Route::resource('post', PostController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('follow', FollowerController::class);
    Route::post('update-category/{id}', [CategoryController::class, 'update']);

    // GET ROUTE FOR COMMUNITY
    Route::get('post-community', [CommunityController::class, 'showCommunity'])->name('post.community');

    // PROFILE POSTS
    Route::get('my-profile-posts/{id}/admin-profile', [CommunityController::class, 'showMyProfilePosts'])->name('my.profile.posts');

    // ROUTES TO SHOW FOLLOWER AND FOLLOWING
    Route::get('follower/{id}/admin-follower', [FollowerAndFollowingController::class, 'showFollower'])->name('show.follower');
    Route::get('following/{id}/admin-following', [FollowerAndFollowingController::class, 'showFollowing'])->name('show.following');

    // ADMIN LOGOUT
    Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');
});
