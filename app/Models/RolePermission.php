<?php

namespace App\Models;

use App\Helpers\Model\WithUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RolePermission extends Model
{
    use HasFactory, WithUuid;

    protected $guarded = ['id'];

    public function permission()
    {
        return $this->hasOne('App\Models\Permission', 'uuid', 'permission_id');
    }
}
