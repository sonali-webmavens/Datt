@extends('app')

@section('content')
<div class="Container">
	<div class="row">
		<h2> Add new Company</h2>

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
	<form action= "{{route('company.store')}}"  method="POST" enctype="multipart/form-data">
		@csrf
		Name:<br/>
		<input type="text" name="name" value="{{old('name')}}" class="form-control" required>
		<br/>
		Email:<br/>
		<input type="text" name="email" value="{{old('email')}}" class="form-control" required>
		<br/>
		Logo:<br/>
		<input type="file" name="file" value="{{old('file')}}" class="form-control">
		<br/>
		website:<br/>
		<input type="text" name="website" value="{{old('website')}}" class="form-control">
		<br/>
		<input type="submit" name="submit" value="submit" class="btn btn-primary" >
	</form>
</div>
</div>
</div>
@endsection('content')
