 
@extends('master')


@section('content')

<br>


<form class=form-inline action={{URL::route('/type/add')}} method="post">
<div class="form-group">
  <input name="type_name" type="text" class="form-control" placeholder="Staff Type">
  <button type="submit" class="btn btn-primary">Add Staff Type</button>
</div>  
</form><br>{!!$messages!!}<br>


            
            <table class="table">
            <thead>
            
                <tr>
                  <th>#</th>
                  <th>Types</th>
                  <th>Functions</th>
                </tr>

              </thead>
              <tbody>
              @foreach ($types as $types)
                <tr>
                <td>{{ $types->type_id }}</td>
                  <td>{{ $types->type_name }}</td>
                  <td><a href="/types/delete/{{ $types->type_id }}">Delete</a></td>
                
                </tr>
                @endforeach 

               
               
              </tbody>
</table> 


        </div>
    </div>

@stop