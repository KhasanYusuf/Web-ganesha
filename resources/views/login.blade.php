<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/login.css">
    <style>
         body {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            line-height: 1.5;
            background: #fff;
            overflow-x: hidden;
        }

    </style>
</head>


<body>
    <div class="form">
      <div class="form-toggle"></div>
      <div class="form-panel one">
        <div class="form-header">
          <h1>Login</h1>
        </div>
        <div class="form-content">
          <form action="/login" method="POST">
            @csrf
            <div class="form-group">
              <label for="phone_num">Nomor Handphone</label>
              <input id="phone_num" type="tel" name="phone_num" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input id="password" type="password" name="password" required>
            </div>
            <div class="form-group">
                belum punya akun?
              <a class="form-recovery" href="/register">Daftar</a>
            </div>
            <div class="form-group">
              <button type="submit">Log In</button>
            </div>
          </form>
        </div>
      </div>
</body>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
