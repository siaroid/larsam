@extends('layouts.admin')
@if(Session::has('deleted_post'))
    <div style="font-size: 2em" class="alert-danger iryekan">{{session('deleted_post')}}</div>
@endif

@section('content')
<h1 class="iryekan">لیست مطالب</h1>

<table class="table table-striped table-responsive iryekanfn fsxl ">
    <thead style="background: #337ab7;color: whitesmoke;" class="fsxl">
    <tr style="font-size: .8em;">
        <th>ردیف</th>
        <th></th>
        <th >موضوع</th>
        <th>نویسنده</th>
        <th>دسته</th>
        <th>تاریخ درج</th>
        <th>تاریخ آپدیت</th>

    </tr>
    </thead>
    <tbody>
    @if($posts)
        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>
                    <img class="img-circle" width="40px" style="border: 3px solid #5d8aff" src="{{asset($post->photo_id) }}">

                </td>
                <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->title}}</a></td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->category->name}}</td>
                <td>{{$post->created_at->diffForhumans()}}</td>
                <td>{{$post->updated_at}}</td>

        @endforeach
    @endif
    </tbody>
</table>

    @stop
