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
                      {{-- <span class="d-none d-sm-inline">
                        <a href="#" class="btn">
                          New view
                        </a>
                      </span> --}}
                      <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-lead">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                        Registro rápido de lead
                      </a>
                      <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-lead" aria-label="Create new report">
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
<div class="col-lg-12">
  <div class="row row-cards">
    <div class="col-12">
      
      <livewire:requests::create-requests>

    </div>
  </div>
</div>
@endsection

@section('account.page.additionals')
<div class="modal modal-blur fade" id="modal-lead" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <livewire:requests::create-client-fastly />
  </div>
</div>
@endsection

@section('account.page.scripts')

  <script src="{{ URL::to('dist/libs/tom-select/dist/js/tom-select.base.min.js?1684106062') }}" defer></script>

  <!-- Tabler Core -->
  <script src="{{ URL::to('dist/js/tabler.min.js?1684106062') }}" defer></script>
  <script src="{{ URL::to('dist/js/demo.min.js?1684106062') }}" defer></script>

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

  {{-- Select input dos colaboradores a serem atribuídos tarefas --}}
  <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
      var el;
      window.TomSelect && (new TomSelect(el = document.getElementById('select-colaborators-to-task'), {
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