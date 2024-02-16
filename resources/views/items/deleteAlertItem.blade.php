@extends('template')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Eliminar Item</h1>
            <p>¿Estás seguro de que deseas eliminar el ítem {{$item->itemName}}?</p>
            <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
                <a href="{{ route('items.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection
