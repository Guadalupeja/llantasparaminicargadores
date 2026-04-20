<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Administrador | Ruguex')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-900 antialiased">
    <div class="min-h-screen">
        <header class="border-b border-slate-200 bg-white">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                <div>
                    <a href="{{ route('home') }}" class="text-lg font-extrabold text-slate-900">
                        Ruguex Admin
                    </a>
                </div>

                <nav class="flex items-center gap-6 text-sm font-medium text-slate-700">
                    <a href="{{ route('admin.blog.posts.index') }}" class="hover:text-orange-600">
                        Artículos
                    </a>
                    <a href="{{ route('admin.blog.categories.index') }}" class="hover:text-orange-600">
                        Categorías
                    </a>
                    <a href="{{ route('dashboard') }}" class="hover:text-orange-600">
                        Dashboard
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="hover:text-red-600">
                            Cerrar sesión
                        </button>
                    </form>
                </nav>
            </div>
        </header>

        <main class="py-8">
            @yield('content')
        </main>
    </div>
</body>
</html>