<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    @vite(['resources/css/style.css'])
</head>
<body>
    <header>
        <h1>Laravel POS</h1>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/category/food-beverage') }}">Food & Beverage</a></li>
                <li><a href="{{ url('/category/beauty-health') }}">Beauty & Health</a></li>
                <li><a href="{{ url('/category/home-care') }}">Home Care</a></li>
                <li><a href="{{ url('/category/baby-kid') }}">Baby & Kid</a></li>
                <li><a href="{{ url('/sales') }}">Sales</a></li>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>