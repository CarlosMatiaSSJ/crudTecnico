@extends('template')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="text-center p-2">Items Registrados</h1>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="{{ route('items.create') }}" class="btn btn-primary btn-lg">Agregar nuevo Item</a>
            </div>
        </div>
        <div class="table-responsive p-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->itemName }}</td>
                        <td>{{ $item->itemDescription }}</td>
                        <td>{{ $item->itemPrice }}</td>

                        <td>
                            <a href="{{route('items.edit', $item->id)}}" class="btn btn-warning">Editar</a>                       
                            <a href="{{route('items.show', $item->id)}}" class="btn btn-danger">Eliminar</a>                       

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@if(Session::has('Success'))
<div class="alert alert-success alert-dismissible position-fixed top-0 start-50 translate-middle-x" role="alert">
    {{ Session::get('Success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(Session::has('update'))
<div class="alert alert-success alert-dismissible position-fixed top-0 start-50 translate-middle-x" role="alert">
    {{ Session::get('update') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(Session::has('delete'))
<div class="alert alert-success alert-dismissible position-fixed top-0 start-50 translate-middle-x" role="alert">
    {{ Session::get('delete') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@endsection