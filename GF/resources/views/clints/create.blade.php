@extends('layouts.layout')

<!-- vsriable to save action for create -->
@php
$action= route('clints.store');
@endphp

@section('container')

     @include('clints.componats.templeedit')

@endsection 















