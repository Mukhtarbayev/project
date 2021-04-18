@extends('layouts.navbar')
@section('content')
    <br>
    <div class="container">
        <img src="{{Auth::user()->avatar }}" alt="" width="400px" height="300px" style="border-radius:50%">
            <br>
            <br>
            <h4>{{__('lang.name')}}:&nbsp;&nbsp;&nbsp;&nbsp; {{ Auth::user()->name }}</h4>
            <br>
            <h4>{{__('lang.email')}}: &nbsp;&nbsp;&nbsp;&nbsp;{{ Auth::user()->email }}</h4>
            <br>
        <div class="container">
            <button class="btn btn-warning" onClick="parent.location='http://127.0.0.1:8000/{{__('lang.locale')}}/edit'" style="font-size: 20px">{{__('lang.edit')}}</button>
        </div>
    </div>
@stop