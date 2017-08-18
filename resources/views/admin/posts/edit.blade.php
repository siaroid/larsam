@extends('layouts.admin')


@section('content')
    <img width="100px" src="{{asset($post->photo_id)}}">
    <h1 class="iryekan">ویرایش مطالب</h1>

    {!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id],'class'=>' iryekan form-horizontal ','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('title','موضوع:',['class'=>'control-label col-sm-3 ']) !!}
        {!! Form::text('title',$post->title,['class'=>'form-control col-sm-6 ']) !!}
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
        {!!  Form::label('user_id','نویسنده:',['class'=>'control-label col-sm-3 ']) !!}
        {!! Form::select('user_id',$auth,null,['placeholder' => 'دسته...','class'=>'form-control col-sm-6 ']) !!}
    </div>
    <div class="form-group">
        {!!  Form::label('body','توضیحات:',['class'=>'control-label col-sm-3 iryekanfn']) !!}
        {!! Form::textarea('body',$post->body,['class'=>'form-control col-sm-6 iryekanfn']) !!}
    </div>


    <div class="col-sm-offset-3">
        <div class="form-group">
            {!! Form::submit('ثبت',['class'=>'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
    {!! Form::open(['method'=>'DELETE','action' => ['AdminPostsController@destroy',$post->id],'class'=>'iryekan form-horizontal']) !!}
    <div class="col-sm-offset-3">
        <div class="form-group">
            {!! Form::submit('حذف',['class'=>'btn btn-danger']) !!}
        </div>
    </div>
    {!! Form::close() !!}
    @include('forms.form-errors')
@stop
