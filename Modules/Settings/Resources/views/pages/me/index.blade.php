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
              <h2 class="page-title">
                Minha Conta
              </h2>
            </div>
          </div>
        </div>
    </div>
@endsection

@section('account.page.content')
    <div class="card">
        <div class="row g-0">
            <div class="col d-flex flex-column">
                <div class="card-body">
                    {{-- <h3 class="card-title">Detalhes de Perfil</h3>
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="avatar avatar-xl">{{ getTheInitialLetters('Álvaro Adolfo') }}</span>
                        </div>
                    </div>
                    <h3 class="card-title mt-4">Perfil de Colaborador</h3> --}}
                    <h3 class="card-title mt-4"></h3>
                    <div class="row g-3">
                        <div class="col-md">
                            <div class="form-label">Nome Completo</div>
                            <input type="text" class="form-control" value="{{ Auth::user()->colaborator->fullname }}">
                        </div>
                        <div class="col-md">
                            <div class="form-label">Número de Colaborador</div>
                            <input type="text" disabled class="form-control" value="{{ Auth::user()->colaborator->colaborator_number }}">
                        </div>
                        <div class="col-md">
                            <div class="form-label">Email</div>
                            <input type="text" disabled class="form-control" value="{{ Auth::user()->colaborator->email }}">
                        </div>
                    </div>
                    <h3 class="card-title mt-4">Perfil de Utilizador</h3>
                    <div class="row g-3">
                        <div class="col-md">
                            <div class="form-label">Nome de Usuário</div>
                            <input type="text" class="form-control" value="{{ Auth::user()->username }}">
                        </div>
                        <div class="col-md">
                            <div class="form-label"></div>
                        </div>
                        <div class="col-md">
                            <div class="form-label"></div>
                        </div>
                    </div>
                    <h3 class="card-title mt-4">Password</h3>
                    {{-- <p class="card-subtitle">You can set a permanent password if you don't want to use temporary login codes.</p> --}}
                    <div>
                        <a href="#" class="btn">
                            Definir uma nova senha
                        </a>
                    </div>
                </div>
                <div class="card-footer bg-transparent mt-auto">
                <div class="btn-list justify-content-end">
                    <a href="#" class="btn">
                        Cancelar
                    </a>
                    <a href="#" class="btn btn-primary">
                        Submeter
                    </a>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
