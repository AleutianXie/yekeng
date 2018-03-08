<?php

namespace App\Providers;

use Cici\Common\CiciValidator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Translation\Translator;

class CiciValidationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::resolver(function (
            Translator $translator,
            array $data,
            array $rules,
            array $messages = [],
            array $customAttributes = []
) {
            return new CiciValidator($translator, $data, $rules, $messages, $customAttributes);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
