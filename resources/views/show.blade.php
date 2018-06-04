@extends('template')

@section('contenu')
    <div class="col-sm-offset-4 col-sm-4">
    	<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">User details</div>
			<div class="panel-body"> 
				<p>Name : {{ $user->name }}</p>
				<p>Mail : {{ $user->email }}</p>
				@if($user->admin == 1)
					Administrator
				@endif
			</div>
		</div>				
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Back
		</a>
	</div>
@endsection
