<?php

namespace Modules\Leads\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Leads\Entities\ClientColaboratorRequester;
use Modules\Leads\Entities\ClientCompany;

class DropdownDependencyController extends Controller
{
    public function fetchColaboratorsFromClientCompanyWithId(Request $request){

        $idCompany = $request->id;

        $clientCompanyColaborators = [];

        if($idCompany != 0){
            $selectedCompany = ClientCompany::find($idCompany);
            $clientCompanyColaborators = $selectedCompany->colaborators;
        }else{
            $clientCompanyColaborators = ClientColaboratorRequester::where('id_client_company', null)->get();
        }
        
        return response()->json($clientCompanyColaborators);

    }
}
