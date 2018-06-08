<?php

namespace App\Http\Controllers;
ini_set('memory_limit', '-1');
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
     public function index()
     {

     	return view('pages.demo');
     }

     public function userform(Request $request)
     {


     	 $username = $_POST['username'];
     	 $password = md5($_POST['password']);
           $img = $request->file('img');
           $input['media_name'] = time().'.'.$img->getClientOriginalExtension();
 
          $destinationPath =public_path('/uploads');
         $image = $img->move($destinationPath,$input['media_name']);
      
         $ins =  DB::table('users')->insert(
                          ['username' => $username, 
                          'password' => $password,
                          'images'   => $input['media_name']
                     ]
                    );
          $sel = DB::table('users')->get();
         $data=[
                    'data1' => $sel
               ];

        

         return view('pages.demo',$data); 
               	  
     }

     public function editaction($id)
     {
           
          $user = DB::table('users')->where('id',$id)->first();
          $data=[
                    'data1' => $user
               ];

           return view('pages.edit',$data);
     }
     public function updateaction()
     {
           
          
         $id = $_POST['id'];
          $username = $_POST['username'];
          $password = $_POST['password'];

           DB::table('users')
            ->where('id', $id)
            ->update(['username' => $username, 'password' => $password]);

            return view('pages.demo');
     }

     public function loginpage()
     {
         return view('pages.loginpage');
     }

     public function loginUser()
     {
           $username = $_POST['username'];
           $password = ($_POST['password']);
           $data = array('username'=>$username,
                         'password'=>$password 
                    );
            
           $users = DB::table('users')->where($data)->first();

           if (isset($users)) {
               $msg = ['data1' => 'loged in SuccessFully'];
               return view('pages.loginpage', $msg);
           }
           else
           {
                $msg['data1'] = 'username or password inccorect';

                return view('pages.loginpage', $msg);
           }
            
         //   if (auth()->attempt(['username' => $username, 'password' => $password])) 
         // {
         //   echo "Login SuccessFull<br/>";;
         // } 
         // else 
         // {
         //      echo "Login Failed Wrong Data Passed";
         // }
     }
          
}
