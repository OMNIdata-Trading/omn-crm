@extends('modules.account.layout.master')

@section('account.page.title')
Colaboradores
@endsection

@section('account.page.header')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Colaboradores
                    <a href="{{ route('account.colaborators.settings') }}" @style('margin-left: 20px')>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
                            <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                         </svg>
                    </a>
                </h2>
                <div class="text-muted mt-1">{{ $colaborators->count() }} colaborador{{ $colaborators->count() > 1 ? 'es' : '' }}</div>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="d-flex">
                    <input type="search" class="form-control d-inline-block w-9 me-3" placeholder="Search user…"/>
                    <a href="#" class="btn btn-primary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                        Novo Colaborador
                    </a>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection

@section('account.page.content')
<div class="row row-cards">
    <div class="col-12">
    <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter card-table">
                <thead>
                    <tr>
                        <th>Nº de Colaborador</th>
                        <th>Nome</th>
                        <th>Título</th>
                        <th>Contactos</th>
                        <th></th>
                        <th class="w-1"></th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($colaborators as $colaborator)
                    <tr>
                        <td>
                            <div class="text-muted"> {{ (mb_strlen($colaborator->colaborator_number) == 2) ? '0'.$colaborator->colaborator_number : $colaborator->colaborator_number}} </div>
                        </td>
                        <td >
                            <div class="d-flex py-1 align-items-center">
                                <span class="avatar me-2">
                                    {{ getTheInitialLetters($colaborator->fullname) }}
                                </span>
                                <div class="flex-fill">
                                <div class="font-weight-medium">{{ $colaborator->fullname }}</div>
                                <div class="text-muted"><a href="#" class="text-reset">{{ $colaborator->email }}</a></div>
                                </div>
                            </div>
                        </td>
                        <td >
                            <div>{{ $colaborator->role->name }}</div>
                            <div class="text-muted">{{ $colaborator->role->classification->name }}</div>
                        </td>
                        <td>
                            <div class="text-muted"> {{ $colaborator->phone_number1 ?? 'empty' }} </div>
                            <div class="text-muted"> {{ $colaborator->phone_number2 ?? 'empty'}} </div>
                        </td>
                        <td class="text-muted">
                            @if ($colaborator->user)
                            <span class="badge bg-green-lt">Com conta</span>
                            @else
                            <span class="badge bg-red-lt">Sem conta</span>
                            @endif
                        </td>
                        <td>
                            <a href="#">Editar</a>
                        </td>
                        <td>
                            <a href="#" class="text-danger">Eliminar</a>
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