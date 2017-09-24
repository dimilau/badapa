<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Offence;

class BoardController extends Controller
{
    public function index()
    {
        return view('board.index');
    }

    public function search(Request $request)
    {
        $name = $request->input('name');
        $ic_passport = $request->input('ic_passport');
        
        $condition = [];
        if (!is_null($name)) {
            $condition[] = ['name', 'LIKE', '%'.$name.'%'];
        }
        if (!is_null($ic_passport)) {
            $condition[] = ['ic_passport', '=', $ic_passport];
        }
        $offences = null;
        if (!empty($condition)) {
            $offences = DB::table('offences')
                ->where($condition)
                ->get();
        }
        return view('board.search', ['offences' => $offences]);
    }

    public function add()
    {        
        return view('board.add');
    }

    public function store(Request $request)
    {
        $offence = request()->validate([
            'ic_passport' => 'required',
            'name' => 'required',
            'company_worked' => 'required',
            'offence_type' => 'required'
        ]);
        Offence::create($offence);
        return redirect()->action('BoardController@add')
            ->with('success', 'Offence added successfully');
    }
}
