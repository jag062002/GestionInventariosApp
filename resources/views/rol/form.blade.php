@extends('layouts.app')
@section('content')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">{{ $isEdit ? 'Actualizar Rol' : 'Nuevo Rol' }}</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <h3 class="mb-0">{{ $isEdit ? 'Actualizar Rol' : 'Nuevo Rol' }}</h3>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content py-4">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Diligencia la siguiente información</div>
                        </div>

                        <form method="POST" action="{{ $route }}">
                            @csrf
                            @if ($isEdit)
                                @method('PUT')
                            @endif

                            <input type="hidden" name="permisos" id="permisos" />

                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <label for="nombre" class="form-label">Nombre del rol</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                            value="{{ old('nombre', $rol->nombre ?? '') }}" autocomplete="off">
                                        @error('nombre')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Título de Permisos -->
                                <div class="row mb-3">
                                    <div class="col-md-12 text-center">
                                        <h4 class="fw-bold text-primary">🔐 Permisos disponibles</h4>
                                        <p class="text-muted">Selecciona los permisos que deseas asignar al rol</p>
                                    </div>
                                </div>

                                <!-- Tarjetas de Permisos -->
                                <div class="row g-4 px-2">
                                    @foreach ($modulos as $modulo => $permisos)
                                        <div class="col-md-6 col-lg-4">
                                            <div class="card border-primary shadow-sm h-100">
                                                <div class="card-header bg-primary text-white">
                                                    <h6 class="mb-0">{{ ucfirst($modulo) }}</h6>
                                                </div>
                                                <div class="card-body">
                                                    @foreach ($permisos as $permiso)
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input permiso" type="checkbox"
                                                                id="permiso_{{ $permiso->id }}"
                                                                data-permission-id="{{ $permiso->id }}"
                                                                {{ $permiso->selected ? 'checked' : '' }} >
                                                            <label class="form-check-label"
                                                                for="permiso_{{ $permiso->id }}">
                                                                {{ $permiso->descripcion }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @error('permisos')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary" id="btnSave">
                                    {{ $isEdit ? 'Actualizar' : 'Guardar' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<script type="module">
    $(document).ready(function() {

        $('#btnSave').click(function(event) {

            // Permisos
            const permisos = $('.permiso:checked');

            let permisosIds = [];

            permisos.each(function() {

                const permisoId = $(this).data('permission-id');
                permisosIds.push(permisoId);
            });

            $('#permisos').val(JSON.stringify(permisosIds));
        });

    });
</script>
