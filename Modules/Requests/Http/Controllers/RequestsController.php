<?php

namespace Modules\Requests\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Requests\Entities\ClientRequests;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        $allRequests = ClientRequests::select(DB::raw('Year(requested_at) as year'), DB::raw('count(*) as count'))
                                                ->groupBy('year')
                                                ->get()
                                                ->pluck('count', 'year')
                                                ->toArray();

        $treatedRequests = ClientRequests::Where('treated', 1)->select(DB::raw('Year(requested_at) as year'), DB::raw('count(*) as count'))
                                                ->groupBy('year')
                                                ->get()
                                                ->pluck('count', 'year')
                                                ->toArray();

        $unTreatedRequests = ClientRequests::Where('treated', 0)->select(DB::raw('Year(requested_at) as year'), DB::raw('count(*) as count'))
                                                ->groupBy('year')
                                                ->get()
                                                ->pluck('count', 'year')
                                                ->toArray();

        $requests = ClientRequests::orderBy('id', 'desc')->limit(20)->get();
        return view('requests::pages.index', compact('requests', 'allRequests', 'treatedRequests', 'unTreatedRequests'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('requests::pages.create');
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
        return view('requests::pages.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('requests::pages.edit');
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
