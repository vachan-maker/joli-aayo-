@props(['title' => 'Default Title'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <title>{{ $title }}</title>
</head>

<body style="max-width: 45rem; margin: 0 auto;">

    <header>
        <nav style="display: flex;flex-direction:row; align-items: center;">
            <a href="{{ route('applications.index') }}">
            <h1>Joli aayo?</h1>
            </a>
            <ul>
                <li>
                    @if (request()->routeIs('applications.*'))
                        <a href="{{ route('applications.create') }}">
                            <i class="fa-solid fa-plus"></i>
                            Add Application
                        </a>
                    @endif
                    @if (request()->routeIs('resume.*'))
                        <a href="{{ route('resume.create') }}"><i class="fa-solid fa-plus"></i>Add Resume</a>
                       
                    @endif
                </li>
                @auth
                <li>
                    <a href="{{ route('resume.index') }}">
                        <i class="fa-solid fa-file"></i>
                        Resume</a>
                </li>
               
                <li>

                    <a href="/profile">
                        <i class="fa-solid fa-user"></i>
                        Profile</a>
                </li>
                @endauth
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