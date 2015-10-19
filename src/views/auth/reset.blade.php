<!-- resources/views/auth/reset.blade.php -->

<form method="POST" action="/password/reset">
    {!! csrf_field() !!}
    <input type="hidden" name="token" value="{{ $token }}">

    <div>
        email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        password
        <input type="password" name="password">
    </div>

    <div>
        password_confirmation
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <button type="submit">
            Reset Password
        </button>
    </div>
</form>