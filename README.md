# tmeditor
TinyMCE editor for Laravel-admin

This is a laravel-admin extension that integrates TinyMCE into the laravel-admin form.

Installation

composer require asm-laravel-admin-ext/tmeditor

Then

php artisan vendor:publish --tag=asm-laravel-admin-tmeditor

Configuration

In the extensions section of the config/admin.php file, add some configuration that belongs to this extension.


    'extensions' => [

        'tmeditor' => [
        
            //Set to false if you want to disable this extension
            'enable' => true,
            
            // Editor configuration
            'config' => [
                
            ]
        ]
    ]

Usage
Use it in the form:

$form->tmeditor('content');

// Set config
$form->tmeditor('content')->options(['lang' => 'fr', 'height' => 500]);
