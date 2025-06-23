@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Crear Usuario</h3>
    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Correo</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
