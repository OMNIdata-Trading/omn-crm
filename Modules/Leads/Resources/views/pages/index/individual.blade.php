@extends('leads::template.master')

@section('page-section')
  (Particulares)
@endsection

@section('widgets-with-charts')
<div class="col-12">
  <div class="row row-cards">
    <div class="col-sm-12 col-lg-3">
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
  </div>
</div>
<div class="col-12">
  <div class="row row-cards">
    {{-- <div class="col-sm-6 col-lg-3">
      @livewire('apex-chart-bar', [
        'label' => 'Novos Leads (Empresas)',
        'chartColor' => 'orange',
        'chartBarLabel' => 'Angariados',
        'chartId' => 'new-leads',
        'chartData' => $widgetCharts['new-leads']
      ])
    </div> --}}
    {{-- <div class="col-sm-6 col-lg-3">
      @livewire('apex-chart-bar', [
        'label' => 'Novos Clientes (Empresas)',
        'chartColor' => 'success',
        'chartBarLabel' => 'Angariados',
        'chartId' => 'new-clients',
        'chartData' => $widgetCharts['new-clients']
      ])
    </div> --}}
    <div class="col-sm-6 col-lg-3">
      @livewire('apex-chart-bar', [
        'label' => 'Novos Leads (Particulares)',
        'chartColor' => 'orange',
        'chartBarLabel' => 'Angariados',
        'chartId' => 'new-individual-leads',
        'chartData' => $widgetCharts['new-individual-leads']
      ])
    </div>
    <div class="col-sm-6 col-lg-3">
      @livewire('apex-chart-bar', [
        'label' => 'Novos Clientes (Particulares)',
        'chartColor' => 'success',
        'chartBarLabel' => 'Angariados',
        'chartId' => 'new-individual-clients',
        'chartData' => $widgetCharts['new-individual-clients']
      ])
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
              <span class="bg-orange text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
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
                {{ $widgetCharts['new-current-year-individual-leads'] }} Lead{{ $widgetCharts['new-current-year-individual-leads'] > 1 ? 's' : '' }} de {{ date('Y') }} - (Particulares)
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
                  {{ $widgetCharts['new-current-year-individual-clients'] }} Cliente{{ $widgetCharts['new-current-year-individual-clients'] > 1 ? 's' : '' }} de {{ date('Y') }} - (Particulares)
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection

@section('leads-page-content')
<div class="card">
  <div class="table-responsive">
    <table class="table table-vcenter table-mobile-md card-table">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Endereços</th>
          <th>Contactos</th>
          <th>Status</th>
          <th class="w-1"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($leads as $lead)
        <tr>
          @php
              // dd($lead->logo_path == null);
          @endphp
          <td data-label="Name" >
            <div class="d-flex py-1 align-items-center">
              <span class="avatar me-2"> {{ getTheInitialLetters($lead->fullname) }} </span>
              <div class="flex-fill">
                <div class="font-weight-medium">{{ $lead->fullname }}</div>
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
              <a href="#" class="text-reset">{{ $lead->email ?? 'empty' }}</a>
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
          <td class="text-muted" data-label="Role" >
            <div>
              @if ($lead->status == 'client')
              <span class="badge bg-success me-1"></span> Cliente
              @else
              <span class="badge bg-warning me-1"></span> Lead
              @endif
            </div>
            <div class="text-muted">
                <div class="text-muted">No. de solicitações: {{ $lead->requests->count() }}</div>
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
@endsection