<x-layout>
    <h2>Create an Account</h2>
    <article>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="email"/>
            <input type="password" name="password" placeholder="password"/>
            <input type="submit"/>
        </form>
    </article>
</x-layout>