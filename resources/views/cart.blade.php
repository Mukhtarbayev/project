@extends('layouts.navbar')
@section('content')
    <br>
    <div class="headOfTypes">{{__('lang.cart')}}</div><br>
    <div class="elementcount">{{__('lang.totalements')}} : {{$elements}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{__('lang.totalprice')}} : {{$totalPrice}}$</div><br>
    <div class="customFlex">
        @for($i = 0; $i < count($cart); $i++)
        <div class="customCard">
            <img class="imgOfTypes" src="{{ $products[$cart[$i]->cart_id-1]->site }}" alt="">
            <div class ="textOfTypes">{{$products[$cart[$i]->cart_id-1]->name}}</div>
            <div class="buttonOfTypes">
                <div class="price">{{__('lang.amount')}}:{{$cart[$i]->amount}}&nbsp;&nbsp;{{__('lang.price')}}:{{$products[$cart[$i]->cart_id-1]->price * $cart[$i]->amount}}$</div>
                <button class="btn btn-danger" type="submit" onClick="parent.location='http://127.0.0.1:8000/removeFromCart/{{$cart[$i]->cart_id}}'">{{__('lang.remove')}}</button>
            </div>
        </div>
        @endfor
    </div><br>
    @if(count($cart)>0)
    <br>
        <div class="buttonOfTypes"><button class="btn btn-success">{{__('lang.buy')}}</button></div>
    <br>
    @endif
@stop