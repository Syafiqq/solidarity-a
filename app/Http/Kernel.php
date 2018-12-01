<?php namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{

    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
        'Illuminate\Cookie\Middleware\EncryptCookies',
        'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
        'Illuminate\Session\Middleware\StartSession',
        'Illuminate\View\Middleware\ShareErrorsFromSession',
        'App\Http\Middleware\VerifyCsrfToken',
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => 'App\Http\Middleware\Authenticate',
        'auth.basic' => 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
        'guest' => 'App\Http\Middleware\RedirectIfAuthenticated',
        'debug' => 'App\Http\Middleware\Debug',
        'auth.role' => 'App\Http\Middleware\AuthRole',
        'authenticated.source' => 'App\Http\Middleware\AuthenticatedSource',
        'valid.student' => 'App\Http\Middleware\ValidStudent',
        'valid.student.report.detail' => 'App\Http\Middleware\ValidStudentReportDetail',
        'valid.student.report.publish' => 'App\Http\Middleware\ValidStudentReportPublish',
        'valid.self.report.detail' => 'App\Http\Middleware\ValidSelfReportDetail',
        'valid.self.report.publish' => 'App\Http\Middleware\ValidSelfReportPublish',
        'valid.counselor.profile' => 'App\Http\Middleware\CounselorProfileCompletion',
        'valid.student.profile' => 'App\Http\Middleware\StudentProfileCompletion',
        'course.open.unavailable' => 'App\Http\Middleware\NoOpenedCourse',
        'course.open.available' => 'App\Http\Middleware\AvailableOpenedCourse',
        'valid.question' => 'App\Http\Middleware\ValidOpenedCourseQuestion',
        'valid.answer' => 'App\Http\Middleware\ValidAnswer',
        'course.open.finished' => 'App\Http\Middleware\FinishedOpenedQuestion',
        'valid.auth.recovery' => 'App\Http\Middleware\ValidAuthRecovery',
    ];

}
