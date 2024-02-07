<?php

namespace Modules\Leads\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Leads\Entities\ClientColaboratorRequester;
use Modules\Leads\Entities\ClientCompany;

class LeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        
        $newClients = $this->getNewClientsData();
        $newLeads = $this->getNewLeadsData();

        $leads = ClientCompany::limit(20)->get();
        $singularLeads[] = ClientColaboratorRequester::where('id_client_company', null)->limit(20)->get();
        // dd($leads);
        return view('leads::pages.index', compact('leads', 'singularLeads', 'newClients', 'newLeads'));
    }

    public function getNewClientsData()
    {
        $newClients = [];
        $newClientCompanies = [];
        $newSingularClients = [];

        $getAllYearsWithNewClientCompanies = ClientCompany::whereNotNull('first_purchase_year')->distinct()
                                                                        ->orderBy('first_purchase_year', 'desc')
                                                                        ->get('first_purchase_year')
                                                                        ->pluck('first_purchase_year')
                                                                        ->toArray();

        $getAllYearsWithNewClientColab = ClientColaboratorRequester::whereNotNull('first_purchase_year')->distinct()
                                                                        ->orderBy('first_purchase_year', 'desc')
                                                                        ->get('first_purchase_year')
                                                                        ->pluck('first_purchase_year')
                                                                        ->toArray();

        $datesMerged = array_unique(array_merge($getAllYearsWithNewClientCompanies, $getAllYearsWithNewClientColab));
        rsort($datesMerged);

        foreach($datesMerged as $date){

            $newClientCompanies = ClientCompany::where('first_purchase_year', $date)->get()->count();
            $newSingularClients = ClientColaboratorRequester::where('first_purchase_year', $date)->get()->count();
            
            $newClients[$date] = $newSingularClients + $newClientCompanies;

        }

        return $newClients;
    }

    public function getNewLeadsData()
    {
        $newClients = [];
        $newClientCompanies = [];
        $newSingularClients = [];

        $getAllYearsWithNewClientCompanies = ClientCompany::whereNull('first_purchase_year')
                                                            ->distinct()
                                                            ->where('status', 'lead')
                                                            ->orderBy('created_at', 'desc')
                                                            ->get('created_at')
                                                            ->pluck('created_at')
                                                            ->toArray();

        $getAllYearsWithNewClientColab = ClientColaboratorRequester::whereNull('first_purchase_year')
                                                                    ->distinct()
                                                                    ->where('status', 'lead')
                                                                    ->orderBy('created_at', 'desc')
                                                                    ->get('created_at')
                                                                    ->pluck('created_at')
                                                                    ->toArray();

        dd($getAllYearsWithNewClientColab);

        $datesMerged = array_unique(array_merge($getAllYearsWithNewClientCompanies, $getAllYearsWithNewClientColab));
        rsort($datesMerged);

        foreach($datesMerged as $date){

            $newClientCompanies = ClientCompany::where('first_purchase_year', $date)->get()->count();
            $newSingularClients = ClientColaboratorRequester::where('first_purchase_year', $date)->get()->count();
            
            $newClients[$date] = $newSingularClients + $newClientCompanies;

        }

        return $newClients;
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
