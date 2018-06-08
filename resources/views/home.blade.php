@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                  <b>{{$data1['name']}}</b>  You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <a href="{{ url('userdetails')}}">Go To Users Deatails</a>
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
          <tr class="success">
            @if(isset($data1))
            <td>{{$data1['name']}}</td>
            <td>{{$data1['email']}}</td>
            <td><b>{{$data1['password']}}</b></td>
            <td><a href="{{ url('change')}}">Change Password</a></td>
            @endif
          </tr>
        </tbody>
   </table>
</div>
@endsection
