<!-- <div>
    <form class="card" wire:submit='create'>
        <div class="card-body">
          <div class="row row-cards">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Empresa</label>
                {{--  --}}
                <select
                type="text"
                class="form-select"
                id="select-company-requester"
                wire:model='idSelectedCompany'
                wire:change='changeDetected'
                >
                    <option value="" disabled selected>-- Seleccione a empresa --</option>
                    <option value="0">Singular</option>
                    @forelse ($registeredClientCompanies as $registeredClientCompany)
                        @if ($registeredClientCompany->logo_path)
                        <option value="{{ $registeredClientCompany->id }}" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot; style=&quot;background-image: url({{ URL::to($registeredClientCompany->logo_path) }})&quot;&gt;&lt;/span&gt;">
                            {{ $registeredClientCompany->name }}
                        </option>
                        @else
                        <option value="{{ $registeredClientCompany->id }}" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot;&gt;{{ getTheInitialLetters($registeredClientCompany->name) }}&lt;/span&gt;">
                            {{ $registeredClientCompany->name }}
                        </option>
                        @endif
                    @empty
                    <option value="no-records" disabled>-- No records --</option>
                    @endforelse
                </select>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <label for="select-client-company-colaborators" class="form-label">Responsável</label>
                <select
                type="text"
                class="form-select"
                placeholder="Seleccione os responsáveis da solicitação"
                id="select-client-company-colaborators"
                >
                    @forelse ($clientCompanyColaborators as $clientComapanyColaborator)
                        <option value="{{ $clientComapanyColaborator->id }}">
                            {{ $clientComapanyColaborator->fullname }}
                        </option>
                    @empty
                        <option value="no-records" disabled>-- No records --</option>
                    @endforelse
                </select>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="mb-3">
                <label class="form-label">Pedido</label>
                <input type="text" class="form-control" wire:model='order' placeholder="Ex: Fornecimento de equipamentos">
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="mb-3">
                <label class="form-label">Código da solicitação</label>
                <input type="text" class="form-control" wire:model.live='requestCode' disabled placeholder="" value="">
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="mb-3">
                <label class="form-label">Data da solicitação</label>
                <input type="date" wire:model='requestDate' class="form-control" placeholder="" value="">
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3 mb-0">
                <label class="form-label">Descrição</label>
                <textarea rows="5" wire:model='description' class="form-control" placeholder="Descrição da solicitação"></textarea>
              </div>
            </div>
            {{-- Colaborators --}}
            <label class="form-label">Colaboradores para dar tratamento</label>
            <div class="col-md-3">
              <label class="form-selectgroup-item flex-fill">
                <input type="checkbox" name="colaborators[]" value="1" class="form-selectgroup-input"  checked>
                <div class="form-selectgroup-label d-flex align-items-center p-3">
                  <div class="me-3">
                    <span class="form-selectgroup-check"></span>
                  </div>
                  <div class="form-selectgroup-label-content d-flex align-items-center">
                    <span class="avatar me-3">{{ getTheInitialLetters('Álvaro Adolfo') }}</span>
                    <div>
                      <div class="font-weight-medium" @style('text-align: left')>Álvaro Adolfo</div>
                      <div class="text-muted">Coordenador de Vendas</div>
                    </div>
                  </div>
                </div>
              </label>
            </div>
            <div class="col-md-3">
              <label class="form-selectgroup-item flex-fill">
                <input type="checkbox" name="colaborators[]" value="2" class="form-selectgroup-input"  checked>
                <div class="form-selectgroup-label d-flex align-items-center p-3">
                  <div class="me-3">
                    <span class="form-selectgroup-check"></span>
                  </div>
                  <div class="form-selectgroup-label-content d-flex align-items-center">
                    <span class="avatar me-3">{{ getTheInitialLetters('Sebastião Pedro') }}</span>
                    <div>
                      <div class="font-weight-medium" @style('text-align: left')>Sebastião Pedro</div>
                      <div class="text-muted">Técnico de Vendas</div>
                    </div>
                  </div>
                </div>
              </label>
            </div>
            <div class="col-md-3">
              <label class="form-selectgroup-item flex-fill">
                <input type="checkbox" name="colaborators[]" value="3" class="form-selectgroup-input">
                <div class="form-selectgroup-label d-flex align-items-center p-3">
                  <div class="me-3">
                    <span class="form-selectgroup-check"></span>
                  </div>
                  <div class="form-selectgroup-label-content d-flex align-items-center">
                    <span class="avatar me-3">{{ getTheInitialLetters('Miguel Barros') }}</span>
                    <div>
                      <div class="font-weight-medium" @style('text-align: left')>Miguel Barros</div>
                      <div class="text-muted">Técnico de Vendas</div>
                    </div>
                  </div>
                </div>
              </label>
            </div>

            <div class="col-md-12">
              <div class="form-label">Atribuição de tarefas</div>
              <div class="mb-3">
                <label class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" checked>
                  <span class="form-check-label">Atribuir tarefas</span>
                </label>
              </div>
            </div>

            <div class="col-md-4">
              <fieldset class="form-fieldset">
                <div class="mb-3">
                  <div class="form-label">Tarefa para</div>
                  <select type="text" class="form-select" id="select-colaborators-to-task" value="" multiple>
                    <option value="AL" selected>Álvaro Adolfo</option>
                    <option value="AK" selected>Sebastião Pedro</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">Descrição <span class="form-label-description">56/100</span></label>
                  <textarea class="form-control" name="example-textarea-input" rows="6" placeholder="Content..">Oh! Come and see the violence inherent in the system! Help, help, I'm being repressed! We shall say 'Ni' again to you, if you do not appease us. I'm not a witch. I'm not a witch. Camelot!</textarea>
                </div>
              </fieldset>
            </div>
            <div class="col-md-1">
              <div class="row g-2 align-items-center">
                <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-0">
                  <a href="#" class="btn btn-facebook w-100 btn-icon" aria-label="Facebook">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <path d="M12 5l0 14" />
                      <path d="M5 12l14 0" />
                    </svg>
                  </a>
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

