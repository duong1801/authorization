@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Phân quyền nhóm: {{$group->name}}</h1>
@stop

@section('content')
    @if(session('msg') && session('msg_type'))
        <div class="alert alert-{{session('msg_type')}}">
           {{session('msg')}}
        </div>
    @endif
    <form method="post">
        <table class="table">
            <thead>
            <tr>
                <th scope="col" width="20%">Module</th>
                <th scope="col">Quyền</th>

            </tr>
            </thead>
            <tbody>
            @if($modules->count()>0)
                @foreach($modules as $module)
                    <tr>
                        <td>{{$module->title}}</td>
                        <td>
                            <div class="row">
                                @if(!empty($roleListArrr))
                                    @foreach($roleListArrr as $roleName => $roleLabel)
                                        <div class="col-2">
                                            <label for="role_{{$module->name}}_{{$roleName}}">{{$roleLabel}}</label>
                                            <input type="checkbox" name="role[{{$module->name}}][]"
                                                   id="role_{{$module->name}}_{{$roleName}}"
                                                   value="{{$roleName}}" {{ isRole($group->permission,$module->name,$roleName)?'checked':false }}/>
                                        </div>
                                    @endforeach
                                @endif
                                @if($module->name == 'groups')
                                    <div class="col-2">
                                        <label for="role_{{$module->name}}_permission">Phân quyền</label>
                                        <input type="checkbox" value="permission"
                                               name="role[{{$module->name}}][]"
                                               {{ isRole($group->permission,$module->name,'permission')?'checked':false }}
                                               id="role_{{$module->name}}_permission">
                                    </div>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Phân quyền</button>
        @csrf
    </form>
@stop

@section('css')

@stop

@section('js')

@stop
