<!DOCTYPE html>
<html>
<head>
    <title>Update Successful</title>
</head>
<body>
    <h1>Update Successful!</h1>
    <p>Your profile has been updated.</p>
    <a href="{{ route('dashboard') }}">Back to Dashboard</a>
    <a href="{{ route('user.show', $user->id) }}">View Profile</a>
</body>
</html>
