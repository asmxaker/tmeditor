<?php

namespace Encore\TMEditor;

use Encore\Admin\Admin;
use Encore\Admin\Form;
use Illuminate\Support\ServiceProvider;

class TMEditorServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(TMEditor $extension)
    {
        if (! TMEditor::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'laravel-admin-tmeditor');
        }

         if ($this->app->runningInConsole() && $assets = $extension->assets()) {
           $this->publishes(
                 [$assets => public_path('vendor/asm-laravel-admin-ext/tmeditor')],
                 'asm-laravel-admin-tmeditor'
             );
        }

        Admin::booting(function () {
            Form::extend('tmeditor', Editor::class);
        });
    }

}
