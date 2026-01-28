<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalDataController extends Controller
{
    //index
    public function index()
    {
        return view('backend.admin.personaldata.index');
    }
}
