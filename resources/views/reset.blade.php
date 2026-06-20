<x-layout>
    <h2>Reset Password</h2>
    <article>
        <form action="{{ route('reset') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="email"/>
            <input type="submit" value="Reset Password"/>
        </form>
    </article>
</x-layout>