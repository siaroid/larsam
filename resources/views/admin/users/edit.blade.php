
@extends('layouts.admin')
@section('content')
    <img class="img-circle" width="60px" style="border: 3px solid #5d8aff" src="{{asset($user->photo_id)}}">
    <h1 class="iryekan fsxl">تغییر مشخصات کاربر</h1>








    {!! Form::model($user,['method'=>'PATCH','action' => ['AdminUsersController@update',$user->id],'class'=>'iryekan form-horizontal','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('name','نام کاربری :',['class'=>'control-label col-sm-3']) !!}
        {!! Form::text('name',null,['class'=>'form-control iryekan  col-sm-6']) !!}

    </div>
    <div class="form-group">
        {!! Form::label('email','ایمیل :',['class'=>'control-label col-sm-3']) !!}
        {!! Form::email('email',null,['class'=>'form-control iryekan  col-sm-6']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password','رمز عبور :',['class'=>'control-label col-sm-3']) !!}
        {!! Form::password('password',['class'=>'form-control iryekan  col-sm-6']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password-confirmation','تکرار رمز عبور :',['class'=>'control-label col-sm-3']) !!}
        {!! Form::password('password_confirmation',['class'=>'form-control iryekan col-sm-6']) !!}
    </div>
    <div class="form-group">

        {!! Form::label('role_id','سطح دسترسی :',['class'=>'control-label col-sm-3']) !!}
        {!! Form::select('role_id',$roles , null, ['placeholder' => 'سطح دسترسی...','class'=>'form-control iryekan col-sm-6',]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('path','تصویر پروفایل :',['class'=>'control-label col-sm-3']) !!}
        {!! Form::file('path',['class'=>'form-control  btn-success iryekan col-sm-6']) !!}
    </div>
    <div class="col-sm-offset-3">
        <div class="form-group">
            {!! Form::submit('ثبت',['class'=>'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @include('forms/form-errors')

@stop
