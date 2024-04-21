@extends('modules.account.layout.master')

@section('account.page.title')
Leads & Clientes @yield('page-section')
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
                    Leads & Clientes @yield('page-section')
                </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('account.leads.businesses.create') }}" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
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
        @yield('widgets-with-charts')
        <div class="col-12">
            @yield('leads-page-content')
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