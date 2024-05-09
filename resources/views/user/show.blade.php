<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
    <h1>User Profile</h1>
    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Date of Birth: {{ $user->date_of_birth ? $user->date_of_birth->toFormattedDateString() : 'Not set' }}</p>
    <a href="{{ route('dashboard') }}">Back to Dashboard</a>
</body>
</html>
