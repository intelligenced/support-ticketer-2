<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Users;
use Carbon\Carbon;
use App\types;
use App\logs;


class mainController extends Controller
{
    //

	public function __construct(Users $users){

		$this->users = $users;


	}



    public function index(types $types, logs $logs){

    	$types=$types->get();
        //$logs=$logs->orderBy('created_at','desc')->take('5')->get();
        $messages='';


    	$users = DB::table('users')->join('types','users.type_id','=','types.type_id')->get();
        $logs = DB::table('logs')->join('users','users.number','=','logs.user_details') ->join('types','users.type_id','=','types.type_id')->orderBy('created_at','desc')->get();

    	$now = Carbon::now()->addHours('5');
    	$hour= $now->hour;

    	$int_hour=(int)$hour;
    	//$int_hour='8';


    	if( $int_hour < '7' or $int_hour > '18'){ $duty='1'; }else{ $duty='0'; }



 		
                   

    	// return $users;





    			 return view('main',['users'=>$users,'types'=>$types,'duty'=>$duty,'logs'=>$logs]) ;




    	// $mytypes=$types->where('type_id','=',$myuser_id)->get();
    	//return view('main',compact('users'),compact('types'));




    }

 
}
