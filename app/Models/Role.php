<?php

namespace App\Models;

use App\Helpers\Model\WithUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory, WithUuid;

    protected $guarded = ['id'];

    public function rolePermissions()
    {
        return $this->hasMany('App\Models\Permission', 'role_id', 'uuid');
    }
    public function users()
    {
        return $this->hasMany('App\Models\User', 'role_id');
    }
}
