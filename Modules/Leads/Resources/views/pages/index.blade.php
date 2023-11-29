@extends('modules.account.layout.master')

@section('account.page.title')
Leads & Clientes
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
                    Leads & Clientes
                </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                            Adicionar novo Lead
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
      <div class="col-sm-6 col-lg-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="subheader">Meta de Clientes atingida</div>
              <div class="ms-auto lh-1">
                <div class="dropdown">
                  <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    2023
                  </a>
                  <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item active" href="#">2022</a>
                    <a class="dropdown-item" href="#">2021</a>
                    <a class="dropdown-item" href="#">2020</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="h1 mb-3">75%</div>
            <div class="d-flex mb-2">
              <div>
                À atingir: 8
              </div>
              <div class="ms-auto">
                {{-- <span class="text-green d-inline-flex align-items-center lh-1">
                  7% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 17l6 -6l4 4l8 -8" /><path d="M14 7l7 0l0 7" /></svg>
                </span> --}}
              </div>
            </div>
            <div class="progress progress-sm">
              <div
              class="progress-bar bg-success"
              style="width: 75%"role="progressbar"
              aria-valuenow="75"
              aria-valuemin="0"
              aria-valuemax="100"
              aria-label="75% Complete">
                <span class="visually-hidden">75% Complete</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="subheader">Novos Leads</div>
              <div class="ms-auto lh-1">
                <div class="dropdown">
                  <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    2023
                  </a>
                  <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item active" href="#">2022</a>
                    <a class="dropdown-item" href="#">2021</a>
                    <a class="dropdown-item" href="#">2020</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex align-items-baseline">
              <div class="h1 mb-3 me-2">6</div>
              <div class="me-auto">
                {{-- <span class="text-green d-inline-flex align-items-center lh-1">
                  4% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 17l6 -6l4 4l8 -8" /><path d="M14 7l7 0l0 7" /></svg>
                </span> --}}
              </div>
            </div>
            <div id="chart-new-leads" class="chart-sm"></div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="subheader">Novos Clientes</div>
                <div class="ms-auto lh-1">
                  <div class="dropdown">
                    <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      2023
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item active" href="#">2022</a>
                      <a class="dropdown-item" href="#">2021</a>
                      <a class="dropdown-item" href="#">2020</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex align-items-baseline">
                <div class="h1 mb-3 me-2">6</div>
                <div class="me-auto">
                  {{-- <span class="text-green d-inline-flex align-items-center lh-1">
                    4% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 17l6 -6l4 4l8 -8" /><path d="M14 7l7 0l0 7" /></svg>
                  </span> --}}
                </div>
              </div>
              <div id="chart-new-clients" class="chart-sm"></div>
            </div>
          </div>
        </div>
      <div class="col-12">
        <div class="row row-cards">
          <div class="col-sm-6 col-lg-6">
            <div class="card card-sm">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="bg-blue text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                          <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                          <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                          <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                          <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                          <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                      </svg>
                    </span>
                  </div>
                  <div class="col">
                    <div class="font-weight-medium">
                      133 Leads
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-6">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                            <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                            <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                            <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                            <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                            <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                        </svg>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        133 Clientes
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
      {{-- Advertisement --}}
      {{-- <div class="col-12">
        <div class="card card-md">
          <div class="card-stamp card-stamp-lg">
            <div class="card-stamp-icon bg-primary">
              <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7" /><path d="M10 10l.01 0" /><path d="M14 10l.01 0" /><path d="M10 14a3.5 3.5 0 0 0 4 0" /></svg>
            </div>
          </div>
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-10">
                <h3 class="h1">Sistema de Gestão de Clientes</h3>
                <div class="markdown text-muted">
                  Faça a gestão de seus clientes da forma mais fácil e rápida à um custo super acessível. Entre em contacto connosco para ajudar você a atingir suas metas.
                </div>
                <div class="mt-3">
                  <a href="https://fridoom.com" class="btn btn-primary" target="_blank" rel="noopener">
                      Saiba mais
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
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
                  <select type="text" class="form-select" placeholder="Seleccione as áreas" id="select-actuation-area" value="" multiple>
                    <option value="HTML">Telecomunicações</option>
                    <option value="JavaScript">Oil & Gas</option>
                    <option value="CSS">Banca</option>
                  </select>
                </div>
                <div class="col-2">
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
                </div>
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
                    <th>Nome</th>
                    <th>Endereços</th>
                    <th>Contactos</th>
                    <th>Área de actuação</th>
                    <th>Status</th>
                    <th class="w-1"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($leads as $lead)
                  <tr>
                    <td data-label="Name" >
                      <div class="d-flex py-1 align-items-center">
                        @if ($lead->logo_path)
                        <span class="avatar me-2" style="background-image: url({{ URL::to($lead->logo_path) }})"></span>
                        @else
                        <span class="avatar me-2"> {{ getTheInitialLetters($lead->name) }} </span>
                        @endif
                        <div class="flex-fill">
                          <div class="font-weight-medium">{{ $lead->name }}</div>
                          <div class="text-muted"><a href="#" class="text-reset">{{ $lead->website ?? 'empty' }}</a></div>
                        </div>
                      </div>
                    </td>
                    <td data-label="Address" >
                      @if ($lead->addresses->count() > 0)
                        @foreach ($lead->addresses as $key => $address)
                          @if ($key == 0)
                          <div>{{ $address->address ?? 'empty' }}</div>
                          @else
                              
                          @endif
                        @endforeach
                      @else
                          <div>empty</div>
                      @endif
                      <div class="text-muted">
                        <a href="#" class="text-reset">{{ $lead->company_email ?? 'empty' }}</a>
                      </div>
                    </td>
                    <td data-label="Contacts" >
                      @if ($lead->contacts->count() > 0)
                        @foreach ($lead->contacts as $key => $contact)
                            @if ($key < 2)
                            <div class="text-muted">{{ $contact->contact ?? 'empty' }}</div>
                            @else
                                
                            @endif
                        @endforeach
                      @else
                      <div class="text-muted">empty</div>
                      <div class="text-muted">empty</div>
                      @endif
                    </td>
                    <td data-label="Title" >
                      <div>{{ $lead->activity_area ?? 'empty' }}</div>
                      <div class="text-muted">NIF: {{ $lead->nif ?? 'empty' }}</div>
                    </td>
                    <td class="text-muted" data-label="Role" >
                      <div>
                        @if ($lead->status == 'client')
                        <span class="badge bg-success me-1"></span> Cliente
                        @else
                        <span class="badge bg-warning me-1"></span> Lead
                        @endif
                      </div>
                      <div class="text-muted">
                          @php
                              $totalOfRequestsFromCompany = 0;

                              if($lead->colaborators->count() > 0){
                                  foreach($lead->colaborators as $colaborator){
                                      $totalOfRequestsFromCompany += $colaborator->requests->count();
                                  }
                              }
                          @endphp
                          <div class="text-muted">No. de solicitações: {{ $totalOfRequestsFromCompany }}</div>
                      </div>
                    </td>
                    <td>
                      <div class="btn-list flex-nowrap">
                        <a href="#" class="btn btn-primary">
                          Visão geral
                        </a>
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
                  @endforeach
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

{{-- Gráfico de Novos Leads --}}
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
      window.ApexCharts && (new ApexCharts(document.getElementById('chart-new-leads'), {
        chart: {
          type: "bar",
          fontFamily: 'inherit',
          height: 40.0,
          sparkline: {
            enabled: true
          },
          animations: {
            enabled: false
          },
        },
        plotOptions: {
          bar: {
            columnWidth: '50%',
          }
        },
        dataLabels: {
          enabled: false,
        },
        fill: {
          opacity: 1,
        },
        series: [{
          name: "Angariados",
          data: [
            37,
            35,
            44,
            28,
          ]
        }],
        tooltip: {
          theme: 'dark'
        },
        grid: {
          strokeDashArray: 4,
        },
        xaxis: {
          labels: {
            padding: 0,
          },
          tooltip: {
            enabled: false
          },
          axisBorder: {
            show: false,
          },
          type: 'year',
        },
        yaxis: {
          labels: {
            padding: 4
          },
        },
        labels: [
          '2023',
          '2022',
          '2021',
          '2020',
        ],
        colors: [tabler.getColor("primary")],
        legend: {
          show: false,
        },
      })).render();
    });
    // @formatter:on
