@extends('home')
@section('contenido')
<div class="row mt-3">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header bg-dark text-white"> Edit Category</div>
            <div class="card-body">
                <form id="frmCategory" method="POST" action="{{ url("options",[$options]) }}">
                    @csrf
                    @method('PUT')
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        <input type="text" name="option" value="{{ $options->category }}"class="form-control" maxlength="50" placeholder="Options" required>
                        <select name="category_id" class="form-select" required>
                            <option value="">Category</option>
                            @foreach ($category as $row)
                            @if ($row->id == $options->category_id)
                                <option select value="{{ $row->id }}">{{ $row->description }}</option>
                                @else
                                <option select value="{{ $row->id }}">{{ $row->description }}</option>

                            @endif
                                
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
        </div>
    </div>
</div>
@endsection