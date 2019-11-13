@extends('layouts.master')


@section('content')

{{ $errors }}
<form method="POST" action="{{ $action=='create'? route('shop.product.store') : route('shop.product.update',$product)}}" enctype="multipart/form-data">
	@method('PATCH')
	@csrf
	<input type="text" name="name" value="{{old('name')?? $product ? $product->name : ''}}">
	<input type="number" step="0.01" name="price" value="{{old('price')?? $product ? $product->price : ''}}">
	<textarea name="description">{{old('description')?? $product ? $product->description : ''}}</textarea>
	<input type="file" name="image" id="imageReadyToUpload">
	<img id="imagePreview"
	src="{{ $product ? asset('storage/imagesUploaded/'.$product->image->path) : '' }}">
	<button type="submit">Submit</button>
</form>

@endsection

@push('script')
    <script src="{{ asset('js/project-js/preview-image.js') }}"></script>
@endpush