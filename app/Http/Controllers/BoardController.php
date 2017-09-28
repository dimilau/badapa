<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Offence;
use App\Offender;

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
            $offences = DB::table('offenders')
                ->join('offences', 'offenders.id', '=', 'offences.offender_id')
                ->select('offenders.id', 'offenders.ic_passport', 'offenders.name', DB::raw('COUNT(offenders.id) as offences'))
                ->where($condition)
                ->groupBy('offenders.id', 'offenders.ic_passport', 'offenders.name')
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
        $post = request()->validate([
            'ic_passport' => 'required',
            'name' => 'required',
            'company_worked' => 'required',
            'offence_type' => 'required'
        ]);

        // Search if have existing Offender        
        $offender = Offender::where('ic_passport', $post['ic_passport'])->first();
        
        if(is_null($offender)){
            $offender = Offender::create($post);
        }
        $offender->offences()->create($post);
        
        
        //Offence::create($post);
        
        return redirect()->action('BoardController@add')
            ->with('success', 'Offence added successfully');
    }
}
