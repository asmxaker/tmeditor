<?php

namespace Encore\TMEditor;

use Encore\Admin\Extension;

class TMEditor extends Extension
{
    public $name = 'tmeditor';

    public $views = __DIR__.'/../resources/views';

    public $assets = __DIR__.'/../resources/assets';
}