<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Profile;
use Illuminate\Http\Request;

class PlanProfileController extends Controller
{
    protected $plan, $profile;

    public function __construct(Plan $plan, Profile $profile)
    {
        $this->plan = $plan;
        $this->profile = $profile;
        $this->middleware(['can:plans']);
    }

    /**
     * Chama tela com listagem das PERMISSOES de 
     * um PERFIL
     */
    public function profiles($idPlan)
    {
        $plan = $this->plan->find($idPlan);

        if (!$plan) {
            return redirect()->back();
        }

        $profiles = $plan->profiles()->paginate();

        return view('admin.pages.plans.profiles.profiles', [
            'plan' => $plan,
            'profiles' => $profiles
        ]);
    }

    /**
     * Chama tela com listagem dos PERFIS de 
     * uma PERMISSÃO
     */
    public function plans($idProfile)
    {
        $profile = $this->profile->find($idProfile);

        if (!$profile) {
            return redirect()->back();
        }

        $plans = $profile->plans()->paginate();

        return view('admin.pages.profiles.plans.plans', [
            'plans' => $plans,
            'profile' => $profile
        ]);
    }

    /**
     * Chama a Página de 
     * CADASTRO permissão ao perfil
     * FILTRO também tem a função de buscar por nome 
     * do perfil
     */
    public function profilesAvailable(Request $request, $idPlan)
    {
        $plan = $this->plan->find($idPlan);

        if (!$plan) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $profiles = $plan->profilesAvailable($request->filter);

        return view('admin.pages.plans.profiles.available', [
            'profiles' => $profiles,
            'plan' => $plan
        ]);
    }

    /**
     * Addicionar permissão ao perfil
     */
    public function attachprofilesProfile(Request $request, $idPlan)
    {
        $plan = $this->plan->find($idPlan);


        if (!$plan) {
            return redirect()->back();
        }

        if (!$request->profiles || count($request->profiles) == 0) {
            return redirect()
                ->back()
                ->with('infor', 'Precisa escolher pelo menos uma permissão.');
        }

        $plan->profiles()->attach($request->profiles);


        return redirect()->route('plans.profiles', $plan->id);
    }

    /**
     * DESVINCULAR permissão de perfil
     */
    public function detachPlanProfiles($idPlan, $idProfile)
    {
        $plan = $this->plan->find($idPlan);
        $profile = $this->profile->find($idProfile);

        if (!$plan || !$profile) {
            return redirect()->back();
        }

        $plan->profiles()->detach($profile);

        return redirect()->route('plans.profiles', $plan->id);
    }
}
