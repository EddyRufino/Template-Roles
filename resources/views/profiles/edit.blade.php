@extends('admin.layout')

@section('content')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2 class="font-weight-bold">Editar Perfil</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form method="POST" action="{{ route('profile.update') }}" class="form-horizontal form-label-left"
            >
            @csrf
            @method('PUT')

                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 label-align">Nombre <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 ">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 label-align">Correo <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 ">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 label-align">Contraseña <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>

                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 label-align">Confirma Contraseña <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 ">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>

                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <a class="btn btn-primary" href="{{ route('dashboard') }}">Cancelar</a>
                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
