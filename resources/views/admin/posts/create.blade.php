@extends('layouts.admin')


@section('content')
    <h1 class="iryekan"> مطلب جدید</h1>


    {!! Form::open(['method'=>'POST','action'=>'AdminPostsController@store','class'=>' iryekan form-horizontal ','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('title','موضوع:',['class'=>'control-label col-sm-3 ']) !!}
        {!! Form::text('title',null,['class'=>'form-control col-sm-6 ']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('path','تصویر شاخص :',['class'=>'control-label col-sm-3']) !!}
        {!! Form::file('path',['class'=>'form-control  btn-success iryekan col-sm-6']) !!}
    </div>
    <div class="form-group">
        {!!  Form::label('category_id','دسته:',['class'=>'control-label col-sm-3 ']) !!}
        {!! Form::select('category_id',$cats,null,['placeholder' => 'دسته...','class'=>'form-control col-sm-6 ']) !!}
    </div>
    <div class="form-group">
        {!!  Form::label('body','توضیحات:',['class'=>'control-label col-sm-3 iryekanfn']) !!}
        {!! Form::textarea('body',null,['class'=>'form-control col-sm-6 iryekanfn']) !!}
    </div>


    <div class="col-sm-offset-3">
        <div class="form-group">
            {!! Form::submit('ثبت',['class'=>'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
    @include('forms.form-errors')


@stop

