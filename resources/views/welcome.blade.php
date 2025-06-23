<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h2 class="mb-0">Bienvenido a Mi Sistema</h2>
                    </div>
                    <div class="card-body text-center">
                        <p class="mb-4">Este sistema está diseñado para gestión administrativa.</p>
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-danger">Cerrar sesión</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
