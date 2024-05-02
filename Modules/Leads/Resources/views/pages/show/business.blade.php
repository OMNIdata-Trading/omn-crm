@extends('leads::template.master')

@section('page-section')
  (Empresas)
@endsection

@section('widgets-with-charts')
<div class="col-12">
  <div class="row row-cards">
    <div class="col-sm-6 col-lg-3">
      @livewire('apex-chart-multi', [
            'label' => 'Total de solicitações',
            'chartId' => 'client-requests-count',
            'currentYearHighlightValue' => $widget['requests']['countAllRequests'],
            'chartSeries' => [
              [
                'name' => 'Solicitações',
                'color' => 'success',
                'data' => $widget['requests']['data']
              ],
            ]
      ])
    </div>
    <div class="col-sm-6 col-lg-3">
      @livewire('apex-chart-multi', [
            'label' => 'Total de Propostas',
            'chartId' => 'client-proposals-count',
            'currentYearHighlightValue' => $widget['proposals']['countAllProposals'],
            'chartSeries' => [
              [
                'name' => 'Adjudicadas',
                'color' => 'success',
                'data' => $widget['proposals']['data']['accepted']
              ],
              [
                'name' => 'Em Aberto',
                'color' => 'yellow',
                'data' => $widget['proposals']['data']['opened']
              ],
              [
                'name' => 'Em Negociação',
                'color' => 'primary',
                'data' => $widget['proposals']['data']['negotiation']
              ],
              [
                'name' => 'Perdidas',
                'color' => 'danger',
                'data' => $widget['proposals']['data']['lost']
              ],
            ]
      ])
    </div>
  </div>
</div>
@endsection

@section('leads-page-content')
<!-- Page body -->
<div class="card">
  <div class="card-header justify-content-between">
    <h3 class="card-title"></h3>
    <div class="buttons">
      <form method="POST" action="{{ route('account.leads.businesses.destroy', ['business' => $client->id]) }}">
        <a href="{{ route('account.leads.businesses.edit', [ 'business' => $client->id ]) }}" class="btn">Editar</a>
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" onclick="return confirm('Deseja realmente eliminar o cliente {{ $client->name }}?')" type="submit">Eliminar</button>
      </form>
    </div>
  </div>
  <div class="card-body">
    @if($client->logo_path)
        <div class="col-md-12 mb-5">
            <div class="row align-items-center">
                <div class="col-auto"><span class="avatar avatar-xl" style="background-image: url({{ URL::to('storage/' . $client->logo_path) }})"></span>
                </div>
                <div class="col-auto"></div>
            </div>
        </div>
    @endif
    <div class="datagrid">
      <div class="datagrid-item">
        <div class="datagrid-title">Nome</div>
        <div class="datagrid-content">{{ $client->name }}</div>
      </div>
      <div class="datagrid-item">
        <div class="datagrid-title">NIF</div>
        <div class="datagrid-content">{{ $client->nif }}</div>
      </div>
      <div class="datagrid-item">
        <div class="datagrid-title">Área de Actuação</div>
        <div class="datagrid-content">{{ $client->activity_area }}</div>
      </div>
      <div class="datagrid-item">
        <div class="datagrid-title">Email</div>
        <div class="datagrid-content">{{ $client->company_email }}</div>
      </div>
      <div class="datagrid-item">
        <div class="datagrid-title">Website</div>
        <div class="datagrid-content">{{ $client->website }}</div>
      </div>
      <div class="datagrid-item">
        <div class="datagrid-title">Ano da primeira solicitação</div>
        <div class="datagrid-content">{{ $client->first_request_year }}</div>
      </div>
      <div class="datagrid-item">
        <div class="datagrid-title">Ano da primeira compra</div>
        <div class="datagrid-content">{{ $client->first_purchase_year }}</div>
      </div>
    </div>
    
    <div class="col-md-12 mt-6">
      <h3 class="card-title">Colaboradores</h3>
      <div class="row row-cards mb-3">
          @if (count($client->colaborators) > 0)
              @foreach ($client->colaborators as $key => $colaborator)
              <div class="col-sm-12 col-md-4">
                  <fieldset class="form-fieldset">
                      <div class="fullname">
                          <div class="mb-3">
                              <div class="form-label">Nome completo</div>
                              <input
                              class="form-control"
                              type="text"
                              value="{{ $colaborator->fullname }}"
                              readonly
                              id="">
                          </div>
                      </div>
                      
                      <div class="email">
                          <div class="mb-3">
                              <div class="form-label">Email</div>
                              <input
                              class="form-control"
                              type="email"
                              value="{{ $colaborator->email }}"
                              readonly
                              id="">
                          </div>
                      </div>

                      <div class="contact-1">
                          <div class="mb-3">
                              <div class="form-label">Contacto 1</div>
                              <input
                              class="form-control"
                              type="text"
                              value="{{ $colaborator->phone_number1 }}"
                              readonly
                              id="">
                          </div>
                      </div>

                      <div class="contact-2">
                          <div class="mb-3">
                              <div class="form-label">Contacto 2</div>
                              <input
                              class="form-control"
                              type="text"
                              value="{{ $colaborator->phone_number2 }}"
                              readonly
                              id="">
                          </div>
                      </div>

                      <div class="contact-3">
                          <div class="mb-3">
                              <div class="form-label">Contacto 3</div>
                              <input
                              class="form-control"
                              type="text"
                              value="{{ $colaborator->phone_number3 }}"
                              readonly
                              id="">
                          </div>
                      </div>
                  </fieldset>
              </div>
              @endforeach
          @endif
      </div>
    </div>

    <div class="col-md-12 mt-6">
      <h3 class="card-title">Contactos</h3>
      <div class="row row-cards mb-3">
          @if (count($client->contacts) > 0)
              @foreach ($client->contacts as $key => $contact)
              <div class="col-sm-12 col-md-4">
                  <fieldset class="form-fieldset">
                      <div class="mb-3">
                          <div class="form-label">Contacto</div>
                          <input
                          class="form-control"
                          type="text"
                          value="{{ $contact->contact }}"
                          readonly
                          id="">
                      </div>
                  </fieldset>
              </div>
              @endforeach
          @endif
      </div>
    </div>

    <div class="col-md-12 mt-6">
      <h3 class="card-title">Endereços</h3>

      <div class="row row-cards mb-3">
          @if (count($client->addresses) > 0)
              @foreach ($client->addresses as $key => $address)
              <div class="col-sm-12 col-md-4">
                  <fieldset class="form-fieldset">
                      <div class="mb-3">
                          <div class="form-label required">Endereço</div>
                          <textarea class="form-control"
                          type="text" name=""
                          value="{{ $address->address }}"
                          rows="4"
                          readonly
                          id="">{{ $address->address }}</textarea>
                      </div>
                  </fieldset>
              </div>
              @endforeach
          @endif
      </div>

    </div>
  </div>
</div>
@endsection