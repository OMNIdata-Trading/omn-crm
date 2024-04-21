<?php

namespace Modules\Leads\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Leads\Entities\ClientColaboratorRequester;
use Modules\Leads\Entities\ClientCompany;

use function Laravel\Prompts\select;

class BusinessLeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $leadTemplate = new LeadTemplateController();
        $widgetCharts = $leadTemplate->widgetCharts([
            'new-clients',
            'new-leads',
            'new-current-year-clients',
            'new-current-year-leads'
        ]);
        $leads = ClientCompany::limit(20)->get();
        return view('leads::pages.index.business', compact('leads', 'widgetCharts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('leads::pages.create');
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
        return view('leads::pages.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('leads::pages.edit');
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
