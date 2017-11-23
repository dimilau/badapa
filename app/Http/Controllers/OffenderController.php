<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Offender;

class OffenderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list(Request $request)
    {
        $get = request()->validate([
            'ic_passport' => 'nullable',
            'name' => 'nullable',
            'approved' => 'nullable',            
        ]);
        if (empty($get)) {
            $offenders = Offender::simplePaginate(10);
            return view('offender.list', ['offenders' => $offenders]);
        } else {
            $request->flash();
            $q = Offender::select('*');
            if (array_key_exists('ic_passport', $get) && !is_null($get['ic_passport'])) {
                $q = $q->where('ic_passport', 'LIKE', $get['ic_passport']);
            }
            if (array_key_exists('name', $get) && !is_null($get['name'])) {
                $q = $q->where('name', 'LIKE', $get['name']);
            }
            if (array_key_exists('approved', $get) && !is_null($get['approved'])) {
                $q = $q->where('approved', $get['approved']);
            }
            $offenders = $q->simplePaginate(10);
            return view('offender.list', ['offenders' => $offenders, 'get' => $get]);
        }
    }

    public function show($id)
    {
        $offender = Offender::where('id', $id)->first();
        return view('offender.show', ['offender' => $offender]);
    }

    public function store(Request $request)
    {
        $post = request()->validate([
            'id' => 'required',
            'ic_passport' => 'required',
            'name' => 'required',
            'approved' => 'required'            
        ]);
        $offender = Offender::findOrFail($post['id']);
        $offender->fill($post);
        $offender->push();

        return back()
            ->with('success', 'The offender details has been updated.');
    }

    public function destroy($id)
    {
        $offender = Offender::findOrFail($id);
        $offender->delete();

        return back()
            ->with('success', 'The offender has been deleted');
    }
}
