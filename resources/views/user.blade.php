@extends('layout')
@section('title', 'Sales')
@section('content')
    <h2>Sales Transaction Page</h2>
    <ul>
        @foreach($sales as $sale)
            <li>{{ $sale }}</li>
        @endforeach
    </ul>
@endsection
