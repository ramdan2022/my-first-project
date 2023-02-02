@extends('layouts.layout')

@section('container')

<div>
@if($order_info)

<ul>
    <li>{{$order_info->clintsName}}</li>
    <li>{{$order_info->salesName}}</li>
    <li>{{$order_info->shippedDate}}</li>
</ul>
@endif

</div>

<!-- `productName` ,`productcode`,`productcode`,`priceEach` -->
<table class="table">
    <thead>
        <tr>
            <th>productCode</th>
            <th>priceEach</th>
        </tr>
    </thead>
    @php
    $finaltatal=0
    @endphp
    <tbody>
        @foreach($product as $item)

        @php
        $total = $item->quantityOrdered * $item->priceEach;
        $finaltatal +=$total;
        @endphp

      <tr>
        <td>{{$item->productCode}}</td>
         <td>{{$item->priceEach}}</td>
         <td>{{$total}}</td>
      </tr>
      @endforeach
      <tr class="table-dark">
        <td></td>
        <td></td>
        <td></td>
        <td>{{$finaltatal}}</td>
      </tr> 
    </tbody>
  </table>

  @endsection