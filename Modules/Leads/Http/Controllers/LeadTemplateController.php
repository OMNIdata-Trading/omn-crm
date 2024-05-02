<?php

namespace Modules\Leads\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\DB;
use Modules\Leads\Entities\ClientCompany;
use Modules\Leads\Entities\IndividualClient;
use Modules\Requests\Entities\ClientRequests;

use function Laravel\Prompts\select;

class LeadTemplateController
{
    public function widgetCharts($sections = [])
    {
        $registeredSections = [
            'new-clients' => $this->getNewClientsData(),
            'new-leads' => $this->getNewLeadsData(),
            'new-individual-clients' => $this->getNewIndividualClientsData(),
            'new-individual-leads' => $this->getNewIndividualLeadsData(),
            'new-current-year-clients' => $this->getClientsFromCurrentYear(),
            'new-current-year-leads' => $this->getLeadsFromCurrentYear(),
            'new-current-year-individual-clients' => $this->getIndividualClientsFromCurrentYear(),
            'new-current-year-individual-leads' => $this->getIndividualLeadsFromCurrentYear(),
        ];

        $sectionsToReturn = [];
        foreach($sections as $section){
            if(array_key_exists($section, $registeredSections)){
                $sectionsToReturn[$section] = $registeredSections[$section];
            } else {
                // throw new Exception("Section not registered");
            }
        }

        return $sectionsToReturn;
    }

    private function getNewClientsData()
    {
        $newClients = [];
        $getAllYearsWithNewClientCompanies = ClientCompany::whereNotNull('first_purchase_year')->distinct()
                                                                        ->orderBy('first_purchase_year', 'desc')
                                                                        ->get('first_purchase_year')
                                                                        ->pluck('first_purchase_year')
                                                                        ->toArray();

        $mergedYearsForClients = array_unique(array_merge($getAllYearsWithNewClientCompanies));
        rsort($mergedYearsForClients);

        foreach($mergedYearsForClients as $year){

            $newClientCompanies = ClientCompany::where('first_purchase_year', $year)->get()->count();
            $newClients[$year] = $newClientCompanies;

        }

        return $newClients;
    }

    private function getNewLeadsData()
    {
        $newLeads = [];
        $getAllYearsWithNewLeadCompanies = ClientCompany::whereNotNull('first_request_year')->distinct()
                                                        ->orderBy('first_request_year', 'desc')
                                                        ->get('first_request_year')
                                                        ->pluck('first_request_year')
                                                        ->toArray();

        $mergedYears = array_unique(array_merge($getAllYearsWithNewLeadCompanies));
        rsort($mergedYears);

        foreach($mergedYears as $year){
            $newLeadCompanies = ClientCompany::where('first_request_year', $year)->get()->count();            
            $newLeads[$year] = $newLeadCompanies;
        }

        return $newLeads;
    }

    private function getNewIndividualClientsData()
    {
        $clientsArray = [];

        $getAllYearsWithNewIndividualClients = IndividualClient::whereNotNull('first_purchase_year')->distinct()
                                                                        ->orderBy('first_purchase_year', 'desc')
                                                                        ->get('first_purchase_year')
                                                                        ->pluck('first_purchase_year')
                                                                        ->toArray();

                                                                        // dd($getAllYearsWithNewIndividualClients);

        $mergedYearsForClients = array_unique(array_merge($getAllYearsWithNewIndividualClients));
        rsort($mergedYearsForClients);

        foreach($mergedYearsForClients as $year){
            $newClientCompanies = IndividualClient::where('first_purchase_year', $year)->get()->count();            
            $clientsArray[$year] = $newClientCompanies;
        }

        return $clientsArray;
    }

    private function getNewIndividualLeadsData()
    {
        $leadsArray = [];

        $getAllYearsWithNewIndividualLeads = IndividualClient::whereNotNull('first_request_year')->distinct()
                                                            ->orderBy('first_request_year', 'desc')
                                                            ->get('first_request_year')
                                                            ->pluck('first_request_year')
                                                            ->toArray();

        $mergedYears = array_unique(array_merge($getAllYearsWithNewIndividualLeads));
        rsort($mergedYears);

        foreach($mergedYears as $year){
            $newIndividualLeads = IndividualClient::where('first_request_year', $year)->get()->count();
            $leadsArray[$year] = $newIndividualLeads;
        }

        return $leadsArray;
    }
    
    private function getClientsFromCurrentYear()
    {
        return (ClientCompany::whereYear('created_at', date('Y'))->where('status', 'client')->get()->count());
    }

