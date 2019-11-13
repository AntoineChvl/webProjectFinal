
@extends('layouts.master')

@section('content')

{{ $errors }}
<form method="POST" action="{{ $action=='create'? route('shop.product.store') : route('shop.product.update',$product)}}" enctype="multipart/form-data">
	{{$action}}
	@if($action!='create')
	@method('PATCH')
	@endif
	@csrf
	<input type="text" name="name" value="{{old('name')?? (isset($product) ? $product->name : '')}}">
	<input type="number" step="0.01" name="price" value="{{old('price')?? isset($product) ? $product->price : ''}}">
	<textarea name="description">{{old('description')?? isset($product) ? $product->description : ''}}</textarea>
	<input type="file" name="image" id="imageReadyToUpload">
	<img id="imagePreview"
	src="{{ isset($product)?asset('storage/imagesUploaded/'.$product->image->path):''}}">
	@foreach($categories as $category)
	<label for="{{ $category->id }}">{{ $category->name }}</label>
	<input id="{{ $category->id }}" type="checkbox" name="{{ $category->id }}" {{isset($product) ? $product->categories->contains($category)? 'Checked' : '' : ''}}>
	@endforeach
	<button type="submit">Submit</button>
</form>

@endsection

@push('script')
<script src="{{ asset('js/project-js/preview-image.js') }}"></script>
@endpush