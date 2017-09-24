<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offence;

class BoardController extends Controller
{
    public function index()
    {
        return view('board.index');
    }
}
