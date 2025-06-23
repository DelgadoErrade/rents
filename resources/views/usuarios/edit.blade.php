@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Editar Usuario</h3>
    <form action="{{ route('usuarios.update', $usuario) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ $usuario->name }}" required>
        </div>
        <div class="mb-3">
            <label>Correo</label>
            <input type="email" name="email" class="form-control" value="{{ $usuario->email }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
