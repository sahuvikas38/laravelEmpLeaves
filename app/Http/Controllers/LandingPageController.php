<?php

namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\usermodel;
use App\Register;
use App\User;
use Session;

class LandingPageController extends Controller
{
//    public function login(){
//         return view('login/loginpage');
//     }
   public function getData(Request $res){
        $name = $res->name;
        $mobile = $res->mobile;
        $email = $res->email;
        $password = $res->password;

        $data = new Register();
        $data->name = $name;
        $data->mobile = $mobile;
        $data->email = $email;
        $data->password = $password;
        $data->save();
        $lastInsertedId = $data->id;

        $userDetails = new User();
        $userDetails->user_id = $lastInsertedId;
        $userDetails->firstname = $name;
        $userDetails->loginStatus = 0;
        $userDetails->email = $email;
        $userDetails->save();

        // $data=array('Name'=>$name,"Mob no"=>$mobile,"Password"=>$password,"Branch"=>$branch);
        // DB::table('stu_registers')->insert($data);

        return redirect('login?status=success');
    }

    public function checkLogin(Request $res){
        $eId = $res->eId;
        $password = $res->password;

        $users = DB::table('registers')
            ->select('registers.id','registers.email', 'registers.password', 'registers.name','users.userImage')
            ->leftJoin('users','users.user_id','=','registers.id')
            ->where('registers.email', $eId)
            ->where('registers.password', $password)
            ->first();
        // dd($users->name);
        // dd($users);
        if($users != null ){
            Session::put('name', $users->name);
            Session::put('id', $users->id);
            Session::put('login', 'login');
            Session::put('userImg', $users->userImage);
        
        // $leaves = Session::put('leaves',$leavestatus);
            return redirect('dashboard');
        }else{
            return redirect('/')->with('message','Either Id or password is incorrect');
        }
    }
    public function dashboard(){
        if(!Session('login')){
            return redirect('login');
        }
        $leavestatus = DB::table('leaveStatuses')
            ->where ('userId',Session('id'))
            ->get();

        return view('dashboard')->with('leavestatus',$leavestatus);

    }
    public function editUser(){

        $userDetails = DB::table('users')
            ->where ('user_id',Session('id'))
            ->first();
        return view('editUser')->with('userDetails',$userDetails);
    }

    public function editUserDetails(Request $request){
        $eId = $request->empId;
        $update = User::find($eId);
        $update->email = $request->email;
        $update->mobile = $request->mobile;
        $update->firstname =  $request->fname;
        $update->lastname  = $request->lname;
        $update->doj = $request->doj;
        $update->designation = $request->designation;
        $this->validate($request, [
            'userImg' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($request->hasFile('userImg')) {
            $image = $request->file('userImg');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            // return back()->with('success','Image Upload successfully');
            $update->userImage = $name;

            $oldImageName = Session("userImg");
            if (file_exists(public_path("images\\" . $oldImageName))){
                // dd("yes");
                unlink(public_path("images\\" . $oldImageName));
            }
            Session::put('userImg', $name);
        }
        $update->update();
    return redirect('editUser');

    }
}
