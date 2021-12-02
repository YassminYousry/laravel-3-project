<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\task;
use Illuminate\Http\Request;

class admincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = admin::orderBy('id','desc')->get();
        return view('index',["raw" => $data ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request , [
            "name"        => "required|string",
            "email"       => "required|email", 
            "password"    => "required|min:6",
            ]);
     
         //    $image = time().'.'.$request->image->extension();  
         //    $request->image->storeAs('image', $image);
     
           $data['password'] = bcrypt($data['password']);
           $op = admin::create($data);
     
           if($op){
             $message = 'Raw Inserted';
           }else{
             $message = 'Error';
           }
     
           session()->flash('Message',$message);
           return redirect(url('/admin'));
       }   
     
// <input type ="hidden" name = "_method value="put">
// @method('put');
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
      $data = admin::find($id);

      return view('edit',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $this->validate($request,[
            "name"        => "required|string",
            "email"       => "required|email", 
        ]);
    
        $op = admin::where('id',$request->id)->update($data);
        
        if($op){
            $message ="Raw Updated";
        }else{
            $message = "Error Try Again";
        }
    
        session()->flash('Message',$message);
        return redirect(url('/admin'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
     public function destroy($id)
     {
        $op = users::where('id',$id)->delete();

        if($op){
            $message = "Raw Removed";
        }else{
            $message = "Error";
        }
    
        session()->flash('Message',$message);
        return redirect(url('/admin'));
    
     }


    public function login(){
        return view('login');
      }


      public function doLogin(Request $request){

        $data = $this->validate($request,[
                 "email"    => "required|email",
                 "password" => "required|min:6"
             
        ]);
      
        // logic login .... 
        if(auth('admin')->attempt($data)){
     
             return redirect(url('/profile'));
        }else{
          return redirect(url('/login'));
        }
     }
     
     
     public function logOut(){
     
        auth()->logout();
        return redirect(url('/login'));
     }



     public function task()
     {
        $raw = admin::get('id');
        return view('task',['id' => $raw]);
     }


     public function storetask(Request $request)
     {
          $data = $this->validate($request , [
             "title"         => "required|string",
             "description"   => "required|string", 
             "startdate"     => "required",
             "enddate"       => "required",
             "image"         => "required",
             "user_id"      => "required|numeric",
             ]);
      
          //    $image = time().'.'.$request->image->extension();  
          //    $request->image->storeAs('image', $image);
          
            $raw = admin::get($data);
            $op = task::create($data,['user_id' => $raw->id]);  
      
            if($op){
              $message = 'Raw Inserted';
            }else{
              $message = 'Error';
            }
      
            session()->flash('Message',$message);
            return redirect(url('/profile'));
        }   
      

        public function taskindex()
    {
        $data = task::orderBy('id','desc')->get();
        return view('profile',["raw" => $data ]);
    }
}
