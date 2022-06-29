<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SavingController extends Controller
{
    public function index()
    {
    return view('saving.index');
    }
    public function detail()
    {
    return view('saving.detail');
    }
    public function upload()
    {
    return view('saving.upload');
    }


}
