<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran</title>
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
        <div class="form-header">
            <h1>Formulir Pendaftaran</h1>
        </div>
        <form action="/register" method="POST">
            @csrf
          <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input id="name" type="text" name="name" required>
          </div>
          <div class="form-group">
            <label for="phone_num">Nomor Telepon</label>
            <input id="phone_num" type="tel" name="phone_num" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="address">Alamat</label>
            <input id="text" type="address" name="address" required>
          </div>
          <div class="form-group">
            <button type="submit">Daftar</button>
          </div>
        </form>
        <p>Sudah memiliki akun? login <a href="/login">disini</a></p>
      </div>
    </div>
  </div>

</body>
