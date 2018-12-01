<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{

    use DispatchesCommands, ValidatesRequests;

    protected $theme;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->theme = 'theme_1';
    }


}
