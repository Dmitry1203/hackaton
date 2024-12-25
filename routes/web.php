<?php
use Illuminate\Support\Facades\Route;

// Организатор
use App\Http\Controllers\Organizer\OrganizerController;

// Персональный раздел
use App\Http\Controllers\Personal\PersonalController;
use App\Http\Controllers\Personal\TaskController;
use App\Http\Controllers\Personal\TeamController;
use App\Http\Controllers\Personal\NotificationController;
use App\Http\Controllers\Personal\SolutionController;

// Сайт
use App\Http\Controllers\Site\MainController;
use App\Http\Controllers\Site\UserController;
use App\Http\Controllers\Api\TeamApiController;

// Сервисы
use App\Http\Controllers\Services\DashaController; // email

// use App\Http\Controllers\DownloadFileController; // download
// экспорт в xls
// use App\Http\Controllers\ExportController;

// Сайт
//Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/', [UserController::class, 'login'])->name('login');
//Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'register'])->name('register');

Route::get('/password', [UserController::class, 'password'])->name('password');
Route::get('/error', function () { return view('site.error'); });

// авторизация
Route::post('/login', [UserController::class, 'auth'])->name('user.auth');
Route::post('/register', [UserController::class, 'store'])->name('user.store');
Route::get('/success', [UserController::class, 'success'])->name('success');

// восстановить пароль
Route::post('/password/store', [UserController::class, 'passwordStore'])
    ->name('password.store');
Route::get('/password/recovery/{token}', [UserController::class, 'passwordUpdate'])
    ->name('password.update');

// создать пароли
Route::get('/passwords/create', [PersonalController::class, 'profilePasswordsCreate'])
        ->name('personal.profile.passwords.create');

// тест DashaController
Route::get('/test/dashamail', [DashaController::class, 'createMailList'])
        ->name('test.dashamail');

// Organizer раздел
Route::group(['prefix' => 'organizer', 'namespace' => 'Organizer'], function () {

    Route::get('/', [OrganizerController::class, 'index'])
        ->middleware('organizer')
        ->name('organizer.index');

    Route::get('/users', [OrganizerController::class, 'usersList'])
        ->middleware('organizer')
        ->name('organizer.users');

    Route::get('/users2', [OrganizerController::class, 'usersList2'])
        ->middleware('organizer')
        ->name('organizer.users2');

    Route::get('/event/create', [OrganizerController::class, 'eventCreate'])
        ->middleware('organizer')
        ->name('organizer.event.create');

    Route::post('/event/store', [OrganizerController::class, 'eventStore'])
        ->middleware('organizer')
        ->name('organizer.event.store');

    Route::get('/event/{id}/edit', [OrganizerController::class, 'eventEdit'])
        ->where(['id' => '[0-9]+'])
        ->middleware('organizer')
        ->name('organizer.event.edit');

    Route::post('/event/{id}/update', [OrganizerController::class, 'eventUpdate'])
        ->where(['id' => '[0-9]+'])
        ->middleware('organizer')
        ->name('organizer.event.update');

    Route::get('/event/{id}/logos/edit', [OrganizerController::class, 'eventLogosEdit'])
        ->where(['id' => '[0-9]+'])
        ->middleware('organizer')
        ->name('organizer.event.logos.edit');

    Route::post('/event/{id}/logos/update', [OrganizerController::class, 'eventLogosUpdate'])
        ->where(['id' => '[0-9]+'])
        ->middleware('organizer')
        ->name('organizer.event.logos.update');

    Route::get('/event/{id}/stages/edit', [OrganizerController::class, 'eventStagesEdit'])
        ->where(['id' => '[0-9]+'])
        ->middleware('organizer')
        ->name('organizer.event.stages.edit');

    Route::post('/event/{id}/stages/update', [OrganizerController::class, 'eventStagesUpdate'])
        ->where(['id' => '[0-9]+'])
        ->middleware('organizer')
        ->name('organizer.event.stages.update');

    Route::get('/event/{id}/tasks/edit', [OrganizerController::class, 'eventTasksEdit'])
        ->where(['id' => '[0-9]+'])
        ->middleware('organizer')
        ->name('organizer.event.tasks.edit');

    Route::post('/event/{id}/tasks/update', [OrganizerController::class, 'eventTasksUpdate'])
        ->where(['id' => '[0-9]+'])
        ->middleware('organizer')
        ->name('organizer.event.tasks.update');

    Route::get('/event/{id}/criteria/edit', [OrganizerController::class, 'eventCriteriaEdit'])
        ->where(['id' => '[0-9]+'])
        ->middleware('organizer')
        ->name('organizer.event.criteria.edit');

    Route::post('/event/{id}/criteria/update', [OrganizerController::class, 'eventCriteriaUpdate'])
        ->where(['id' => '[0-9]+'])
        ->middleware('organizer')
        ->name('organizer.event.criteria.update');

    Route::get('/notifications', [OrganizerController::class, 'notifications'])
        ->middleware('organizer')
        ->name('organizer.notifications');

    Route::get('/notification/create', [OrganizerController::class, 'notificationCreate'])
        ->middleware('organizer')
        ->name('organizer.notifications.create');

    Route::post('/notification/store', [OrganizerController::class, 'notificationStore'])
        ->middleware('organizer')
        ->name('organizer.notifications.store');

    Route::get('/close', [OrganizerController::class, 'close'])
        ->middleware('organizer')
        ->name('organizer.close');

});

