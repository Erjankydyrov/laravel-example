<head>
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
</head>

<nav class="navbar">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">Warhammer Store</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">Home</a>
                <a href="{{ route('categories.index') }}" class="nav-link">Categories</a>
            </li>
        </ul>
    </div>
</nav>
