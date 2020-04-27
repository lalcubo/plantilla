<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermisosUser extends Model
{
    protected $table = 'permission_user';
    protected $fillable = [
        'permission_id', 'user_id'];
}
