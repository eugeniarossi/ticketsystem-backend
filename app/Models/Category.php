<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // relazione one to many con ticket
    public function ticket() {
        return $this->hasMany(Ticket::class);
    }
}
