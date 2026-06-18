<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>{{ $title ?? 'Default Title' }}</title>
</head>

<body style="max-width: 45rem; margin: 0 auto;">

    <header>
        <nav>
            <h1>Joli aayo?</h1>
            <ul>
                <li>
                    <a href="{{ route('applications.create') }}">Add Application</a>
                </li>
                <li>
                    <a href="/profile">Profile</a>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Your App</p>
    </footer>

</body>

</html>