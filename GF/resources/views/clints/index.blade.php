@extends('layouts.layout')

@section('container')
<h1 class="d-flex justify-content-between">
    @isset($country)
    <a href="{{ route('clints.index') }}"><i class="fa fa-hand-o-left"></i></a>
   @endisset
    all clints    
    @isset($country)
    In {{$country}}
    @endisset

<span>
   <a href="{{route('clints.create')}}" class="btn btn-info">ADD CUSTOMER
       <i class="fa fa-plus"></i>
        </a>
</span>



</h1>

@isset($clints)
<ul class="list-group">
    @foreach($clints as $clint)
    <li class="list-group-item d-flex justify-content-between">
        
        <span >
            <a href="{{ route('clints.show',$clint->clintsNumber )}}"class="text-decoration-none">
                {{$loop->iteration}} - {{$clint->clintsName}}</a>
            </span>

            @empty($country)
            <span>
                <a href="{{route('clints.country',$clint->country)}}"class="text-decoration-underline">
                    {{$clint->country}}</a>
                </span>
            @endempty    
            </li>
            @endforeach   
        </ul>

       
           
        
     <div class="paginator">
      {{--  {{$clints->links()}}   --}}
 </div>
@endisset
<!--  {{-- {{ $customers->links() }} --}} -->

@endsection