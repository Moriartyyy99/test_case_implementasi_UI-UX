@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    @if ($role == 'manager')
        @include('dashboards.manager')
    @elseif ($role == 'staff')
        @include('dashboards.staff')
    @elseif ($role == 'finance')
        @include('dashboards.finance')
    @else
        @include('dashboards.owner')
    @endif
@endsection