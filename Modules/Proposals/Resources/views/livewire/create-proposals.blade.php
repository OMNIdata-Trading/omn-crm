<div>
    @if(session('error'))
    <div class="alert alert-important alert-danger alert-dismissible" role="alert">
      <div class="d-flex">
        <div>
          <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 8v4" /><path d="M12 16h.01" /></svg>
        </div>
        <div>
          {{ session('error') }}
        </div>
      </div>
      <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
    </div>
    @elseif (session('success'))
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
    @endif
    <form class="card" enctype="multipart/form-data" wire:submit='store'>
        <div class="card-body">
          <div class="row row-cards">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label required">Solicitação</label>
                {{--  --}}
                <select
                required
                type="text"
                class="form-select"
                id="select-request"
                wire:model='idSelectedRequest'
                wire:change='changeDetectedOnRequestsSelect'
                >
                    <option value="" selected>-- Seleccione a solicitação --</option>
                    @forelse ($registeredRequests as $registeredRequest)
                        <option value="{{ $registeredRequest->id }}" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot;&gt;{{ getTheInitialLetters($registeredRequest->name) }}&lt;/span&gt;">
                            {{ $registeredRequest->request_code }}
                        </option>
                    @empty
                    <option value="no-records" disabled>-- No records --</option>
                    @endforelse
                </select>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <label for="select-client-company-colaborators required" class="form-label">Responsável</label>
                <select
                required
                type="text"
                class="form-select"
                wire:model='idClientColaborator'
                placeholder="Seleccione os responsáveis da solicitação"
                id="select-client-company-colaborators"
                wire:change='changeDetectedOnClientColaboratorSelect'
                >
                  <option value="" selected>-- Seleccione o responsável --</option>
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
                <label class="form-label required">Pedido</label>
                <input type="text" class="form-control" required wire:model='order' placeholder="Ex: Fornecimento de equipamentos">
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="mb-3">
                <label class="form-label required">Data da solicitação</label>
                <input type="date" required wire:model='requestDate' class="form-control" placeholder="" max="{{ date('Y-m-d') }}" value="">
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="mb-3">
                <label class="form-label">Código da solicitação</label>
                <input type="text" class="form-control" wire:model.live='requestCode' disabled placeholder="" value="{{$requestCode}}">
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3 mb-0">
                <label class="form-label">Descrição</label>
                <textarea rows="5" wire:model='description' class="form-control" placeholder="Descrição da solicitação"></textarea>
              </div>
            </div>

            {{-- Media --}}
            <div class="col-md-12">
              <h3 class="card-title">Anexos</h3>
                  
                  <div class="row row-cards">
                    @if (count($attachmentsDescriptions) > 0)
                      @foreach ($attachmentsDescriptions as $key => $attachment)
                      <div class="col-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="mb-0">
                              <div class="mb-3">
                                <div class="form-label required">Nome do arquivo</div>
                                <input type="text" wire:model='attachmentsDescriptions.{{$key}}.file_name' class="form-control">
                              </div>
                              {{-- <div class="mb-3">
                                <div class="form-label">Tipo do arquivo</div>
                                <select
                                type="text"
                                class="form-select"
                                wire:model='attachmentsDescriptions.{{$key}}.file_type'
                                >
                                    <option value="docs" selected>Documento</option>
                                    <option value="excel">Excel</option>
                                    <option value="pdf">PDF</option>
                                    <option value="text">Email</option>
                                    <option value="text">Texto</option>
                                    <option value="image">Imagem</option>
                                </select>
                              </div> --}}
                              <div class="mb-2">
                                <input type="file" wire:model='attachments' class="form-control" />
                              </div>
                              @error('attachments.*') <span class="text-xs text-danger">{{ $message }}</span> @enderror
                            </div>
                          </div>
                          <div class="card-footer">
                            <a class="text-danger" href="javascript:void(0)"
                            wire:click='removeAttachment({{$key}})'
                            >Remover anexo</a>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    @else
                        
                    @endif

                    <div class="col-1">
                      <div class="row g-2 align-items-center">
                        <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-0">
                          <a href="javascript:void(0)" class="btn btn-plus w-100 btn-icon" aria-label="Plus"
                          wire:click='addAttachment'
                          >
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

            {{-- Colaborators --}}
            <label class="form-label">Colaboradores para dar tratamento</label>
            @foreach ($allColaborators as $colaborator)
            <div class="col-md-3">
              <label class="form-selectgroup-item flex-fill">
                <input type="checkbox" name="colaborators[]" value="1" class="form-selectgroup-input" >
                <div class="form-selectgroup-label d-flex align-items-center p-3"
                wire:click='addSelectedColaborator({{ $colaborator }})'
                >
                  <div class="me-3">
                    <span class="form-selectgroup-check"></span>
                  </div>
                  <div class="form-selectgroup-label-content d-flex align-items-center">
                    <span class="avatar me-3">{{ getTheInitialLetters($colaborator->fullname) }}</span>
                    <div>
                      <div class="font-weight-medium" @style('text-align: left')>{{ $colaborator->fullname }}</div>
                      <div class="text-muted" @style('text-align: left')>{{ $colaborator->role->name }}</div>
                    </div>
                  </div>
                </div>
              </label>
            </div>
            @endforeach

            {{-- @php
                echo count($selectedColaborators);
            @endphp --}}
            @if (count($selectedColaborators) > 0)
              <div class="col-md-12">
                <div class="form-label">Atribuição de tarefas</div>
                <div class="mb-3" @style('width: fit-content')>
                  <label class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" {{ ($hasTasks) ? 'checked' : '' }}
                    wire:click='showTasksArea'
                    >
                    <span class="form-check-label">Atribuir tarefas</span>
                  </label>
                </div>
              </div>

              @if ($hasTasks)
                @foreach ($tasks as $key => $task)
                <div class="col-md-4">
                  <fieldset class="form-fieldset">
                    <div class="mb-3">
                      <div class="form-label required">Tarefa para</div>
                      <select type="text" required wire:model='tasks.{{$key}}.colaborators' class="form-select" id="select-colaborators-to-task" value="" multiple>
                        @forelse ($selectedColaborators as $selectedColaborator)
                        <option value="{{ $selectedColaborator->id }}" selected>{{ $selectedColaborator->fullname }}</option>
                        @empty
                            <option value="" selected disabled>Seleccione um colaborador</option>
                        @endforelse
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label required">Descrição <span class="form-label-description">100</span></label>
                      <textarea class="form-control" required wire:model='tasks.{{$key}}.description' name="example-textarea-input" rows="6" maxlength="100" placeholder="Content.."></textarea>
                    </div>
                    <a class="text-danger" href="javascript:void(0)"
                    wire:click='removeTask({{$key}})'
                    >Remover tarefa</a>
                  </fieldset>
                </div>
                @endforeach
                <div class="col-md-1">
                  <div class="row g-2 align-items-center">
                    <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-0">
                      <a href="javascript:void(0)" class="btn btn-plus w-100 btn-icon" aria-label="Plus"
                      wire:click='addTask'
                      >
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                          <path d="M12 5l0 14" />
                          <path d="M5 12l14 0" />
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
              @else
                  
              @endif
            @endif

          </div>
        </div>
        <div class="card-footer text-end">
          <button type="submit" class="btn btn-primary">Enviar dados</button>
        </div>
    </form>
</div>