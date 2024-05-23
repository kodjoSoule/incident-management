<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'opendate', 'reported_by', 'assigned_to', 'responsible_id'];

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function rapporteur()
    {
        return $this->belongsTo(Rapporteur::class, 'reported_by');
    }

    public function responsable()
    {
        return $this->belongsTo(Responsable::class, 'responsible_id');
    }

    public function developpeur()
    {
        return $this->belongsTo(Developpeur::class, 'assigned_to');
    }
}
