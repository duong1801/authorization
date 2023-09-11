<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\Json;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'permission'];
    protected $casts = [
        'permission' => 'array',
    ];

    public function users() {
        return $this->hasMany(User::class);
    }
}
