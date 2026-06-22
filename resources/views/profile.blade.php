<x-layout title="Profile">
    <article>
        <header>
            {{ auth()->user()->name }}
        </header>
        <body>
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <input type="submit" value="Log Out"/>
</form>
        </body>
    </article>
</x-layout>
