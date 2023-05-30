<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;

class Roles extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
