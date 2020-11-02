@extends('layout.base')

@section('content')
<div class="container mx-auto">
    <div class="row pt-10">
        <h1>View Freelancer: {{ $user->name }}</h1>
        <div class="w-full">
        	<p>Name: {{ $user->name }}</p>
        	<p>Email: {{ $user->email }}</p>
        	<p>Rate per hour: {{ $user->rate_per_hr }}</p>
        	<form action="{{ action([App\Http\Controllers\CurrencyController::class, 'show'], ['user' => $user->id]) }}" method="POST">
        		<div class="form-row-half">
		        	<label for="email">View rate per hour in a different currency</label>
						<select name="currency">
							<option value="GBP" {{ $user->currency === "GBP" ? "selected" : "" }}>GBP</option>
							<option value="EUR" {{ $user->currency === "EUR" ? "selected" : "" }}>EUR</option>
							<option value="USD" {{ $user->currency === "USD" ? "selected" : "" }}>USD</option>
						</select>
				</div>
				{{ csrf_field() }}
				<input type="submit" name="submit" value="Convert" class="btn">
			</form>
        </div>
		<div class="pt-5">
			<div class="icon-wrap">
				<div class="btn-back">
					<a href="{{ URL::previous() }}" title="Add new freelancer">
						<img src="{{ asset('/images/left-arrow.svg') }}" alt="Plus icon to add a freelancer profile">
					</a>
				</div>
				<h4 class="w-full mt-0 text-center">Go back</h4>
			</div>
		</div>
    </div>
</div>
@endsection