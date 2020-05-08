# tmeditor
TinyMCE editor for Laravel-admin

This is a laravel-admin extension that integrates TinyMCE into the laravel-admin form.

Installation
```
composer require asm-laravel-admin-ext/tmeditor
```
Then
```
php artisan vendor:publish --tag=asm-laravel-admin-tmeditor
```
Configuration

In the extensions section of the config/admin.php file, add some configuration that belongs to this extension.

```
    'extensions' => [

    'tmeditor' => [

            //Set to false if you want to disable this extension
            'enable' => true,

            // Editor configuration
            'config' => [
            'height' => 500,
            'language' => 'ru',
            'plugins' => 'print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template code table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern help ',
            'toolbar1' =>  " bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
            'toolbar2' =>  "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor litebox responsivefilemanager image | media code | preview | forecolor backcolor",
            'toolbar3' =>  "bootstrap_icons | table | hr removeformat | subscript superscript | charmap emoticons fullscreen | ltr rtl | visualchars visualblocks nonbreaking pagebreak template",
            //'toolbar_items_size' =>  'small',
		        'valid_elements' => '*[*]',
            'font_formats' =>  "Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva",
            'imagetools_toolbar' => "rotateleft rotateright | flipv fliph | editimage imageoptions",
            //'content_css' => "/css/file.css",
            'image_lith' =>  true,
            'relative_urls' => false,
             'fontsize_formats' => 'xx-small x-small small medium large x-large xx-large 6px 7px 8px 9px 10px 11px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 26px 28px 30px 32px 36px 38px 42px 64px 72px 104px 150px',
            'image_advtab' => true,
            'images_upload_url' => '/admin/file_oupload',

            'templates' => [
                 ['title' =>  'template1', 'description' =>  '', 'content' =>  '<div class="class">Text</div>'],
                 ['title' =>  'template2', 'description' =>  '', 'content' =>  '<div class="class2">Text2</div>']
            ],
            //'content_css' => "/css/editor.css",

            'image_caption' => true,
            'images_upload_credentials' => true
          ]
        ],

    ]

```	
File upload controller example
```

    namespace App\Admin\Controllers;
    
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Storage;

    class FileUploadController
    {
      public function upload(Request $request)
      {
         if($request->file('file')){
                 $path_toFile = Storage::putFile('editor_upload', $request->file('file'));
                 return json_encode(['location'=>Storage::url($path_toFile)]);
         }
      }
    }

```
__Do not forget to add the path to the loader to the exceptions of the Csrf! TODO FIX__

File app/Http/Middleware/VerifyCsrfToken.php

```
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [

        'admin/file_oupload'
    ];
}
```

Usage
Use it in the form:
```
$form->tmeditor('content');
```
// Set config
```
$form->tmeditor('content')->options(['lang' => 'fr', 'height' => 500]);
```

