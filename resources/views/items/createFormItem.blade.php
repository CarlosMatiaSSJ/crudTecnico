@extends('template')

@section('content')
<h1 class="text-center p-2">Registrar Nuevo Item</h1>

    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <div class="p-5">
            <div class="mb-3">
                <label for="itemName" class="form-label">Nombre del Item:</label>
                <input type="text" class="form-control" id="itemName" name="itemName" required>
            </div>
            <div class="mb-3">
                <label for="itemDescription" class="form-label">Descripción del Item:</label>
                <textarea class="form-control" id="itemDescription" name="itemDescription" required></textarea>
            </div>
            <div class="mb-3">
                <label for="itemPrice" class="form-label">Precio del Item:</label>
                <input type="number" class="form-control" id="itemPrice" name="itemPrice" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear Item</button>
        </div>
    </form>

    @if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@endsection
