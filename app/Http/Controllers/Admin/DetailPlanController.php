<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateDetailPlan;
use App\Http\Controllers\Controller;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    protected $repository, $plan;

    public function __construct(DetailPlan $detailPlan, Plan $plan)
    {
        $this->repository = $detailPlan;
        $this->plan = $plan;

        $this->middleware(['can:plans']);
    }

    /**
     * Acessa página inicial dos DETALHES DE UM PLANO
     */
    public function index($urlPlan)
    {

        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        //$details = $plan->details();
        //Paginacao
        $details = $plan->details()->paginate();

        return view('admin.pages.plans.details.index', [
            'plan' => $plan,
            'details' => $details
        ]);
    }

    /**
     * Chama a página com o formulario de cadastro 
     * PÁGINACADASTRAR NOVO DETALHE DO PLANO
     */
    public function create($urlPlan)
    {

        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.create', [
            'plan' => $plan
        ]);
    }

    /**
     * Cadastra os dados POST
     * NOVO DETALHE DO PLANO
     */
    public function store(StoreUpdateDetailPlan $request, $urlPlan)
    {
        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        $plan->details()->create($request->all());

        return redirect()->route('details.plan.index', $plan->url);
    }

    /**
     * Chama a página Edição 
     * PÁGINA EDITAR DETALHE DO PLANO
     */
    public function edit($urlPlan, $idDetail)
    {

        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if (!$plan || !$detail) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.edit', [
            'plan' => $plan,
            'detail' => $detail
        ]);
    }

    /**
     * Cadastra os dados UPDATE
     * ATUALIZA DETALHE DO PLANO
     */
    public function update(StoreUpdateDetailPlan $request, $urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if (!$plan || !$detail) {
            return redirect()->back();
        }


        $detail->update($request->all());

        return redirect()->route('details.plan.index', $plan->url);
    }

    /**
     * Chama a página De DETALHES
     */
    public function show($urlPlan, $idDetail)
    {

        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if (!$plan || !$detail) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.show', [
            'plan' => $plan,
            'detail' => $detail
        ]);
    }

    /**
     * DELETE
     * Deleta o detalhe do detalhe dos planos
     */
    public function destroy($urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if (!$plan || !$detail) {
            return redirect()->back();
        }


        $detail->delete();

        return redirect()
            ->route('details.plan.index', $plan->url)
            ->with('message', 'Registro deletado com sucesso');
    }
}
