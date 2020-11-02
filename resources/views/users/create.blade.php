@extends('layout.base')

@section('content')
<div class="container mx-auto">
    <div class="row pt-10">
        <h1>List New Freelancer</h1>
        @include('/assets/form-errors')
       	<form action="{{ action([App\Http\Controllers\UserController::class, 'store']) }}" method="POST">
			<label for="name">Name</label>
			<input type="text" name="name" value="" />
			<label for="email">Email</label>
			<input type="email" name="email" value="" />
			<div class="flex">
				<div class="flex-1 pr-1">
					<label for="email">Currency</label>
					<select name="currency">
						<option value="GBP">GBP</option>
						<option value="EUR">EUR</option>
						<option value="USD">USD</option>
					</select>
				</div>
				<div class="flex-1 pl-1">
					<label for="email">Rate per hour</label>
					<input type="number" name="rate_per_hr" value="" />
				</div>
			</div>	
			<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
			<input type="submit" name="submit" value="Create" class="btn">
		</form>
		<div class="pt-5">
			<div class="icon-wrap">
				<div class="btn-back">
					<a href="{{URL::previous()}}" title="Add new freelancer">
						<img src="{{asset('/images/left-arrow.svg')}}" alt="Plus icon to add a freelancer profile">
					</a>
				</div>
				<h4 class="w-full mt-0 text-center">Go back</h4>
			</div>
		</div>
    </div>
</div>
@endsection