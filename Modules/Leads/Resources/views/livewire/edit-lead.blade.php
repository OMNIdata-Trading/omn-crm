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
    <form class="card" enctype="multipart/form-data" wire:submit='update'>
        <div class="card-body">

            @if($registeredLogo)
                <div class="col-md-12 mb-5">
                    <div class="row align-items-center">
                        <div class="col-auto"><span class="avatar avatar-xl" style="background-image: url({{ URL::to('storage/' . $registeredLogo) }})"></span>
                        </div>
                        <div class="col-auto"></div>
                    </div>
                </div>
            @endif

            <div class="col-md-12">
                <div class="row row-cards">
                    <div class="col-sm-6 col-md-4">
                        <div class="mb-3">
                            <label class="form-label required">Nome</label>
                            <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            wire:model='name'
                            placeholder="">
                        </div>
                        @error('name')
                            <span class="text-small text-muted text-red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="mb-3">
                            <label class="form-label">NIF</label>
                            <input type="text" class="form-control @error('nif') is-invalid @enderror" wire:model='nif' placeholder="">
                        </div>
                        @error('nif')
                            <span class="text-small text-muted text-red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Logotipo</label>
                            <input type="file" accept=".png, .jpeg, .jpg" wire:model='logo' class="form-control @error('logo') is-invalid @enderror">
                        </div>
                        @error('logo')
                            <span class="text-small text-muted text-red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Área de actuação</label>
                            <input type="text" class="form-control" wire:model='actuationArea' placeholder="Ex: Telecomunicações">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Ano da primeira solicitação</label>
                            <input type="number" class="form-control" wire:model='firstRequestYear' min="1995" max="{{ date('Y') }}" placeholder="Ex: {{ date('Y') }}">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Ano da primeira compra</label>
                            <input type="number" class="form-control" wire:model='firstPurchaseYear' min="1995" max="{{ date('Y') }}" placeholder="Ex: {{ date('Y') }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <h3 class="card-title"></h3>

                <div class="row row-cards">
                
                <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Website</label>
                        <input type="text" class="form-control" wire:model='website' placeholder="Ex: www.example.com">
                    </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="mb-3">
                            <label class="form-label required">Email empresarial</label>
                            <input
                            type="email"
                            wire:model='email'
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="Ex: email@example.com">
                        </div>
                        @error('email')
                            <span class="text-small text-muted text-red">{{ $message }}</span>
                        @enderror
                    </div>
                    
                </div>
            </div>
                
            <div class="col-md-12">
                <h3 class="card-title">Colaboradores</h3>

                <div class="row row-cards mb-3">
                    @if (count($companyColaboratorsArray) > 0)
                        @foreach ($companyColaboratorsArray as $key => $colaborator)
                        <div class="col-sm-12 col-md-4">
                            <fieldset class="form-fieldset">
                                <div class="fullname">
                                    <div class="mb-3">
                                        <div class="form-label required">Nome completo</div>
                                        <input
                                        class="form-control @error('companyColaboratorsArray.' . $key . '.fullname') is-invalid @enderror"
                                        wire:model='companyColaboratorsArray.{{ $key }}.fullname'
                                        type="text"
                                        id="">
                                    </div>
                                    @error('companyColaboratorsArray.' . $key . '.fullname')
                                    <span class="text-small text-muted text-red">{{ $message }}</span> <br><br>
                                    @enderror
                                </div>
                                
                                <div class="email">
                                    <div class="mb-3">
                                        <div class="form-label required">Email</div>
                                        <input
                                        class="form-control @error('companyColaboratorsArray.' . $key . '.email') is-invalid @enderror"
                                        wire:model='companyColaboratorsArray.{{ $key }}.email'
                                        type="email"
                                        id="">
                                    </div>
                                    @error('companyColaboratorsArray.' . $key . '.email')
                                    <span class="text-small text-muted text-red">{{ $message }}</span> <br><br>
                                    @enderror
                                </div>

                                <div class="contact-1">
                                    <div class="mb-3">
                                        <div class="form-label">Contacto 1</div>
                                        <input
                                        class="form-control @error('companyColaboratorsArray.' . $key . '.phone_number1') is-invalid @enderror"
                                        wire:model='companyColaboratorsArray.{{ $key }}.phone_number1'
                                        type="text"
                                        placeholder="Ex: +244 000 000 000"
                                        id="">
                                    </div>
                                    @error('companyColaboratorsArray.' . $key . '.phone_number1')
                                    <span class="text-small text-muted text-red">{{ $message }}</span> <br><br>
                                    @enderror
                                </div>

                                <div class="contact-2">
                                    <div class="mb-3">
                                        <div class="form-label">Contacto 2</div>
                                        <input
                                        class="form-control @error('companyColaboratorsArray.' . $key . '.phone_number2') is-invalid @enderror"
                                        wire:model='companyColaboratorsArray.{{ $key }}.phone_number2'
                                        type="text"
                                        placeholder="Ex: +244 000 000 000"
                                        id="">
                                    </div>
                                    @error('companyColaboratorsArray.' . $key . '.phone_number2')
                                    <span class="text-small text-muted text-red">{{ $message }}</span> <br><br>
                                    @enderror
                                </div>

                                <div class="contact-3">
                                    <div class="mb-3">
                                        <div class="form-label">Contacto 3</div>
                                        <input
                                        class="form-control @error('companyColaboratorsArray.' . $key . '.phone_number3') is-invalid @enderror"
                                        wire:model='companyColaboratorsArray.{{ $key }}.phone_number3'
                                        type="text"
                                        placeholder="Ex: +244 000 000 000"
                                        id="">
                                    </div>
                                    @error('companyColaboratorsArray.' . $key . '.phone_number3')
                                    <span class="text-small text-muted text-red">{{ $message }}</span> <br><br>
                                    @enderror
                                </div>

                                <a
                                class="text-danger"
                                wire:click='removeColaborator({{ $key }})'
                                href="javascript:void(0)"
                                >Remover colaborador</a>
                            </fieldset>
                        </div>
                        @endforeach
                    @endif
                    <div class="col-md-1">
                        <div class="row g-2 align-items-center">
                            <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-0">
                                <a href="javascript:void(0)" wire:click='addColaborator()' class="btn btn-plus w-100 btn-icon" aria-label="Plus"
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

            <div class="col-md-12">
                <h3 class="card-title">Contactos</h3>

                <div class="row row-cards mb-3">
                    @if (count($contactsArray) > 0)
                        @foreach ($contactsArray as $key => $contact)
                        <div class="col-sm-12 col-md-4">
                            <fieldset class="form-fieldset">
                                <div class="mb-3">
                                    <div class="form-label required">Contacto</div>
                                    <input
                                    class="form-control @error('contactsArray.' . $key . 'contact') is-invalid @enderror"
                                    wire:model='contactsArray.{{ $key }}.contact'
                                    type="text"
                                    placeholder="Ex: +244 000 000 000"
                                    id="">
                                </div>
                                @error('contactsArray.' . $key . 'contact')
                                <span class="text-small text-muted text-red">{{ $message }}</span> <br><br>
                                @enderror
                                <a class="text-danger" wire:click='removeContact({{ $key }})' href="javascript:void(0)"
                                >Remover contacto</a>
                            </fieldset>
                        </div>
                        @endforeach
                    @endif
                    <div class="col-md-1">
                        <div class="row g-2 align-items-center">
                            <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-0">
                                <a href="javascript:void(0)" wire:click='addContact()' class="btn btn-plus w-100 btn-icon" aria-label="Plus"
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

            <div class="col-md-12">
                <h3 class="card-title">Endereços</h3>

                <div class="row row-cards mb-3">
                    @if (count($addressesArray) > 0)
                        @foreach ($addressesArray as $key => $address)
                        <div class="col-sm-12 col-md-4">
                            <fieldset class="form-fieldset">
                                <div class="mb-3">
                                    <div class="form-label required">Endereço</div>
                                    <input class="form-control @error('addressesArray.' . $key . 'address') is-invalid @enderror" wire:model='addressesArray.{{ $key }}.address' type="text" name="" placeholder="" id="">
                                </div>
                                
                                @error('addressesArray.' . $key . 'address')
                                <span class="text-small text-muted text-red">{{ $message }}</span> <br><br>
                                @enderror
                                <a class="text-danger" wire:click='removeAddress({{ $key }})' href="javascript:void(0)"
                                >Remover endereço</a>
                            </fieldset>
                        </div>
                        @endforeach
                    @endif
                    <div class="col-md-1">
                        <div class="row g-2 align-items-center">
                        <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-0">
                            <a href="javascript:void(0)" wire:click='addAddress()' class="btn btn-plus w-100 btn-icon" aria-label="Plus"
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

        </div>
        <div class="card-footer text-end">
        <button type="submit" class="btn btn-primary">Enviar dados</button>
        </div>
        
    </form>
</div>
