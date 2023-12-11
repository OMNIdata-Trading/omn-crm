<?php

namespace Modules\Dashboard\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Invoices\Entities\Invoice;
use Modules\Leads\Entities\ClientColaboratorRequester;
use Modules\Leads\Entities\ClientCompany;
use Modules\Proposals\Entities\Proposal;
use Modules\Requests\Entities\ClientRequests;
use Modules\Requests\Entities\RequestIncomeMethod;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $newClients = $this->getNewClientsData();

        $totalRevenueFromYears = Proposal::where('status', 'accepted')->join('proposal_details', 'proposals.id', '=', 'proposal_details.id_proposal')
                                                                        ->select('year', DB::raw('SUM(proposal_details.total_cost) as total'))
                                                                        ->groupBy('year')
                                                                        ->get()
                                                                        ->pluck('total', 'year')
                                                                        ->toArray();
                                  
        $currentYearRevenue = Proposal::where('status', 'accepted')->where('year', date('Y'))
                                                                    // ->with('proposal_details')
                                                                    ->selectRaw('SUM(proposal_details.total_cost) as total')
                                                                    ->leftJoin('proposal_details', 'proposals.id', '=', 'proposal_details.id_proposal')
                                                                    ->value('total');

        $lastYearRevenue = Proposal::where('status', 'accepted')->where('year', date('Y') - 1) // ano anterior
                                                                    // ->with('proposal_details')
                                                                    ->selectRaw('SUM(proposal_details.total_cost) as total')
                                                                    ->leftJoin('proposal_details', 'proposals.id', '=', 'proposal_details.id_proposal')
                                                                    ->value('total');


        $currentYearRequestsCount = ClientRequests::whereYear('requested_at', date('Y'))->get()->count();
        $requestsFromTodayCount = ClientRequests::whereDate('requested_at', today())->get()->count();

        $currentYearProposalsCount = Proposal::where('year', date('Y'))->get()->count();
        $proposalsFromTodayCount = Proposal::whereDate('created_at', today())->get()->count();

        $businessWon = Proposal::where('year', date('Y'))->where('status', 'accepted')->get()->count();

        // pie chart
        $requestsMethods = RequestIncomeMethod::withCount(['requests' => function($query) {
            $query->whereYear('requested_at', date('Y'));
        }])->get();

        $pieChartData = [];

        foreach($requestsMethods as $data){
            $pieChartData[$data->name] = $data->requests_count;
        }

        // chart spline - Requests vs Proposals
        $monthsForRequestsVSProposalsChart = [];
        $requestCountsPerMonths = [];
        $proposalCountsPerMonths = [];

        for($month = 1; $month <= date('m'); $month++){
            $monthsForRequestsVSProposalsChart[] = $this->transformToExtension($month);

            $requestCountsPerMonths[] = ClientRequests::whereMonth('requested_at', $month)->whereYear('requested_at', date('Y'))->count();
            $proposalCountsPerMonths[] = Proposal::whereMonth('created_at', $month)->where('year', date('Y'))->count();
        }

        // proposal status
        $proposalProgressClassColors = [
            'opened' => 'yellow',
            'negotiation' => 'primary',
            'accepted' => 'success',
            'lost' => 'danger'
        ];

        $proposalProgressStatusLabels = [
            'opened' => 'Em Aberto',
            'negotiation' => 'Negociação',
            'accepted' => 'Adjudicada',
            'lost' => 'Perdidas'
        ];
        $proposalModel =  Proposal::where('year', date('Y'));
        $proposalsCount = $proposalModel->get()->count();
        $proposalStatusCounts = $proposalModel->select('status', DB::raw('count(*) as count'))
                                    ->groupBy('status')
                                    ->get();
        
        $proposalStatus = $proposalStatusCounts->pluck('count', 'status')->toArray();
        
        // sending a proposal
        $proposalsSentPerMonth = [];
        $monthsForSentProposalCountChart = [];

        for($month = 1; $month <= date('m'); $month++){
            $proposalsSentPerMonth[$this->transformToExtension($month)] = Proposal::whereYear('proposal_details.sent_to_client_at', date('Y'))
            ->join('proposal_details', 'proposals.id', '=', 'proposal_details.id_proposal')
            ->whereNotNull('proposal_details.sent_to_client_at')
            ->whereMonth('proposal_details.sent_to_client_at', $month)
            ->count();
        }
        // proposals sent today

        $proposalsSentTodayForTable = Proposal::whereYear('proposals.created_at', date('Y'))->join('proposal_details', 'proposals.id', '=', 'proposal_details.id_proposal')
                                                                        ->whereDate('sent_to_client_at', today())
                                                                        ->limit(5)
                                                                        ->get();


        $proposalSentTodayForChart = Proposal::whereYear('proposals.created_at', date('Y'))->join('proposal_details', 'proposals.id', '=', 'proposal_details.id_proposal')
                                                                                        ->whereDate('sent_to_client_at', today())
                                                                                        ->count();

        $proposalSentYesterdayForChart = Proposal::whereYear('proposals.created_at', date('Y'))->join('proposal_details', 'proposals.id', '=', 'proposal_details.id_proposal')
                                                                                        ->whereDate('sent_to_client_at', today()->subDay())
                                                                                        ->count();                                                                
        // dd($proposalSentTodayForChart, $proposalSentYesterdayForChart);

        return view('dashboard::pages.index', compact([
            'newClients',
            'totalRevenueFromYears',
            'currentYearRevenue',
            'lastYearRevenue',
            'currentYearRequestsCount',
            'requestsFromTodayCount',
            'currentYearProposalsCount',
            'proposalsFromTodayCount',
            'businessWon',
            'pieChartData',
            // spline
            'monthsForRequestsVSProposalsChart',
            'requestCountsPerMonths',
            'proposalCountsPerMonths',
            // proposal status
            'proposalStatus',
            'proposalProgressClassColors',
            'proposalProgressStatusLabels',
            'proposalsCount',
            // proposals sent per month
            'proposalsSentPerMonth',
            // proposals sent today
            'proposalsSentTodayForTable',
            'proposalSentTodayForChart',
            'proposalSentYesterdayForChart'
        ]));
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

    public function transformToExtension($numeric_month)
    {
        switch($numeric_month){
            case 1:
                return 'Janeiro';
            case 2:
                return 'Fevereiro';
            case 3:
                return 'Março';
            case 4:
                return 'Abril';
            case 5:
                return 'Maio';
            case 6:
                return 'Junho';
            case 7:
                return 'Julho';
            case 8:
                return 'Agosto';
            case 9:
                return 'Setembro';
            case 10:
                return 'Outubro';
            case 11:
                return 'Novembro';
            case 12:
                return 'Dezembro';
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('dashboard::pages.create');
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
        return view('dashboard::pages.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('dashboard::pages.edit');
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
