<?php

namespace Modules\Leads\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Leads\Entities\ClientColaboratorRequester;
use Modules\Leads\Entities\ClientCompany;
use Modules\Leads\Entities\IndividualClient;

class IndividualLeadsController extends Controller
{
    private $leadTemplate;

    public function __construct()
    {
        $this->leadTemplate = new LeadTemplateController();
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $widgetCharts = $this->leadTemplate->widgetCharts([
            'new-individual-leads',
            'new-individual-clients',
            'new-current-year-individual-clients',
            'new-current-year-individual-leads'
        ]);
        $leads = IndividualClient::limit(20)->get();
        return view('leads::pages.index.individual', compact('leads', 'widgetCharts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('leads::pages.create.individual');
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
        $client = IndividualClient::find($id);
        $widget['requests'] = $this->leadTemplate->getIndividualLeadRequestsPerYear($client);
        $widget['proposals'] = $this->leadTemplate->getIndividualLeadProposalsPerYearWithFilter($client);

        return view('leads::pages.show.individual', [ 'client' => $client, 'widget' => $widget ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('leads::pages.edit.individual', [ 'clientId' => $id ]);
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
        $clientToDelete = IndividualClient::find($id)->delete();
        if(!$clientToDelete){
            return redirect()->route('account.leads.individuals.index')->with('error', 'Não foi possível eliminar este registro.');
        }

        return redirect()->route('account.leads.individuals.index')->with('success', 'Registro eliminado com êxito.');
    }
}
