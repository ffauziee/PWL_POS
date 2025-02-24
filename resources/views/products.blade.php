@extends('layout')
@section('title', 'Products')
@section('content')
    <h2>Category: {{ $category }}</h2>
    <ul>
        @foreach($items as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>
@endsection