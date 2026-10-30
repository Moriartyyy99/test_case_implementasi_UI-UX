@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    @if ($role == 'manager')
        @include('projects.manager')
    @elseif ($role == 'staff')
        @include('projects.staff')
    @elseif ($role == 'finance')
        @include('projects.finance')
    @else
        @include('projects.owner')
    @endif
@endsection