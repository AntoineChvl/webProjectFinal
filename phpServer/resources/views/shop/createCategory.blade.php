@extends('layouts.master')


@section('content')

{{ $errors }}
<form method="POST" action="{{route('shop.category.store')}}">
	@csrf
	<input type="text" name="name" value="{{old('name')??''}}">
	<button type="submit">Submit</button>
</form>

@endsection
