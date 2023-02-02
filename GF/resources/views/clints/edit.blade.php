@extends('layouts.layout')

<!-- create action for edit form -->

@php
extract($clint);
$action = route('clints.update',$clintsNumber);
@endphp

<!-- edit page -->

@section('container')

    @include('clints.componats.templeedit')

@endsection