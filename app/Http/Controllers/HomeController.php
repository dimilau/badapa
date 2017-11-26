<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Offender;
use App\Offence;
use Auth;

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
        $offences = Auth::user()->offences;
        return view('home', ['offences' => $offences]);        
    }

    public function search(Request $request)
    {
        $get = request()->validate([
            'name' => 'nullable|min:5',
            'ic_passport' => 'nullable',  
        ]);
        
        $condition = array(
            array('offenders.approved', '=', '1'),
            array('offences.approved', '=', '1'),
        );
        if (array_key_exists('name', $get) && !empty($get['name'])) {
            $condition[] = ['name', 'LIKE', '%'.$get['name'].'%'];
        }
        if (array_key_exists('ic_passport', $get) && !empty($get['ic_passport'])) {
            $condition[] = ['ic_passport', '=', $get['ic_passport']];
        }

        $offenders = null;
        $credit = Auth::user()->credit;    
        //query database if credit count is more than 0
        if (count($condition) > 2 && $credit->count > 0) {
            $offenders = DB::table('offenders')
                ->join('offences', 'offenders.id', '=', 'offences.offender_id')
                ->select('offenders.id', 'offenders.ic_passport', 'offenders.name', DB::raw('COUNT(offenders.id) as offences'))
                ->where($condition)
                ->groupBy('offenders.id', 'offenders.ic_passport', 'offenders.name')
                ->get();

            // deduct credit            
            $credit->count = $credit->count - 1;
            $credit->save();

            //show credit message
            if ($credit->count > 0) {
                $request->session()->flash('status', 'You have ' . $credit->count . 'credit(s) left.');
            } else {
                $request->session()->flash('status', 'You have nore more credits left.');
            }
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

        $offence = new Offence;
        $offence->fill($post);
        $offence->offender()->associate($offender);
        $offence->user()->associate(Auth::user());
        $offence->save();

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
