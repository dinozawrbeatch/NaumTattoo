<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NaumTattoo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<header>
    <form action="{{ route("logout") }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Выйти</button>
    </form>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">NaumTattoo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/masters">Мастера</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/tattoos">Тату</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/products">Товары</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/reviews">Отзывы</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main class="px-5">
    @yield('content')
</main>
</body>
</html>
