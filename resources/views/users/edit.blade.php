@extends('layout.base')

@section('content')
<div class="container mx-auto">
    <div class="row pt-10">
        <h1>Edit Freelancer: {{$user->name}}</h1>
        @include('/assets/form-errors')
       	<form action="{{ action([App\Http\Controllers\UserController::class, 'update'], ['user' => $user->id]) }}" method="POST">
            {{ method_field('PATCH') }}
			<label for="name">Name</label>
			<input type="text" name="name" value="{{ $user->name ? $user->name : '' }}" />
			<label for="email">Email</label>
			<input type="email" name="email" value="{{ $user->email ? $user->email : '' }}" />
			<div class="flex">
				<div class="flex-1 pr-1">
					<label for="email">Currency</label>
					<select name="currency">
						<option value="GBP" {{ $user->currency === "GBP" ? "selected" : "" }}>GBP</option>
						<option value="EUR" {{ $user->currency === "EUR" ? "selected" : "" }}>EUR</option>
						<option value="USD" {{ $user->currency === "USD" ? "selected" : "" }}>USD</option>
					</select>
				</div>
				<div class="flex-1 pl-1">
					<label for="email">Rate per hour</label>
					<input type="number" name="rate_per_hr" value="{{ $user->rate_per_hr }}" />
				</div>
			</div>
			{{ csrf_field() }}
			<input type="submit" name="submit" value="Update" class="btn">
		</form>
		<div class="pt-5 flex">
			<div class="icon-wrap">
				<div class="btn-back">
					<a href="{{URL::previous()}}" title="Add new freelancer">
						<img src="{{asset('/images/left-arrow.svg')}}" alt="Plus icon to add a freelancer profile">
					</a>
				</div>
				<h4 class="w-full mt-0 text-center">Go back</h4>
			</div>
			<div class="icon-wrap">
				<form id="form-delete-user" action="{{ action([App\Http\Controllers\UserController::class, 'destroy'], ['user' => $user->id]) }}" method="POST">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
				<div class="bin-icon cursor-pointer">
					<img src="{{asset('/images/bin-icon.svg')}}" alt="Plus icon to add a freelancer profile">
				</div>
				</form>
				<h4 class="w-full mt-0 text-center">Delete</h4>
			</div>
		</div>
    </div>
</div>
@endsection