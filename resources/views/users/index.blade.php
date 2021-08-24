@extends('layouts.app')

@section('content')
    @if (auth()->user()->hasRoles(['admin']))
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <a class="btn btn-primary" href="{{ route('users.create') }}">
                        New User
                    </a>
                </div>
                <div class="col-md-10">
                    <table class="table mt-2">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }} {{ $user->apellido }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->roles->pluck('display_name')->implode(' - ') }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('users.edit', $user->id) }}" data-toggle="tooltip" data-placement="top" title="Editar" class="text-warning mr-2">

                                                @include('partials.icons.icon-edit')

                                            </a>

                                        @auth
                                            @if (auth()->user()->hasRoles(['admin']))
                                                <form method="POST"
                                                    action="{{ route('users.destroy', $user) }}"
                                                    style="display: inline;"
                                                >
                                                @csrf
                                                @method('DELETE')

                                                    <button class="btn btn-xs btn-link p-0 m-0"
                                                      data-toggle="tooltip"
                                                      data-placement="top"
                                                      onclick="return confirm('¿Estás seguro de eliminarlo?')"
                                                      title="Eliminar"
                                                    >

                                                        @include('partials.icons.icon-delete')

                                                    </button>
                                                </form>
                                            @endif
                                        @endauth
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <li class="list-group-item border-0 mb-3 shadow-sm">
                                    No hay nada para mostrar
                                </li>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="overflow-auto mt-2">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    @else
        <h2 class="text-secondary p-2">No Tienes permisos para ver esta vista</h2>
    @endif
@endsection
