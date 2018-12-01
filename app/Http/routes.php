<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/** @var \Illuminate\Routing\Router $router */
$router->get('/', ['middleware' => 'guest', 'as' => 'root', 'uses' => 'WelcomeController@index']);
$router->group(['prefix' => '/template', 'middleware' => 'debug'], function () use ($router) {
    $router->get('/boilerplate', 'TemplateController@boilerplate');
    $router->get('/bootstrap', 'TemplateController@bootstrap');
    $router->get('/adminlte', 'TemplateController@adminlte');
});
$router->group(['namespace' => 'Counselor', 'prefix' => '/counselor'], function () use ($router) {
    $router->group(['prefix' => '/auth'], function () use ($router) {
        $router->group(['middleware' => 'guest'], function () use ($router) {
            $router->get('/register', ['uses' => 'Auth@registerCreate', 'as' => 'counselor.auth.register.create']);
            $router->post('/register', ['middleware' => 'auth.role', 'uses' => 'Auth@registerStore', 'as' => 'counselor.auth.register.store']);
            $router->get('/login', ['uses' => 'Auth@getLogin', 'as' => 'counselor.auth.login.get']);
            $router->post('/login', ['middleware' => 'auth.role', 'uses' => 'Auth@postLogin', 'as' => 'counselor.auth.login.post']);
            $router->get('/lost', ['uses' => 'Auth@getLost', 'as' => 'counselor.auth.lost.get']);
            $router->post('/lost', ['middleware' => 'auth.role', 'uses' => 'Auth@postLost', 'as' => 'counselor.auth.lost.post']);
            $router->get('/recover', ['middleware' => ['auth.role', 'valid.auth.recovery'], 'uses' => 'Auth@getRecover', 'as' => 'counselor.auth.recover.get']);
            $router->patch('/recover', ['middleware' => ['auth.role', 'valid.auth.recovery'], 'uses' => 'Auth@patchRecover', 'as' => 'counselor.auth.recover.patch']);
        });
    });
    $router->group(['middleware' => 'authenticated.source'], function () use ($router) {
        $router->get('/auth/logout', ['uses' => 'Auth@getLogout', 'as' => 'counselor.auth.logout']);
        $router->get('/dashboard', ['uses' => 'Home@index', 'as' => 'counselor.home.dashboard']);
        $router->get('/profile', ['uses' => 'Profile@edit', 'as' => 'counselor.profile.edit']);
        $router->patch('/profile', ['uses' => 'Profile@update', 'as' => 'counselor.profile.update']);
        $router->get('/coupon/generate/{usage}', ['uses' => 'Home@couponGenerator', 'as' => 'counselor.coupon.generator'])->where('usage', 'counselor|student');
        $router->group(['prefix' => '/report', 'middleware' => 'valid.counselor.profile'], function () use ($router) {
            $router->get('', ['uses' => 'Report@index', 'as' => 'counselor.report.list']);
            $router->group(['prefix' => '/student', 'middleware' => ['valid.student']], function () use ($router) {
                $router->patch('/{id}/activate', ['uses' => 'Report@activation', 'as' => 'counselor.student.activation'])->where('id', '^[1-9][0-9]*');
                $router->get('/{id}/detail', ['middleware' => 'valid.student.report.detail', 'uses' => 'Report@detail', 'as' => 'counselor.student.detail'])->where('id', '^[1-9][0-9]*');
                $router->get('/{id}/{answer}/publish', ['middleware' => 'valid.student.report.publish', 'uses' => 'Report@publish', 'as' => 'counselor.student.publish'])->where(['id' => '^[1-9][0-9]*', 'answer' => '^[1-9][0-9]*']);
            });
        });
    });
});
$router->group(['namespace' => 'Student', 'prefix' => '/student'], function () use ($router) {
    $router->group(['prefix' => '/auth'], function () use ($router) {
        $router->group(['middleware' => 'guest'], function () use ($router) {
            $router->get('/register', ['uses' => 'Auth@registerCreate', 'as' => 'student.auth.register.create']);
            $router->post('/register', ['middleware' => 'auth.role', 'uses' => 'Auth@registerStore', 'as' => 'student.auth.register.store']);
            $router->get('/login', ['uses' => 'Auth@getLogin', 'as' => 'student.auth.login.get']);
            $router->post('/login', ['middleware' => 'auth.role', 'uses' => 'Auth@postLogin', 'as' => 'student.auth.login.post']);
            $router->get('/lost', ['uses' => 'Auth@getLost', 'as' => 'student.auth.lost.get']);
            $router->post('/lost', ['middleware' => 'auth.role', 'uses' => 'Auth@postLost', 'as' => 'student.auth.lost.post']);
            $router->get('/recover', ['middleware' => ['auth.role', 'valid.auth.recovery'], 'uses' => 'Auth@getRecover', 'as' => 'student.auth.recover.get']);
            $router->patch('/recover', ['middleware' => ['auth.role', 'valid.auth.recovery'], 'uses' => 'Auth@patchRecover', 'as' => 'student.auth.recover.patch']);
        });
    });
    $router->group(['middleware' => 'authenticated.source'], function () use ($router) {
        $router->get('/auth/logout', ['uses' => 'Auth@getLogout', 'as' => 'student.auth.logout']);
        $router->get('/dashboard', ['uses' => 'Course@index', 'as' => 'student.course.index']);
        $router->get('/profile', ['uses' => 'Profile@edit', 'as' => 'student.profile.edit']);
        $router->patch('/profile', ['uses' => 'Profile@update', 'as' => 'student.profile.update']);
        $router->group(['middleware' => 'valid.student.profile'], function () use ($router) {
            $router->get('/course/create', ['middleware' => 'course.open.unavailable', 'uses' => 'Course@create', 'as' => 'student.course.create']);
            $router->get('/course/start/{question}', ['middleware' => ['course.open.available', 'valid.question'], 'uses' => 'Course@startEdit', 'as' => 'student.course.start.edit'])->where('question', '^[1-9][0-9]*');
            $router->patch('/course/start/{question}', ['middleware' => ['course.open.available', 'valid.question', 'valid.answer'], 'uses' => 'Course@startUpdate', 'as' => 'student.course.start.update'])->where('question', '^[1-9][0-9]*');
            $router->post('/course/submit', ['middleware' => ['course.open.available', 'course.open.finished'], 'uses' => 'Course@submit', 'as' => 'student.course.finish']);
            $router->get('/course/result', ['middleware' => 'valid.self.report.detail', 'uses' => 'Course@result', 'as' => 'student.course.result']);
            $router->get('/course/{answer}/detail', ['middleware' => 'valid.self.report.publish', 'uses' => 'Course@detail', 'as' => 'student.course.detail'])->where('answer', '^[1-9][0-9]*');
        });
    });
});
