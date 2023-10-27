<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';

    protected $fillable = ['title', 'message_id', 'category', 'created_by', 'closed']; 

    // relazione one to many con message
    public function message() {
        return $this->hasMany(Message::class);
    }

    // relazione many to one con category
    public function category() {
        return $this->belongsTo(Category::class);
    }
    
}