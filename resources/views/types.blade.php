@extends('layouts.navbar')
@section('content')
    <br><br>
    <div class="headOfTypes">{{__('lang.milkdrinks')}}</div><br>
    <div class="customFlex">
        @for($i = 0; $i < 5; $i++)
        <div class="customCard">
            <img class="imgOfTypes" src="{{ $products[$i]->site }}" alt="">
            <div class ="textOfTypes">{{$products[$i]->name}}</div>
            <div class="buttonOfTypes">
                <div class="price">{{$products[$i]->price}}$</div>
                @foreach($cart as $product)
                    @if(Auth::check())
                        @if($product->user_id==Auth::user()->id)
                            @if($product->cart_id==$products[$i]->id)
                            <button class="btn btn-danger" type="submit" onClick="parent.location='http://127.0.0.1:8000/removeFromCart/{{$product->cart_id}}'">{{__('lang.remove')}}</button>
                            - {{$product->amount}} + 
                            @break
                            @endif
                        @endif
                    @else
                        @if($product->user_id==99)
                            @if($product->cart_id==$products[$i]->id)
                            <button class="btn btn-danger" type="submit" onClick="parent.location='http://127.0.0.1:8000/removeFromCart/{{$product->cart_id}}'">{{__('lang.remove')}}</button>
                            - {{$product->amount}} + 
                            @break
                            @endif
                        @endif
                    @endif    
                @endforeach
                <button class="btn btn-success" type="submit" onClick="parent.location='http://127.0.0.1:8000/addToCart/{{$products[$i]->id}}'">{{__('lang.add')}}</button>
            </div>
        </div>
        @endfor
    </div><br>
    <div class="headOfTypes">{{__('lang.alcohol')}}</div><br>
    <div class="customFlex">
        @for($i = 5; $i < 10; $i++)
        <div class="customCard">
            <img class="imgOfTypes" src="{{ $products[$i]->site }}" alt="">
            <div class ="textOfTypes">{{$products[$i]->name}}</div>
            <div class="buttonOfTypes">
                <div class="price">{{$products[$i]->price}}$</div>
                @foreach($cart as $product)
                    @if($product->cart_id==$products[$i]->id)
                        <button class="btn btn-danger" type="submit" onClick="parent.location='http://127.0.0.1:8000/removeFromCart/{{$product->cart_id}}'">{{__('lang.remove')}}</button>
                        - {{$product->amount}} + 
                    @break
                    @endif
                @endforeach
                
                <button class="btn btn-success" type="submit" onClick="parent.location='http://127.0.0.1:8000/addToCart/{{$products[$i]->id}}'">{{__('lang.add')}}</button>
            </div>
        </div>
        @endfor
    </div><br>
    <div class="headOfTypes">{{__('lang.coffee')}}</div><br>
    <div class="customFlex">
        @for($i = 10; $i < 15; $i++)
        <div class="customCard">
            <img class="imgOfTypes" src="{{ $products[$i]->site }}" alt="">
            <div class ="textOfTypes">{{$products[$i]->name}}</div>
            <div class="buttonOfTypes">
                <div class="price">{{$products[$i]->price}}$</div>
                @foreach($cart as $product)
                    @if($product->cart_id==$products[$i]->id)
                        <button class="btn btn-danger" type="submit" onClick="parent.location='http://127.0.0.1:8000/removeFromCart/{{$product->cart_id}}'">{{__('lang.remove')}}</button>
                        - {{$product->amount}} + 
                    @break
                    @endif
                @endforeach
                
                <button class="btn btn-success" type="submit" onClick="parent.location='http://127.0.0.1:8000/addToCart/{{$products[$i]->id}}'">{{__('lang.add')}}</button>
            </div>
        </div>
        @endfor
    </div><br>
    <div class="headOfTypes">{{__('lang.energydrinks')}}</div><br>
    <div class="customFlex">
        @for($i = 15; $i < 20; $i++)
        <div class="customCard">
            <img class="imgOfTypes" src="{{ $products[$i]->site }}" alt="">
            <div class ="textOfTypes">{{$products[$i]->name}}</div>
            <div class="buttonOfTypes">
                <div class="price">{{$products[$i]->price}}$</div>
                @foreach($cart as $product)
                    @if($product->cart_id==$products[$i]->id)
                        <button class="btn btn-danger" type="submit" onClick="parent.location='http://127.0.0.1:8000/removeFromCart/{{$product->cart_id}}'">{{__('lang.remove')}}</button>
                        - {{$product->amount}} + 
                    @break
                    @endif
                @endforeach
                
                <button class="btn btn-success" type="submit" onClick="parent.location='http://127.0.0.1:8000/addToCart/{{$products[$i]->id}}'">{{__('lang.add')}}</button>
            </div>
        </div>
        @endfor
    </div><br>
@stop
