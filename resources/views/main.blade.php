 


@extends('master')


@section('content')


<form action="{{URL::route('/send')}}" method="post">
<div class="form-group">
  <input name="name" type="hidden" value="" >

<label for="selectSupportType">Support on Duty</label>
<select name="user_details" id="selectSupportType" class="form-control">

  @foreach ($users as $users)



  @if($users->duty == $duty){



   <option value="{{$users->number}}"><b>{{$users->type_name}}</b> :      {{$users->name}} ( {{$users->number}} )
              



@endif
             
 

 </option>
 @endforeach 


</select>





    <label for="exampleInputEmail1">Message</label>
    <textarea name="message" class="form-control" rows="3"></textarea></div>
    
  <button type="submit" class="bn btn-primary">Submit</button>


 </form>

 <div>
 </div>



<br>




            <div class="table-responsive">            <table class="table">
            <thead>

                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Number</th>
                  <th>Type</th>
                  <th>Message</th>   
                  <th>Status</th>   
                               </tr>

              </thead>
              <tbody>              
               @foreach ($logs as $logs)
               <tr>
               <td>{{$logs->id}}</td>
                <td>{{$logs->name}}</td>
                 <td>{{$logs->user_details}}</td>
                  <td>{{$logs->type_name}}</td>
             <td>{{$logs->message}}</td>


             @if($logs->status=='Success') 


              <td><span class="label label-success">{{$logs->status}}</span></td>
             @else
             <td><span class="label label-warning">{{$logs->status}}</span></td>
              @endif
             </tr>

             @endforeach
              </tbody>
</table> 

        </div>

@stop
