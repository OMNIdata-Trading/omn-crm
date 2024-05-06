<?php

namespace Modules\Colaborators\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Colaborators\Entities\ColaboratorRole;
use Modules\Colaborators\Entities\ColaboratorRoleClassification;
use Modules\Colaborators\Http\Requests\CreateColaboratorRoleRequest;

class ColaboratorRoleController extends Controller
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
    public function store(CreateColaboratorRoleRequest $request)
    {
        $role = ColaboratorRole::create([
            'name' => $request->roleName,
            'id_role_classification' => $request->classificationId
        ]);

        if(!$role){
            return redirect()->route('account.colaborators.settings')->withErrors('Não foi possível criar esta função.');
        }

        return redirect()->route('account.colaborators.settings')->with('success', 'Função criada com êxito.');
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
        $theRole = ColaboratorRole::where('id', $id)->first();
        $rolesArray = ColaboratorRole::get();
        $classificationsArray = ColaboratorRoleClassification::get();
        return view('colaborators::pages.settings', compact('rolesArray', 'theRole', 'classificationsArray'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $theRole = ColaboratorRole::find($id)->update([
            'name' => $request->roleName,
            'id_role_classification' => $request->classificationId
        ]);
        if(!$theRole){
            return redirect()->route('account.colaborators.settings')->withErrors("Não foi possível alterar a função: $theRole");
        }
        
        return redirect()->route('account.colaborators.settings')->with('success', "Função alterada com êxito.");
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $roleDeleted = ColaboratorRole::find($id)->delete();
        if(!$roleDeleted){
            return redirect()->route('account.colaborators.settings')->withErrors("Não foi possível eliminar a função: $roleDeleted");
        }
        
        return redirect()->route('account.colaborators.settings')->with("success", "Função deletada com êxito.");
    }
}
