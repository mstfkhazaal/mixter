<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use App\Models\Language;
use App\Models\LanguageCode;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Inertia::share([

            'locale' => function () {
                $lang = Language::where('code', app()->getLocale())->where('active', true)->first();
                if ($lang != null) {
                    return Language::where('code', app()->getLocale())->where('active', true)->first();
                } else {
                    return Language::first();
                }
            },
            'language' => function () {
                $json = [];
                foreach (LanguageCode::select(['code', 'value'])->get() as $lang) {
                    $arr = json_decode($lang->value, true);
                    $json[$lang->code] = isset($arr[app()->getLocale()]) ? $arr[app()->getLocale()] : $arr['en']; // $arr[app()->getLocale()] ?: $arr[0];
                }
                return  $json;
            },
        ]);
    }
}
