<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
//use App\User;

class User extends Controller
{
    

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {

      $ccObj = new CommonController();
      if($ccObj->checkUserAccess('users') == 'noaccess')
        { return view('noaccess');}
    return view('user/user');
}

public function addUserView()
{
    return view('user/user_add');
}
public function storeuser(Request $request){

   $password = md5($request->password);

    DB::table('users')->insert([
        'name'      => $request->name,
        'mobile'             => $request->mobile,
        'email' => $request->email,
        'role'      => $request->role,
        'password'             => $password,
    ]);

    return redirect()->back();
}
// public function useraccessview()
// {

//  $ccObj = new CommonController();
//  if($ccObj->checkUserAccess('roleAccess') == 'noaccess')
//     { return view('noaccess');}
// return view('user/useraccessview'); }

// public function myprofile()
// {
//     $data = DB::table('users')->select('name', 'mobile', 'image')->where('id',session('id'))->first();
//     return view('user/myprofile', ['data'=>$data]);
// }

// public function role()
// {

//     $ccObj = new CommonController();
//     if($ccObj->checkUserAccess('userRole') == 'noaccess'){
//         return view('noaccess');
//     }
//     return view('user/role');
// }

// public function deleteuser(Request $req)
// {
//     $id = $req->id;
//     $ccObj = new CommonController();
//     return $ccObj->deleteData('users',$id);
// }


// public function adduser(Request $req){

//     $error_list = array();
//     $ccObj = new CommonController();

//     $data['name'] = trim($req->name);
//     $data['mobile'] = trim($req->mobile);
//     $data['email'] = trim($req->email);
//     $data['password'] = trim($req->password);
//     // $data['role'] = trim($req->role);
//     $data['remark'] = trim($req->remark);
//     $data['id_district'] = trim($req->district);
//     $data['unit'] = trim($req->unit);
//     $data['branch'] = trim($req->branch);
//     $data['id_cat'] = trim($req->id_cat);
//     $data['id_subcat'] = trim($req->id_subcat);
//     $data['designation'] = trim($req->designation);


//     $data['created_by'] = session('id');

//     if($data['name'] == "" || $data['mobile'] == "" || $data['email'] == "" || $data['role'] == "" || $data['password'] == ""){
//         array_push($error_list, "Fill the required fields");
//     }

//     if(strlen($data['password']) < 6){
//         array_push($error_list, "Choose atleast 6 digit password");
//     }

//     if(count($ccObj->checkDataDuplicacy("users", "email", $data['email']))>0){
//         array_push($error_list, "This email already exist for some user");
//     }

//     if(count($ccObj->checkDataDuplicacy("users", "mobile", $data['mobile']))>0){
//         array_push($error_list, "This mobile no. already exist for some user");
//     }


//         // File upload with validation start
//     $file = $req->file('uploadimage');
//     if($file != ""){
//         $file_extension = $file->getClientOriginalExtension();
//         if($ccObj->fileExtensionsAllowed($file_extension) == "allowed"){
//             $file_size = $file->getSize();
//                 if($file_size <= 2100000){  // Allowed file size is 2.1 MB
//                     //$destinationPath = 'uploads/userimages';
//                     try{
//                         $data['image'] = time().'.'.$file->getClientOriginalExtension();
//                         $file->move('uploads/userimages',$data['image']);
//                     }catch(\Exception $e){
//                         echo $e;
//                     }
//                 }else{
//                     array_push($error_list, "Please try with a smaller file size");
//                 }
//             }else{
//                 array_push($error_list, "Attached file type is not allowed");
//             }
//         }
//         // File upload with validation end

//         if(count($error_list)>0){
//             return response()->json(array("result" => "error", "message" => $error_list));
//         }
//         else{

//             try{
//                 $data['password'] = md5($data['password']);
//                 DB::table('users')->insert($data);
//                 return response()->json(array("result" => "success", "message" => "Data saved successfully"));
//             }catch(\Exception $e) {
//                 return response()->json(array("result" => "fail", "message" => $e));
//             }
//         }
//     }

//     public function userlist(Request $req)
//     {
//         if ($req->ajax()) {
//            $data = DB::table('users')
//            ->select('users.*', 'districts.name as district', 'category.category', 'sub_category.subcategory')
//            ->leftJoin('districts', 'districts.id', '=', 'users.id_district')
//            ->leftJoin('category', 'category.id', '=', 'users.id_cat')
//            ->leftJoin('sub_category', 'sub_category.id', '=', 'users.id_subcat')
//            ->where('users.id','!=',1)
//            ->where('users.activation_status', 'active')
//            ->get();

//            return Datatables::of($data)
//            ->addIndexColumn()

//            ->addColumn('image', function($row){
//             $img = $row->image;
//             if ($img != '') {
//                 $img = '<img class="img-circle" data-id="'.$row->id.'" src="uploads/userimages/'.$row->image.'" width="40">';
//             } else {
//                 $img = '<img data-id="'.$row->id.'" src="uploads/userimages/user.png" width="40">';
//             }
//             return $img;
//         })

//            ->addColumn('action', function($row){
//             $btn = '&nbsp; &nbsp;&nbsp;<i title="Edit" data-id="'.$row->id.'"  class="editData ion-edit p-10" data-target="#deleteDoc"></i>';
//             $btn = $btn.'&nbsp; &nbsp;&nbsp;<i title="Delete" data-id="'.$row->id.'"  class="deleteData ion-close p-10" data-target="#deleteDoc"></i>';
//             return $btn;
//         })
//            ->rawColumns(['image','action'])
//            ->make(true);
//            return $data;
//        }
//    }


//    public function rolelist(Request $req)
//    {
//     if ($req->ajax()) {
//         $data = DB::table('role')
//         ->select("*")
//         ->where('activation_status','active')
//         ->get();

//         return Datatables::of($data)
//         ->addIndexColumn()
//         ->addColumn('action', function($row){
//             $btn = '&nbsp; &nbsp;&nbsp;<i title="Delete" data-id="'.$row->id.'"  class="pdfData ion-close p-10" data-target="#deleteDoc"></i>';

//             return $btn;
//         })
//         ->rawColumns(['action'])
//         ->make(true);
//         return $data;
//     }
// }

// public function userrolelist(Request $req)
// {

//     if ($req->ajax()) {
//         $data = DB::table('role_user')
//         ->select('role_user.id','role.name as role_name', 'users.id as userId',
//             DB::raw('CONCAT(users.name, " - ", users.mobile) as name'))
//         ->where('users.activation_status','active')
//         ->where('role.activation_status','active')
//         ->leftjoin('role','role.id','=','role_user.id_role')
//         ->leftjoin('users','users.id','=','role_user.id_user')
//         ->get();

//         return Datatables::of($data)
//         ->addIndexColumn()
//         ->addColumn('action', function($row){
//             $btn = '&nbsp;<i title="Edit" data-id2="'.$row->userId.'" data-id="'.$row->id.'"  class="editData ion-edit p-10"></i>';
//             $btn = $btn.'&nbsp; &nbsp;&nbsp;<i title="Delete" data-id="'.$row->id.'"  class="deleteData ion-close p-10" data-target="#deleteDoc"></i>';
//             return $btn;
//         })
//         ->rawColumns(['action'])
//         ->make(true);
//         return $data;
//     }
// }


// public function getUsersByRoleId($id)
// {
//   $data = DB::table('role_user')
//   ->select('users.id as id',
//     DB::raw('CONCAT(users.name, " - ", users.mobile) as name'))
//   ->where('users.activation_status','active')
//   ->where('role_user.id_role',$id)
//   ->leftjoin('users','users.id','=','role_user.id_user')
//   ->orderby('users.name')->get();
//   echo json_encode($data);

// }


// public function userlistdata()
// {
//     $data = DB::table('users')->select(DB::raw("CONCAT(users.name, ' - ', users.mobile) as name"), 'users.id')
//     ->where('id','!=',1)->where('activation_status','active')
//     ->orderby('users.name')->get();
//     echo json_encode($data);
// }

// public function rolelistdata()
// {
//     $data = DB::table('role')->select('role.id', 'role.name')
//     ->where('activation_status','active')->orderby('role.name')->get();
//     echo json_encode($data);
// }


// public function addrole(Request $req)
// {
//     $data['name'] = $req->name;
//     $data['details'] = $req->details;
//     $result = DB::table('role')->insert($data);
//     if($result){
//         return response()->json(array("result" => "success", "message" => "Data saved successfully"));
//     }else{
//         return response()->json(array("result" => "fail", "message" => "Something went wrong"));
//     }
// }

// public function deleteuserrole(Request $req)
// {
//     $id = $req->id;
//     $ccObj = new CommonController();
//     return $ccObj->deleteData('role_user',$id);
// }

// public function assignrole(Request $req)
// {
//     $data['id_role'] = $req->id_role;
//     $data['id_user'] = $req->id_user;
//     $data['created_by'] = session('id');

//     $duplicate = DB::table('role_user')->select('*')
//     ->where('id_role',$req->id_role)->where('id_user',$req->id_user)->get();

//     if(count($duplicate)>0){
//         return response()->json(array("result" => "fail", "message" => "Selected user already assigned to this role"));
//     }else{
//         $result = DB::table('role_user')->insert($data);
//         if($result){
//             return response()->json(array("result" => "success", "message" => "Data saved successfully"));
//         }else{
//             return response()->json(array("result" => "fail", "message" => "Something went wrong"));
//         }    
//     }
// }


// public function changeRole(Request $req)
// {
//     $data['id_role'] = $req->modal_role;
//     $result = DB::table('role_user')->where('id_user', $req->changeRoleUserId)->update($data);
//     if($result){
//         return response()->json(array("result" => "success", "message" => "Role changed successfully"));
//     }else{
//         return response()->json(array("result" => "fail", "message" => "Already hold this role. Or something went wrong"));
//     }
// }


// public function changepass(Request $req)
// {
//     $oldpass = md5(trim($req->oldpass));
//     $pass = md5(trim($req->pass));
//     $re_pass = md5(trim($req->re_pass));



//     $oldpasscheck = DB::table('users')->select('id')->where('id', session('id'))->where('password', $oldpass)->get();
//     if(count($oldpasscheck) < 1){
//         return response()->json(array("result" => "fail", "message" => "Old password is not correct"));
//     }else if($pass != $re_pass){
//         return response()->json(array("result" => "fail", "message" => "Password missmatch"));
//     }else if(strlen($pass) < 6){
//         return response()->json(array("result" => "fail", "message" => "Choose atleast 6 character password"));
//     }else{
//         $data['password'] = $pass;
//         $result = DB::table('users')->where('id', session('id'))->update($data);
//         if($result){
//             return response()->json(array("result" => "success", "message" => "Password changed successfully"));
//         }else{
//             return response()->json(array("result" => "fail", "message" => "Something went wrong"));
//         }
//     }
// }


// public function updatemyprofile(Request $req)
// {
//     $error_list = array();
//     $ccObj = new CommonController();

//     $data['name'] = trim($req->name);
//     $data['mobile'] = trim($req->mobile);
//     $id = session('id');


//     if($data['name'] == "" || $data['mobile'] == ""){
//         array_push($error_list, "Fill the required fields");
//     }

//         // File upload with validation start
//     $file = $req->file('uploadimage');
//     if($file != ""){
//         $file_extension = $file->getClientOriginalExtension();
//         if($ccObj->fileExtensionsAllowed($file_extension) == "allowed"){
//             $file_size = $file->getSize();
//                 if($file_size <= 2100000){  // Allowed file size is 2.1 MB
//                     //$destinationPath = 'uploads/userimages';
//                     try{
//                         $data['image'] = time().'.'.$file->getClientOriginalExtension();
//                         $file->move('uploads/userimages',$data['image']);
//                     }catch(\Exception $e){
//                         echo $e;
//                     }
//                 }else{
//                     array_push($error_list, "Please try with a smaller file size");
//                 }
//             }else{
//                 array_push($error_list, "Attached file type is not allowed");
//             }
//         }
//         // File upload with validation end

//         if(count($error_list)>0){
//             return response()->json(array("result" => "error", "message" => $error_list));
//         }
//         else{

//             try{
//                 DB::table('users')->where('id', $id)->update($data);
//                 return response()->json(array("result" => "success", "message" => "Data changed successfully"));
//             }catch(\Exception $e) {
//                 return response()->json(array("result" => "fail", "message" => $e));
//             }

//         }
//     }

//     public function editUser($id)
//     {
//         $data = DB::table('users')->select('name','mobile','email','remark')->where('id', $id)->get();
//         $fData['data'] = $data;
//         return view('user/user_edit', $fData);
//     }

//     public function updateuser(Request $req)
//     {
//      $error_list = array();
//      $ccObj = new CommonController();

//      $data['name'] = trim($req->name);
//      $data['mobile'] = trim($req->mobile);
//      $data['email'] = trim($req->email);
//      $data['remark'] = trim($req->remark);

//      $uId = $req->u_id_update;

//      if($uId == 1){
//         array_push($error_list, "You are not allowed to update this info");
//     }

//     if($data['name'] == "" || $data['mobile'] == "" || $data['email'] == ""){
//         array_push($error_list, "Fill the required fields");
//     }
//     if(count($ccObj->checkDataDuplicacyOnEdit("users", "email", $data['email'], 'id', $uId))>0){
//         array_push($error_list, "This email already exist for some user");
//     }

//     if(count($ccObj->checkDataDuplicacyOnEdit("users", "mobile", $data['mobile'], 'id', $uId))>0){
//         array_push($error_list, "This mobile no. already exist for some user");
//     }


//         // File upload with validation start
//     $file = $req->file('uploadimage');
//     if($file != ""){
//         $file_extension = $file->getClientOriginalExtension();
//         if($ccObj->fileExtensionsAllowed($file_extension) == "allowed"){
//             $file_size = $file->getSize();
//                 if($file_size <= 2100000){  // Allowed file size is 2.1 MB
//                     //$destinationPath = 'uploads/userimages';
//                     try{
//                         $data['image'] = time().'.'.$file->getClientOriginalExtension();
//                         $file->move('uploads/userimages',$data['image']);
//                     }catch(\Exception $e){
//                         echo $e;
//                     }
//                 }else{
//                     array_push($error_list, "Please try with a smaller file size");
//                 }
//             }else{
//                 array_push($error_list, "Attached file type is not allowed");
//             }
//         }
//         // File upload with validation end

//         if(count($error_list)>0){
//             return response()->json(array("result" => "error", "message" => $error_list));
//         }
//         else{

//             try{
//                 DB::table('users')->where('id', $uId)->update($data);
//                 return response()->json(array("result" => "success", "message" => "Data updated successfully"));
//             }catch(\Exception $e) {
//                 return response()->json(array("result" => "fail", "message" => $e));
//             }

//         }
//     }


//     public function getModules()
//     {
//         $data = DB::table('module')->select('*')->where('activation_status', 'active')->get();
//         echo json_encode($data);
//     }


//     public function getFeature($idModule)
//     {
//         $data = DB::table('action')->select('*')->where('id_module', $idModule)->where('activation_status', 'active')->get();
//         echo json_encode($data);
//     }

//     public function assignFeatureToRole(Request $req)
//     {
//         $data['id_action'] = $req->feature;
//         $data['id_role'] = $req->id_role;
//         $data['access_given_by'] = session('id');

//         $dupCheck = DB::table('role_action')->select('id')->where('id_action', $data['id_action'])->where('id_role', $data['id_role'])->limit(1)->get();

//         if(count($dupCheck) > 0){
//             return response()->json(array("result" => "fail", "message" => 'Selected feature already assigned to this role'));
//         }

//         try{
//             DB::table('role_action')->insert($data);
//             return response()->json(array("result" => "success", "message" => "Data inserted successfully"));
//         }catch(\Exception $e) {
//             return response()->json(array("result" => "fail", "message" => $e));
//         }
//     }

//     public function roleWiseFeatures(Request $req)
//     {

//         if ($req->ajax()) {
//             $data = DB::table('role_action')
//             ->select('role_action.id','role.name as role_name', 'action.action as action_name', 'module.module')
//             ->leftjoin('role','role.id','=','role_action.id_role')
//             ->leftjoin('action','action.id','=','role_action.id_action')
//             ->leftjoin('module','module.id','=','action.id_module')
//             ->get();

//             return Datatables::of($data)
//             ->addIndexColumn()
//             ->addColumn('action', function($row){
//                 $btn = '&nbsp; &nbsp;&nbsp;<i title="Delete" data-id="'.$row->id.'"  class="deleteData ion-close p-10" data-target="#deleteDoc"></i>';
//                 return $btn;
//             })
//             ->rawColumns(['action'])
//             ->make(true);
//             return $data;
//         }
//     }

//     public function deleteRoleFEature(Request $req)
//     {
//      $id = $req->id;
//      $ccObj = new CommonController();
//      return $ccObj->deleteData('role_action',$id);
//  }

}