@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <script>window.location.href = "{{ route('admin.dashboard') }}";</script>
@endsection
