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
                    Cotações
                </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('account.business.quotations.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                              <path d="M12 5l0 14" />
                              <path d="M5 12l14 0" />
                            </svg>
                            Criar uma cotação
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
      'label' => 'Total de cotações',
      'chartColor' => 'primary',
      'chartBarLabel' => 'Recebidas',
      'chartId' => 'total-quotations',
      'chartData' => $quotationsCount
    ])
  </div>
  <div class="col-sm-6 col-lg-3">
    @livewire('apex-chart-bar', [
      'label' => 'Cotações respondidas',
      'chartColor' => 'success',
      'chartBarLabel' => 'Recebidas',
      'chartId' => 'responsed-quotations',
      'chartData' => $responsedQuotationsCount
    ])
  </div>
  <div class="col-sm-6 col-lg-3">
    @livewire('apex-chart-bar', [
      'label' => 'Cotações não respondidas',
      'chartColor' => 'danger',
      'chartBarLabel' => 'Não recebida',
      'chartId' => 'no-response-quotations',
      'chartData' => $noResponseQuotationsCount
    ])
  </div>
  <div class="col-12">
    <div class="row row-cards">
      <div class="col-sm-4 col-lg-4">
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
                  {{ $quotations->count() }} Cotações solicitadas ({{ date('Y') }})
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-lg-4">
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
                        $responsedQuotations = 0;
                        foreach ($quotations as $key => $quotation) {
                            if($quotation->responsed_at != null){
                                $responsedQuotations++;
                            }
                        }
                    @endphp
                  {{ $responsedQuotations }} Cotações recebidas ({{ date('Y') }})
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-lg-4">
          <div class="card card-sm">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-auto">
                  <span class="bg-red text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
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
                        $nonResponsedQuotations = 0;
                        foreach ($quotations as $key => $quotation) {
                            if($quotation->responsed_at == null){
                                $nonResponsedQuotations++;
                            }
                        }
                    @endphp
                    {{ $nonResponsedQuotations }} cotações não recebidas ({{ date('Y') }})
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  <div class="col-12">
    <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter table-bordered table-nowrap card-table">
                <thead>
                    <tr>
                        <td class="w-0">
                        </td>
                        <td class="text-center">
                            <div class="text-muted font-weight-medium">
                                Recebida
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="text-muted font-weight-medium">
                                Tempo de resposta
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="text-muted font-weight-medium">
                                Fornecedor
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="text-muted font-weight-medium">
                                Tempo de entrega
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="text-muted font-weight-medium">
                                Solicitado em
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="text-muted text-small font-weight-medium">
                                Respondido em
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="text-muted font-weight-medium">
                                Solicitado por
                            </div>
                        </td>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($organizedQuotationsByRequests as $organizedQuotation)
                  <tr class="bg-light">
                      <th colspan="4" class="subheader">
                          <a href="#">
                              (Código da Solicitação: {{ $organizedQuotation['request_code'] }})
                          </a>
                           - {{ $organizedQuotation['order'] }}
                      </th>
                  </tr>
                    @foreach ($organizedQuotation['quotations'] as $requestQuotations)
                    @php
                        $filePath = $requestQuotations->file->file_path ?? null;
                        $fileName = $requestQuotations->file->file_name ?? 'empty';
                        $responsedAt = $requestQuotations->responsed_at ?? null;
                    @endphp
                    <tr>
                        <td>
                            @if ($filePath !== null)
                            <a href="{{ URL::to('storage/' . $filePath )}}" target="_blank">
                                {{ $fileName }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-paperclip" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M15 7l-6.5 6.5a1.5 1.5 0 0 0 3 3l6.5 -6.5a3 3 0 0 0 -6 -6l-6.5 6.5a4.5 4.5 0 0 0 9 9l6.5 -6.5" />
                                </svg>
                            </a>
                            @else
                            <div class="text-muted">
                              {{ $fileName }}
                            </div>
                            @endif
                        </td>
                        <td class="text-center"><!-- Download SVG icon from http://tabler-icons.io/i/check -->
                          @if ($responsedAt !== null)
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                          @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-red" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M18 6l-12 12"></path><path d="M6 6l12 12"></path></svg>
                          @endif  
                        </td>
                        <td class="text-center">
                          @php
                              $dateDifference = date_difference($requestQuotations->responsed_at ?? date('Y-m-d'), $requestQuotations->requested_at)
                          @endphp
                          @if ($dateDifference <= 5)
                              <span class="badge bg-green">{{ $dateDifference }} dia{{ $dateDifference != 1 ? 's' : '' }}</span>
                          @elseif ($dateDifference <= 10)
                              <span class="badge bg-yellow">{{ $dateDifference }} dias</span>
                          @else
                              <span class="badge bg-red">{{ $dateDifference }} dias</span>
                          @endif
                        </td>
                        <td class="text-center">
                            <div class="text-muted">
                                {{ $requestQuotations->vendor ?? 'empty' }}
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="text-muted">
                                {{ $requestQuotations->delivery_time ?? 'empty' }}
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="text-muted">
                                {{ dateSeparator($requestQuotations->requested_at, '/') ?? 'empty' }}
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="text-muted">
                              {{ ($requestQuotations->responsed_at) ? dateSeparator($requestQuotations->responsed_at, '/') : 'empty' }}
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="text-muted">
                                {{ $requestQuotations->colaborator->fullname ?? 'empty' }}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                      <td></td>
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
@endsection