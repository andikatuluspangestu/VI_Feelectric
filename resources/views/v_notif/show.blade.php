<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/18b04d2726.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Notification Detail
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $notification->data['title'] ?? 'No title' }}</h5>
                <p class="card-text">{{ $notification->data['message'] ?? 'No details available' }}</p>
                <p class="card-text"><small class="text-muted">Received on: {{ $notification->created_at->toFormattedDateString() }}</small></p>
                <a href="#" class="btn btn-primary" onclick="markAsRead({{ $notification->id }})">Mark as Read</a>
            </div>
        </div>
    </div>

    <script>
        function markAsRead(id) {
            fetch(`/notifications/mark-as-read/${id}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ notificationId: id })
            }).then(response => {
                window.location.href = '/notifications';
            }).catch(error => {
                console.error('Error marking notification as read:', error);
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
