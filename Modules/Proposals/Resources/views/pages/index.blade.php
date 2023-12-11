@extends('modules.account.layout.master')

@section('account.page.title')
Propostas
@endsection

@section('account.page.header')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                  <!-- Page pre-title -->
                  <div class="page-pretitle">
                      Visão geral
                  </div>
                  <h2 class="page-title">
                      Propostas
                  </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('account.business.proposals.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                            Gerar proposta
                        </a>
                        <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('account.page.content')
    <div class="row row-deck row-cards">
      <div class="col-12">
        <div class="row row-cards">
          <div class="col-sm-6 col-lg-6">
              <div class="row row-cards">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">

                      <p class="mb-3">Estado das <strong> {{ $generalData['countProposalsFromCurrentYear'] ?? 0 }} propostas </strong> de {{ date('Y') }}</p>
                      <div class="progress progress-separated mb-3">
                        @foreach ($generalData['proposalsStatus'] as $statusName => $proposalCount)
                        <div class="progress-bar bg-{{ $classColors[$statusName] ?? 'default' }}" role="progressbar" style="width: {{ getThePercentage($proposalCount, $generalData['countProposalsFromCurrentYear']) }}" aria-label="{{$statusName}}"></div>
                        @endforeach
                      </div>

                      <div class="row">
                        @foreach ($generalData['proposalsStatus'] as $statusName => $proposalCount)
                        <div class="col-auto d-flex align-items-center pe-2">
                          <span class="legend me-2 bg-{{ $classColors[$statusName] }}"></span>
                          <span>{{ $statusLabels[$statusName] ?? 'Outro' }}</span>
                          <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">{{ $proposalCount }}</span>
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
      {{-- Filters --}}
      <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="mb-3">
                <label class="form-label">Filtros</label>
                <div class="row mb-3 g-2">
                  <div class="col-3">
                    <select type="text" class="form-select" placeholder="Seleccione os clientes" id="select-clients" value="" multiple>
                      <option value="MULTITEL">Multitel</option>
                      <option value="UNITEL">Unitel</option>
                    </select>
                  </div>
                  <div class="col-3">
                    <select type="text" class="form-select" placeholder="Seleccione os colaboradores" id="select-client-company-colaborators" value="" multiple>
                      <option value="colab-1">Colab 1</option>
                      <option value="colab-2">Colab 2</option>
                      <option value="colab-3">Colab 3</option>
                    </select>
                  </div>
                  {{-- <div class="col-2">
                    <div class="form-selectgroup form-selectgroup-pills small">
                      <label class="form-selectgroup-item">
                        <input type="checkbox" name="name" value="CLIENTE" class="form-selectgroup-input small">
                        <span class="form-selectgroup-label">CLIENTE</span>
                      </label>
                      <label class="form-selectgroup-item">
                        <input type="checkbox" name="name" value="LEAD" class="form-selectgroup-input">
                        <span class="form-selectgroup-label">LEAD</span>
                      </label>
                    </div>
                  </div> --}}
                  <div class="col-1">
                    <a href="#" class="btn btn-flickr w-100">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-adjustments-horizontal" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M14 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                        <path d="M4 6l8 0"></path>
                        <path d="M16 6l4 0"></path>
                        <path d="M8 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                        <path d="M4 12l2 0"></path>
                        <path d="M10 12l10 0"></path>
                        <path d="M17 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                        <path d="M4 18l11 0"></path>
                        <path d="M19 18l1 0"></path>
                      </svg>
                      Filtrar
                    </a>
                    <span class="input-icon-addon">
                      <div class="spinner-border spinner-border-md text-muted" role="status"></div>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="col-12">
          <div class="card">
            <div class="table-responsive">
              <table class="table table-vcenter table-mobile-md card-table">
                <thead>
                  <tr>
                    <th>Solicitação</th>
                    <th>Proposta</th>
                    <th>Tempo de Entrega</th>
                    <th>Responsáveis</th>
                    <th>Estado</th>
                    <th>Data de Envio</th>
                    <th>Válida até</th>
                    <th></th>
                    <th class="w-1"></th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($generalData['proposalForTable'] as $proposal)
                  @php
                      $proposalTotalCost = $proposal->proposal_details->total_cost ?? 0;
                      $proposalLeadTime = $proposal->proposal_details->lead_time ?? 'empty';
                      $proposalSentDate = $proposal->proposal_details->sent_to_client_at ?? null;
                      $proposalExpirationTime = $proposal->proposal_details->expiration_time ?? null;
                  @endphp
                  <tr>
                    <td data-label="Client" >
                      <div class="d-flex py-1 align-items-center">
                        
                        @foreach ($proposal->request->clients as $key => $client)
                          @if ($key == 0)
                            @if ($client->company)
                              @if ($client->company->logo_path)
                              <span class="avatar me-2" style="background-image: url({{ URL::to($client->company->logo_path) }})"></span>
                              @else
                              <span class="avatar me-2"> {{ getTheInitialLetters($client->company->name) }} </span>
                              @endif
                            @else
                              <span class="avatar me-2"> {{ getTheInitialLetters($client->fullname) }} </span>
                            @endif
                          @else
                              
                          @endif
                        @endforeach
                        <div class="flex-fill">
                          {{-- <div class="table-long-text long-title font-weight-medium">{{ $proposal->request->order }}</div> --}}
                          <div class="text-muted table-long-tex lon-a" @style('max-width: 150px')><a href="#" class="text-reset">#Código: {{ $proposal->request->request_code }}</a></div>
                        </div>
                      </div>
                    </td>
                    <td data-label="Proposal" >
                      <div>Proposta {{ $proposalTypeLabelsTranslator[$proposal->type] }} Nº{{ str_pad($proposal->order_number, 2, '0', STR_PAD_LEFT) }}/{{ $proposal->year }}</div>
                      <div class="text-muted"><a href="#" class="text-reset">Custo Total: {{ number_format($proposalTotalCost, 2, ',', '.') }} AO</a></div>
                    </td>
                    <td>
                      <div></div>
                      <div class="text-muted">{{ $proposalLeadTime }}</div>
                    </td>
                    <td data-label="Colab" >
                      <div>
                          <div class="avatar-list avatar-list-stacked">
                            @foreach ($proposal->request->colaborators as $colaborator)
                            <span class="avatar avatar-sm rounded">{{ getTheInitialLetters($colaborator->fullname) }}</span>
                            @endforeach
                          </div>
                      </div>
                    </td>
                    <td data-label="Title" >
                      <div class="text-muted">
                        <span class="badge bg-{{ $classColors[$proposal->status] }}">{{ $statusLabels[$proposal->status] ?? 'Outro' }}</span>
                      </div>
                    </td>
                    <td>
                      <div class="text-muted">
                        @if ($proposalSentDate !== null)
                        {{ dateSeparator($proposalSentDate, '/') }}
                        @else
                        empty
                        @endif
                      </div>
                    </td>
                    <td class="text-muted" data-label="Role">
                      @if ($proposalSentDate !== null && $proposalExpirationTime !== null)
                        @php
                            $expirationDateTransformed = addTimeToDate($proposalSentDate, $proposalExpirationTime);
                        @endphp
                        <div>{{ dateSeparator($expirationDateTransformed, '/') }}</div>
                        <div class="text-muted">
                          <span class="text-warning ">
                            @php
                                $dateDifference = date_difference($expirationDateTransformed, $proposalSentDate);
                            @endphp
                            @if ($dateDifference <= 5)
                                <span class="text-danger">{{ ($dateDifference != "empty") ? $dateDifference . " dia".($dateDifference != 1 ? 's restantes' : ' restante') : 'empty' }}</span>
                            @elseif ($dateDifference <= 10)
                                <span class="text-yellow">{{ ($dateDifference != "empty") ? $dateDifference . " dias restantes" : 'empty' }}</span>
                            @else
                                <span class="text-green">{{ ($dateDifference != "empty") ? $dateDifference . " dias restantes" : 'empty' }}</span>
                            @endif
                          </span>
                        </div>
                          
                      @else
                          empty
                      @endif
                    </td>
                    <td class="text-muted" data-label="Role" >
                      <div>
                          {{-- <span class="badge bg-success me-1"></span> --}}
                      </div>
                      <div class="text-muted">
                          <div class="text-muted">
                              {{-- No. de solicitações: 124 --}}
                          </div>
                      </div>
                    </td>
                    <td>
                      <div class="btn-list flex-nowrap">
                        {{-- <a href="#" class="btn btn-primary">
                          Visão geral
                        </a> --}}
                        <div class="dropdown">
                          <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                            Ações
                          </button>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">
                              Editar
                            </a>
                            <a class="dropdown-item" href="#">
                              Eliminar
                            </a>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  @empty
                      
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
@endsection


@section('account.page.scripts')

<script src="{{ URL::to('dist/libs/apexcharts/dist/apexcharts.min.js?1684106062') }}" defer></script>
<script src="{{ URL::to('dist/libs/tom-select/dist/js/tom-select.base.min.js?1684106062') }}" defer></script>

{{-- Select Input dos clientes --}}
<script>
  // @formatter:off
  document.addEventListener("DOMContentLoaded", function () {
    var el;
    window.TomSelect && (new TomSelect(el = document.getElementById('select-clients'), {
      copyClassesToDropdown: false,
      dropdownParent: 'body',
      controlInput: '<input>',
      render:{
        item: function(data,escape) {
          if( data.customProperties ){
            return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
          }
          return '<div>' + escape(data.text) + '</div>';
        },
        option: function(data,escape){
          if( data.customProperties ){
            return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
          }
          return '<div>' + escape(data.text) + '</div>';
        },
      },
    }));
  });
  // @formatter:on
</script>

{{-- Select Input das Área de actuação --}}
<script>
  // @formatter:off
  document.addEventListener("DOMContentLoaded", function () {
    var el;
    window.TomSelect && (new TomSelect(el = document.getElementById('select-client-company-colaborators'), {
      copyClassesToDropdown: false,
      dropdownParent: 'body',
      controlInput: '<input>',
      render:{
        item: function(data,escape) {
          if( data.customProperties ){
            return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
          }
          return '<div>' + escape(data.text) + '</div>';
        },
        option: function(data,escape){
          if( data.customProperties ){
            return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
          }
          return '<div>' + escape(data.text) + '</div>';
        },
      },
    }));
  });
  // @formatter:on
</script>
@endsection