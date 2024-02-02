<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   

        $result['data'] = Users::all();
        return view('admin.userslist',$result);
    }

    public function delete(Request $request,$id)
    {
        $model = Users::find($id);
        $model->delete();
        $request->session()->flash('message','User Deleted');
        return redirect('admin/userslist');
    }


    public function status(Request $request,$status,$id)
    {
        $model = Users::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Status Updated');
        return redirect('admin/userslist');
      
    }
 

    public function insert(Request $request)
    {
        $request->validate([

            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'mobile'=>'required',
            'age'=>'required',
            'gender'=>'required',
            'city'=>'required',
            'state'=>'required'
        ]);
      
        $model =  new Users();
        $model->name=$request->post('name');
        $model->email=$request->post('email');
        $model->password=Hash::make($request->post('password'));
        $model->mobile=$request->post('mobile');
        $model->age=$request->post('age');
        $model->gender=$request->post('gender');
        $model->city=$request->post('city');
        $model->state=$request->post('state');
        $model->status=1;

        $model->save();
        session()->flash('success', 'Registration successful! Go to login page now');
        return redirect('/signup');
        

    }


    public function auth(Request $request)
    {
        $email=$request->post('email');
        $password=$request->post('password');
        
        // $result=Admin::where(['username'=>$username,'password'=>$password])->get();
        $result=Users::where(['email'=>$email])->first();

        if($result){
            if(Hash::check($request->post('password'),$result->password)){
                $request->session()->put('USER_LOGIN',true);
                 $request->session()->put('USER_ID',$result->id);
                 $request->session()->put('USER_NAME',$result->name);
                return redirect('user/dashboard');
            }else{
                $request->session()->flash('error','Enter valid password');
                return redirect('/');
            }
            
        }else{
            $request->session()->flash('error','Enter valid login details');
            return redirect('/');
        }
     
    }


    public function dashboard()
    {   

        $id = session('USER_ID');
        $result['data'] = Users::find($id);
        return view('user.dashboard',$result);
    }

    public function edit(Request $request, $id)
    {
        $arr=Users::where(['id'=>$id])->get();
        // echo "<pre>";
        // print_r($result['data']);
        // die();
        $result['id'] = $arr['0']->id;
        $result['name'] = $arr['0']->name;
        $result['email'] = $arr['0']->email;
        $result['mobile'] = $arr['0']->mobile;
        $result['age'] = $arr['0']->age;
        $result['gender'] = $arr['0']->gender;
        $result['city'] = $arr['0']->city;
        $result['state'] = $arr['0']->state;
        return view('user/edit',$result);
    }




    public function update(Request $request)
    {
        $id = $request->post('id');
        $request->validate([

            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$id,
            
            'mobile'=>'required',
            'age'=>'required',
            'gender'=>'required',
            'city'=>'required',
            'state'=>'required'
        ]);     
        
        
        $model = Users::find($id);

        $model->name=$request->post('name');
        $model->email=$request->post('email');       
       
        $model->mobile=$request->post('mobile');
        $model->age=$request->post('age');
        $model->gender=$request->post('gender');
        $model->city=$request->post('city');
        $model->state=$request->post('state');
        if ($request->has('password') && !empty($request->post('password'))) {
            $model->password = Hash::make($request->post('password'));
        }

        $model->save();
        session()->flash('success', 'Updated');
        return redirect('/user/dashboard');
        

    }
}
