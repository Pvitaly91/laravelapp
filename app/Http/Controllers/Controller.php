<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $langs;

    function __construct()
    {
        //dd(__CLASS__);
        $this->langs = ['ru' => 'ru','en' =>'en','ua' => 'ua'];
    }

    /**
     * @return array
     */
    public function getLangs( $lg = FALSE )
    {
        if($lg) {
            return $this->langs[$lg];
        }
        return $this->langs;
    }
}
