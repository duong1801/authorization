@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Danh sách nhóm quyền</h1>
@stop

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên nhóm</th>
            <th scope="col">Phân Quyền</th>
            <th scope="col">Sửa</th>
            <th scope="col">Xoá</th>
        </tr>
        </thead>
        <tbody>
        @foreach($groups as $group)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$group->name}}</td>
            <td>
                <a href="{{route('admin.groups.permission',$group)}}"><button class="btn btn-primary">Phân quyền</button></a>
            </td>
            <td><button class="btn btn-warning">Sửa</button></td>
            <td><button class="btn btn-danger">Xoá</button></td>
        </tr>
        @endforeach
        </tbody>
    </table>
@stop

@section('css')

@stop

@section('js')

@stop
