
 <select name="type_id" class="form-control">

@foreach ($types as $types)
     <option value="{{$types->type_id}}">{{$types->type_name }}</a></td></option>
@endforeach 

 </select>




