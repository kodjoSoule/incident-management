<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable = ['message', 'date', 'incident_id', 'created_by'];

    public function incident()
    {
        return $this->belongsTo(Incident::class);
    }

    public function administrateur()
    {
        return $this->belongsTo(Administrateur::class, 'created_by');
    }
}
