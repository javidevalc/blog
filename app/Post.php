<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Post extends Model
{
    //
    use HasRoles;

    protected $fillable = ['title', 'description'];

}
