@extends('layouts.admin')


@section('content')
<h1 class="iryekan">کاربران</h1>


<table class="table table-striped table-responsive iryekanfn fsxl ">
    <thead style="background: #337ab7;color: whitesmoke;" class="fsxl">
    <tr style="font-size: .8em;">
        <th>ردیف</th>
        <th></th>
        <th >اسم کاربر</th>
        <th>ایمیل</th>
        <th>دسترسی</th>
        <th>تاریخ عضویت</th>
        <th>تاریخ آپدیت</th>
        <th>فعال</th>
    </tr>
    </thead>
    <tbody>
    @if($users)
    @foreach($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td><img class="img-circle" width="40px" style="border: 3px solid #5d8aff" src="{{asset('/images/'.$user->photo->path)}}"></td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->role->name}}</td>
        <td>{{$user->created_at}}</td>
        <td>{{$user->updated_at}}</td>
        <td><img style="height: 10px;width: 10px; background:  {{($user->is_active ? 'green' : 'lightgray')}}; display: block" class="img-circle"></td>
    </tr>
@endforeach
        @endif
    </tbody>
</table>

    @stop
