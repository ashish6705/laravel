@extends('layouts.app')

@section('content')
{{ Form::open(array('url' => '/update','method' => 'post','enctype' => 'multipart/form-data')) }}
<table>
	@if ($errors->any())
    <div style="color: red">
       
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        
    </div>
@endif
	@if(isset($data))
	<input type="hidden" name="id" value="{{$data->id}}">
	<tr>
		<td>Name :</td>
		<td><input type="text" name="name" value="{{$data->name}}"></td>
	</tr>
	<tr>
		<td>Password :</td>
		<td><input type="Password" name="password" value="{{$data->password}}"></td>
	</tr>
	<tr>
		<td>Email :</td>
		<td><input type="Email" name="email" value="{{$data->email}}"></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="" value="Update"></td>
	</tr>
	
</table>

@endif
{{ Form::close() }}
@endsection