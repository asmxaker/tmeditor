<?php

namespace Encore\TMEditor;

use Encore\Admin\Form\Field\Textarea;
use Illuminate\Support\Str;

class Editor extends Textarea
{
    protected $view = 'laravel-admin-tmeditor::editor';

    protected static $js = [
        'vendor/asm-laravel-admin-ext/tmeditor/tinymce.min.js',
    ];

    public function render()
    {
        $uniqueId = $this->id.Str::random(32);
        $name = $this->formatName($this->column);
        $config = (array) TMEditor::config('config');
        foreach($config as $key=>$value){
          if(is_array($value)){
            $config[$key] = ($config[$key]);
          }
        }
        $config = json_encode(array_merge([
             'selector' => '#'.$uniqueId,
         ], $config));


$this->script = <<<EOT
tinymce.remove('#$uniqueId');
tinymce.init($config);
EOT;

        return parent::render();
    }
}
