<?php

namespace Database\Seeders;

use App\Models\Modules;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Modules::create([
            'name' => 'users',
            'title'=>'Quản lý người dùng'
        ]);
        Modules::create([
            'name' => 'groups',
            'title'=>'Quản lý nhóm'
        ]);
        Modules::create([
            'name' => 'posts',
            'title'=>'Quản lý bài viết'
        ]);
    }
}
