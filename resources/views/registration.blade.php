<x-layout>
    <h2>Create an Account</h2>
    <article>
        <form action="{{ route('register_account.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Full Name"/>
            <input type="email" name="email" placeholder="email"/>
            <input type="password" name="password" placeholder="password"/>
            <input type="submit"/>
        </form>
    </article>
</x-layout>