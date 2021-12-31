<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = [
        'cnpj', 'name', 'url', 'email', 'active', 'logo',
        'subscription', 'expires_at', 'subscription_id',
        'subscription_active', 'subscription_suspended'
    ];

    /**
     * Relacionamento USER x TENANT
     * Um tenant pode ter varios usuario e
     * um usuario esta relacionado diretamente com o 
     * tenant
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Relacionamento Tenant x Plan
     */
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
