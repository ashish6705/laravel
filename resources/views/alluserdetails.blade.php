@extends('layouts.app')


@section('content')
@if(session()->has('message'))


<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{ session()->get('message') }}
  </div>



@endif
@if ($errors->any())
    <div style="color: red">
       
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        
    </div>
@endif
@if(isset($data))

   

<table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody> 
          @foreach ($data as $user)
          <tr class="success">
         <td>{{$user->name}}</td>
         <td>{{$user->email}}</td>
         <td>{{$user->password}}</td>
         <td><a href="{{ url('edit').'/'.$user->id}}">EDIT</a>/<a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{url('delete').'/'.$user->id}}">DELETE</a></td>
          </tr>
          @endforeach
        </tbody>
   </table>
   
   @endif
   @endsection
