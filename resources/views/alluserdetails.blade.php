@extends('layouts.app')

@section('content')
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
         <td><a href="{{ url('edit').'/'.$user->id}}">EDIT</a></td>
          </tr>
          @endforeach
        </tbody>
   </table>
   
   @endif
   @endsection
