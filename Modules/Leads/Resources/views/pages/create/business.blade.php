@extends('modules.account.layout.master')

@section('account.page.title')
Criar um Lead
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
                    Leads & Clientes (Empresas)
                </h2>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('account.page.content')
<div class="row row-deck row-cards">
  <div class="col-lg-12">
    <div class="row row-cards">
      <div class="col-12">

        <livewire:leads::create-lead />

      </div>
    </div>
  </div>
</div>
@endsection

@section('account.page.scripts')
  <script src="{{ URL::to('dist/libs/tom-select/dist/js/tom-select.base.min.js?1684106062') }}" defer></script>
@endsection