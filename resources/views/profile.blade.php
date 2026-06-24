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
<form action="{{ route('add_friend') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Enter name of your friend"/>
    <input type="email" name="email" placeholder="Email" Enter email"/>
    <button>Add Friend</button>
</form>
        </body>
    </article>
</x-layout>