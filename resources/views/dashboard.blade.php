<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 30px;
        }

        .table thead th {
            background-color: #007bff;
            color: white;
        }

        .btn-primary {
            margin-right: 10px;
        }

        .search-form input {
            margin-right: 10px;
        }

        .form-inline {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mb-4">Dashboard</h1>

        <form method="GET" action="{{ route('dashboard') }}" class="form-inline">
            <input type="text" name="search" class="form-control" placeholder="Search users..."
                value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>


        @if (auth()->user()->is_admin)
            <a href="{{ URL::to('/register') }}" class="btn btn-success mb-3">Add New User</a>
            <a href="{{ route('export.users') }}" class="btn btn-info">Export Users to CSV</a>

            <div class="mb-3">
                <form action="{{ route('import.users') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="csv_file" class="form-label">Upload CSV</label>
                        <input type="file" name="csv_file" id="csv_file" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload CSV</button>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
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
                                <td>
                                    <a href="{{ URL::to('edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('users.delete', $user->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
