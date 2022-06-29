<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SavingController extends Controller
{
    public function index()
    {
    return view('saving.index', compact('saving'));
    }
}
