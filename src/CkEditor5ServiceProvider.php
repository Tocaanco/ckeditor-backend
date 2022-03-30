<?php
namespace Ckeditor5;
use Illuminate\Support\ServiceProvider;
class CkEditor5ServiceProvider extends ServiceProvider {

    public function boot() {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'ckeditor5');
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->publishes([
            __DIR__.'/../config/ckeditor5.php' => config_path('ckeditor5.php'),
            __DIR__.'/public' => public_path('ckeditor5'),
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/ckeditor5.php', 'ckeditor5'
        );
    }
}