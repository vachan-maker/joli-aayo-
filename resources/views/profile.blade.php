<x-layout title="Profile">
    <article>
        <header>
            {{ auth()->user()->name }}
        </header>
        <body>
<form action="{{ route('logout') }}" method="POST">
    @csrf
   <button type="Submit"><i class="fa-solid fa-arrow-right-from-bracket"></i>Log Out</button>
</form>
        </body>
    </article>
</x-layout>