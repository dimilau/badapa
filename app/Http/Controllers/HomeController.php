<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Offender;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
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
        $condition[] = ['offenders.approved', '=', '1'];
        $condition[] = ['offences.approved', '=', '1'];
        $offenders = null;
        if (count($condition) > 1) {
            $offenders = DB::table('offenders')
                ->join('offences', 'offenders.id', '=', 'offences.offender_id')
                ->select('offenders.id', 'offenders.ic_passport', 'offenders.name', DB::raw('COUNT(offenders.id) as offences'))
                ->where($condition)
                ->groupBy('offenders.id', 'offenders.ic_passport', 'offenders.name')
                ->get();
        }
        
        return view('home.search', ['offenders' => $offenders]);
    }

    public function profile($id)
    {
        $offender = Offender::where('id', $id)->first();
        return view('home.profile', ['offender' => $offender]);
    }

    public function add()
    {        
        return view('home.add');
    }

    public function store(Request $request)
    {
        $post = request()->validate([
            'ic_passport' => 'required',
            'name' => 'required',
            'photos' => 'required',
            'photos.*' => 'required|mimetypes:image/jpeg',
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

        if($request->hasFile('photos')) {
            foreach ($request->photos as $photo) {
                $path = $photo->store('public/photos');
                $filename = basename($path);
                $filename_nosuffix = basename($path, '.jpeg');
                $thumbnail = \Image::make($photo->getRealPath())->fit(120, 120);
                $thumbnail->save(storage_path('app/public/photos/' . $filename_nosuffix . '-thumb' . '.jpeg'));
                $offender->photos()->create([
                    'filename' => $filename
                ]);
            }
        }

        if($request->hasFile('attachments')){
            foreach($request->attachments as $attachment){
                $path = $attachment->store('public/attachments');
                $filename = basename($path);
                $offence->attachments()->create([
                    'filename' => $filename
                ]);
            };
        }
        
        return redirect()->action('HomeController@add')
            ->with('success', 'Offence added successfully');
    }
}
