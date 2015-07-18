@extends('master')


@section('content')

<h2>{{$users->name}} 


</h2>



<form class="form-inline" action="{{URL::route('/users/update')}}" method="post">

<div class="form-group">
<input name ="id" type="hidden" value="{{$users->id}}">
  <input name="name" type="text" class="form-control" placeholder="Name" value="{{$users->name}}">
  <input name="number" type="tel" maxlength="7" class="form-control" placeholder="Ph" value="{{$users->number}}">
 <select name="type_id" class="form-control">
@foreach ($types as $types)
                  <option value="{{$types->type_id}}">{{$types->type_name }}</a></td></option>
 @endforeach 

 </select>


 <select name="duty" class="form-control">
      <option value="0">Day</option> 
        <option value="1">Night</option> 
</select>


</div>

    
  <button type="submit" class="btn btn-primary">Update User</button>


 </form><br><br>

 <form class="form-inline" action="{{URL::route('/users/delete')}}" method="post">
 <input name ="id" type="hidden"  value="{{$users->id}}">
<button type="submit" class="btn btn-primary">Delete User</button>
 </form>



@stop