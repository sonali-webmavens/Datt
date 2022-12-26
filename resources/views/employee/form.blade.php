@extends('app')

@section('content')
<div class="Container">
	<div class="row">
		<h2> Add New Employee</h2>
		@if ($errors->any())
    	<div class="alert alert-danger">
        	<ul>
            	@foreach ($errors->all() as $error)
                	<li>{{ $error }}</li>
            	@endforeach
        	</ul>
    	</div>
		@endif
	<div class="col-8"> 
	<form action= "{{route('employee.store')}}"  method="POST">
		@csrf
		FirstName:<br/>
		<input type="text" name="fname" value="{{old('fname')}}"class="form-control">
		<br/>
		
		LastName<br/>
		<input type="text" name="lname" value="{{old('lname')}}" class="form-control">
		<br/>

		Company id<br/>
		<select name="cid" class="form-control">
			@foreach($companies as $company)
			<option value="{{$company->id}}">{{$company->id}}</option>
			@endforeach
		</select>	
		<!-- <input type="number" name="cid" class="form-control"> -->
		<br/>

		Email:<br/>
		<input type="text" name="email" value="{{old('email')}}" class="form-control">
		<br/>

		Phone:<br/>
		<input type="number" name="phone" value="{{old('phone')}}" class="form-control">
		<br/>

		<input type="submit" name="submit" value="submit" class="btn btn-primary" >
	</form>
</div>
</div>
</div>
@endsection('content')
