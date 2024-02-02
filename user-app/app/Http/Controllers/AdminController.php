<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->session()->has('ADMIN_LOGIN')) {
            // User is authenticated, proceed with the request
            return redirect('/admin/userslist');
            
        } else {
            return view('admin.admin_login');
        }

        return view('admin.admin_login');
    }

    public function auth(Request $request)
    {
        $username=$request->post('username');
        $password=$request->post('password');
        
        // $result=Admin::where(['username'=>$username,'password'=>$password])->get();
        $result=Admin::where(['username'=>$username])->first();

        if($result){
            if(Hash::check($request->post('password'),$result->password)){
                $request->session()->put('ADMIN_LOGIN',true);
                 $request->session()->put('ADMIN_ID',$result->id);
                 $request->session()->put('ADMIN_NAME',$result->name);
                return redirect('admin/userslist');
            }else{
                $request->session()->flash('error','Enter valid password');
                return redirect('admin');
            }
            
        }else{
            $request->session()->flash('error','Enter valid login details');
            return redirect('admin');
        }
     
    }


    // public function update()
    // {
    //     $r=Admin::find(1);
    //     $r->password=Hash::make('admin');
    //     $r->save();
    // }

   
}
