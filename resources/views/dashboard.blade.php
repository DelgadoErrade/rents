@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Panel principal</h2>
    <a href="{{ route('usuarios.index') }}" class="btn btn-primary">Gestión de Usuarios</a>
</div>
@endsection
