<?php

namespace Modules\Leads\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\DB;
use Modules\Leads\Entities\ClientCompany;
use Modules\Leads\Entities\IndividualClient;

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


}
