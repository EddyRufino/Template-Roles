<div class="row">
    <div class="col-md-6">
        <div class="form-group col row">
            <label for="name" class="col-md-4 col-form-label text-md-right font-weight-normal text-dark">Nombre</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

{{--         <div class="form-group col row">
            <label for="name" class="col-md-4 col-form-label text-md-right font-weight-normal text-dark">Apellido</label>

            <div class="col-md-6">
                <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido', $user->apellido) }}" required autocomplete="apellido" autofocus>

                @error('apellido')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div> --}}

        <div class="form-group col row">
            <label for="email" class="col-md-4 col-form-label font-weight-normal text-dark text-md-right">Correo</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-md-6">

    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label font-weight-normal text-dark text-md-right">Rol</label>
            @auth
                <div class="col-md-6 mt-2">
                    @if (auth()->user()->hasRoles(['admin']))
                        <div class="checkbox">
                            @foreach ($roles as $id => $name)
                                <label class="font-weight-normal text-dark">
                                    <input type="checkbox"
                                        value="{{ $id }}"
                                        {{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}
                                        name="roles[]">
                                    {{ $name }}
                                </label>
                            @endforeach
                        </div>
                    @elseif (auth()->user()->hasRoles(['recep']))
                        <div class="checkbox d-none">
                            @foreach ($roles as $id => $name)
                                <label >
                                    <input type="checkbox"
                                        value="{{ $id }}"
                                        {{ $user->roles->pluck('id')->contains($id) ? 'checked' : 'disabled' }}
                                        name="roles[]">
                                    {{ $name }}
                                </label>
                            @endforeach
                        </div>
                    @endif
                </div>

            @endauth
        </div>
    </div>
</div>
