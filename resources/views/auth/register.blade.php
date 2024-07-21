<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }

        .register-form {
            width: 100%;
            max-width: 500px;
            padding: 20px;
            margin: auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .register-form input,
        .register-form select {
            margin-bottom: 10px;
        }

        .register-form button {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="register-form">
        <h2 class="text-center">User Registration</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name"
                    required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
                    required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username"
                    placeholder="Enter your username" required>
            </div>
            <div class="mb-3">
                <label for="mobile_number" class="form-label">Mobile Number</label>
                <input type="text" class="form-control" id="mobile_number" name="mobile_number"
                    placeholder="Enter your mobile number" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Enter your password" required>
            </div>
            <div class="mb-3">
                <label for="interests" class="form-label">Interests</label>
                <select class="form-select" id="interests" name="interests[]" multiple required>
                    @foreach ($interests as $interest)
                        <option value="{{ $interest->id }}">{{ $interest->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Role</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="admin" name="is_admin" value="1">
                    <label class="form-check-label" for="admin">Admin</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="user" name="is_admin" value="0"
                        checked>
                    <label class="form-check-label" for="user">User</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#interests').select2({
                placeholder: "Select your interests",
                allowClear: true
            });
        });
    </script>
</body>

</html>
