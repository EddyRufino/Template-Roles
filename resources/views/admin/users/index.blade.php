@extends('admin.layout')

@section('content')
    @if (auth()->user()->hasRoles(['admin']))
      <div class="x_content">

        <div class="d-flex justify-align-center justify-content-between">
            <h5 class="font-weight-bold">Usuarios Del Sistema</h5>
            <a class="btn btn-info btn-sm" href="{{ route('users.create') }}">Nuevo Usuario</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped jambo_table">
                <thead>
                    <tr class="headings">
                        <th class="column-title">Nombre </th>
                        <th class="column-title">Email </th>
                        <th class="column-title">Rol </th>
                        <th class="column-title no-link last"><span class="nobr">Acciones</span>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($users as $user)
                        <tr class="even pointer">
                            <td class=" ">{{ $user->name }} {{ $user->apellido }}</td>
                            <td class=" ">{{ $user->email }} </td>
                            <td class=" ">{{ $user->roles->pluck('display_name')->implode(' - ') }} <i class="success fa fa-long-arrow-up"></i></td>
                            <td class=" last">
                                <div class="d-flex">
                                    <a href="{{ route('users.edit', $user->id) }}" data-toggle="tooltip" data-placement="top" title="Editar" class="mr-2 mt-1">

                                        {{-- @include('partials.icons.icon-edit') --}}
                                        <i class="fa fa-pencil" aria-hidden="true"></i>


                                    </a>

                                @auth
                                    @if (auth()->user()->hasRoles(['admin']))
                                        <form method="POST"
                                            action="{{ route('users.destroy', $user) }}"
                                            style="display: inline;"
                                        >
                                        @csrf
                                        @method('DELETE')

                                            <button class="btn btn-xs btn-link p-0 m-0 text-danger"
                                              data-toggle="tooltip"
                                              data-placement="top"
                                              onclick="return confirm('¿Estás seguro de eliminarlo?')"
                                              title="Eliminar"
                                            >

                                                {{-- @include('partials.icons.icon-delete') --}}
                                                <i class="fa fa-trash" aria-hidden="true"></i>

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
    @else
        <h2 class="text-secondary p-2">No Tienes permisos para ver esta vista</h2>
    @endif
@endsection
