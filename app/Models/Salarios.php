<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FonteDeRecurso;

class Salarios extends Model
{


    use HasFactory;

    protected $table = 'salarios';

    public function fonteDeRecurso()
    {
        return $this->belongsTo(FonteDeRecurso::class, 'fonte_de_recurso_id');

    }
}
