 
@extends('master')


@section('content')

<form class="form-inline" action="{{URL::route('/users/add')}}" method="post">
<div class="form-group">
  <input name="name" type="text" class="form-control" placeholder="Name">
  <input name="number" type="tel" maxlength="7" class="form-control" placeholder="Ph">
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

    
  <button type="submit" class="btn btn-primary">Create User</button>


 </form>
<br>




            
            <table class="table">
            <thead>
            
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Phone Number</th>
                  <th>Type</th>
                  <th>Duty</th>
                </tr>

              </thead>
              <tbody>
              @foreach ($users as $users)
                <tr>
                <td>{{ $users->id  }}</td>
                  <td><a href="/users/{{ $users->id }}">{{ $users->name }}</a></td>
                  <td>{{ $users->number }}</td>
                  <td>{{ $users->type_name }}
                  <td>
                  @if($users->duty==='1')
                
                    Night

                    @else
                    Day
                    @endif

                  </td>
                  
                </tr>
                @endforeach 

               
               
              </tbody>
</table> 


        </div>
    </div>

@stop