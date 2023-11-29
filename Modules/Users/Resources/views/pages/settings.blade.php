@extends('modules.account.layout.master')

@section('account.page.title')
Utilizadores
@endsection

@section('account.page.header')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Definições de utilizadores
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('account.page.content')
<div class="row row-cards">
    <div class="col-8">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th>Permissão</th>
                                <th></th>
                                <th>Habilidades</th>
                                <th></th>
                                <th class="w-1"></th>
                                <th class="w-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                            <tr>
                                <td >{{ $permission->name }}</td>
                                <td class="text-muted" ></td>
                                <td class="text-muted" >
                                    <div class="text-muted small lh-base d-flex flex-wrap">
                                        <label class="form-check form-check-inline d-flex gap-1 align-items-center">
                                            <input class="form-check-input" type="checkbox" {{ ($permission->can_create_business) ? 'checked' : '' }} disabled>
                                            <span class="form-check-label" disabled>criar negócios</span>
                                        </label>
                                        <label class="form-check form-check-inline d-flex gap-1 align-items-center">
                                            <input class="form-check-input" type="checkbox" {{ ($permission->can_see_business) ? 'checked' : '' }} disabled>
                                            <span class="form-check-label" disabled>ver negócios</span>
                                        </label>
                                        <label class="form-check form-check-inline d-flex gap-1 align-items-center">
                                            <input class="form-check-input" type="checkbox" {{ ($permission->can_edit_business) ? 'checked' : '' }} disabled>
                                            <span class="form-check-label" disabled>editar negócios</span>
                                        </label>
                                        <label class="form-check form-check-inline d-flex gap-1 align-items-center">
                                            <input class="form-check-input" type="checkbox" {{ ($permission->can_delete_business) ? 'checked' : '' }} disabled>
                                            <span class="form-check-label" disabled>deletar negócios</span>
                                        </label>
                                        <label class="form-check form-check-inline d-flex gap-1 align-items-center">
                                            <input class="form-check-input" type="checkbox" {{ ($permission->can_create_leads) ? 'checked' : '' }} disabled>
                                            <span class="form-check-label" disabled>criar leads</span>
                                        </label>
                                        <label class="form-check form-check-inline d-flex gap-1 align-items-center">
                                            <input class="form-check-input" type="checkbox" {{ ($permission->can_see_leads) ? 'checked' : '' }} disabled>
                                            <span class="form-check-label" disabled>ver leads</span>
                                        </label>
                                        <label class="form-check form-check-inline d-flex gap-1 align-items-center">
                                            <input class="form-check-input" type="checkbox" {{ ($permission->can_edit_leads) ? 'checked' : '' }} disabled>
                                            <span class="form-check-label" disabled>editar leads</span>
                                        </label>
                                        <label class="form-check form-check-inline d-flex gap-1 align-items-center">
                                            <input class="form-check-input" type="checkbox" {{ ($permission->can_delete_leads) ? 'checked' : '' }} disabled>
                                            <span class="form-check-label" disabled>deletar leads</span>
                                        </label>
                                        <label class="form-check form-check-inline d-flex gap-1 align-items-center">
                                            <input class="form-check-input" type="checkbox" {{ ($permission->can_create_users) ? 'checked' : '' }} disabled>
                                            <span class="form-check-label" disabled>criar users</span>
                                        </label>
                                        <label class="form-check form-check-inline d-flex gap-1 align-items-center">
                                            <input class="form-check-input" type="checkbox" {{ ($permission->can_see_users) ? 'checked' : '' }} disabled>
                                            <span class="form-check-label" disabled>ver users</span>
                                        </label>
                                        <label class="form-check form-check-inline d-flex gap-1 align-items-center">
                                            <input class="form-check-input" type="checkbox" {{ ($permission->can_edit_users) ? 'checked' : '' }} disabled>
                                            <span class="form-check-label" disabled>editar users</span>
                                        </label>
                                        <label class="form-check form-check-inline d-flex gap-1 align-items-center">
                                            <input class="form-check-input" type="checkbox" {{ ($permission->can_delete_users) ? 'checked' : '' }} disabled>
                                            <span class="form-check-label" disabled>deletar users</span>
                                        </label>
                                        <label class="form-check form-check-inline d-flex gap-1 align-items-center">
                                            <input class="form-check-input" type="checkbox" {{ ($permission->can_create_colaborators) ? 'checked' : '' }} disabled>
                                            <span class="form-check-label" disabled>criar colaboradores</span>
                                        </label>
                                        <label class="form-check form-check-inline d-flex gap-1 align-items-center">
                                            <input class="form-check-input" type="checkbox" {{ ($permission->can_see_colaborators) ? 'checked' : '' }} disabled>
                                            <span class="form-check-label" disabled>ver colaboradores</span>
                                        </label>
                                        <label class="form-check form-check-inline d-flex gap-1 align-items-center">
                                            <input class="form-check-input" type="checkbox" {{ ($permission->can_edit_colaborators) ? 'checked' : '' }} disabled>
                                            <span class="form-check-label" disabled>editar colaboradores</span>
                                        </label>
                                        <label class="form-check form-check-inline d-flex gap-1 align-items-center">
                                            <input class="form-check-input" type="checkbox" {{ ($permission->can_delete_colaborators) ? 'checked' : '' }} disabled>
                                            <span class="form-check-label" disabled>deletar colaboradores</span>
                                        </label>
                                        <label class="form-check form-check-inline d-flex gap-1 align-items-center">
                                            <input class="form-check-input" type="checkbox" {{ ($permission->can_create_files) ? 'checked' : '' }} disabled>
                                            <span class="form-check-label" disabled>criar arquivos</span>
                                        </label>
                                        <label class="form-check form-check-inline d-flex gap-1 align-items-center">
                                            <input class="form-check-input" type="checkbox" {{ ($permission->can_see_files) ? 'checked' : '' }} disabled>
                                            <span class="form-check-label" disabled>ver arquivos</span>
                                        </label>
                                        <label class="form-check form-check-inline d-flex gap-1 align-items-center">
                                            <input class="form-check-input" type="checkbox" {{ ($permission->can_edit_files) ? 'checked' : '' }} disabled>
                                            <span class="form-check-label" disabled>editar arquivos</span>
                                        </label>
                                        <label class="form-check form-check-inline d-flex gap-1 align-items-center">
                                            <input class="form-check-input" type="checkbox" {{ ($permission->can_delete_files) ? 'checked' : '' }} disabled>
                                            <span class="form-check-label" disabled>deletar arquivos</span>
                                        </label>
                                    </div>
                                </td>
                                <td class="text-muted" ></td>
                                <td>
                                    <a href="#">Editar</a>
                                </td>
                                <td>
                                    <a href="#" class="text-danger">Eliminar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="col-12"></div> --}}

    <div class="col-4">
        <div class="col">
            <fieldset class="form-fieldset">
              <div class="mb-3">
                <label class="form-label">Adicionar uma Permissão</label>
                <input class="form-control" placeholder="Nome da Permissão" type="text" placeholder="" value="" required>
              </div>
              <div class="mb-3">
                <div class="form-label">Habilidades</div>
                <div>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" name="can_create_business" type="checkbox">
                        <span class="form-check-label">criar negócios</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" name="can_see_business" type="checkbox">
                        <span class="form-check-label">ver negócios</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" name="can_edit_business" type="checkbox">
                        <span class="form-check-label">editar negócios</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" name="can_delete_business" type="checkbox">
                        <span class="form-check-label">deletar negócios</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" name="can_create_leads" type="checkbox">
                        <span class="form-check-label">criar leads</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" name="can_see_leads" type="checkbox">
                        <span class="form-check-label">ver leads</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" name="can_edit_leads" type="checkbox">
                        <span class="form-check-label">editar leads</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" name="can_delete_leads" type="checkbox">
                        <span class="form-check-label">deletar leads</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" name="can_create_users" type="checkbox">
                        <span class="form-check-label">criar users</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" name="can_see_users" type="checkbox">
                        <span class="form-check-label">ver users</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" name="can_edit_users" type="checkbox">
                        <span class="form-check-label">editar users</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" name="can_delete_users" type="checkbox">
                        <span class="form-check-label">deletar users</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" name="can_create_colaborators" type="checkbox">
                        <span class="form-check-label">criar colaboradores</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" name="can_see_colaborators" type="checkbox">
                        <span class="form-check-label">ver colaboradores</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" name="can_edit_colaborators" type="checkbox">
                        <span class="form-check-label">editar colaboradores</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" name="can_delete_colaborators" type="checkbox">
                        <span class="form-check-label">deletar colaboradores</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" name="can_create_files" type="checkbox">
                        <span class="form-check-label">criar arquivos</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" name="can_see_files" type="checkbox">
                        <span class="form-check-label">ver arquivos</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" name="can_edit_files" type="checkbox">
                        <span class="form-check-label">editar arquivos</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" name="can_delete_files" type="checkbox">
                        <span class="form-check-label">deletar arquivos</span>
                    </label>
                </div>
              </div>
              <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Submeter</button>
              </div>
            </fieldset>
        </div>
    </div>
</div>
@endsection