    private function getLeadsFromCurrentYear()
    {
        return (ClientCompany::whereYear('created_at', date('Y'))->where('status', 'lead')->get()->count());
    }

    private function getIndividualClientsFromCurrentYear()
    {
        return (IndividualClient::whereYear('created_at', date('Y'))->where('status', 'client')->get()->count());
    }

    private function getIndividualLeadsFromCurrentYear()
    {
        return (IndividualClient::whereYear('created_at', date('Y'))->where('status', 'lead')->get()->count());
    }

    public function getLeadRequestsPerYear(ClientCompany $client)
    {
        return [ 'countAllRequests' => $this->getClientRequestsTotal($client), 'data' => $this->getYearsWithRequestsFromClient($client)];
    }

    private function getYearsWithRequestsFromClient(ClientCompany $client)
    {
        return $client->colaborators->flatMap(function ($colaborator){
            return $colaborator->requests()->select(DB::raw('YEAR(requested_at) as year'))->get('year')->pluck('year');
        })->countBy(function ($year){
            return strval($year);
        })->toArray();
    }

    private function getClientRequestsTotal(ClientCompany $client)
    {
        $count = $client->colaborators->sum(function ($colaborator){
            return $colaborator->requests->count();
        });
        return $count;
    }

    public function getIndividualLeadRequestsPerYear(IndividualClient $client)
    {
        return [ 'countAllRequests' => $this->getIndividualClientRequestsTotal($client), 'data' => $this->getYearsWithRequestsFromIndividualClient($client) ];
    }

    private function getYearsWithRequestsFromIndividualClient(IndividualClient $client)
    {
        return $client->requests()->get()->map(function ($request) {
            return date('Y', strtotime($request->requested_at));
        })->countBy(function ($year) {
            return $year;
        })->toArray();
    }

    private function getIndividualClientRequestsTotal(IndividualClient $client)
    {
        return $client->requests->count();
    }

    public function getLeadProposalsPerYearWithFilter(ClientCompany $client)
    {
        return [
            'countAllProposals' => $this->getTotalLeadProposals($client),
            'data' => [
                'accepted' => $this-> getYearsWithProposalsFromClient($client, 'accepted'),
                'opened' => $this-> getYearsWithProposalsFromClient($client, 'opened'),
                'negotiation' => $this-> getYearsWithProposalsFromClient($client, 'negotiation'),
                'lost' => $this-> getYearsWithProposalsFromClient($client, 'lost'),
            ]
        ];
    }

    private function getYearsWithProposalsFromClient(ClientCompany $client, $filter)
    {
        return $client->colaborators->flatMap(function ($colaborator) use ($filter){
            return $colaborator->requests->flatMap(function ($request) use ($filter){
                return $request->proposals->filter(function ($proposal) use ($filter){
                    return $proposal->status === $filter;
                })->map(function ($proposal){
                    return $proposal->year;
                });
            });
        })->countBy(function ($year){
            return $year;
        })->toArray();
    }

    private function getTotalLeadProposals(ClientCompany $client)
    {
        return $client->colaborators->sum(function ($colaborator){
            return $colaborator->requests->sum(function ($request){
                return $request->proposals->count();
            });
        });
    }

    public function getIndividualLeadProposalsPerYearWithFilter(IndividualClient $client)
    {
        return [
            'countAllProposals' => $this->getTotalIndividualLeadProposals($client),
            'data' => [
                'accepted' => $this-> getYearsWithProposalsFromIndividualClient($client, 'accepted'),
                'opened' => $this-> getYearsWithProposalsFromIndividualClient($client, 'opened'),
                'negotiation' => $this-> getYearsWithProposalsFromIndividualClient($client, 'negotiation'),
                'lost' => $this-> getYearsWithProposalsFromIndividualClient($client, 'lost'),
            ]
        ];
    }

    private function getYearsWithProposalsFromIndividualClient(IndividualClient $client, $filter)
    {
        return $client->requests->flatMap(function ($request) use ($filter){
            return $request->proposals->filter(function ($proposalToFilter) use ($filter){
                return $proposalToFilter->status === $filter;
            })->map(function ($proposal){
                return $proposal->year;
            });
        })->countBy(function ($year){
            return $year;
        })->toArray();
    }

    private function getTotalIndividualLeadProposals(IndividualClient $client)
    {
        return $client->requests->sum(function ($request){
            return $request->proposals->count();
        });
    }

}
