@extends('layouts.layout')

@section('container')

    @php

    extract($clint);

    isset($sales) && extract($sales);

    @endphp
    
    <h1>
        <a href="{{route('clints.index')}}"><i class="fa fa-hand-o-left" style=color:red"></i></a>
        <span> {{$clintsName}} </span>
    </h1>

    @isset($msg)
        {{$msg}}
    @endisset
    
<div class="card">
    <div class="card-header">
    
    @isset($firstName)
        {{$firstName}} {{$lastName}}
    @else
    no sales for this clint
    @endisset    
    </div>

    <div class="card-body">
        <pre>
        {{$addressLine1}}
        {{$addressLine2}}
        {{$city}}
        {{$postalCode}}
        <a href="{{route('clints.country',$country)}}">{{$country}}</a>
</pre>
    </div> 

    <div class="card-footer">
    num of orders:{{$CountOrders}}
    \\\pices:{{$pices}}
    \\\first_order_on:{{$first_order_on}}
    \\\total:{{$total}}
        <a href="{{route('clints.orders',$clintsNumber)}}">list</a>

    <div>
        <a href="{{route('clints.edit',$clintsNumber)}}">
           <i class="fa fa-edit" style="font-size:36px"></i>
        </a>

     <div>
         @if($clintdel == 0)
            <form method="POST" action="{{route('clints.destroy',$clintsNumber)}}">
            @csrf
            @method('delete')
               <button>
                  <i class="fa fa-trash-o" style="font-size:36px"></i>
               </button>
            </form>
        @else
            <a href="{{route('clints.restore',$clintsNumber)}}">
                <i class='fas fa-trash-restore-alt'></i>
                    restore
            </a>
        @endif
      </div>


    </div>
  </div>




@endsection
