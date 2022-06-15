<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Document;

class HomeController extends Controller
{
    private $_app = "";
    private $_page = "pages.";
    private $_data = [];

    public function _construct()
    {
       
    }

    public function dashboard()
    {
        $this->_data['recentCertificates'] = Document::orderBy('id','DESC')->limit(5)->get();
        return view($this->_page.'home',$this->_data);
    }
}
