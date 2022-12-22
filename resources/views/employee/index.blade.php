@extends('app')

@section('content')
<style>
	.w-5{
		display: none;
	}
</style>
<div class="Container">
	<a href="{{route('employee.create')}}" class="btn btn-primary">add New Employee</a>
	<br/><br/>
	<table class="table">
		<tr>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>email</th>
			<th>phone</th>
			<th>action</th>
		</tr>
		@foreach($employees as $employee)
		<tr>
			<td>{{$employee->fname}}</td>
			<td>{{$employee->lname}}</td>
			<td>{{$employee->email}}</td>
			<td>{{$employee->phone}}</td>
			<td>
				<a href="{{route('employee.edit',$employee->id)}}" class="btn btn-warning">Edit</a>
				<form action="{{route('employee.destroy',$employee->id)}}" style="display:inline-block;" method="POST">
					@method('DELETE')
					@csrf
					<input type="submit" value="delete" class="btn btn-danger">
				</form>	
			</td>
		</tr>
		@endforeach
	</table>
	<div class="text-center mt-5">
		@if($employees->hasPages()) 
		{{ $employees->links() }} 
		@endif
	</div>
</div>
@endsection('content')
