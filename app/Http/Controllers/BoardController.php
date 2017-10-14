<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Offence;
use App\Offender;
use App\Attachment;

class BoardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $offenders = null;
        if (!empty($condition)) {
            $offenders = DB::table('offenders')
                ->join('offences', 'offenders.id', '=', 'offences.offender_id')
                ->select('offenders.id', 'offenders.ic_passport', 'offenders.name', DB::raw('COUNT(offenders.id) as offences'))
                ->where($condition)
                ->groupBy('offenders.id', 'offenders.ic_passport', 'offenders.name')
                ->get();
        }
        
        return view('board.search', ['offenders' => $offenders]);
    }

    public function add()
    {        
        return view('board.add');
    }

    public function profile($id)
    {
        $offender = Offender::where('id', $id)->first();
        return view('board.profile', ['offender' => $offender]);
    }

    public function store(Request $request) 
    {
        $post = request()->validate([
            'ic_passport' => 'required',
            'name' => 'required',
            'description' => 'required',
            'company_worked' => 'required',
            'offence_type' => 'required',
            'attachments' => 'required',
            'attachments.*' => 'required|mimetypes:application/pdf,image/jpeg|between:40,5120'
        ]);

        $offender = Offender::where('ic_passport', $post['ic_passport'])->first();
        
        if(is_null($offender)){
            $offender = Offender::create($post);
        }

        $offence = $offender->offences()->create($post);

        if($request->hasFile('attachments')){
            foreach($request->attachments as $attachment){
                $path = $attachment->store('public/attachments');
                $filename = basename($path);
                $offence->attachments()->create([
                    'filename' => $filename
                ]);
            };
        }
        
        return redirect()->action('BoardController@add')
            ->with('success', 'Offence added successfully');
    }
}
