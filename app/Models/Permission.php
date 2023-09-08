<?php

namespace App\Models;

use App\Helpers\Model\WithUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory, WithUuid;

    protected $guarded = ['id'];
}
