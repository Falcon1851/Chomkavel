<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    {{-- Меню вкладок --}}
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('courses.index') }}">Курсы</a></li>
                <li><a href="{{ route('teachers.index') }}">Преподаватели</a></li>
                <li><a href="{{ route('categories.index') }}">Категории</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h1>@yield('title')</h1>

        {{-- Уведомления об успехе --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Контент других страниц --}}
        <main>
            @yield('content')
        </main>
    </div>

    {{-- Подвал (пока что не сделан (▀̿Ĺ̯▀̿ ̿)) --}}
    <footer>
        {{--  --}}
    </footer>
</body>
</html>
