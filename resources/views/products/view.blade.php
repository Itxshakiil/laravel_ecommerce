@extends('layouts.app')
@section('title')
{{ $product->name }}
@endsection
@section('content')
<div class="container mx-auto px-6 my-4">
    <form action="/search" method="get" class="w-full mb-4 text-right">
        <input
            class="w-48 px-3 py-2 text-sm leading-tight text-gray-700 border  rounded shadow appearance-none focus:outline-none @error('query') border-red-500 @enderror"
            id="query" type="search" name="query" placeholder="Search product" />
        @error('query')
        <p class="text-xs italic text-red-500" role="alert">{{ $message }}</p>
        @enderror
    </form>
    <div class="flex justify-center">
        <product-view :data="{{json_encode($product)}}"></product-view>
    </div>
</div>
@endsection