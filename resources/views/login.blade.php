

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
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
          <form id="loginForm">
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <div class="input-group">
                <input type="password" class="form-control" id="password" placeholder="Password">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fa fa-eye" id="togglePassword"></i>
                  </span>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-brown btn-block">Login</button>
            <hr>
            <p>-------------------------------- or login with ------------------------------</p>
            <button type="button" class="btn btn-danger btn-block" id="loginWithGoogle">Login with Google</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS (Optional) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- jQuery (Optional, for Bootstrap) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Font Awesome (Optional, for eye icon) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

<script>
  // Handle form submission
  $('#loginForm').submit(function(event) {
    event.preventDefault(); // Prevent default form submission
    // Here you can add your login logic, such as sending data to server or validating input
    alert('Login button clicked');
  });

  // Handle login with Google button click
  $('#loginWithGoogle').click(function() {
    // You can customize this according to your Google login implementation
    // For simplicity, let's just log a message
    alert('Login with Google button clicked');
  });

  
  $('#togglePassword').click(function(){
    var passwordField = $('#password');
    var passwordFieldType = passwordField.attr('type');
    if(passwordFieldType == 'password'){
      passwordField.attr('type', 'text');
      $(this).removeClass('fa-eye').addClass('fa-eye-slash');
    }else{
      passwordField.attr('type', 'password');
      $(this).removeClass('fa-eye-slash').addClass('fa-eye');
    }
  });
</script>
</body>
</html>
