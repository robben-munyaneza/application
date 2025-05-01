<!-- resources/views/auth/signup.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
</head>
<body>
    <h2>Signup</h2>
    <form method="POST" action="{{ route('signup') }}">
        @csrf
        <label>Name:</label><br>
        <input type="text" name="username"><br><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br><br>
        <button type="submit">Signup</button>
    </form>
</body>
</html>
