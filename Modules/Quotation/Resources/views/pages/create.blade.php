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
                      {{-- <span class="d-none d-sm-inline">
                        <a href="#" class="btn">
                          New view
                        </a>
                      </span> --}}
                    </div>
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
        
        @if($errors->any())
        <div class="alert alert-important alert-danger alert-dismissible" role="alert">
            <div class="d-flex">
                <div>
                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 8v4" /><path d="M12 16h.01" /></svg>
                </div>
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
        @endif
        {{-- @elseif (session('success'))
        <div class="alert alert-important alert-success alert-dismissible" role="alert">
        <div class="d-flex">
            <div>
            <!-- Download SVG icon from http://tabler-icons.io/i/check -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
            </div>
            <div>
            {{ session('success') }}
            </div>
        </div>
        </div>
        @endif --}}
        <div class="alert alert-info" role="alert">
            <div class="d-flex">
              <div>
                <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path><path d="M12 9h.01"></path><path d="M11 12h1v4h1"></path></svg>
              </div>
              <div>
                <h4 class="alert-title">Informação!</h4>
                <div class="text-secondary">Só serão disponibilizadas as solicitações que na qual o utilizador ({{ explode(' ', Auth::user()->colaborator->fullname)[0] }}) foi seleccionado como parte dos responsáveis.</div>
              </div>
            </div>
        </div>
        <form class="card" method="POST" enctype="multipart/form-data" action="{{ route('account.business.quotations.store') }}">
            <div class="card-body">
                <div class="row row-cards">
                    <div class="col-md-6">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label required">Código da Solicitação</label>
                            {{--  --}}
                            <select
                            type="text"
                            required
                            class="form-select"
                            name="id_request"
                            >
                                <option value="" selected disabled>-- Seleccione uma solicitação --</option>
                                @forelse ($registeredRequests as $registeredRequest)
                                <option value="{{ $registeredRequest->id }}">
                                    {{ $registeredRequest->request_code }}
                                </option>
                                @empty
                                <option value="no-records" disabled>-- No records --</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label required">Fornecedor</label>
                            <input type="text" name="vendor" required class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Tempo de entrega</label>
                            <input type="text" class="form-control" name="delivery_time" placeholder="" value="">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        {{-- <div class="mb-3">
                            <label class="form-label">Código da solicitação</label>
                            <input type="text" class="form-control" disabled placeholder="">
                        </div> --}}
                    </div>

                    <div class="col-12">
                        <div class="row row-card">
                            <div class="col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label required">Cotação solicitada em</label>
                                    <input type="date" class="form-control" name="requested_at" max="{{ date('Y-m-d') }}" placeholder="" value="">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Cotação respondida em</label>
                                    <input type="date" class="form-control" name="responsed_at" max="{{ date('Y-m-d') }}" placeholder="" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Media --}}
                    <div class="col-md-12">
                        <h3 class="card-title">Anexo</h3>
                        
                        <div class="row row-cards">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-0">
                                        <div class="mb-3">
                                            <div class="form-label required">Nome do arquivo</div>
                                            <input type="text" name="file_name" class="form-control">
                                        </div>
                                        <div class="mb-2">
                                            <input type="file" name="file" accept=".pdf, .png, .jpeg, .jpg, .docx, .xlsx" class="form-control" />
                                        </div>
                                        {{-- @error('attachments.*') <span class="text-xs text-danger">{{ $message }}</span> @enderror --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Enviar dados</button>
            </div>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection

@section('account.page.additionals')

@endsection