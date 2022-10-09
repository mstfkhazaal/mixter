<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Inertia\Inertia;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $e)
    {
        $response = parent::render($request, $e);
        if (in_array($response->status(), [500, 420, 404, 403, 401])) {

            if ($response->status() == 401) {
                return Inertia::render('Error/Error401');
            } else if ($response->status() == 403) {
                return Inertia::render('Error/Error403');
            } else if ($response->status() == 404) {
                return Inertia::render('Error/Error404');
            } else if ($response->status() == 429) {
                return Inertia::render('Error/Error429');
            } else if ($response->status() == 500) {
                return Inertia::render('Error/Error500');
            }
            return Inertia::render('Error', ['status' => $response->status()])
                ->toResponse($request)
                ->setStatusCode($response->status());
        } else if ($response->status() === 419) {
            return back()->with([
                'message' => 'The page expired, please try again.',
            ]);
        }
        return $response;
    }
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
