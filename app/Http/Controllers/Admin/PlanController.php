<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\http\Requests\StoreUpdatePlan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
        $this->middleware(['can:plans']);
    }

    /**************************************************************
     * Acessa página INICIAL dos planos
     */
    public function index()
    {
        $plans = $this->repository->latest()->paginate();

        return view('admin.pages.plans.index', [
            'plans' => $plans
        ]);
    }

    /**************************************************************
     * Acessa página de CADASTRO dos planos
     */
    public function create()
    {
        return view('admin.pages.plans.create');
    }

    /**************************************************************
     * RECEBE POST formulario cadastro planos
     */
    public function store(StoreUpdatePlan $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('plans.index');
    }

    /**************************************************************
     * Abre os DETALHES de um plano
     */
    public function show($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        return view('admin.pages.plans.show', [
            'plan' => $plan
        ]);
    }

    /**************************************************************
     * DELETE = excluir plano 
     */
    public function destroy($url)
    {
        $plan = $this->repository
            ->with('details') //traz os dados relacionados
            ->where('url', $url)
            ->first();

        if (!$plan) {
            return redirect()->back();
        }

        if ($plan->details->count() > 0) {
            return redirect()
                ->back()
                ->with('error', 'Existem detalhes vinculados a esse plano, portanto não pode deletar');
        }

        $plan->delete();

        return redirect()->route("plans.index");
    }

    /**************************************************************
     * PESQUISA POR NOME 
     */
    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $plans = $this->repository->search($request->filter);

        return view('admin.pages.plans.index', [
            'plans' => $plans,
            'filters' => $filters
        ]);
    }

    /**************************************************************
     * EDITAR plano
     */
    public function edit($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        return view('admin.pages.plans.edit', [
            'plan' => $plan
        ]);
    }


    public function update(StoreUpdatePlan $request, $url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        $plan->update($request->all());

        return redirect()->route('plans.index');
    }
}
