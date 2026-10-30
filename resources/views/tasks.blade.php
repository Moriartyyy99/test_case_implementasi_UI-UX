@extends('layouts.app')

@section('title', 'Tasks')

@section('content')
    @if ($role == 'manager')
        @include('tasks.manager')
    @elseif ($role == 'staff')
        @include('tasks.staff')
    @else
        @include('tasks.owner')
    @endif
@endsection