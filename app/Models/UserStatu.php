<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStatu extends Model
{
    use HasFactory;
protected $guarded = [];

// Define a one-to-many relationship where multiple users belong to this model
public function users()
{
    return $this->hasMany(User::class);
}
}
