@extends('modules.account.layout.master')

@section('account.page.title')
Solicitações
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
                    Solicitações
                </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('account.business.requests.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                              <path d="M12 5l0 14" />
                              <path d="M5 12l14 0" />
                            </svg>
                            Criar uma solicitação
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
    @livewire('apex-chart-bar', [
      'label' => 'Todas as solicitações',
      'chartColor' => 'primary',
      'chartBarLabel' => 'Recebidas',
      'chartId' => 'todas-as-solicitacoes',
      'chartData' => $allRequests
    ])
  </div>
  <div class="col-sm-6 col-lg-3">
    @livewire('apex-chart-bar', [
      'label' => 'Solicitações tratadas',
      'chartColor' => 'success',
      'chartBarLabel' => 'Tratadas',
      'chartId' => 'solicitacoes-tratadas',
      'chartData' => $treatedRequests
    ])
  </div>
  <div class="col-sm-6 col-lg-3">
    @livewire('apex-chart-bar', [
      'label' => 'Solicitações não tratadas',
      'chartColor' => 'danger',
      'chartBarLabel' => 'Não tratadas',
      'chartId' => 'solicitacoes-nao-tratadas',
      'chartData' => $unTreatedRequests
    ])
  </div>
  <div class="col-12">
    <div class="row row-cards">
      <div class="col-sm-6 col-lg-6">
        <div class="card card-sm">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-auto">
                  <span class="bg-blue text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message-2-down" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M8 9h8"></path>
                        <path d="M8 13h6"></path>
                        <path d="M12.5 20.5l-.5 .5l-3 -3h-3a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v5.5"></path>
                        <path d="M19 16v6"></path>
                        <path d="M22 19l-3 3l-3 -3"></path>
                      </svg>
                  </span>
              </div>
              <div class="col">
                <div class="font-weight-medium">
                  {{ $requestsForCardsStatistics->count() }} Solicitações recebidas ({{ date('Y') }})
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
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message-2-down" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M8 9h8"></path>
                        <path d="M8 13h6"></path>
                        <path d="M12.5 20.5l-.5 .5l-3 -3h-3a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v5.5"></path>
                        <path d="M19 16v6"></path>
                        <path d="M22 19l-3 3l-3 -3"></path>
                      </svg>
                  </span>
                </div>
                <div class="col">
                  <div class="font-weight-medium">
                    @php
                        $treatedRequests = 0;
                        foreach ($requestsForCardsStatistics as $key => $request) {
                          if($request->proposals->count() > 0){
                            $treatedRequests += $request->proposals->count();
                          }
                        }
                    @endphp
                    {{ $treatedRequests }} solicitações tratadas ({{ date('Y') }})
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
                <select type="text" class="form-select" placeholder="Seleccione os colaboradores" id="select-client-company-colaborators" value="" multiple>
                  <option value="colab-1">Colab 1</option>
                  <option value="colab-2">Colab 2</option>
                  <option value="colab-3">Colab 3</option>
                </select>
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
                <th>Cliente</th>
                <th>Pedido</th>
                <th>Responsáveis</th>
                <th></th>
                <th></th>
                <th class="w-1"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($requestsForTable as $request)
              <tr>
                <td data-label="Client" >
                  <div class="d-flex py-1 align-items-center">
                    @if ($request->id_individual_client === null)
                      @foreach ($request->clients as $key => $client)

                        @if ($key == 0)
                          @if ($client->company->logo_path)
                          <span class="avatar me-2" style="background-image: url({{ URL::to('storage/' . $client->company->logo_path) }})"></span>
                          @else
                          <span class="avatar me-2"> {{ getTheInitialLetters($client->company->name) }} </span>
                          @endif
                          <div class="flex-fill">
                            <div class="font-weight-medium">{{ $client->fullname }}</div>
                            <div class="text-muted">{{ $client->email }}</div>
                          </div>
                        @else
                            {{-- Key != 0  --}}
                        @endif
                      @endforeach
                    @else
                      {{-- Individual Client --}}
                      @if ($request->individualClient->logo_path)
                      <span class="avatar me-2" style="background-image: url({{ URL::to('storage/' . $request->individualClient->logo_path) }})"></span>
                      @else
                      <span class="avatar me-2"> {{ getTheInitialLetters($request->individualClient->fullname) }} </span>
                      @endif
                      <div class="flex-fill">
                        <div class="font-weight-medium">{{ $request->individualClient->fullname }}</div>
                        <div class="text-muted">{{ $request->individualClient->email }}</div>
                      </div>
                    @endif
                  </div>
                </td>
                <td data-label="Order" >
                  <div class="table-long-text long-title">{{ $request->order }}</div>
                  <div class="text-muted table-long-text long-title"><a href="#" class="text-reset">#Código: {{ $request->request_code }}</a></div>
                </td>
                <td data-label="Colab" >
                  <div>
                      <div class="avatar-list avatar-list-stacked">
                          @foreach ($request->colaborators as $colaborator)
                          <span class="avatar avatar-sm rounded">{{ getTheInitialLetters($colaborator->fullname) }}</span>
                          @endforeach
                      </div>
                  </div>
                </td>
                <td data-label="Title" >
                  <div class="text-muted">{{ ($request->quotations->count() > 0) ? $request->quotations->count() . (($request->quotations->count() > 1) ? ' Cotações': ' Cotação') : 'Sem cotações' }}</div>
                  <div class="text-muted">{{ ($request->proposals->count() > 0) ? $request->proposals->count() . (($request->proposals->count() > 1) ? ' Propostas' : ' Proposta') : 'Sem propostas' }}</div>
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
                    <a href="#" class="btn">
                      Atribuir tarefas
                      <span class="badge bg-green ms-2">{{ $request->tasks->count() }}</span>
                    </a>
                    <a href="#" class="btn btn-primary">
                      Visão geral
                    </a>
                    <div class="dropdown">
                      <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                        Ações
                      </button>
                      <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">
                          Gerar Proposta
                        </a>
                        <a class="dropdown-item" href="#">
                          Atribuir cotação
                        </a>
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

{{-- Gráfico de todas as solicitações --}}
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
      window.ApexCharts && (new ApexCharts(document.getElementById('chart-all-requests'), {
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
          name: "Recebidas",
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

{{-- Gráfico de solicitações tratadas --}}
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
      window.ApexCharts && (new ApexCharts(document.getElementById('chart-treated-requests'), {
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
          name: "Recebidas",
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

{{-- Gráfico de solicitações tratadas --}}
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
      window.ApexCharts && (new ApexCharts(document.getElementById('chart-not-treated-requests'), {
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
          name: "Recebidas",
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
        colors: [tabler.getColor("danger")],
        legend: {
          show: false,
        },
      })).render();
    });
    // @formatter:on
</script>

{{-- Select Input das empresas-cliente --}}
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

{{-- Select Input dos colaboradores das empresas-cliente --}}
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