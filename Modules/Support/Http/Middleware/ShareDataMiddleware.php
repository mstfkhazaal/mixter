<?php

namespace Modules\Support\Http\Middleware;

use Illuminate\Http\Request;
use App\Http\Middleware\HandleInertiaRequests as Middleware;

class ShareDataMiddleware extends Middleware
{
    /**
         * Define the props that are shared by default.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return array
         */
        public function share(Request $request)
        {
            return array_merge(parent::share($request), [
                //define shareable data here
            ]);
        }
}
