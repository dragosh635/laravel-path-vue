@extends('layouts.app')
@section('title',' - Creating')
@section('content')
    <h1>Categories</h1>
    <category-manager :initial-categories="{{ $categories }}"></category-manager>
@endsection
