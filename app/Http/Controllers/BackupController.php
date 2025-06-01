<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackupController extends Controller
{
    public function index()
    {
        return view('backup.index');
    }
} 