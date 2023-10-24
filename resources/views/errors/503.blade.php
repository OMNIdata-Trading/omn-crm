@extends('errors.layout.master')

@section('error.page.title')
    Página em manutenção
@endsection

@section('error.page.content')
<div class="container-tight py-4">
    <div class="empty">
      <div class="empty-img"><img src="{{ URL::to('static/illustrations/undraw_quitting_time_dm8t.svg') }}" height="128" alt="">
      </div>
      <p class="empty-title">Temporariamente inactiva para manutenção</p>
      <p class="empty-subtitle text-muted">
        Desculpe pelo transtorno, mas estamos realizando algumas manutenções no momento. Estaremos online novamente em breve!
      </p>
      <div class="empty-action">
        <a href="{{ (Auth::User()) ? route('account.home') : route('auth.sign-in') }}" class="btn btn-primary">
            <!-- Download SVG icon from http://tabler-icons.io/i/arrow-left -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M5 12l6 6" /><path d="M5 12l6 -6" /></svg>
            Leve-me à página inicial
        </a>
      </div>
    </div>
</div>
@endsection