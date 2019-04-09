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
              'height' => 500,
              'language' => 'ru',
              'plugins' => 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template code table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern help ',
              'toolbar1' =>  " bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
              'toolbar2' =>  "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor litebox responsivefilemanager image | media code | preview | forecolor backcolor",
              'toolbar3' =>  "bootstrap_icons | table | hr removeformat | subscript superscript | charmap emoticons fullscreen | ltr rtl | visualchars visualblocks nonbreaking pagebreak template",
              'toolbar_items_size' =>  'small',
              'valid_elements' => '*[*]',
              'font_formats' =>  "Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva",
              'imagetools_toolbar' => "rotateleft rotateright | flipv fliph | editimage imageoptions",
              //'content_css' => "/css/file.css",
              'image_lith' =>  true,
              'relative_urls' => false,
              'fontsize_formats' => 'xx-small x-small small medium large x-large xx-large 6pt 7pt 8pt 9pt 10pt 11pt 12pt 13pt 14pt 15pt 16pt 17pt 18pt 19pt 20pt 21pt 22pt 23pt 24pt 26pt 28pt 30pt 32pt 36pt 38pt 42pt 64pt 72pt 104pt 150pt',
              'image_advtab' => true//,
              //'images_upload_url' => 'postAcceptor.php'
            ]
        ],

    ]

Usage
Use it in the form:

$form->tmeditor('content');

// Set config
$form->tmeditor('content')->options(['lang' => 'fr', 'height' => 500]);
