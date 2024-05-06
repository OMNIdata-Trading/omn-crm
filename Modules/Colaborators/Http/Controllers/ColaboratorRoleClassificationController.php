<?php

namespace Modules\Colaborators\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Colaborators\Entities\ColaboratorRole;
use Modules\Colaborators\Entities\ColaboratorRoleClassification;
use Modules\Colaborators\Http\Requests\CreateColaboratorClassificationRequest;

class ColaboratorRoleClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateColaboratorClassificationRequest $request)
    {
        $classification = ColaboratorRoleClassification::create([
            'name' => $request->classificationName
        ]);

        if(!$classification){
            return redirect()->route('account.colaborators.settings')->withErrors('Não foi possível criar esta classificação.');
        }

        return redirect()->route('account.colaborators.settings')->with('success', 'Classificação criada com êxito.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $theClassification = ColaboratorRoleClassification::where('id', $id)->first();
        $rolesArray = ColaboratorRole::get();
        $classificationsArray = ColaboratorRoleClassification::get();
        return view('colaborators::pages.settings', compact('rolesArray', 'theClassification', 'classificationsArray'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $theClassification = ColaboratorRoleClassification::find($id)->update([
            'name' => $request->classificationName
        ]);
        if(!$theClassification){
            return redirect()->route('account.colaborators.settings')->withErrors("Não foi possível alterar a classificação: $theClassification");
        }
        
        return redirect()->route('account.colaborators.settings')->with('success', "Classificação alterada com êxito.");
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $classificationDeleted = ColaboratorRoleClassification::find($id)->delete();
        if(!$classificationDeleted){
            return redirect()->route('account.colaborators.settings')->withErrors("Não foi possível eliminar a classificação: $classificationDeleted");
        }
        
        return redirect()->route('account.colaborators.settings')->with("success", "Classificação deletada com êxito.");
    }
}
