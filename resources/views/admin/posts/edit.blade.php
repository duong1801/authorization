@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sửa bài viết</h1>
@stop

@section('content')
    <div class="col-8">
        <form method="post" action="{{ route('admin.posts.update', $post) }}">
            @method('PUT')
            @csrf
            <div class="form-group mt-3">
                <label for="title">Tiêu đề bài viêt</label>
                <input type="text" name="title" value="{{ $post->title }}" class="form-control">
            </div>
            <div class="form-group mt-3">
                <label for="title">Nội dung bài viết</label>
                <input type="text" value="{{ $post->content }}" name="content" class="form-control">
            </div>
            <button class="btn btn-primary" type="submit">Sửa</button>
        </form>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
