@extends('app')

@section('content')
<style>
	.w-5{
		display: none;
	}
</style>
<div class="Container">
	<a href="{{route('company.create')}}" class="btn btn-primary">Add new company</a>
	<br/><br/>
	<table class="table">
		<tr>
			<th>name</th>
			<th>email</th>
			<th>logo</th>
			<th>website</th>
			<th>action</th>
		</tr>
		@foreach($companies as $company)
		<tr>
			<td>{{$company->name}}</td>
			<td>{{$company->email}}</td>
			<td><img src="{{ asset('storage/images/'.$company->logo) }}" width="70" height="70"></td>
			<td>{{$company->website}}</td>
			<td>
				<a href="{{route('company.edit',$company->id )}}" class="btn btn-warning">Edit</a>
				<form action="{{route('company.destroy',$company->id)}}" style="display:inline-block;" method="POST">
					@method('DELETE')
					@csrf
					<input type="submit" value="delete" class="btn btn-danger">
				</form>	 
			</td>
		</tr>
		@endforeach
	</table>
	<div class="text-center mt-5">
		@if ($companies->hasPages()) 
		{{ $companies->links() }} 
		@endif

	</div>
</div>
@endsection('content')
