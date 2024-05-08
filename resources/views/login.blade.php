<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Login Form
        </div>
        <div class="card-body">
        <form id="loginForm" action="{{ url('/login') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <div class="input-group">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            <div class="input-group-append">
                <span class="input-group-text" id="togglePassword">
                    <i class="fas fa-eye"></i>
                </span>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Login</button>
    <div class="mt-3">
        <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
    </div>
</form>
<!-- Existing form code above -->
<button type="button" id="loginWithGoogle" class="btn btn-danger btn-block">Login with Google</button>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- jQuery (for Bootstrap functionality) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Font Awesome for eye icon -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

<script>
  $(document).ready(function() {
    // Handle form submission
    $('#loginForm').submit(function(event) {
      event.preventDefault(); // You can remove this if you want the form to submit normally
      alert('Login button clicked');
    });

    // Handle login with Google button click
    $('#loginWithGoogle').click(function() {
      window.location = '{{ route('google.login') }}';
    });

    // Toggle password visibility
    $('#togglePassword').click(function() {
      var passwordField = $('#password');
      var passwordFieldType = passwordField.attr('type');
      if(passwordFieldType === 'password'){
        passwordField.attr('type', 'text');
        $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
      }else{
        passwordField.attr('type', 'password');
        $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
      }
    });
  });
</script>
</body>
</html>
