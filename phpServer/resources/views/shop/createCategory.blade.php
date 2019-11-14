@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - Création de produit
@endsection

@section('head-title')
    BDE Saint-Nazaire - Création de catégories
@endsection

@section('head-meta-description')
    Page de création/modification des catégories directement disponibles
@endsection

@section('content')

{{ $errors }}
<form method="POST" action="{{route('shop.category.store')}}">
	@csrf
	<input type="text" name="name" value="{{old('name')??''}}">
	<button type="submit">Submit</button>
</form>

@endsection
