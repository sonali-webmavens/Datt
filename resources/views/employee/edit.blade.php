@extends('app')

@section('content')
<div class="Container">
	<div class="row">
		<h2>Edit Your Details</h2>
		@if ($errors->any())
    	<div class="alert alert-danger">
        	<ul>
            	@foreach ($errors->all() as $error)
                	<li>{{ $error }}</li>
            	@endforeach
        	</ul>
    	</div>
		@endif
		<br/><br/>
	<div class="col-6"> 
	<form action= "{{route('employee.update',$employee->id)}}"  method="POST">
		@method('PUT')
		@csrf
		FirstName:<br/>
		<input type="text" name="fname" value="{{$employee->fname}}" class="form-control">
		<br/>
		
		LastName<br/>
		<input type="text" name="lname" value="{{$employee->lname}}" class="form-control">
		<br/>

		Company id<br/>
		<select name="cid" class="form-control">
			@foreach($companies as $company)
			<option value="{{$company->id}}" @if($company->id == $employee->company) selected @endif>{{$company->name}}</option>
			@endforeach
		</select>	


		<!-- Company id<br/>

		<input type="number" name="cid" value="{{$employee->company}}" class="form-control">
		<br/> -->

		Email:<br/>
		<input type="text" name="email" value="{{$employee->email}}" class="form-control">
		<br/>

		Phone:<br/>
		<input type="number" name="phone" value="{{$employee->phone}}"  class="form-control">
		<br/>

		<input type="submit" name="submit" value="submit" class="btn btn-primary" >
	</form>
</div>
</div>
</div>
@endsection('content')