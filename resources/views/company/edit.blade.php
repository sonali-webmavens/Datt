@extends('app')

@section('content')
<div class="Container">
	<div class="row">
		<h2>Edit Details</h2>
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
	<form action="{{route('company.update',$company->id)}}" method="POST" enctype="multipart/form-data">
		@method("PUT")
		@csrf
		Name:<br/>
		<input type="text" name="name" value="{{$company->name}}" class="form-control">
		<br/>
		Email:<br/>
		<input type="text" name="email" value="{{$company->email}}" class="form-control">
		<br/>
		Logo:<br/>
		<input type="file" name="file" value="{{$company->logo}}" class="form-control">
		<br/>
		website:<br/>
		<input type="text" name="website" value="{{$company->website}}" class="form-control">
		<br/>
		<input type="submit" name="submit" value="submit" class="btn btn-primary" >
	</form>
</div>
</div>
</div>
@endsection('content')