// Personal раздел
Route::group(['prefix' => 'personal', 'namespace' => 'Personal'], function () {

    Route::get('/', [PersonalController::class, 'index'])
        ->middleware('admin')
        ->name('personal.index');

    Route::get('/profile', [PersonalController::class, 'profile'])
        ->middleware('admin')
        ->name('personal.profile');

    Route::get('/profile/edit', [PersonalController::class, 'profileEdit'])
        ->middleware('admin')
        ->name('personal.profile.edit');

    Route::post('/profile/update', [PersonalController::class, 'profileUpdate'])
        ->middleware('admin')
        ->name('personal.profile.update');

    Route::post('/profile/avatar', [PersonalController::class, 'profileAvatar'])
        ->middleware('admin')
        ->name('personal.profile.avatar');

    Route::post('/profile/password/change', [PersonalController::class, 'profilePasswordChange'])
        ->middleware('admin')
        ->name('personal.profile.password.change');

	// команды
    Route::get('/teams', [TeamController::class, 'teams'])
        ->middleware('admin')
        ->name('personal.teams');

	// команды для vue
    Route::get('/team/search', [TeamController::class, 'teamsVue'])
        ->middleware('admin')
        ->name('personal.teams.search');

	// команда создать
    Route::get('/team/create', [TeamController::class, 'teamCreate'])
        ->middleware('admin')
        ->name('personal.team.create');

	// команда сохранить
    Route::post('/team/store', [TeamController::class, 'teamStore'])
        ->middleware('admin')
        ->name('personal.team.store');

 	// команда профиль
     Route::get('/team/profile/{id?}', [TeamController::class, 'teamProfile'])
         ->where(['id' => '[0-9]+'])
         ->middleware('admin')
         ->name('personal.team.profile');

 	// команда редактировать
     Route::get('/team/edit', [TeamController::class, 'teamEdit'])
         ->middleware('admin')
         ->name('personal.team.edit');

	// команда обновить
    Route::post('/team/update', [TeamController::class, 'teamUpdate'])
        ->middleware('admin')
        ->name('personal.team.update');

	// команда покинуть
    Route::post('/team/leave', [TeamController::class, 'teamLeave'])
        ->middleware('admin')
        ->name('personal.team.leave');

    // отправить приглашение
    Route::post('/team/invitation/create', [TeamController::class, 'teamInvitationCreate'])
        ->middleware('admin')
        ->name('personal.team.invitation.create');

    // заявка на участие в команде
    Route::post('/team/application/create', [TeamController::class, 'teamApplicationCreate'])
        ->middleware('admin')
        ->name('personal.team.application.create');

    // принять заявку на участие в команде
    Route::post('/team/application/accept', [TeamController::class, 'teamApplicationAccept'])
        ->middleware('admin')
        ->name('personal.team.application.accept');

    // отклонить заявку на участие в команде
    Route::post('/team/application/decline', [TeamController::class, 'teamApplicationDecline'])
        ->middleware('admin')
        ->name('personal.team.application.decline');

    // принять приглашение вступить в команду
    Route::post('/team/invitation/accept', [TeamController::class, 'teamInvitationAccept'])
        ->middleware('admin')
        ->name('personal.team.invitation.accept');

    // отклонить приглашение вступить в команде
    Route::post('/team/invitation/decline', [TeamController::class, 'teamInvitationDecline'])
        ->middleware('admin')
        ->name('personal.team.invitation.decline');

    //задачи
    Route::get('/tasks', [TaskController::class, 'tasks'])
        ->middleware('admin')
        ->name('personal.tasks');

	//задачи для vue
    Route::get('/task/search', [TaskController::class, 'tasksVue'])
        ->middleware('admin')
        ->name('personal.tasks.search');

    //задачa
    Route::get('/task/{id}', [TaskController::class, 'task'])
    	->where(['id' => '[0-9]+'])
        ->middleware('admin')
        ->name('personal.task');

    //выбрать задачу
    Route::post('/task/binding', [TaskController::class, 'taskBinding'])
		->middleware('admin')
		->name('personal.task.binding');

    //уведомления
    Route::get('/notifications', [NotificationController::class, 'notifications'])
        ->middleware('admin')
        ->name('personal.notifications');

    // для тестирование создание уведомлений
    Route::post('/notification/store', [NotificationController::class, 'notificationStore'])
		->middleware('admin')
		->name('personal.notification.store');

    //timeline
    Route::get('/timeline', [PersonalController::class, 'timeline'])
        ->middleware('admin')
        ->name('personal.timeline');

    //Интенсив
    Route::get('/intensive', [PersonalController::class, 'intensive'])
        ->middleware('admin')
        ->name('personal.intensive');

    //Видео
    Route::get('/video/{videoId}', [PersonalController::class, 'video'])
        ->middleware('admin')
        ->where(['videoId' => '[0-9]+'])
        ->name('personal.video');

    //Решения
    Route::get('/solutions', [SolutionController::class, 'solutions'])
        ->middleware('admin')
        ->name('personal.solutions');

    //Решениe
    Route::get('/solution/{eventId}/{stageId}', [SolutionController::class, 'solution'])
        ->middleware('admin')
        ->where(['eventId' => '[0-9]+'])
        ->where(['stageId' => '[0-9]+'])
        ->name('personal.solution');

    //Решениe сохранить
    Route::post('/solution/store', [SolutionController::class, 'solutionStore'])
        ->middleware('admin')
        ->name('personal.solution.store');

	//Курсы
	Route::get('/courses', [PersonalController::class, 'courses'])
		->middleware('admin')
		->name('personal.courses');

    //Мероприятие
    Route::get('/about', [PersonalController::class, 'about'])
        ->middleware('admin')
        ->name('personal.about');

    Route::get('/rating', [PersonalController::class, 'rating'])
        ->middleware('admin')
        ->name('personal.rating');

	//выход
    Route::get('/close', [PersonalController::class, 'close'])
        ->middleware('admin')
        ->name('close');

});

// hack23-admin.a-m2.ru
// команды
Route::middleware(['cors'])->group(function () {
    Route::get('/api/teams/{token}/{role}', [TeamApiController::class, 'index']);
});

// команда
Route::middleware(['cors'])->group(function () {
    Route::get('/api/team/{token}/{id}', [TeamApiController::class, 'team']);
});

// участники
Route::middleware(['cors'])->group(function () {
    Route::get('/api/members/{token}/{id}', [TeamApiController::class, 'members']);
});

// решения
Route::middleware(['cors'])->group(function () {
    Route::get('/api/solutions/{token}/{id}', [TeamApiController::class, 'solutions']);
});

// получить рейтинг
Route::middleware(['cors'])->group(function () {
    Route::post('/api/criteria', [TeamApiController::class, 'criteria']);
});


Route::fallback(function () {
	abort (404);
});

Route::get('clear', function () {
   Log::debug('CLEARED');
   Artisan::call('cache:clear');
});

Route::get('/slink', function () {
    Artisan::call('storage:link');
});

Route::get('/artisan/mail', function () {
    Artisan::call('schedule:run');
});