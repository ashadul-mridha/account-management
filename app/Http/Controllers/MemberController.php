<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Member;
use Illuminate\Support\Facades\Storage;
use DB;
use Toastr;

class MemberController extends Controller
{

    public function __construct()
	{
		$this->middleware('admin');
	}

    public function create(){
        return view('Member.create');
    }
    public function store(Request $request){
       
        $request->validate([
            'name' => 'required',
            'photo' => 'required|image',
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
            $photo->move(public_path('Public/Image/Member/Photo') , $photo_name);
        }

        if ($request->hasFile('nid_photo_front')) {
            $nid_front = $request->file('nid_photo_front');
            $nid_front_name = date("Ymdhis") . '.' . $nid_front->getClientOriginalExtension();
            $nid_front->move(public_path('Public/Image/Member/Nid/Front/') , $nid_front_name);
        }

        if ($request->hasFile('nid_photo_back')) {
            $nid_back = $request->file('nid_photo_back');
            $nid_back_name = date("Ymdhis") . '.' . $nid_back->getClientOriginalExtension();
            $nid_back->move(public_path('public/Image/Member/Nid/Back/') , $nid_back_name);
        }
        
        $member =new Member;
        $member->name = $request->name;
        $member->photo = $photo_name;
        $member->fatherorhusband = $request->fatherorhusband;
        $member->motherorwife = $request->motherorwife;
        $member->mobile_num = $request->mobile_num;
        $member->nid_num = $request->nid_num;
        $member->account_number = $request->account_number;
        $member->address = $request->address;
        $member->nid_photo_front = $nid_front_name;
        $member->nid_photo_back = $nid_back_name;

        $member->save();
        Toastr::success('Member Added Successful', 'Done', ["positionClass" => "toast-top-right"]);

        return redirect()->route('index.member');


    }

    public function index(){
        $all_member = Member::all();
        return view('Member.index',compact('all_member'));
    }

    //single member show 
    public function show($id){
        $member = Member::with('nomini')->findorfail($id);
        return view('Member.show',compact('member'));
    }
    //delete member 
    public function delete($id){
        $row = Member::findorfail($id);
        
        $photo = $row->photo;
        if(file_exists($photo)){
            unlink(public_path('Public/Image/Member/Photo').'/'.$row->photo);
        }

        $nid_photo_front = $row->nid_photo_front;
        if(file_exists($nid_photo_front)){
            unlink(public_path('Public/Image/Member/Nid/Front').'/'.$row->nid_photo_front);
        }

        $nid_photo_back = $row->nid_photo_back;
        if(file_exists($nid_photo_back)){
            unlink(public_path('Public/Image/Member/Nid/Back').'/'.$row->nid_photo_back);
        }
       
        
        $row->delete();
        Toastr::erroe('Member Delete Successful', 'Done', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
    //edit member
    public function edit($id){
        $row =Member::findorfail($id);
        return view('Member.edit',compact('row'));
    }
    //update member
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

        $member = Member::findorfail($request->id);

        if ($request->hasFile('photo')) {

            $m = DB::table('members')->where('id',$request->id)->first();
            $old_imge = $m->photo;
            if(file_exists($old_imge)){
                unlink(public_path('Public/Image/Member/Photo').'/'.$member->photo);
            }
            
            $photo = $request->file('photo');
            $photo_name = date("Ymdhis") . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('public/Image/Member/Photo') , $photo_name);
            $member->photo = $photo_name;
            
            
        }
        else {
            $m = DB::table('members')->where('id',$request->id)->first();
            $old_imge = $m->photo;
            $member->photo = $old_imge;

        }

        if ($request->hasFile('nid_photo_front')) {

            $m = DB::table('members')->where('id',$request->id)->first();
            $old_imge = $m->nid_photo_front;
            if(file_exists($old_imge)){
                unlink(public_path('Public/Image/Member/Nid/Front').'/'.$member->nid_photo_front);
            }
            
            $nid_front = $request->file('nid_photo_front');
            $nid_front_name = date("Ymdhis") . '.' . $nid_front->getClientOriginalExtension();
            $nid_front->move(public_path('Public/Image/Member/Nid/Front/') , $nid_front_name);
            $member->nid_photo_front = $nid_front_name;
            
            
        }
        else {
            $m = DB::table('members')->where('id',$request->id)->first();
            $old_imge = $m->nid_photo_front;
            $member->nid_photo_front = $old_imge;

        }

        if ($request->hasFile('nid_photo_back')) {
            $m = DB::table('members')->where('id',$request->id)->first();
            $old_imge = $m->nid_photo_back;
            if(file_exists($old_imge)){
                unlink(public_path('Public/Image/Member/Nid/Back').'/'.$member->nid_photo_back);
            }
            $nid_back = $request->file('nid_photo_back');
            $nid_back_name = date("Ymdhis") . '.' . $nid_back->getClientOriginalExtension();
            $nid_back->move(public_path('public/Image/Member/Nid/Back/') , $nid_back_name);
            $member->nid_photo_back = $nid_back_name;
            
        }else{
            $m = DB::table('members')->where('id',$request->id)->first();
            $old_imge = $m->nid_photo_back;
            $member->nid_photo_back = $old_imge;
        }

        $member->name = $request->name;
        $member->fatherorhusband = $request->fatherorhusband;
        $member->motherorwife = $request->motherorwife;
        $member->mobile_num = $request->mobile_num;
        $member->nid_num = $request->nid_num;
        $member->account_number = $request->account_number;
        $member->address = $request->address;
        
        

        $member->save();
        Toastr::success('Member Update Successful', 'Done', ["positionClass" => "toast-top-right"]);

        return redirect()->route('index.member');
    }
}
