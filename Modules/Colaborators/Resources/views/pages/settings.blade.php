@extends('modules.account.layout.master')

@section('account.page.title')
Colaboradores
@endsection

@section('account.page.header')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Definições de colaboradores
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('account.page.content')
<div class="row row-cards">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                  <li class="nav-item">
                    <a href="#tab-colaborator-role-list" class="nav-link active" data-bs-toggle="tab">
                        Funções
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#tab-colaborator-classifications-list" class="nav-link" data-bs-toggle="tab">
                        Classificações
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active show" id="tab-colaborator-role-list">
                    <div class="col-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Função</th>
                                            <th>Classificação</th>
                                            <th>Nº de Colaboradores</th>
                                            <th></th>
                                            <th class="w-1"></th>
                                            <th class="w-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                        <tr>
                                            <td >{{ $role->name }}</td>
                                            <td class="text-muted" >
                                                <a href="#" class="text-reset">
                                                    {{ $role->classification->name }}
                                                </a>
                                            </td>
                                            <td class="text-muted" >
                                              {{ $role->colaborators->count() }}
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
                  <div class="tab-pane" id="tab-colaborator-classifications-list">
                    <div class="col-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Classificação</th>
                                            <th>Nº de Funções</th>
                                            <th></th>
                                            <th></th>
                                            <th class="w-1"></th>
                                            <th class="w-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($classifications as $classification)
                                        <tr>
                                            <td >
                                              {{ $classification->name }}
                                            </td>
                                            <td class="text-muted" >
                                              {{ $classification->roles->count() }}
                                            </td>
                                            <td class="text-muted" ></td>
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
                </div>
              </div>
        </div>
    </div>

    {{-- <div class="col-12"></div> --}}

    <div class="col-4">
        <div class="col">
            <fieldset class="form-fieldset">
              <div class="mb-3">
                <label class="form-label">Adicionar uma Função</label>
                <input class="form-control" placeholder="Nome da Função" type="text" placeholder="" value="" required>
              </div>
              <div class="mb-3">
                <label for="select-client-company-colaborators" class="form-label">
                    Classificação
                </label>
                <select
                type="text"
                class="form-select"
                placeholder="Seleccione a classificação"
                >
                  <option value="" selected disabled>-- Seleccione a classificação --</option>
                  <option value="1">Chefia</option>
                  <option value="2">Técnico</option>
                </select>
              </div>
              <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Submeter</button>
              </div>
            </fieldset>
        </div>
        
        <div class="col">
            <fieldset class="form-fieldset">
              <div class="mb-3">
                <label class="form-label">Adicionar uma Classificação</label>
                <input class="form-control" placeholder="Nome da Função" type="text" placeholder="" value="" required>
              </div>
              <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Submeter</button>
              </div>
            </fieldset>
        </div>
    </div>
</div>
@endsection