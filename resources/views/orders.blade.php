@extends('layouts.app')

@section('title', 'Orders')

@section('content')
    @if ($role == 'manager')
        @include('orders.manager')
    @elseif ($role == 'finance')
        @include('orders.finance')
    @else
        @include('orders.owner')
    @endif
@endsection