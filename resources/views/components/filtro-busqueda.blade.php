<form action="{{ $action }}" style="display:inline;">
    <div class="d-flex flex-wrap gap-2">

        <select class="form-select w-auto" name="records_per_page">
            <option value="5" {{ $recordsPerPage == 5 ? 'selected' : '' }}>5</option>
            <option value="10" {{ $recordsPerPage == 10 ? 'selected' : '' }}>10</option>
            <option value="15" {{ $recordsPerPage == 15 ? 'selected' : '' }}>15</option>
            <option value="30" {{ $recordsPerPage == 30 ? 'selected' : '' }}>30</option>
        </select>

        <input type="text"
               class="form-control w-50"
               name="filter"
               id="filter"
               placeholder="Buscar aquí el nombre del producto"
               value="{{ $filter }}">

        <button class="btn btn-secondary" id="btnBuscar" style="white-space: nowrap;">
            <i class="bi bi-search"></i>
        </button>

    </div>
</form>
