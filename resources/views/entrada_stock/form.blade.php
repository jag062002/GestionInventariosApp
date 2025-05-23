@extends('layouts.app')
@section('content')


<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">{{ $isEdit ? 'Actualizar Entrada' : 'Nueva Entrada' }}</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <h3 class="mb-0">{{ $isEdit ? 'Actualizar Entrada' : 'Nueva Entrada' }}</h3>
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
                <div class="card card-primary card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Diligencia la siguiente información</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <form method="POST" action="{{ $route }}">
                        @csrf
                        @if($isEdit)
                            @method('PUT')
                        @endif
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="producto" class="form-label">Producto</label>
                                    <select class="form-select" name="producto" id="producto">
                                        <option value="">Selecciona un producto</option>
                                        @foreach ($productos as $producto)
                                            <option value="{{ $producto->id }}"
                                                {{ old('producto', $entrada_stock->producto_id ?? '') == $producto->id ? 'selected' : '' }}>
                                                {{ $producto->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('producto')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="cantidad" class="form-label">Stock</label>
                                    <input type="number" class="form-control" id="cantidad" name="cantidad"
                                        value="{{ old('cantidad', $entrada_stock->cantidad ?? '') }}" autocomplete="off">
                                    @error('cantidad')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">{{ $isEdit ? 'Actualizar' : 'Guardar' }}</button>
                        </div>
                    </form>

                    <!--end::Form-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>
@endsection
