@extends('layout.base')

@section('content')

<div class="container mx-auto">
	<div class="row pt-5">
		<h1>View All Freelancers</h1>
		<div class="w-full table-header flex user-table-row">
			<div class="text-center col">
				<p>Name</p>
			</div>
			<div class="text-center col">
				<p>Email</p>
			</div>
			<div class="text-center col">
				<p>Currency</p>
			</div>
			<div class="text-center col">
				<p>Rate per hour</p>
			</div>
		</div>
		<div class="w-full user-table-row user-table-body">
			@foreach($users as $user)
				<div class="flex flex-wrap w-full">
					<div class="text-center col">
						<p>{{ $user->name }}</p>
					</div>
					<div class="text-center col">
						<p>{{ $user->email }}</p>
					</div>
					<div class="text-center col">
						<p>{{ $user->currency }}</p>
					</div>
					<div class="text-center col">
						<p>{{ $user->rate_per_hr }}</p>
					</div>
					<div class="text-center col-btn flex items-center">
						<a class="btn btn-edit" href="{{ route('users.edit', $user->id) }}">Edit</a>
					</div>
					<div class="text-center col-btn flex items-center">
						<a class="btn btn-show" href="{{ route('users.show', $user->id) }}">View</a>
					</div>
				</div>
			@endforeach
		</div>
		<div class="pt-5">
			<div class="icon-wrap">
				<div class="add-freelancer mx-auto">
					<a href="{{route('users.create')}}" title="Add new freelancer">
						<img src="{{ asset('/images/plus-icon.svg') }}" alt="Plus icon to add a freelancer profile">
					</a>
				</div>
				<h4 class="w-full text-center mt-0">Add new</h4>
			</div>
		</div>
	</div>
</div>

@endsection
