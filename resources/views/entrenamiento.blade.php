<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
    <body>
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 link-dark">Home</a></li>
                <li><a href="/pesos" class="nav-link px-2 link-secondary">Inicializar Pesos</a></li>
                <li><a href="/entrenamiento" class="nav-link px-2 link-dark">Entrenamiento</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <button type="button" class="btn btn-outline-primary me-2">Login</button>
                <button type="button" class="btn btn-primary">Sign-up</button>
            </div>
            </header>
        </div>
        <div class="container">
            <div class="center">
                <h1>Matriz de pesos</h1>
            </div>
            <table class="table">
                <thead>
                <tr>
                    @for ($i = 1; $i <= 20 ; $i++)
                        <th scope="col">X{{ $i }}</th>
                    @endfor

                </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i <= $20 ; $i++)
                    <tr>

                        @for ($j = 0; $j <= $40 ; $j++)
                        <td>{{ $matriz[$i][$j] }}</td>
                        @endfor

                    </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </body>
</html>

