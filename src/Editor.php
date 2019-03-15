<?php

namespace Encore\TMEditor;

use Encore\Admin\Form\Field\Textarea;

class Editor extends Textarea
{
    protected $view = 'laravel-admin-tmeditor::editor';

    // protected static $js = [
    //     'vendor/laravel-admin-ext/tmeditor/tinymce.min.js',
    // ];

//     public function render()
//     {
//         $config = (array) TMEditor::config('config');
//
//         //$config = json_encode(array_merge($config, $this->options));
//
// //         $this->script = <<<EOT
// // CKEDITOR.replace('{$this->id}', $config);
// // EOT;
//         return parent::render();
//     }



    //protected $view = 'laravel-admin-summernote::editor';
    //
    // protected static $css = [
    //     'vendor/laravel-admin-ext/summernote/dist/summernote.css',
    // ];

    protected static $js = [
        'vendor/laravel-admin-ext/tmeditor/tinymce.min.js',
    ];

    public function render()
    {
        $name = $this->formatName($this->column);

        $config = (array) TMEditor::config('config');
        //
        // $config = json_encode(array_merge([
        //     'height' => 300,
        // ], $config));

       $this->script = <<<EOT
tinymce.init({ selector:'#{$this->id}', height: 500,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
});

EOT;
// $('#{$this->id}').summernote($config);
// $('#{$this->id}').on("summernote.change", function (e) {
//     var html = $('#{$this->id}').summernote('code');
//     $('input[name=$name]').val(html);
// });
        return parent::render();
    }
}
