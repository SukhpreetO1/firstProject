<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class blogCategory extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'status'
    ];


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blog_category';

    // relationship with users
    public function blog()
    {
        return $this->hasMany(Blog::class);
    }
}
