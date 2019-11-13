@extends('layouts.master')


@section('content')
{{ $errors }}
<form method="POST" action="{{route('shop.product.store')}}">
	@csrf
	<input type="text" name="name">
	<input type="number" step="0.01" name="price">
	<textarea name="description"></textarea>
	<input type="file" name="image">
	<button type="submit">Submit</button>
</form>

@endsection
