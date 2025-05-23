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
                    <h3 class="mb-0">Entradas de Stock</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Entradas de Stock</a></li>
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
                            <h3 class="card-title"><a href="{{ route('entradasStock.create') }}"
                                    class="btn btn-sm btn-primary"><i class="bi bi-plus-circle"></i> Generar Nueva
                                    Entrada</a></h3>
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
                                        <th>Fecha Entrada</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entradas_stock as $entrada)
                                        <tr>
                                            <td>{{ $entrada->producto->categoria->nombre ?? '-' }}</td>
                                            <td>{{ $entrada->producto->proveedor->nombre ?? '-' }}</td>
                                            <td>{{ $entrada->producto->codigo }}</td>
                                            <td>{{ $entrada->producto->nombre }}</td>
                                            <td>{{ $entrada->cantidad }}</td>
                                            <td>{{ $entrada->fecha }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection
