@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Danh sách bài viết</h1>
@stop

@section('content')
    @can('create', App\Models\Post::class)
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary my-4">Thêm bài viết</a>
    @endcan
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Người đăng</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xoá</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $post->title }}</td>
                    <td>
                        {{ $post->user->name }}
                    </td>
                    <td>

                        <a href="{{ route('admin.posts.edit', $post) }}">
                            <button
                                @cannot('update', $post)
                            disabled
                            @endcannot
                                class="btn btn-warning">Sửa</button>
                        </a>
                        {{-- @endcan --}}
                    </td>
                    <td>
                        <form method="post" action="{{ route('admin.posts.destroy', $post) }}">
                            @method('delete')
                            @csrf
                            <button
                                @cannot('delete', $post)
                            disabled
                            @endcannot
                                class="btn btn-danger" type="submit">Xoá</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')

@stop

@section('js')

@stop
