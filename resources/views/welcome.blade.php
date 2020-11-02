@extends('layout.base')

@section('content')

<div class="container mx-auto">
    <div class="row pt-25">
        <h1 class="text-center w-full">Welcome to the Executives Place digital freelance site</h1>
        <p class="text-center w-full">Please <a href="{{route('users.index')}}">click here</a> to view our amazing range of freelancers</p>
    </div>
</div>

@endsection
