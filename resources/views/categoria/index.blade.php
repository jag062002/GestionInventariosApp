@extends('layouts.app')

@section('content')
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Categorías</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Categorías</a></li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="row align-items-center justify-content-between">
                                <!-- Izquierda: Select, Input y Botón Buscar -->
                                <div class="col-md-10">
                                    <x-filtro-busqueda :action="route('proveedores.index')" :records-per-page="$data->records_per_page" :filter="$data->filter" />
                                </div>

                                <!-- Derecha: Botón Nuevo Producto -->
                                @if (\App\Helpers\RoleHelper::isAuthorized('Categorias.createCategorias'))
                                    <div class="col-md-2 text-end">
                                        <a href="{" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Nueva
                                            Categoría</a>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categorias as $categoria)
                                        <tr>
                                            <td>{{ $categoria->id }}</td>
                                            <td>{{ $categoria->nombre }}</td>
                                            <td>

                                                @if (\App\Helpers\RoleHelper::isAuthorized('Categorias.updateCategorias'))
                                                    <a href="" class="btn btn-sm btn-warning"><i
                                                            class="bi bi-pencil"></i> Editar</a>
                                                @endif

                                                @if (\App\Helpers\RoleHelper::isAuthorized('Categorias.deleteCategorias'))
                                                    <form action="" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger btn-eliminar"><i
                                                                class="bi bi-trash"></i> Eliminar</button>
                                                    </form>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $categorias->appends(request()->except('page'))->links('components.customPagination') }}
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection

<script type="module">
    $(document).ready(function() {
        $('.btn-eliminar').click(function(e) {

            e.preventDefault();

            Swal.fire({
                title: "¿Deseas eliminar este registro?",
                text: "No podrás revertilo",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Si, Eliminar",
                cancelButtonText: "Cancelar",
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                }
            }).then((result) => {

                if (result.isConfirmed) {

                    const form = $(this).closest('form');

                    form.submit();
                }
            });
        });
    });
</script>
