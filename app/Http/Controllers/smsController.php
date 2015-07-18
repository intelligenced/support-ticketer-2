<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\logs;
use Input;

class smsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct(Logs $logs){

        $this->logs = $logs;


    }

    public function index()
    {
        $logs = new logs;
        $logs->user_details=Input::get('user_details');
        $logs->message=Input::get('message');
        $logs->status="Authentication Failure";
        $logs->save();

        $number=Input::get('user_details');


    $user = "intelligenced";
    $password = "cVSbKVTFDbKeOP";
    $api_id = "3548650";
    $baseurl ="http://api.clickatell.com";
 
    $text = urlencode("This is an example message");
    $to = "960".$number;

 /*
    // auth call
    $url = "$baseurl/http/auth?user=$user&password=$password&api_id=$api_id";
 
    // do auth call
    $ret = file($url);
 
    // explode our response. return string is on first line of the data returned
    $sess = explode(":",$ret[0]);
    if ($sess[0] == "OK") {
 
        $sess_id = trim($sess[1]); // remove any whitespace
        $url = "$baseurl/http/sendmsg?session_id=$sess_id&to=$to&text=$text";
 
        // do sendmsg call
        $ret = file($url);
        $send = explode(":",$ret[0]);
 
        if ($send[0] == "ID") {
            echo "successnmessage ID: ". $send[1];
        } else {
            echo "send message failed";

        }
    } else {
        echo "Authentication failure: ". $ret[0];
    }
*/

  return redirect('/');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
