@extends('layouts.app')
@section('content')


<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">{{ $isEdit ? 'Actualizar Proveedor' : 'Nuevo Proveedor' }}</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <h3 class="mb-0">{{ $isEdit ? 'Actualizar Proveedor' : 'Nuevo Proveedor' }}</h3>
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
                                <div class="col-md-12">
                                    <label for="codigo" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $proveedor->nombre ?? '') }}" autocomplete="off">
                                    @error('nombre')
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
