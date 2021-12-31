<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPlan extends Model
{
    protected $table = 'details_plan';

    protected $fillable = ['name'];

    /**
     * Relacionamento do detalhe do plano com o PLANO
     * Um DETALHE DO PLANO pertence a um PLANO ESPECIFICO
     */
    public function plan()
    {
        $this->belongsTo(Plan::class);
    }
}
