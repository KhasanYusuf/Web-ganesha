<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
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
    <nav class="navbar sticky-top">
        <div class="container">
          <div class="logo">
            <a href="/">
              <img src="/image/logo.png" alt="logo" />
            </a>
          </div>
          <form action="{{route('search')}}" method="post">
            @csrf
          <div class="search-bar">
              <input type="text" class="search-input" id="search" name="search" placeholder="Search..." style="width: 400px"/> {{-- width sementara --}}
              <button type="submit" class="search-button" >Search</button>
            </div>
          </form>

          <div class="main-menu">
            <ul>
              <li><a href="/reparation">Form Reparasi</a></li>
              <li><a href="/status">Status Pesanan</a></li>
              <li>
                <a href="/product_view"><img src="/image/category.png" alt="Category" width="25px"></a>
              </li>
              <li>
                <a href="/transaksi"><img src="/image/cart.png" alt="Cart" width="25px"></a>
              </li>
              <li>
                @if(Auth::check())
                <a class="btn" href="/profile">
                    <i class="fas fa-user"> </i> Profile  
                </a>
                    @if(Auth::user()->is_admin)
                        <a class="btn" href="/insert" style="margin-top: 5px">insert</a>
                        <a class="btn" href="/shipmentlist" style="margin-top: 5px">Shipment List</a>
                    @else
                    
                    @endif
                @else
                    <a class="btn" href="{{route('login')}}">
                        <i class="fas fa-user"></i> Log In
                    </a>
                @endif
              </li>
            </ul>
          </div>
          <!-- Hamburger Button -->
          {{-- <button class="hamburger-button">
            <div class="hamburger-line"></div>
            <div class="hamburger-line"></div>
            <div class="hamburger-line"></div>
          </button> --}}
          {{-- <div class="mobile-menu">
            <ul>
              <li>
                <a href="product_view"><img src="{{ asset('category.png') }}" alt="Category" width="25px"></a>
              </li>
              <li>
                <a href="transaksi"><img src="image/cart.png" alt="Cart" width="20px"></a>
              </li>
              <li>
                @if(Auth::check())
                <a class="btn" href="/profile">
                    <i class="fas fa-user"> </i> Profile
                </a>
                @else
                    <a class="btn" href="{{route('login')}}">
                        <i class="fas fa-user"></i> Log In
                    </a>
                @endif
              </li>
            </ul>
          </div> --}}
        </div>
      </nav>

<!-- Konten -->
    <div class="container mt-4">
        @yield('container')
    </div>

    <!-- Footer -->
    <footer class="footer bg-black">
        <div class="container">
            <div>
              <a href="/">
                <img src="/image/logo.png" alt="logo" style="max-width: 100px">
              </a>
            </div>
            <div style="justify-content:space-between">
              <h5>Hubungi Kami</h5>
              <div>
                <a href="https://wa.me/6285895710985">Khasan Yusuf (+6285895710985)</a>
                <div style="color:lightgrey">bospandegogorante@gmail.com</div>
              </div>
            </div>
          </div>
        </div>
      </footer>
<!-- Bootstrap JS CDN -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
