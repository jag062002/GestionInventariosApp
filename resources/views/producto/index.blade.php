@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="toastSuccess" class="toast align-items-center text-bg-success border-0 show" role="alert"
                aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Cerrar"></button>
                </div>
            </div>
        </div>
    @endif


    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Productos</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Productos</a></li>
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
                                    <x-filtro-busqueda
                                    :action="route('productos.index')"
                                    :records-per-page="$data->records_per_page"
                                    :filter="$data->filter" />
                                </div>

                                <!-- Derecha: Botón Nuevo Producto -->
                                <div class="col-md-2 text-end">
                                    <a href="{{ route('productos.create') }}" class="btn btn-primary">
                                        <i class="bi bi-plus-circle"></i> Nuevo Producto
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Categoría</th>
                                        <th>Proveedor</th>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Stock</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{ $producto->categoria->nombre ?? 'Sin categoría' }}</td>
                                            <td>{{ $producto->proveedor->nombre ?? 'Sin proveedor' }}</td>
                                            <td>{{ $producto->codigo }}</td>
                                            <td>{{ $producto->nombre }}</td>
                                            <td>{{ $producto->stock }}</td>
                                            <td>
                                                <a href="{{ route('productos.edit', $producto->id) }}"
                                                    class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i> Editar</a>
                                                <form action="{{ route('productos.destroy', $producto) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger btn-eliminar"><i
                                                            class="bi bi-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $productos->appends(request()->except('page'))->links('components.customPagination') }}
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
