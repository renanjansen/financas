<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutrasFontes extends Model
{
    use HasFactory;



    protected $table = 'outras_fontes';

    public function fonteDeRecurso()
    {
        return $this->belongsTo(FonteDeRecurso::class, 'fonte_de_recurso_id');

    }
}
