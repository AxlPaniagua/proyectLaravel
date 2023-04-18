@extends('home')
@section('contenido')
<div class="row mt-3">
    <div class="col-md-4 offset-md-4">
        <div class="d-grid mx-auto">
            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalCategory">
                <i class="fa-solid fa-circle-plus"></i> Create
            </button>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-lg-8 offset-0 offset-lg-2">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead><tr><th>#</th><th>Option</th><th>Category_id</th><th>Created_at</th><th>Updated_at</th><th>Delete</th></tr></thead>
                <tbody class="table-group-divider">
                    @php
                        $i =1;
                    @endphp
                    @foreach ($options as $row)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $row->option }}</td>
                            <td>{{ $row->category_id }}</td>
                            <td>{{ $row->created_at }}</td>
                            <td>{{ $row->updated_at }}</td>
                            <td>
                                <a href="{{ url('options',[$row]) }}" class="btn btn-warning"><i class="fa-solid fa-edit"></i></a>
                            </td>
                            <td>
                                <form method="POST" action="{{ url('options',[$row]) }}">
                                    @method("delete")
                                    @csrf
                                    <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="modalCategory" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <label class="h5" id="titulo_modal">Añadir Option</label>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="frmCategory" method="POST" action="{{ url("options") }}">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        <input type="text" name="option" class="form-control" maxlength="50" placeholder="Options" required>
                        <select name="category_id" class="form-select" required>
                            <option value="">Category</option>
                            @foreach ($category as $row)
                                <option value="{{ $row->id }}">{{ $row->description }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid"></i></span>
                        <input type="text" name="category_id" class="form-control" maxlength="50" placeholder="Category_id" required>
                    </div>
                    <div class="d-grid col-6 mx-auto">
                        <button class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>Guardar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCerrar" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endsection