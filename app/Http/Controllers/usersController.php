<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Input;
use App\Users;
use Redirect;
use App\types;



class usersController extends Controller
{
    //

	public function __construct(Users $users){

		$this->users = $users;


	}



    public function index(types $types){

    	// $users =$this->users->get();

    	$types=$types->get();
      $users = DB::table('users')->join('types','users.type_id','=','types.type_id')->get();

      



    	return view('users.home',compact('users'),compact('types'));



    }





  public function edit(types $types,$user){

      	    	$users =$this->users->get();


      	    	$alltypes=$types->get();

      	$myusers=$user;
      	$myuser_id = $user->type_id;
      $mytypes=$types->where('type_id','=',$myuser_id)->get();

      for ($i = 0, $c = count($mytypes); $i < $c; ++$i) {
   					$realtypes=$mytypes[$i];

		}

		 for ($i = 0, $c = count($alltypes); $i < $c; ++$i) {
   					 $realalltypes=$alltypes[$i];



		}


		return view('users.edit',['users'=>$myusers],['types'=>$alltypes]) ;

     //return view('users.edit', ['users'=>$myusers],['selectedtypes'=>$realtypes],['realalltypes'=>$realalltypes]);

      //return view('users.edit',compact('$types')),,;




      	/*

    	$users =$this->users->get()->where();
    	    	$types=$types->get();

    	    	


     	return view('users.edit',compact('users'),compact('types'));*/

     



    }



    public function store(){

    	$user = new Users;
    	$user->name=Input::get('name');
    	$user->number=Input::get('number');
    	$user->duty=Input::get('duty');
    	$user->type_id=Input::get('type_id');
    	$user->save();

  return redirect('users');

    }


    public function typestore(types $types){

    	$types = new Types;
    	$types->type_name=Input::get('type_name');
    	$types->save();

  return redirect('users');

    }

      public function update(){

      	$id=Input::get('id');
      	$name=Input::get('name');
    	$number=Input::get('number');
    	$duty=Input::get('duty');
    	$type_id=Input::get('type_id');

      	$users =$this->users
      				->where('id',$id)
      				->update(
      					['name'=>$name,
      					'number'=>$number,
      					'duty'=>$duty,
      					'type_id'=>$type_id
      					]);

      	 return redirect('users');



    }


    public function delete(){
    	$id=Input::get('id');
    	$users =$this->users
      				->where('id',$id)
      				->delete();
       return redirect('users');



    }
 

    public function show(Users $users,$id){

    	$id= $this->users->find($id);

    	return $id;


    }

    public function types_home(types $types){

      $users =$this->users->get();
      $types=$types->get();
      $messages=' ';


      //return view('users.types',compact('users'),compact('types'));
      return view('users.types',['users'=>$users,'types'=>$types,'messages'=>$messages]) ;



    }

     public function types_delete(types $types,$rtypes){

      $users =$this->users->get();
      //$types=$types->get();




     $usercount=$this->users->where('type_id','=',$rtypes)->count();

    // dd($usercount);

      if($usercount == '0'){
        $messages="I am a banana";



        $id=$rtypes;

       // dd($types->where('type_id',$id));

      $types=$types->where('type_id',$id)->delete();
       return redirect('types');


         

        //dd(['messages'=>$messages,compact('users'),compact('types')]);
      return view('users.types',compact('types'),['messages'=>$messages]);

      }else{

              $types=$types->get();

        $messages='<div class="alert alert-warning alert-dismissible" role="alert">
      
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong> Warning!</strong> Users found,Cannot be deleted!
</div>';


      return view('users.types',compact('types'),['messages'=>$messages]);
}


    }



}
