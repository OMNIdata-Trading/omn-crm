<?php

namespace Modules\Colaborators\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Colaborators\Entities\Colaborator;
use Modules\Colaborators\Entities\ColaboratorRole;
use Modules\Colaborators\Entities\ColaboratorRoleClassification;

class ColaboratorsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $colaborators = Colaborator::get();
        return view('colaborators::pages.index', compact('colaborators'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('colaborators::create');
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
        return view('colaborators::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('colaborators::edit');
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

    public function settings(){
        $roles = ColaboratorRole::get();
        $classifications = ColaboratorRoleClassification::get();
        return view('colaborators::pages.settings', compact('roles', 'classifications'));
    }
}
