<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['nim','name','faculty'];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
