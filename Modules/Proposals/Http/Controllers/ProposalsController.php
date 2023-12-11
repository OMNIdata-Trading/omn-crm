<?php

namespace Modules\Proposals\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Proposals\Entities\Proposal;

class ProposalsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $classColors = [
            'opened' => 'yellow',
            'negotiation' => 'primary',
            'accepted' => 'success',
            'lost' => 'danger'
        ];

        $statusLabels = [
            'opened' => 'Em Aberto',
            'negotiation' => 'Negociação',
            'accepted' => 'Adjudicada',
            'lost' => 'Perdidas'
        ];

        $proposalTypeLabelsTranslator = [
            'technic' => 'Técnica',
            'comercial' => 'Comercial',
            'technic_and_comercial' => 'Técnica e Comercial'
        ];
        
        $generalData = [
            'countProposalsFromCurrentYear' => 0,
            'proposalsStatus' => [],
            'proposalsForTable' => []
        ];

        $model =  Proposal::where('year', date('Y'));
        $proposalsCount = $model->get()->count();
        $generalData['proposalForTable'] = $model->limit(20)->get();

        $proposalStatusCounts = $model->select('status', DB::raw('count(*) as count'))
                                    ->groupBy('status')
                                    ->get();
        
        $generalData['proposalsStatus'] = $proposalStatusCounts->pluck('count', 'status')->toArray();
        $generalData['countProposalsFromCurrentYear'] = $proposalsCount;

        return view('proposals::pages.index', compact('generalData', 'classColors', 'statusLabels', 'proposalTypeLabelsTranslator'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('proposals::pages.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('proposals::pages.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('proposals::pages.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
