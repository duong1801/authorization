<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Modules;
use Illuminate\Http\Request;
use App\Models\User;
class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::all();
        return view('admin.groups.list', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user();
        dd($user->name);
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        //
    }

    public function permission(Group $group)
    {

        $modules = Modules::all();
        $roleListArrr = [
            'view' => 'Xem',
            'add' => 'Thêm',
            'edit' => 'Sửa',
            'delete' => 'Xoá'
        ];
        // dd($group->permission);
        return view('admin.groups.permission', compact('group', 'modules', 'roleListArrr'));
    }

    public function postPermission(Group $group, Request $request)
    {

        if (!empty($request->role)) {
            $roleArr = $request->role;
        } else {
            $roleArr = [];
        }
//        dd($roleArr);
        $group->permission = $roleArr;
        $status = $group->save();

        if($status){
            $msg = "Phân quyền thành công";
            $msgType = 'success';
        }else{
            $msg = "Đã có lỗi xảy vui lòng kiểm tra";
            $msgType = 'danger';
        }

        return back()->with('msg', $msg)->with('msg_type', $msgType);
    }
}
