<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Nomini;
use DB;
use Toastr;

class NominiController extends Controller
{
    public function __construct()
	{
		$this->middleware('admin');
	}

    public function create(){
        $member = Member::all();
        return view('nomini.create',compact('member'));
    }
    public function store(Request $request){
       
        $request->validate([
            'name' => 'required',
            'photo' => 'required|image',
            'member_name' => 'required',
            'fatherorhusband' => 'required',
            'motherorwife' => 'required',
            'mobile_num' => 'required|max:11',
            'nid_num' => 'required|numeric|unique:members,nid_num',
            'account_number' => 'required',
            'address' => 'required',
            'nid_photo_front' => 'required|image',
            'nid_photo_back' => 'required|image'
        ]);
        
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photo_name = date("Ymdhis") . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('Public/Image/Nomini/Photo') , $photo_name);
        }

        if ($request->hasFile('nid_photo_front')) {
            $nid_front = $request->file('nid_photo_front');
            $nid_front_name = date("Ymdhis") . '.' . $nid_front->getClientOriginalExtension();
            $nid_front->move(public_path('Public/Image/Nomini/Nid/Front/') , $nid_front_name);
        }

        if ($request->hasFile('nid_photo_back')) {
            $nid_back = $request->file('nid_photo_back');
            $nid_back_name = date("Ymdhis") . '.' . $nid_back->getClientOriginalExtension();
            $nid_back->move(public_path('public/Image/Nomini/Nid/Back/') , $nid_back_name);
        }
        
        $nomini =new Nomini;
        $nomini->name = $request->name;
        $nomini->member_id =$request->member_name;
        $nomini->photo = $photo_name;
        $nomini->fatherorhusband = $request->fatherorhusband;
        $nomini->motherorwife = $request->motherorwife;
        $nomini->mobile_num = $request->mobile_num;
        $nomini->nid_num = $request->nid_num;
        $nomini->account_number = $request->account_number;
        $nomini->address = $request->address;
        $nomini->nid_photo_front = $nid_front_name;
        $nomini->nid_photo_back = $nid_back_name;

        $nomini->save();
        Toastr::success('Nomini Added Successful', 'Done', ["positionClass" => "toast-top-right"]);

        return redirect()->route('index.nomini');


    }

    public function index(){
        $all_nomini = Nomini::with('member')->get();

        // $member = DB::table('nominis')
        //         ->join('members','members.id','nominis.member_id')
        //         ->first();
        return view('nomini.index',compact('all_nomini'));
    }
    public function show($id){
        $nomini = Nomini::with('member')->findorfail($id);
        $member = $nomini->member;
     
        // $member = DB::table('nominis')
        //         ->join('members','members.id','nominis.member_id')
        //         ->first();
        return view('nomini.show',compact('nomini','member'));
    }
    //delete Nomini 
    public function delete($id){
        $row = Nomini::findorfail($id);
        
        $photo = $row->photo;
        if(file_exists($photo)){
            unlink(public_path('Public/Image/Nomini/photo').'/'.$row->photo);
        }

        $nid_photo_front = $row->nid_photo_front;
        if(file_exists($nid_photo_front)){
            unlink(public_path('Public/Image/Nomini/Nid/Front').'/'.$row->nid_photo_front);
        }

        $nid_photo_back = $row->nid_photo_back;
        if(file_exists($nid_photo_back)){
            unlink(public_path('Public/Image/Nomini/Nid/Back').'/'.$row->nid_photo_back);
        }
       
        
        $row->delete();
        Toastr::error('Nomini Deleted Successful', 'Done', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
    //edit nomini
    public function edit($id){
        $row =Nomini::findorfail($id);
        return view('nomini.edit',compact('row'));
    }
    //update Nomini
    public function update(Request $request){

        // $request->validate([
        //     'name' => 'required',
        //     'fatherorhusband' => 'required',
        //     'motherorwife' => 'required',
        //     'mobile_num' => 'required|max:11',
        //     'nid_num' => 'required|numeric',
        //     'account_number' => 'required',
        //     'address' => 'required',
        //     'nid_photo_front' => 'required|image',
        //     'nid_photo_back' => 'required|image'
        // ]);

        $nomini = Nomini::findorfail($request->id);

        if ($request->hasFile('photo')) {

            $m = DB::table('nominis')->where('id',$request->id)->first();
            $old_imge = $m->photo;
            if(file_exists($old_imge)){
                unlink(public_path('Public/Image/Nomini/Photo').'/'.$nomini->photo);
            }
            
            $photo = $request->file('photo');
            $photo_name = date("Ymdhis") . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('public/Image/Nomini/Photo/') , $photo_name);
            $nomini->photo = $photo_name;
            
            
        }
        else {
            $m = DB::table('nominis')->where('id',$request->id)->first();
            $old_imge = $m->photo;
            $nomini->photo = $old_imge;

        }

        if ($request->hasFile('nid_photo_front')) {

            $m = DB::table('nominis')->where('id',$request->id)->first();
            $old_imge = $m->nid_photo_front;
            if(file_exists($old_imge)){
                unlink(public_path('Public/Image/Nomini/Nid/Front').'/'.$nomini->nid_photo_front);
            }
            
            $nid_front = $request->file('nid_photo_front');
            $nid_front_name = date("Ymdhis") . '.' . $nid_front->getClientOriginalExtension();
            $nid_front->move(public_path('Public/Image/Nomini/Nid/Front/') , $nid_front_name);
            $nomini->nid_photo_front = $nid_front_name;
            
            
        }
        else {
            $m = DB::table('nominis')->where('id',$request->id)->first();
            $old_imge = $m->nid_photo_front;
            $nomini->nid_photo_front = $old_imge;

        }

        if ($request->hasFile('nid_photo_back')) {
            $m = DB::table('nominis')->where('id',$request->id)->first();
            $old_imge = $m->nid_photo_back;
            if(file_exists($old_imge)){
                unlink(public_path('Public/Image/Photo/Nid/Back').'/'.$member->nid_photo_back);
            }
            $nid_back = $request->file('nid_photo_back');
            $nid_back_name = date("Ymdhis") . '.' . $nid_back->getClientOriginalExtension();
            $nid_back->move(public_path('public/Image/Photo/Nid/Back/') , $nid_back_name);
            $nomini->nid_photo_back = $nid_back_name;
            
        }else{
            $m = DB::table('nominis')->where('id',$request->id)->first();
            $old_imge = $m->nid_photo_back;
            $nomini->nid_photo_back = $old_imge;
        }

        $nomini->name = $request->name;
        $nomini->fatherorhusband = $request->fatherorhusband;
        $nomini->motherorwife = $request->motherorwife;
        $nomini->mobile_num = $request->mobile_num;
        $nomini->nid_num = $request->nid_num;
        $nomini->account_number = $request->account_number;
        $nomini->address = $request->address;
        
        

        $nomini->save();
        Toastr::success('Nomini Update Successful', 'Done', ["positionClass" => "toast-top-right"]);

        return redirect()->route('index.nomini');
    }
}
