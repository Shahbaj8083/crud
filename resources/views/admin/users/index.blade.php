// resources/views/admin/users/index.blade.php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
</head>

<body>
    <form action="{{ route('admin.users.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="csv_file" required>
        <button type="submit">Upload CSV</button>
    </form>
    <a href="{{ route('admin.users.download') }}">Download CSV</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Mobile Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->mobile_number }}</td>
                    <td><a href="{{ route('admin.users.show', $user) }}">View</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

// resources/views/admin/users/show.blade.php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
</head>

<body>
    <h1>User Details</h1>
    <p>ID: {{ $user->id }}</p>
    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Username: {{ $user->username }}</p>
    <p>Mobile Number: {{ $user->mobile_number }}</p>
    <p>Interests:</p>
    <ul>
        @foreach ($user->interests as $interest)
            <li>{{ $interest->name }}</li>
        @endforeach
    </ul>
    <a href="{{ route('admin.users') }}">Back to All Users</a>
</body>

</html>
