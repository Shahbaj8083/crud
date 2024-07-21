// resources/views/auth/register.blade.php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>

<body>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="text" name="mobile_number" placeholder="Mobile Number" required>
        <input type="password" name="password" placeholder="Password" required>
        <select name="interests[]" multiple>
            @foreach ($interests as $interest)
                <option value="{{ $interest->id }}">{{ $interest->name }}</option>
            @endforeach
        </select>
        <label for="admin">Admin</label>
        <input type="radio" name="is_admin" value="1">
        <label for="user">User</label>
        <input type="radio" name="is_admin" value="0" checked>
        <button type="submit">Register</button>
    </form>
</body>

</html>
