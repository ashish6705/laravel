<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Query\Builder;
use Illuminate\Contracts\Encryption\Encrypter;
//use App\Http\Controllers\Blog;

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
    public function index(Request $request)
    {
        // $name['username'] = Auth::user()->name;
        // $name['email'] = Auth::user()->email;
        // $name['username'] = Auth::user()->name;
        $data['data1'] = ['name'=>Auth::user()->name,
                 'email'=>Auth::user()->email,
                 'password'=>'**********',
                 'id'     => Auth::user()->id,
                    ];
                
        return view('home',$data);
    }

    public function gotochangepassword()
    {
        return view('changepassword');
    }

    public function chageyourpassword(Request $request)
    {
        $user=Auth::user();
        $cur_pass = $user->password;
        $current_password = Hash::check($request->input('current_password'),$cur_pass);
         $newpass  = $_POST['new_password'];
         if($current_password == TRUE)
         {
            $confirm_password = $request->input('confirm_password');

             $validator = Validator::make($request->all(), [
                'current_password'         => 'required| min:6',
            'confirm_password' => 'required|same:current_password' 
            ]);

               if ($validator->fails()) {
               
                return redirect('change')
                            ->withErrors($validator)
                            ->withInput();
            }
            else
            {

               $user->password = bcrypt($newpass);
               if($user->save())
               {
                return redirect('change')
                            ->withErrors('password changed')
                            ->withInput();
               }
               else
               {
                echo "i m in else";
               }
               
            }
         }
        else
        {
            return redirect('change')
                            ->withErrors('current password incorrect')
                            ->withInput();
        }
    }


    public function gotouserdetails()
    {

        $user=Auth::user();
        $all['data'] = $user->all();
       
         return view('alluserdetails',$all);
    }

    public function gotoedit($id)
    {
        $user=Auth::user();
        $getdata['data'] = $user->find($id);
         return view('edituser',$getdata);
    }

    public function updatedata(Request $request)
    {     
        
        $id         = $request->id; 
        $name       = $request->name;
        $password   = Hash::make($request->password);
        $email      = $request->email;
        $data       = array( 'name'    => $name,
                           'email'  => $email,
                           'password'  => $password,
                            );
 
       $query       = user::where('id', $id)->update($data);
       if($query == TRUE)
       {
            return redirect('userdetails')
                            ->withErrors('Data updated successfully')
                            ->withInput();
       }
    }

}
