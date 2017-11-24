<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offence;

class OffenceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list(Request $request)
    {
        $get = request()->validate([
            'approved' => 'nullable',
            'name' => 'nullable',      
        ]);
        if (empty($get)) {
            $offences = Offence::simplePaginate(10);
            return view('offence.list', ['offences' => $offences]);
        } else {
            $request->flash();
            $q = Offence::select('*');
            if (array_key_exists('approved', $get) && !is_null($get['approved'])) {
                $q = $q->where('approved', $get['approved']);
            }
            if (array_key_exists('name', $get) && !is_null($get['name'])) {
                $q = $q->whereHas('offender', function ($query) use ($get) {
                    $query->where('name', '=', $get['name']);                
                });
            }
            $offences = $q->simplePaginate(10);
            return view('offence.list', ['offences' => $offences, 'get' => $get]);
        }
    }

    public function show($id)
    {
        $offence = Offence::where('id', $id)->first();
        return view('offence.show', ['offence' => $offence]);
    }

    public function store(Request $request)
    {
        $post = request()->validate([
            'id' => 'required',
            'company_worked' => 'required',
            'description' => 'required',
            'approved' => 'required'            
        ]);
        $offence = Offence::findOrFail($post['id']);
        $offence->fill($post);
        $offence->push();

        return back()
            ->with('success', 'The offence details has been updated.');
    }
}
