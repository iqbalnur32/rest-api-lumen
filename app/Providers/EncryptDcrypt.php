<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class EncryptDcrypt extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
         require_once app()->path() . '/Helpers/EncryptDecrypt.php';
    }

    public function boot(){
		Schema::defaultStringLength(191);
	}
}