{{-- @section('scripts') --}}
<script type="text/javascript">

  // $(document).ready(function (){
  //   $('#select-company-requester').change(function(event){
      
  //     var clientPersonSelect = $('#select-client-company-colaborators').html('');
      
  //     $.ajax({
  //       url: "{{ url('fetching/dropdowns/client-companies/colaborators') }}",
  //       type: 'POST',
  //       dataType: 'json',
  //       data: {
  //         id: this.value,
  //         _token: "{{ csrf_token() }}"
  //       },
  //       success: function(response){
  //         // console.log(response);
  //         console.log(clientPersonSelect[0].tomselect.))
  //         // console.log(this)
  //         // clientPersonSelect.html('<option value="no-records" disabled>-- No records --</option>');
  //       }
  //     })
  //   });
  // });

  // document.addEventListener('livewire:initialized', () => {
  //   @this.on('companySelectHasChanged', (event) => {
  //     // alert("mudou!");
  //   })
  // });
</script>
{{-- @endsection --}}


{{-- Select input das empresas-cliente --}}
<script>
  // @formatter:off
  document.addEventListener("DOMContentLoaded", function () {

    // Livewire.hook('message.processed', (message, component) => {

    //   console.log(component);
    //   // let selects = el.querySelectorAll(component.el)
    //   // console.log(selects);
    //   // if (selects.length != 0) {
    //   //     selects.forEach((select) => {
    //   //         select.tomselect = undefined
    //   //         new TomSelect(select)
    //   //     })
    //   // }

    // });

    var el;
    let select = window.TomSelect && (new TomSelect(el = document.getElementById('select-company-requester'), {
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

    select.off();

  //   // select.on('change', () => {
  //   //   select.sync();
  //   // })
  });

  document.addEventListener('livewire:initialized', () => {
    @this.on('companySelectHasChanged', (event) => {
      // alert("mudou!");
      var el;
    window.TomSelect && (new TomSelect(el = document.getElementById('select-company-requester'), {
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

    })
  });
  // @formatter:on
</script> -->