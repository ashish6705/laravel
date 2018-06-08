{{ Form::open(array('url' => '/chngepassword','method' => 'post')) }}
<table>
	@if ($errors->any())
    <div style="color: red">
       
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        
    </div>
@endif

	<tr>
		<td>Current Password</td>
		<td><input type="text" name="current_password"></td>
	</tr>
	<tr>
		<td>Confirm Password</td>
		<td><input type="text" name="confirm_password"></td>
	</tr>

	<tr>
		<td>New Password</td>
		<td><input type="text" name="new_password"></td>
	</tr>
	<td></td>
	<td><input type="submit" value="Change Password"></td>
</table>
{{ Form::close() }}
