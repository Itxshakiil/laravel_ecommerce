@extends('layouts.app')

@section('content')
<div class="container mx-auto flex justify-center px-6 my-12">
    <div class="w-full lg:w-1/2 bg-gray-100 p-5 rounded-lg lg:rounded-l-none">
        <h3 class="pt-4 text-2xl text-center">Dashboard!</h3>
        <div class="card-body">
            @if (session('status'))
            <div class="bg-yellow-100 text-yellow-700 border-yellow-400 border px-4 py-3 my-2 rounded" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <h4 class="text-lg text-center text-gray-800">You are logged in as User!</h4>
        </div>
    </div>
</div>
@endsection