</script>

{{-- Gráfico de Novos Clientes --}}
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
      window.ApexCharts && (new ApexCharts(document.getElementById('chart-new-clients'), {
        chart: {
          type: "bar",
          fontFamily: 'inherit',
          height: 40.0,
          sparkline: {
            enabled: true
          },
          animations: {
            enabled: false
          },
        },
        plotOptions: {
          bar: {
            columnWidth: '50%',
          }
        },
        dataLabels: {
          enabled: false,
        },
        fill: {
          opacity: 1,
        },
        series: [{
          name: "Angariados",
          data: [
            37,
            35,
            44,
            28,
          ]
        }],
        tooltip: {
          theme: 'dark'
        },
        grid: {
          strokeDashArray: 4,
        },
        xaxis: {
          labels: {
            padding: 0,
          },
          tooltip: {
            enabled: false
          },
          axisBorder: {
            show: false,
          },
          type: 'year',
        },
        yaxis: {
          labels: {
            padding: 4
          },
        },
        labels: [
          '2023',
          '2022',
          '2021',
          '2020',
        ],
        colors: [tabler.getColor("success")],
        legend: {
          show: false,
        },
      })).render();
    });
    // @formatter:on
</script>

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
    window.TomSelect && (new TomSelect(el = document.getElementById('select-actuation-area'), {
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