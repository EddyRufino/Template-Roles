<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Nombre<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
        <input type="text" id="name"  class="form-control @error('name') is-invalid @enderror" name="name" required value="{{ old('name', $user->name) }}" autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

</div>

<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Correo <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="item form-group">
    <label class="col-md-3 col-sm-3 label-align">Roles
        <br>
        <small class="text-navy">Selecciona uno o más</small>
    </label>

    <div class="col-md-6 col-sm-6 ">
        @foreach ($roles as $id => $name)
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="{{ $id }}" {{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}
                        name="roles[]" class="flat"> {{ $name }}
                </label>
            </div>
        @endforeach
    </div>
</div>
