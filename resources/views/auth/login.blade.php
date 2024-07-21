// resources/views/auth/login.blade.php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
</head>

<body>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="text" name="login" placeholder="Email, Username or Mobile Number" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</body>

</html>
