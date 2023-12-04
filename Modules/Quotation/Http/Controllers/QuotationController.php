<?php

namespace Modules\Quotation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Quotation\Entities\Quotation;
use Modules\Quotation\Http\Requests\QuotationRequest;
use Modules\Requests\Entities\ClientRequests;
use Modules\Storage\Entities\QuotationFiles;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        $quotationsCount = Quotation::select(DB::raw('Year(requested_at) as year'), DB::raw('count(*) as count'))
                                    ->groupBy('year')
                                    ->get()
                                    ->pluck('count', 'year')
                                    ->toArray();
        
        $responsedQuotationsCount = Quotation::where('responsed_at', '!=', null)->select(DB::raw('Year(requested_at) as year'), DB::raw('count(*) as count'))
                                    ->groupBy('year')
                                    ->get()
                                    ->pluck('count', 'year')
                                    ->toArray();

        $noResponseQuotationsCount = Quotation::where('responsed_at', '=', null)->select(DB::raw('Year(requested_at) as year'), DB::raw('count(*) as count'))
                                    ->groupBy('year')
                                    ->get()
                                    ->pluck('count', 'year')
                                    ->toArray();

        $organizedQuotationsByRequests = [];
        $quotations = Quotation::limit(20)->get();

        foreach($quotations as $quotation){
            $organizedQuotationsByRequests[$quotation->request->request_code] = [
                'request_code' => $quotation->request->request_code,
                'order' => $quotation->request->order
            ];
            $organizedQuotationsByRequests[$quotation->request->request_code]['quotations'] = $quotation->request->quotations;
        }

        return view('quotation::pages.index',
        compact(
            'quotations',
            'organizedQuotationsByRequests',
            'quotationsCount',
            'responsedQuotationsCount',
            'noResponseQuotationsCount'
        ));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        // $registeredRequests = ClientRequests::all();
        $registeredRequests = Auth::user()->colaborator->requests; // solicitações que na qual o colaborador logado foi atribuído
        return view('quotation::pages.create', compact('registeredRequests'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(QuotationRequest $request)
    {
        // dd($request->file('file'));
        $vendor = $request['vendor'];
        $day = date('d');
        $month = date('M');
        $year = date('Y');

        $latestQuotation = Quotation::create([
            'vendor' => $vendor,
            'delivery_time' => $request['delivery_time'],
            'requested_at' => $request['requested_at'],
            'responsed_at' => $request['responsed_at'],
            'requested_by_colab_id' => Auth::user()->colaborator->id, 
            'id_request' => $request['id_request'],
        ]);

        $requestStatus = ClientRequests::find($request['id_request'])->update([
            'treated' => 1
        ]);

        if($latestQuotation && $requestStatus){

            if($request->file('file')){
                $file_path = $request->file('file')->store("quotations/$vendor/$year/$month/$day", 'public');
            }

            $file = QuotationFiles::create([
                'file_name' => $request['file_name'],
                'file_path' => $file_path ?? null,
                'id_quotation' => $latestQuotation->id,
                'id_colaborator' => Auth::user()->colaborator->id
            ]);
            if(!$file){
                return redirect()->route('account.business.quotations.create')->withErrors('Não foi possível armazenar este arquivo');
            }

            return redirect()->route('account.business.quotations.index');
        }
        
        return redirect()->route('account.business.quotations.create')->withErrors('Não foi possível registrar esta cotação');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('quotation::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('quotation::edit');
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
