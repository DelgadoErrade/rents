{{-- filepath: resources/views/usuarios/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
    <h2 class="mb-4">Listado de Usuarios</h2>
    <div class="table-responsive">
        <table id="datatable" class="table table-bordered w-100">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>
                            <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form method="POST" action="{{ route('usuarios.destroy', $usuario) }}" style="display:inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


