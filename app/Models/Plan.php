<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['name', 'url', 'price', 'description'];

    /*********************************************************************
     * Relacionamento de um para muitos
     * Um plano pode ter varios detalhes
     */
    public function details()
    {
        return $this->hasMany(DetailPlan::class);
    }

    /**
     * Relecionamento entre PLAN x PROFILE
     */
    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    /**
     * Relecionamento entre PLAN x TENANTS
     */
    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }


    /*********************************************************************
     * Pesquisar plano por nome digitado 
     * no campo de pesquisa
     */
    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%{$filter}%")
            ->orWhere('description', 'LIKE', "%{$filter}%")
            ->paginate();

        return $results;
    }


    /**
     * Profiles not linked with this plan
     */
    public function profilesAvailable($filter = null)
    {

        $profiles = Profile::whereNotIn('id', function ($query) {
            $query->select('profile_id');
            $query->from('plan_profile');
            $query->whereRaw("plan_profile.plan_id={$this->id}");
        })
            ->where(function ($queryFilter) use ($filter) {
                if ($filter)
                    $queryFilter->where('profiles.name', 'LIKE', "%{$filter}%");
            })
            ->paginate();

        /*
        ->toSql();
        dd($profiles);
*/
        return $profiles;
    }
}
