@extends('layouts.master')


@section('content')

<form method="POST" action="{{route('shop.product.store')}}">
	<input type="text" name="name">
	<input type="number" name="price">
	<textarea name="description"></textarea>
	<input type="file" name="image">
</form>

@endsection
