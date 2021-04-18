@extends('layouts.navbar')
@section('content')
    @if($message=Session::get('userUpdate'))
    <br>
        <div class="text-success alert-block text-center" id="update-success">
            <strong>Success</strong>
        </div><br>
    @endif
    <div class="container">
        <form action="/userUpdate" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="text" hidden class="col-sm-9 form-control" id="idUpdate" name="id" value="" />
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{__('lang.name')}}</label>
                    <div class="col-sm-9">
                        <input type="text" id="e_name" name="name" class="form-control" value="" required/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{__('lang.email')}}</label>
                    <div class="col-sm-9">
                        <input type="text" id="e_email" name="email" class="form-control" value="" required/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{__('lang.avatar')}}</label>
                    <div class="col-sm-9">
                        <input type="file" id="e_avatar" name="avatar" class="form-control" required/>
                    </div>
                </div>
                <button type="button" class="btn btn-danger" onClick="parent.location='http://127.0.0.1:8000/{{__('lang.locale')}}/profile'" style="margin-left: 850px">{{__('lang.back')}}</button>
                <button type="submit" id="" name="" class="btn btn-success waves-light" style="margin-left: 20px">{{__('lang.update')}}</button>
            </div>        
        </form>
    </div>
@stop