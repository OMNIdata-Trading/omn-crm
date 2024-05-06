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
@if(session('error'))
    <div class="alert alert-important alert-danger alert-dismissible" role="alert">
        <div class="d-flex">
            <div>
                <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 8v4" /><path d="M12 16h.01" /></svg>
            </div>
            <div>
                {{ session('error') }}
            </div>
        </div>
        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
    </div>
@elseif (session('success'))
    <div class="alert alert-important alert-success alert-dismissible" role="alert">
        <div class="d-flex">
            <div>
                <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
            </div>
            <div>
                {{ session('success') }}
            </div>
        </div>
    </div>
@endif
<div class="row row-cards align-items-stretch">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                  <li class="nav-item">
                    <a href="#tab-colaborator-role-list" class="nav-link {{ !isset($theClassification) ? 'active' : '' }}" data-bs-toggle="tab">
                        Funções
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#tab-colaborator-classifications-list" class="nav-link {{ isset($theClassification) ? 'active' : '' }}" data-bs-toggle="tab">
                        Classificações
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane {{ !isset($theClassification) ? 'active show' : '' }}" id="tab-colaborator-role-list">
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
                                        @foreach ($rolesArray as $roleItem)
                                        <tr>
                                            <td >{{ $roleItem->name }}</td>
                                            <td class="text-muted" >
                                                <a href="#" class="text-reset">
                                                    {{ $roleItem->classification->name }}
                                                </a>
                                            </td>
                                            <td class="text-muted" >
                                              {{ $roleItem->colaborators->count() }}
                                            </td>
                                            <td class="text-muted" ></td>
                                            <td>
                                                <a href="{{ route('account.colaborators.roles.edit', [ 'role' => $roleItem->id ]) }}">Editar</a>
                                            </td>
                                            <td>
                                              <form method="POST" action="{{ route('account.colaborators.roles.destroy', [ 'role' =>  $roleItem->id ]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn text-danger" onclick="return confirm('Deseja realmente eliminar a função {{  $roleItem->name }} ?')">Eliminar</button>
                                              </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="tab-pane {{ isset($theClassification) ? 'active show' : '' }}" id="tab-colaborator-classifications-list">
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
                                        @foreach ($classificationsArray as $classificationItem)
                                        <tr>
                                            <td >
                                              {{ $classificationItem->name }}
                                            </td>
                                            <td class="text-muted" >
                                              {{ $classificationItem->roles->count() }}
                                            </td>
                                            <td class="text-muted" ></td>
                                            <td class="text-muted" ></td>
                                            <td>
                                                <a href="{{ route('account.colaborators.classifications.edit', [ 'classification' => $classificationItem->id ]) }}">Editar</a>
                                            </td>
                                            <td>
                                              <form method="POST" action="{{ route('account.colaborators.classifications.destroy', [ 'classification' => $classificationItem->id ]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn text-danger" onclick="return confirm('Deseja realmente eliminar a classificação {{ $classificationItem->name }} ?')">Eliminar</button>
                                              </form>
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

    <div class="col-4">
        <div class="col">
          <form method="POST" action="{{ isset($theClassification) ? route('account.colaborators.classifications.update', [ 'classification' => $theClassification->id ]) : route('account.colaborators.classifications.store') }}">
            @if (isset($theClassification))
                @method('PUT')
            @endif
            <fieldset class="form-fieldset">
              <div class="mb-3">
                <label class="form-label">Adicionar uma Classificação</label>
                <input
                class="form-control"
                placeholder="Nome da Função"
                type="text"
                name="classificationName"
                value="{{ isset($theClassification) ? $theClassification->name : '' }}"
                placeholder="" required>
              </div>
              @error('classificationName')
                  <span class="text-small text-muted text-red">{{ $message }}</span>
              @enderror
              @csrf
              <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Submeter</button>
              </div>
            </fieldset>
          </form>
        </div>

        <div class="col">
          <form method="POST" action="{{ isset($theRole) ? route('account.colaborators.roles.update', [ 'role' => $theRole->id ]) : route('account.colaborators.roles.store') }}">
            <fieldset class="form-fieldset">
              @if (isset($theRole))
                  @method('PUT')
              @endif
              <div class="mb-3">
                <label class="form-label">Adicionar uma Função</label>
                <input
                class="form-control"
                placeholder="Nome da Função"
                type="text"
                placeholder=""
                name="roleName"
                value="{{ isset($theRole) ? $theRole->name : '' }}"
                required>
              </div>
              <div class="mb-3">
                <label for="select-client-company-colaborators" class="form-label">
                    Classificação
                </label>
                <select
                type="text"
                class="form-select"
                name="classificationId"
                required
                placeholder="Seleccione a classificação"
                >
                  @if (!isset($theRole))
                    @forelse ($classificationsArray as $selectClassificationItem)
                    <option value="{{ $selectClassificationItem->id }}">{{ $selectClassificationItem->name }}</option>
                    @empty
                        
                    @endforelse
                  @else
                    <option selected value="{{ $theRole->classification->id }}">{{ $theRole->classification->name }}</option>
                    @foreach ($classificationsArray as $selectClassificationItem)
                      @if ($selectClassificationItem->id !== $theRole->classification->id)
                      <option value="{{ $selectClassificationItem->id }}">{{ $selectClassificationItem->name }}</option>
                      @endif
                    @endforeach
                  @endif
                </select>
              </div>
              @error('classificationName')
                  <span class="text-small text-muted text-red">{{ $message }}</span>
              @enderror
              @csrf
              <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Submeter</button>
              </div>
            </fieldset>
          </form>
        </div>
    </div>
</div>
@endsection