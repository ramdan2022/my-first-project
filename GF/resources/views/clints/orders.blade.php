@extends('layouts.layout')

@section('container-fluid')
<!-- clint_number	order_unm	shippeddate	status	
 -->
 @isset($orders)
 <table class="table">
    <thead>
      <tr>
        <th>clintsNumber</th>
        <th>orderNumber</th>
        <th>shippedDate</th>
        <th>status</th>
      </tr>
    </thead>
@foreach($orders as $order)

    <tbody>
      <tr>
        <td>{{$order->clintsNumber}}</td>
      <td><a href="{{route('clints.order',[$order->orderNumber,$order->clintsNumber])}}">{{$order->orderNumber}}</a></td>
        <td>{{$order->shippedDate}}</td>
        <td>{{$order->status}}</td>
      </tr>    
      @endforeach
    </tbody>
  </table>
  @endisset
  @endsection
