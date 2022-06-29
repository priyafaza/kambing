<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSavingController extends Controller
{
    public function index()
    {
    return view('admin.saving.index');
    }
}
