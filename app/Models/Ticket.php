<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets'; // Specifica il nome della tabella

    protected $fillable = ['title', 'message_id', 'category', 'created_by', 'closed']; // Specifica i campi che possono essere assegnati in massa

    public function ticket() {
        return $this->belongsTo(Ticket::class);
    }
}