@extends('admin.layout')

@section('content')
@admin
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
                        <td class=" ">
                            {{ $user->roles->pluck('display_name')->implode(' - ') }}
                            <i class="success fa fa-long-arrow-up"></i>
                        </td>
                        <td class=" last">
                            <div class="d-flex">
                                <a href="{{ route('users.edit', $user->id) }}" data-toggle="tooltip" data-placement="top" title="Editar" class="mr-2 mt-1"
                                >
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>

                                @admin
                                    <form method="POST"
                                        action="{{ route('users.destroy', $user) }}"
                                        style="display: inline;"
                                        id="myform"
                                    >
                                    @csrf
                                    @method('DELETE')

                                        <button class="btn btn-xs btn-link p-0 m-0 text-danger"
                                          data-toggle="tooltip"
                                          data-placement="top"
                                          title="Eliminar"
                                          onclick="eliminar(event)"
                                        >

                                            <i class="fa fa-trash" aria-hidden="true"></i>

                                        </button>
                                    </form>
                                @endadmin
                            </div>
                        </td>
                    </tr>
                @empty
                    <h6>No hay nada para mostrar</h6>
                @endforelse
                </tbody>
            </table>
            <div class="overflow-auto mt-2">
                {{ $users->links() }}
            </div>
        </div>


    </div>
@endadmin
@endsection

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    function eliminar() {
        event.preventDefault();
        Swal.fire({
          title: "Estás segur@?",
          text: "Recuerda estar completamente segur@!",
          showDenyButton: false,  showCancelButton: true,
          confirmButtonText: `Sí`,
          // denyButtonText: `No`,
          cancelButtonText: `No`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                document.getElementById("myform").submit();
            }
        });

    }
</script>
@endpush
