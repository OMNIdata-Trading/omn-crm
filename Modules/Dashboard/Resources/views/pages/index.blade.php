@extends('modules.account.layout.master')

@section('account.page.title')
Dashboard
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
                    Dashboard
                </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                  <div class="btn-list">
                      <div class="dropdown">
                        <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                          Novo Lead/Cliente
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a class="dropdown-item" href="{{ route('account.leads.businesses.create') }}">
                            Empresarial
                          </a>
                          <a class="dropdown-item" href="{{ route('account.leads.individuals.create') }}">
                            Particular
                          </a>
                        </div>
                      </div>
                      <a href="{{ route('account.business.requests.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                        Gerar novo negócio
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
        <div class="col-sm-6 col-lg-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="subheader">Metas atingidas</div>
                <div class="ms-auto lh-1">
                  <div class="dropdown">
                    <a class="dropdown-toggl text-muted" href="javascript:void(0)">
                      2023
                    </a>
                  </div>
                </div>
              </div>
              <div class="h1 mb-3">75%</div>
              <div class="d-flex mb-2">
                <div>
                  À atingir: 398.934.293
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
                <div class="subheader">Metas atingidas</div>
                <div class="ms-auto lh-1">
                  <div class="dropdown">
                    <a class="dropdown-toggl text-muted" href="javascript:void(0)">
                      2023
                    </a>
                  </div>
                </div>
              </div>
              <div class="h1 mb-3">75%</div>
              <div class="d-flex mb-2">
                <div>
                  À atingir: 398.934.293
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
      </div>
    </div>
    <div class="col-12">
      <div class="row row-cards">

        <div class="col-sm-6 col-lg-3">
          @livewire('apex-chart-revenue', [
            'label' => 'Receita',
            'chartColor' => 'success',
            'chartRevenueLabel' => 'Receita',
            'currentYearHighlightValue' => $currentYearRevenue,
            'lastYearRevenue' => $lastYearRevenue,
            'chartId' => 'dashboard',
            'chartData' => $totalRevenueFromYears
          ])
        </div>
        <div class="col-sm-6 col-lg-3">
          @livewire('apex-chart-multi', [
            'label' => 'Faturas',
            'chartId' => 'invoices',
            'chartSeries' => [
              [
                'name' => 'Elaboradas',
                'color' => 'pink',
                'data' => $newLeads['new-leads']
              ]
            ]
          ])
        </div>
        <div class="col-sm-6 col-lg-3">
          @livewire('apex-chart-multi', [
            'label' => 'Novos Clientes (Empresas)',
            'chartId' => 'new-leads-and-clients',
            'chartSeries' => [
              [
                'name' => 'Leads',
                'color' => 'orange',
                'data' => $newLeads['new-leads']
              ],
              [
                'name' => 'Clientes',
                'color' => 'success',
                'data' => $newClients['new-clients']
              ],
            ]
          ])
        </div>
        <div class="col-sm-6 col-lg-3">
          @livewire('apex-chart-multi', [
            'label' => 'Novos Clientes (Particulares)',
            'chartId' => 'new-individual-leads-and-clients',
            'chartSeries' => [
              [
                'name' => 'Leads',
                'color' => 'orange',
                'data' => $newIndividualLeads['new-individual-leads']
              ],
              [
                'name' => 'Clientes',
                'color' => 'success',
                'data' => $newIndividualClients['new-individual-clients']
              ],
            ]
          ])
        </div>

      </div>
    </div>
    <div class="col-12">
      <div class="row row-cards">
        <div class="col-sm-6 col-lg-3">
          <div class="card card-sm">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-auto">
                  <span class="bg-twitter text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
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
                    {{ $currentYearRequestsCount }} Solicitações ({{ date('Y') }})
                  </div>
                  <div class="text-muted">
                    {{  $requestsFromTodayCount }} recebidas hoje
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card card-sm">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-auto">
                  <span class="bg-facebook text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-dollar" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                      <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                      <path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5"></path>
                      <path d="M12 17v1m0 -8v1"></path>
                    </svg>
                  </span>
                </div>
                <div class="col">
                  <div class="font-weight-medium">
                    {{ $currentYearProposalsCount }} Propostas ({{ date('Y') }})
                  </div>
                  <div class="text-muted">
                    {{ $proposalsFromTodayCount }} geradas hoje
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card card-sm">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-auto">
                  <span class="bg-success text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trophy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M8 21l8 0"></path>
                      <path d="M12 17l0 4"></path>
                      <path d="M7 4l10 0"></path>
                      <path d="M17 4v8a5 5 0 0 1 -10 0v-8"></path>
                      <path d="M5 9m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                      <path d="M19 9m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                    </svg>
                  </span>
                </div>
                <div class="col">
                  <div class="font-weight-medium">
                    {{ $businessWon }} Negócios ganhos ({{ date('Y') }})
                  </div>
                  <div class="text-muted">
                    {{-- 5 esperando pagamento --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card card-sm">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-auto">
                  <span class="bg-warning text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg>
                  </span>
                </div>
                <div class="col">
                  <div class="font-weight-medium">
                    0 Ordens de Compra ({{ date('Y') }})
                  </div>
                  <div class="text-muted">
                    0 Entregues
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      @livewire('apex-chart-pie', [
        'label' => 'Recepção de Negócios',
        'chartBarLabel' => 'Angariados',
        'chartId' => 'income-methods',
        'chartData' => $pieChartData
      ])
    </div>
    <div class="col-lg-8">
      @livewire('apex-chart-spline', [
        'label' => 'Solicitações VS Propostas',
        'chartColors' => [ '#f59f00', '#206bc4' ],
        'chartCategory1Label' => 'Solicitações',
        'chartCategory2Label' => 'Propostas',
        'chartDataCategory1' => $requestCountsPerMonths,
        'chartDataCategory2' => $proposalCountsPerMonths,
        'chartMonths' => $monthsForRequestsVSProposalsChart
      ])
    </div>
    <div class="col-lg-6">
      <div class="row row-cards">
        <div class="col-12">
          <div class="card">
            <div class="card-body">

              <p class="mb-3">Estado das <strong> {{ $proposalsCount ?? 0 }} propostas </strong> de {{ date('Y') }}</p>
              <div class="progress progress-separated mb-3">
                @foreach ($proposalStatus as $statusName => $proposalCount)
                <div class="progress-bar bg-{{ $proposalProgressClassColors[$statusName] ?? 'default' }}" role="progressbar" style="width: {{ getThePercentage($proposalCount, $proposalsCount) }}" aria-label="{{$statusName}}"></div>
                @endforeach
              </div>

              <div class="row">
                @foreach ($proposalStatus as $statusName => $proposalCount)
                <div class="col-auto d-flex align-items-center pe-2">
                  <span class="legend me-2 bg-{{ $proposalProgressClassColors[$statusName] }}"></span>
                  <span>{{ $proposalProgressStatusLabels[$statusName] ?? 'Outro' }}</span>
                  <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">{{ $proposalCount }}</span>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="card" style="height: 28rem">
            <div class="card-body card-body-scrollable card-body-scrollable-shadow">
              <div class="divide-y">
                <div>
                  <div class="row">
                    <div class="col-auto">
                      <span class="avatar">{{ getTheInitialLetters("Sebastião Pedro") }}</span>
                    </div>
                    <div class="col">
                      <div class="text-truncate">
                        <strong>Sebastião Pedro</strong> concluiu a tarefa: <strong>Ligar para a Multitel</strong>.
                      </div>
                      <div class="text-muted">Ontem</div>
                    </div>
                    <div class="col-auto align-self-center">
                      <div class="badge bg-success"></div>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="row">
                    <div class="col-auto">
                      <span class="avatar">{{ getTheInitialLetters("Miguel Barros") }}</span>
                    </div>
                    <div class="col">
                      <div class="text-truncate">
                        <strong>Miguel Barros</strong> concluiu a tarefa: <strong>Responder à Angola Telecom</strong>.
                      </div>
                      <div class="text-muted">Ontem</div>
                    </div>
                    <div class="col-auto align-self-center">
                      <div class="badge bg-success"></div>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="row">
                    <div class="col-auto">
                      <span class="avatar">{{ getTheInitialLetters("Álvaro Adolfo") }}</span>
                    </div>
                    <div class="col">
                      <div class="text-truncate">
                        <strong>Álvaro Adolfo</strong> concluiu a tarefa: <strong>Contactar a Unitel</strong>.
                      </div>
                      <div class="text-muted">Ontem</div>
                    </div>
                    <div class="col-auto align-self-center">
                      <div class="badge bg-success"></div>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="row">
                    <div class="col-auto">
                      <span class="avatar">{{ getTheInitialLetters("Álvaro Adolfo") }}</span>
                    </div>
                    <div class="col">
                      <div class="text-truncate">
                        <strong>Álvaro Adolfo</strong> concluiu a tarefa: <strong>Contactar a Unitel</strong>.
                      </div>
                      <div class="text-muted">Ontem</div>
                    </div>
                    <div class="col-auto align-self-center">
                      <div class="badge bg-success"></div>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="row">
                    <div class="col-auto">
                      <span class="avatar">{{ getTheInitialLetters("Sebastião Pedro") }}</span>
                    </div>
                    <div class="col">
                      <div class="text-truncate">
                        <strong>Sebastião Pedro</strong> concluiu a tarefa: <strong>Ligar para a Multitel</strong>.
                      </div>
                      <div class="text-muted">Ontem</div>
                    </div>
                    <div class="col-auto align-self-center">
                      <div class="badge bg-success"></div>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="row">
                    <div class="col-auto">
                      <span class="avatar">{{ getTheInitialLetters("Miguel Barros") }}</span>
                    </div>
                    <div class="col">
                      <div class="text-truncate">
                        <strong>Miguel Barros</strong> concluiu a tarefa: <strong>Responder à Angola Telecom</strong>.
                      </div>
                      <div class="text-muted">Ontem</div>
                    </div>
                    <div class="col-auto align-self-center">
                      <div class="badge bg-success"></div>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="row">
                    <div class="col-auto">
                      <span class="avatar">{{ getTheInitialLetters("Sebastião Pedro") }}</span>
                    </div>
                    <div class="col">
                      <div class="text-truncate">
                        <strong>Sebastião Pedro</strong> concluiu a tarefa: <strong>Ligar para a Multitel</strong>.
                      </div>
                      <div class="text-muted">Ontem</div>
                    </div>
                    <div class="col-auto align-self-center">
                      <div class="badge bg-success"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header border-0">
          <div class="card-title">Envio de Propostas</div>
        </div>
        @livewire('apex-chart-sparkline', [
          'chartColor' => 'primary',
          'chartSparklineLabel' => 'Enviadas',
          'sentToday' => $proposalSentTodayForChart,
          'sentYesterday' => $proposalSentYesterdayForChart,
          'chartData' => $proposalsSentPerMonth
        ])
        <div class="card-table table-responsive">
          <table class="table table-vcenter">
            <thead>
              <tr>
                {{-- <th>Usuário</th> --}}
                <th>Actividade</th>
                <th>Data</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($proposalsSentTodayForTable as $proposal)
              <tr>
                <td class="td-truncate">
                  <div class="text-truncate">
                    @php
                        $companyOwner = $proposal->request->clients[0]->company->name ?? $proposal->request->individualClient->fullname;
                    @endphp
                    Proposta Nº {{ $proposal->order_number }}/{{ $proposal->year }} foi enviada para o cliente <strong>{{ $companyOwner }}</strong>
                  </div>
                </td>
                <td class="text-nowrap text-muted">Hoje</td>
              </tr>
              @empty
              <tr>
                <td colspan="2">No entries</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
    {{-- Advertisement --}}
    <div class="col-12">
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
    </div>
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Faturas ({{ date('Y') }})</h3>
        </div>
        <div class="card-body border-bottom py-3">
          <div class="d-flex">
            <div class="text-muted">
              Mostrar
              <div class="mx-2 d-inline-block">
                <input type="text" class="form-control form-control-sm" value="8" size="3" aria-label="Invoices count">
              </div>
              dados
            </div>
            <div class="ms-auto text-muted">
              Pesquisar:
              <div class="ms-2 d-inline-block">
                <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
              </div>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table card-table table-vcenter text-nowrap datatable">
            <thead>
              <tr>
                <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                <th class="w-1">No. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 15l6 -6l6 6" /></svg>
                </th>
                <th></th>
                <th>Client</th>
                <th>VAT No.</th>
                <th>Created</th>
                <th>Status</th>
                <th>Price</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                <td><span class="text-muted">001401</span></td>
                <td><a href="invoice.html" class="text-reset" tabindex="-1">Design Works</a></td>
                <td>
                  <span class="flag flag-country-us"></span>
                  Carlson Limited
                </td>
                <td>
                  87956621
                </td>
                <td>
                  15 Dec 2017
                </td>
                <td>
                  <span class="badge bg-success me-1"></span> Paid
                </td>
                <td>$887</td>
                <td class="text-end">
                  <span class="dropdown">
                    <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" href="#">
                        Action
                      </a>
                      <a class="dropdown-item" href="#">
                        Another action
                      </a>
                    </div>
                  </span>
                </td>
              </tr>
              <tr>
                <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                <td><span class="text-muted">001402</span></td>
                <td><a href="invoice.html" class="text-reset" tabindex="-1">UX Wireframes</a></td>
                <td>
                  <span class="flag flag-country-gb"></span>
                  Adobe
                </td>
                <td>
                  87956421
                </td>
                <td>
                  12 Apr 2017
                </td>
                <td>
                  <span class="badge bg-warning me-1"></span> Pending
                </td>
                <td>$1200</td>
                <td class="text-end">
                  <span class="dropdown">
                    <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" href="#">
                        Action
                      </a>
                      <a class="dropdown-item" href="#">
                        Another action
                      </a>
                    </div>
                  </span>
                </td>
              </tr>
              <tr>
                <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                <td><span class="text-muted">001403</span></td>
                <td><a href="invoice.html" class="text-reset" tabindex="-1">New Dashboard</a></td>
                <td>
                  <span class="flag flag-country-de"></span>
                  Bluewolf
                </td>
                <td>
                  87952621
                </td>
                <td>
                  23 Oct 2017
                </td>
                <td>
                  <span class="badge bg-warning me-1"></span> Pending
                </td>
                <td>$534</td>
                <td class="text-end">
                  <span class="dropdown">
                    <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" href="#">
                        Action
                      </a>
                      <a class="dropdown-item" href="#">
                        Another action
                      </a>
                    </div>
                  </span>
                </td>
              </tr>
              <tr>
                <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                <td><span class="text-muted">001404</span></td>
                <td><a href="invoice.html" class="text-reset" tabindex="-1">Landing Page</a></td>
                <td>
                  <span class="flag flag-country-br"></span>
                  Salesforce
                </td>
                <td>
                  87953421
                </td>
                <td>
                  2 Sep 2017
                </td>
                <td>
                  <span class="badge bg-secondary me-1"></span> Due in 2 Weeks
                </td>
                <td>$1500</td>
                <td class="text-end">
                  <span class="dropdown">
                    <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" href="#">
                        Action
                      </a>
                      <a class="dropdown-item" href="#">
                        Another action
                      </a>
                    </div>
                  </span>
                </td>
              </tr>
              <tr>
                <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                <td><span class="text-muted">001405</span></td>
                <td><a href="invoice.html" class="text-reset" tabindex="-1">Marketing Templates</a></td>
                <td>
                  <span class="flag flag-country-pl"></span>
                  Printic
                </td>
                <td>
                  87956621
                </td>
                <td>
                  29 Jan 2018
                </td>
                <td>
                  <span class="badge bg-danger me-1"></span> Paid Today
                </td>
                <td>$648</td>
                <td class="text-end">
                  <span class="dropdown">
                    <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" href="#">
                        Action
                      </a>
                      <a class="dropdown-item" href="#">
                        Another action
                      </a>
                    </div>
                  </span>
                </td>
              </tr>
              <tr>
                <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                <td><span class="text-muted">001406</span></td>
                <td><a href="invoice.html" class="text-reset" tabindex="-1">Sales Presentation</a></td>
                <td>
                  <span class="flag flag-country-br"></span>
                  Tabdaq
                </td>
                <td>
                  87956621
                </td>
                <td>
                  4 Feb 2018
                </td>
                <td>
                  <span class="badge bg-secondary me-1"></span> Due in 3 Weeks
                </td>
                <td>$300</td>
                <td class="text-end">
                  <span class="dropdown">
                    <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" href="#">
                        Action
                      </a>
                      <a class="dropdown-item" href="#">
                        Another action
                      </a>
                    </div>
                  </span>
                </td>
              </tr>
              <tr>
                <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                <td><span class="text-muted">001407</span></td>
                <td><a href="invoice.html" class="text-reset" tabindex="-1">Logo & Print</a></td>
                <td>
                  <span class="flag flag-country-us"></span>
                  Apple
                </td>
                <td>
                  87956621
                </td>
                <td>
                  22 Mar 2018
                </td>
                <td>
                  <span class="badge bg-success me-1"></span> Paid Today
                </td>
                <td>$2500</td>
                <td class="text-end">
                  <span class="dropdown">
                    <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" href="#">
                        Action
                      </a>
                      <a class="dropdown-item" href="#">
                        Another action
                      </a>
                    </div>
                  </span>
                </td>
              </tr>
              <tr>
                <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                <td><span class="text-muted">001408</span></td>
                <td><a href="invoice.html" class="text-reset" tabindex="-1">Icons</a></td>
                <td>
                  <span class="flag flag-country-pl"></span>
                  Tookapic
                </td>
                <td>
                  87956621
                </td>
                <td>
                  13 May 2018
                </td>
                <td>
                  <span class="badge bg-success me-1"></span> Paid Today
                </td>
                <td>$940</td>
                <td class="text-end">
                  <span class="dropdown">
                    <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" href="#">
                        Action
                      </a>
                      <a class="dropdown-item" href="#">
                        Another action
                      </a>
                    </div>
                  </span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="card-footer d-flex align-items-center">
          <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>16</span> entries</p>
          <ul class="pagination m-0 ms-auto">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>
                prev
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item">
              <a class="page-link" href="#">
                next <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('account.page.additionals')
{{-- <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New report</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" name="example-text-input" placeholder="Your report name">
        </div>
        <label class="form-label">Report type</label>
        <div class="form-selectgroup-boxes row mb-3">
          <div class="col-lg-6">
            <label class="form-selectgroup-item">
              <input type="radio" name="report-type" value="1" class="form-selectgroup-input" checked>
              <span class="form-selectgroup-label d-flex align-items-center p-3">
                <span class="me-3">
                  <span class="form-selectgroup-check"></span>
                </span>
                <span class="form-selectgroup-label-content">
                  <span class="form-selectgroup-title strong mb-1">Simple</span>
                  <span class="d-block text-muted">Provide only basic data needed for the report</span>
                </span>
              </span>
            </label>
          </div>
          <div class="col-lg-6">
            <label class="form-selectgroup-item">
              <input type="radio" name="report-type" value="1" class="form-selectgroup-input">
              <span class="form-selectgroup-label d-flex align-items-center p-3">
                <span class="me-3">
                  <span class="form-selectgroup-check"></span>
                </span>
                <span class="form-selectgroup-label-content">
                  <span class="form-selectgroup-title strong mb-1">Advanced</span>
                  <span class="d-block text-muted">Insert charts and additional advanced analyses to be inserted in the report</span>
                </span>
              </span>
            </label>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8">
            <div class="mb-3">
              <label class="form-label">Report url</label>
              <div class="input-group input-group-flat">
                <span class="input-group-text">
                  https://tabler.io/reports/
                </span>
                <input type="text" class="form-control ps-0"  value="report-01" autocomplete="off">
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="mb-3">
              <label class="form-label">Visibility</label>
              <select class="form-select">
                <option value="1" selected>Private</option>
                <option value="2">Public</option>
                <option value="3">Hidden</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-6">
            <div class="mb-3">
              <label class="form-label">Client name</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="mb-3">
              <label class="form-label">Reporting period</label>
              <input type="date" class="form-control">
            </div>
          </div>
          <div class="col-lg-12">
            <div>
              <label class="form-label">Additional information</label>
              <textarea class="form-control" rows="3"></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
          Cancel
        </a>
        <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
          <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
          Create new report
        </a>
      </div>
    </div>
  </div>
</div> --}}
@endsection

@section('account.page.scripts')
<!-- Libs JS -->
<script src="{{ URL::to('dist/libs/apexcharts/dist/apexcharts.min.js?1684106062') }}" defer></script>
@endsection