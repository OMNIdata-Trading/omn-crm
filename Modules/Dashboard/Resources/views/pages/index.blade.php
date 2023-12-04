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
                    <span class="d-none d-sm-inline">
                    <a href="#" class="btn">
                        Novo Lead
                    </a>
                    </span>
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                    Gerar novo negócio
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
            <div class="subheader">Metas atingidas</div>
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
            <div class="subheader">Receita</div>
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
            <div class="h1 mb-0 me-2">32.342.300</div>
            <div class="me-auto">
              <span class="text-green d-inline-flex align-items-center lh-1">
                8% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 17l6 -6l4 4l8 -8" /><path d="M14 7l7 0l0 7" /></svg> --}}
                {{-- Trending up --}}
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M3 17l6 -6l4 4l8 -8" />
                    <path d="M14 7l7 0l0 7" />
                  </svg>
                  {{-- Trending down --}}
                  {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M3 7l6 6l4 -4l8 8"></path>
                    <path d="M21 10l0 7l-7 0"></path>
                  </svg> --}}
              </span>
            </div>
          </div>
        </div>
        <div id="chart-revenue-bg" class="chart-sm"></div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="subheader">Users & Colaboradores</div>
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
            <div class="h1 mb-3 me-2">6,782</div>
            <div class="me-auto">
              {{-- <span class="text-yellow d-inline-flex align-items-center lh-1">
                0% <!-- Download SVG icon from http://tabler-icons.io/i/minus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /></svg>
              </span> --}}
            </div>
          </div>
          <div id="chart-users-colaborators" class="chart-sm"></div>
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
            <div class="h1 mb-3 me-2">2,986</div>
            <div class="me-auto">
              {{-- <span class="text-green d-inline-flex align-items-center lh-1">
                4% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 17l6 -6l4 4l8 -8" /><path d="M14 7l7 0l0 7" /></svg>
              </span> --}}
            </div>
          </div>
          <div id="chart-new-users" class="chart-sm"></div>
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
                    62 Solicitações ({{ date('Y') }})
                  </div>
                  <div class="text-muted">
                    16 recebidas hoje
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
                    62 Propostas ({{ date('Y') }})
                  </div>
                  <div class="text-muted">
                    11 geradas hoje
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
                  <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
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
                    13 Negócios ganhos ({{ date('Y') }})
                  </div>
                  <div class="text-muted">
                    5 esperando pagamento
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
                  <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg>
                  </span>
                </div>
                <div class="col">
                  <div class="font-weight-medium">
                    8 Ordens de Compra ({{ date('Y') }})
                  </div>
                  <div class="text-muted">
                    8 transportados
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">Recepção de negócios</h3>
          <div id="chart-demo-pie"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-8">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">Solicitações VS Propostas</h3>
          <div id="chart-area-spline-stacked"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="row row-cards">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <p class="mb-3">Estado das <strong> 75 propostas </strong> de {{ date('Y') }}</p>
              <div class="progress progress-separated mb-3">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 58.6%" aria-label="Negociação"></div>
                <div class="progress-bar bg-warning" role="progressbar" style="width: 16%" aria-label="Em Aberto"></div>
                <div class="progress-bar bg-success" role="progressbar" style="width: 13.3%" aria-label="Adjudicadas"></div>
                <div class="progress-bar bg-danger" role="progressbar" style="width: 12%" aria-label="Perdidas"></div>
              </div>
              <div class="row">
                <div class="col-auto d-flex align-items-center pe-2">
                  <span class="legend me-2 bg-primary"></span>
                  <span>Negociação</span>
                  <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">44</span>
                </div>
                <div class="col-auto d-flex align-items-center px-2">
                  <span class="legend me-2 bg-warning"></span>
                  <span>Em aberto</span>
                  <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">12</span>
                </div>
                <div class="col-auto d-flex align-items-center px-2">
                  <span class="legend me-2 bg-success"></span>
                  <span>Adjudicadas</span>
                  <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">10</span>
                </div>
                <div class="col-auto d-flex align-items-center px-2">
                  <span class="legend me-2 bg-danger"></span>
                  <span>Perdidas</span>
                  <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">9</span>
                </div>
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
        <div class="position-relative">
          <div class="position-absolute top-0 left-0 px-3 mt-1 w-75">
            <div class="row g-2">
              <div class="col-auto">
                <div class="chart-sparkline chart-sparkline-square" id="sparkline-activity"></div>
              </div>
              <div class="col">
                <div>Enviadas hoje: 5</div>
                <div class="text-muted"><!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                  {{-- Trending up --}}
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M3 17l6 -6l4 4l8 -8" />
                    <path d="M14 7l7 0l0 7" />
                  </svg>
                  {{-- Trending down --}}
                  {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline text-red" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M3 7l6 6l4 -4l8 8"></path>
                    <path d="M21 10l0 7l-7 0"></path>
                  </svg> --}}
                  Mais 1 que o dia de ontem</div>
              </div>
            </div>
          </div>
          <div id="chart-sent-proposals"></div>
        </div>
        <div class="card-table table-responsive">
          <table class="table table-vcenter">
            <thead>
              <tr>
                <th>Usuário</th>
                <th>Actividade</th>
                <th>Data</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="w-1">
                  <span class="avatar avatar-sm">
                    SP
                  </span>
                </td>
                <td class="td-truncate">
                  <div class="text-truncate">
                    Proposta Nº 23 foi enviada para a <strong>Multitel</strong>
                  </div>
                </td>
                <td class="text-nowrap text-muted">Hoje</td>
              </tr>
              <tr>
                <td class="w-1">
                  <span class="avatar avatar-sm">
                    AA
                  </span>
                </td>
                <td class="td-truncate">
                  <div class="text-truncate">
                    Proposta Nº 43 foi enviada para a <strong>Unitel</strong>
                  </div>
                </td>
                <td class="text-nowrap text-muted">Hoje</td>
              </tr>
              <tr>
                <td class="w-1">
                  <span class="avatar avatar-sm">
                    MB
                  </span>
                </td>
                <td class="td-truncate">
                  <div class="text-truncate">
                    Proposta Nº 45 foi enviada para a <strong>Angola Cables</strong>
                  </div>
                </td>
                <td class="text-nowrap text-muted">Hoje</td>
              </tr>
              <tr>
                <td class="w-1">
                  <span class="avatar avatar-sm">
                    AA
                  </span>
                </td>
                <td class="td-truncate">
                  <div class="text-truncate">
                    Proposta Nº 56 foi enviada para a <strong>Unitel</strong>
                  </div>
                </td>
                <td class="text-nowrap text-muted">Hoje</td>
              </tr>
              <tr>
                <td class="w-1">
                  <span class="avatar avatar-sm">
                    AA
                  </span>
                </td>
                <td class="td-truncate">
                  <div class="text-truncate">
                    Proposta Nº 43 foi enviada para a <strong>Unitel</strong>
                  </div>
                </td>
                <td class="text-nowrap text-muted">Hoje</td>
              </tr>
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
    {{-- <div class="col-md-12 col-lg-8">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Most Visited Pages</h3>
        </div>
        <div class="card-table table-responsive">
          <table class="table table-vcenter">
            <thead>
              <tr>
                <th>Page name</th>
                <th>Visitors</th>
                <th>Unique</th>
                <th colspan="2">Bounce rate</th>
              </tr>
            </thead>
            <tr>
              <td>
                /
                <a href="#" class="ms-1" aria-label="Open website"><!-- Download SVG icon from http://tabler-icons.io/i/link -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 15l6 -6" /><path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" /><path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" /></svg>
                </a>
              </td>
              <td class="text-muted">4,896</td>
              <td class="text-muted">3,654</td>
              <td class="text-muted">82.54%</td>
              <td class="text-end w-1">
                <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-1"></div>
              </td>
            </tr>
            <tr>
              <td>
                /form-elements.html
                <a href="#" class="ms-1" aria-label="Open website"><!-- Download SVG icon from http://tabler-icons.io/i/link -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 15l6 -6" /><path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" /><path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" /></svg>
                </a>
              </td>
              <td class="text-muted">3,652</td>
              <td class="text-muted">3,215</td>
              <td class="text-muted">76.29%</td>
              <td class="text-end w-1">
                <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-2"></div>
              </td>
            </tr>
            <tr>
              <td>
                /index.html
                <a href="#" class="ms-1" aria-label="Open website"><!-- Download SVG icon from http://tabler-icons.io/i/link -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 15l6 -6" /><path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" /><path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" /></svg>
                </a>
              </td>
              <td class="text-muted">3,256</td>
              <td class="text-muted">2,865</td>
              <td class="text-muted">72.65%</td>
              <td class="text-end w-1">
                <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-3"></div>
              </td>
            </tr>
            <tr>
              <td>
                /icons.html
                <a href="#" class="ms-1" aria-label="Open website"><!-- Download SVG icon from http://tabler-icons.io/i/link -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 15l6 -6" /><path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" /><path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" /></svg>
                </a>
              </td>
              <td class="text-muted">986</td>
              <td class="text-muted">865</td>
              <td class="text-muted">44.89%</td>
              <td class="text-end w-1">
                <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-4"></div>
              </td>
            </tr>
            <tr>
              <td>
                /docs/
                <a href="#" class="ms-1" aria-label="Open website"><!-- Download SVG icon from http://tabler-icons.io/i/link -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 15l6 -6" /><path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" /><path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" /></svg>
                </a>
              </td>
              <td class="text-muted">912</td>
              <td class="text-muted">822</td>
              <td class="text-muted">41.12%</td>
              <td class="text-end w-1">
                <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-5"></div>
              </td>
            </tr>
            <tr>
              <td>
                /accordion.html
                <a href="#" class="ms-1" aria-label="Open website"><!-- Download SVG icon from http://tabler-icons.io/i/link -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 15l6 -6" /><path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" /><path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" /></svg>
                </a>
              </td>
              <td class="text-muted">855</td>
              <td class="text-muted">798</td>
              <td class="text-muted">32.65%</td>
              <td class="text-end w-1">
                <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-6"></div>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div> --}}
    {{-- <div class="col-md-6 col-lg-4">
      <a href="https://github.com/sponsors/codecalm" class="card card-sponsor" target="_blank" rel="noopener" style="background-image: url(./static/sponsor-banner-homepage.svg)" aria-label="Sponsor Tabler!">
        <div class="card-body"></div>
      </a>
    </div> --}}
    {{-- <div class="col-md-6 col-lg-4">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Social Media Traffic</h3>
        </div>
        <table class="table card-table table-vcenter">
          <thead>
            <tr>
              <th>Network</th>
              <th colspan="2">Visitors</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Instagram</td>
              <td>3,550</td>
              <td class="w-50">
                <div class="progress progress-xs">
                  <div class="progress-bar bg-primary" style="width: 71.0%"></div>
                </div>
              </td>
            </tr>
            <tr>
              <td>Twitter</td>
              <td>1,798</td>
              <td class="w-50">
                <div class="progress progress-xs">
                  <div class="progress-bar bg-primary" style="width: 35.96%"></div>
                </div>
              </td>
            </tr>
            <tr>
              <td>Facebook</td>
              <td>1,245</td>
              <td class="w-50">
                <div class="progress progress-xs">
                  <div class="progress-bar bg-primary" style="width: 24.9%"></div>
                </div>
              </td>
            </tr>
            <tr>
              <td>TikTok</td>
              <td>986</td>
              <td class="w-50">
                <div class="progress progress-xs">
                  <div class="progress-bar bg-primary" style="width: 19.72%"></div>
                </div>
              </td>
            </tr>
            <tr>
              <td>Pinterest</td>
              <td>854</td>
              <td class="w-50">
                <div class="progress progress-xs">
                  <div class="progress-bar bg-primary" style="width: 17.08%"></div>
                </div>
              </td>
            </tr>
            <tr>
              <td>VK</td>
              <td>650</td>
              <td class="w-50">
                <div class="progress progress-xs">
                  <div class="progress-bar bg-primary" style="width: 13.0%"></div>
                </div>
              </td>
            </tr>
            <tr>
              <td>Pinterest</td>
              <td>420</td>
              <td class="w-50">
                <div class="progress progress-xs">
                  <div class="progress-bar bg-primary" style="width: 8.4%"></div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div> --}}
    {{-- <div class="col-md-12 col-lg-8">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tasks</h3>
        </div>
        <div class="table-responsive">
          <table class="table card-table table-vcenter">
            <tr>
              <td class="w-1 pe-0">
                <input type="checkbox" class="form-check-input m-0 align-middle" aria-label="Select task" checked >
              </td>
              <td class="w-100">
                <a href="#" class="text-reset">Extend the data model.</a>
              </td>
              <td class="text-nowrap text-muted">
                <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M11 15h1" /><path d="M12 15v3" /></svg>
                August 04, 2021
              </td>
              <td class="text-nowrap">
                <a href="#" class="text-muted">
                  <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                  2/7
                </a>
              </td>
              <td class="text-nowrap">
                <a href="#" class="text-muted">
                  <!-- Download SVG icon from http://tabler-icons.io/i/message -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9h8" /><path d="M8 13h6" /><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" /></svg>
                  3</a>
              </td>
              <td>
                <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
              </td>
            </tr>
            <tr>
              <td class="w-1 pe-0">
                <input type="checkbox" class="form-check-input m-0 align-middle" aria-label="Select task" >
              </td>
              <td class="w-100">
                <a href="#" class="text-reset">Verify the event flow.</a>
              </td>
              <td class="text-nowrap text-muted">
                <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M11 15h1" /><path d="M12 15v3" /></svg>
                January 03, 2019
              </td>
              <td class="text-nowrap">
                <a href="#" class="text-muted">
                  <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                  3/10
                </a>
              </td>
              <td class="text-nowrap">
                <a href="#" class="text-muted">
                  <!-- Download SVG icon from http://tabler-icons.io/i/message -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9h8" /><path d="M8 13h6" /><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" /></svg>
                  6</a>
              </td>
              <td>
                <span class="avatar avatar-sm">JL</span>
              </td>
            </tr>
            <tr>
              <td class="w-1 pe-0">
                <input type="checkbox" class="form-check-input m-0 align-middle" aria-label="Select task" >
              </td>
              <td class="w-100">
                <a href="#" class="text-reset">Database backup and maintenance</a>
              </td>
              <td class="text-nowrap text-muted">
                <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M11 15h1" /><path d="M12 15v3" /></svg>
                December 28, 2018
              </td>
              <td class="text-nowrap">
                <a href="#" class="text-muted">
                  <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                  0/6
                </a>
              </td>
              <td class="text-nowrap">
                <a href="#" class="text-muted">
                  <!-- Download SVG icon from http://tabler-icons.io/i/message -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9h8" /><path d="M8 13h6" /><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" /></svg>
                  1</a>
              </td>
              <td>
                <span class="avatar avatar-sm" style="background-image: url(./static/avatars/002m.jpg)"></span>
              </td>
            </tr>
            <tr>
              <td class="w-1 pe-0">
                <input type="checkbox" class="form-check-input m-0 align-middle" aria-label="Select task" checked >
              </td>
              <td class="w-100">
                <a href="#" class="text-reset">Identify the implementation team.</a>
              </td>
              <td class="text-nowrap text-muted">
                <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M11 15h1" /><path d="M12 15v3" /></svg>
                November 07, 2020
              </td>
              <td class="text-nowrap">
                <a href="#" class="text-muted">
                  <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                  6/10
                </a>
              </td>
              <td class="text-nowrap">
                <a href="#" class="text-muted">
                  <!-- Download SVG icon from http://tabler-icons.io/i/message -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9h8" /><path d="M8 13h6" /><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" /></svg>
                  12</a>
              </td>
              <td>
                <span class="avatar avatar-sm" style="background-image: url(./static/avatars/003m.jpg)"></span>
              </td>
            </tr>
            <tr>
              <td class="w-1 pe-0">
                <input type="checkbox" class="form-check-input m-0 align-middle" aria-label="Select task" >
              </td>
              <td class="w-100">
                <a href="#" class="text-reset">Define users and workflow</a>
              </td>
              <td class="text-nowrap text-muted">
                <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M11 15h1" /><path d="M12 15v3" /></svg>
                November 23, 2021
              </td>
              <td class="text-nowrap">
                <a href="#" class="text-muted">
                  <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                  3/7
                </a>
              </td>
              <td class="text-nowrap">
                <a href="#" class="text-muted">
                  <!-- Download SVG icon from http://tabler-icons.io/i/message -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9h8" /><path d="M8 13h6" /><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" /></svg>
                  5</a>
              </td>
              <td>
                <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000f.jpg)"></span>
              </td>
            </tr>
            <tr>
              <td class="w-1 pe-0">
                <input type="checkbox" class="form-check-input m-0 align-middle" aria-label="Select task" checked >
              </td>
              <td class="w-100">
                <a href="#" class="text-reset">Check Pull Requests</a>
              </td>
              <td class="text-nowrap text-muted">
                <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M11 15h1" /><path d="M12 15v3" /></svg>
                January 14, 2021
              </td>
              <td class="text-nowrap">
                <a href="#" class="text-muted">
                  <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                  2/9
                </a>
              </td>
              <td class="text-nowrap">
                <a href="#" class="text-muted">
                  <!-- Download SVG icon from http://tabler-icons.io/i/message -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9h8" /><path d="M8 13h6" /><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" /></svg>
                  3</a>
              </td>
              <td>
                <span class="avatar avatar-sm" style="background-image: url(./static/avatars/001f.jpg)"></span>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div> --}}
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
<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
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
</div>
@endsection

@section('account.page.scripts')
<!-- Libs JS -->
<script src="{{ URL::to('dist/libs/apexcharts/dist/apexcharts.min.js?1684106062') }}" defer></script>
{{-- <script src="{{ URL::to('dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1684106062') }}" defer></script> --}}
{{-- <script src="{{ URL::to('dist/libs/jsvectormap/dist/maps/world.js?1684106062') }}" defer></script>
<script src="{{ URL::to('dist/libs/jsvectormap/dist/maps/world-merc.js?1684106062') }}" defer></script> --}}

{{-- Gráfico de Receitas --}}
<script>
  // @formatter:off
  document.addEventListener("DOMContentLoaded", function () {
    window.ApexCharts && (new ApexCharts(document.getElementById('chart-revenue-bg'), {
      chart: {
        type: "area",
        fontFamily: 'inherit',
        height: 40.0,
        sparkline: {
          enabled: true
        },
        animations: {
          enabled: false
        },
      },
      dataLabels: {
        enabled: false,
      },
      fill: {
        opacity: .16,
        type: 'solid'
      },
      stroke: {
        width: 2,
        lineCap: "round",
        curve: "smooth",
      },
      series: [{
        name: "Adjudicações",
        data: [
          37,
          35,
          44,
          44,
          // 28,
          // 36,
          // 24,
          // 65,
          // 31,
          // 37,
          // 39,
          // 62,
          // 51,
          // 35,
          // 41,
          // 35,
          // 27,
          // 93,
          // 53,
          // 61,
          // 27,
          // 54,
          // 43,
          // 19,
          // 46,
          // 39,
          // 62,
          // 51,
          // 35,
          // 41,
          // 67
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
        type: 'month',
      },
      yaxis: {
        labels: {
          padding: 4
        },
      },
      labels: [
        '{{ date('Y') }}',
        '2022',
        '2021',
        '2020',
        // '2020-06-23',
        // '2020-06-24',
        // '2020-06-25',
        // '2020-06-26',
        // '2020-06-27',
        // '2020-06-28',
        // '2020-06-29',
        // '2020-06-30',
        // '2020-07-01',
        // '2020-07-02',
        // '2020-07-03',
        // '2020-07-04',
        // '2020-07-05',
        // '2020-07-06',
        // '2020-07-07',
        // '2020-07-08',
        // '2020-07-09',
        // '2020-07-10',
        // '2020-07-11',
        // '2020-07-12',
        // '2020-07-13',
        // '2020-07-14',
        // '2020-07-15',
        // '2020-07-16',
        // '2020-07-17',
        // '2020-07-18',
        // '2020-07-19'
      ],
      colors: [tabler.getColor("success")],
      legend: {
        show: false,
      },
    })).render();
  });
  // @formatter:on
</script>
{{-- Gráfico de Users & Colaborators --}}
<script>
  // @formatter:off
  document.addEventListener("DOMContentLoaded", function () {
    window.ApexCharts && (new ApexCharts(document.getElementById('chart-users-colaborators'), {
      chart: {
        type: "line",
        fontFamily: 'inherit',
        height: 40.0,
        sparkline: {
          enabled: true
        },
        animations: {
          enabled: false
        },
      },
      fill: {
        opacity: 1,
      },
      stroke: {
        width: [2, 1],
        dashArray: [0, 3],
        lineCap: "round",
        curve: "smooth",
      },
      series: [{
        name: "Users",
        data: [37, 35, 44, 28]
      },{
        name: "Colaborators",
        data: [93, 54, 51, 24]
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
        type: 'year',
      },
      yaxis: {
        labels: {
          padding: 4
        },
      },
      labels: [
        '{{ date('Y') }}',
        '2022',
        '2021',
        '2020',
      ],
      colors: [tabler.getColor("primary"), tabler.getColor("gray-600")],
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
    window.ApexCharts && (new ApexCharts(document.getElementById('chart-new-users'), {
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
        '{{ date('Y') }}',
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

{{-- Gráfico de Recepção de negócios --}}
<script>
  // @formatter:off
  document.addEventListener("DOMContentLoaded", function () {
    window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie'), {
      chart: {
        type: "donut",
        fontFamily: 'inherit',
        height: 240,
        sparkline: {
          enabled: true
        },
        animations: {
          enabled: false
        },
      },
      fill: {
        opacity: 1,
      },
      series: [44, 5, 10, 2],
      labels: ["E-mail", "Mensagem de Texto", "Mídias Sociais", "Outros"],
      tooltip: {
        theme: 'dark'
      },
      grid: {
        strokeDashArray: 4,
      },
      colors: [tabler.getColor("success"), tabler.getColor("primary", 0.8), tabler.getColor("primary"), tabler.getColor("gray-400")],
      legend: {
        show: true,
        position: 'bottom',
        offsetY: 12,
        markers: {
          width: 10,
          height: 10,
          radius: 100,
        },
        itemMargin: {
          horizontal: 8,
          vertical: 8
        },
      },
      tooltip: {
        fillSeriesColor: false
      },
    })).render();
  });
  // @formatter:on
</script>

{{-- Gráfico de Solicitações VS Propostas --}}
<script>
  // @formatter:off
  document.addEventListener("DOMContentLoaded", function () {
    window.ApexCharts && (new ApexCharts(document.getElementById('chart-area-spline-stacked'), {
      chart: {
        type: "area",
        fontFamily: 'inherit',
        height: 240,
        parentHeightOffset: 0,
        toolbar: {
          show: false,
        },
        animations: {
          enabled: false
        },
        stacked: true,
      },
      dataLabels: {
        enabled: false,
      },
      fill: {
        opacity: .16,
        type: 'solid'
      },
      stroke: {
        width: 2,
        lineCap: "round",
        curve: "smooth",
      },
      series: [{
        name: "Solicitações",
        data: [11, 8, 15, 18, 19, 17]
      },{
        name: "Propostas",
        data: [7, 7, 5, 7, 9, 12]
      }],
      tooltip: {
        theme: 'dark'
      },
      grid: {
        padding: {
          top: -20,
          right: 0,
          left: -4,
          bottom: -4
        },
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
        categories: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
      },
      yaxis: {
        labels: {
          padding: 4
        },
      },
      colors: [tabler.getColor("primary"), tabler.getColor("pink")],
      legend: {
        show: false,
      },
    })).render();
  });
  // @formatter:on
</script>

{{-- Gráfico de Envio de Propostas --}}
<script>
  // @formatter:off
  document.addEventListener("DOMContentLoaded", function () {
    window.ApexCharts && (new ApexCharts(document.getElementById('chart-sent-proposals'), {
      chart: {
        type: "area",
        fontFamily: 'inherit',
        height: 192,
        sparkline: {
          enabled: true
        },
        animations: {
          enabled: false
        },
      },
      dataLabels: {
        enabled: false,
      },
      fill: {
        opacity: .16,
        type: 'solid'
      },
      stroke: {
        width: 2,
        lineCap: "round",
        curve: "smooth",
      },
      series: [{
        name: "Proposals",
        data: [
          3,
          5,
          4,
          6,
          7,
          5,
          6,
          8,
          24,
          7,
          12,
          5,
          6,
          3,
          8,
          4,
          14,
          30,
          17,
          19,
          15,
          14,
          25,
          32,
          40,
          55,
          60,
          48,
          52,
          70
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
        type: 'datetime',
      },
      yaxis: {
        labels: {
          padding: 4
        },
      },
      labels: [
        '{{ date('Y') }}-06-20',
        '2023-06-21',
        '2023-06-22',
        '2023-06-23',
        '2023-06-24',
        '2023-06-25',
        '2023-06-26',
        '2023-06-27',
        '2023-06-28',
        '2023-06-29',
        '2023-06-30',
        '2023-07-01',
        '2023-07-02',
        '2023-07-03',
        '2023-07-04',
        '2023-07-05',
        '2023-07-06',
        '2023-07-07',
        '2023-07-08',
        '2023-07-09',
        '2023-07-10',
        '2023-07-11',
        '2023-07-12',
        '2023-07-13',
        '2023-07-14',
        '2023-07-15',
        '2023-07-16',
        '2023-07-17',
        '2023-07-18',
        '2023-07-19'
      ],
      colors: [tabler.getColor("primary")],
      legend: {
        show: false,
      },
      point: {
        show: false
      },
    })).render();
  });
  // @formatter:on
</script>
@endsection