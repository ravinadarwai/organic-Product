<!DOCTYPE html>
<html lang="en">
  
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <meta property="title" content="{{$meta['title']}}" />
	<meta property="description" content="{{$meta['description']}}" />
	<meta property="url" content="{{url($meta['url'])}}">
	<meta property="keyword" content="{{$meta['keyword']}}">

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  

  <link rel="stylesheet" href="{{ asset('public/')}}/assets/css/main.css">
  <link rel="stylesheet" href="{{ asset('public/')}}/assets/css/home.css">

  <!-- 
    - google font link


  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&family=Roboto:wght@400;500;700&display=swap"
    rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>

    <div class="top-bar">
      <div class="container">
        <p><marquee>Free shipping for all order of $105</marquee></p>
      </div>
    </div>

    <div class="nav-wrapper">
      <div class="container">

        <h1 class="h1">
          <a href="./index.html" class="logo">Organ<span class="span">ica</span></a>
        </h1>

        <button class="nav-open-btn" aria-label="Open Menu" data-nav-open-btn>
          <ion-icon name="menu-outline"></ion-icon>
        </button>

        <nav class="navbar" data-navbar>

          <button class="nav-close-btn" aria-label="Close Menu" data-nav-close-btn>
            <ion-icon name="close-outline"></ion-icon>
          </button>

          <ul class="navbar-list">

            <li>
              <a href="{{ route('home')}}" class="navbar-link">Home</a>
            </li>

            <li>
              <a href="{{ route('about')}}" class="navbar-link">About</a>
            </li>

            <li>
              <a href="{{route('showAll')}}" class="navbar-link">Shop</a>
            </li>

            <li>
              <a href="{{route('blog')}}"  class="navbar-link">Blog</a>
            </li>

            
            <li>
              <a href="{{ route('contact')}}" class="navbar-link">Contact</a>
            </li>

          </ul>

        </nav>

        <div class="header-action">

          <!-- <div class="search-wrapper" data-search-wrapper>

            <button class="header-action-btn" aria-label="Toggle search" data-search-btn>
              <ion-icon name="search-outline" class="search-icon"></ion-icon>
              <ion-icon name="close-outline" class="close-icon"></ion-icon>
            </button>

            <div class="input-wrapper">
              <input type="search" name="search" placeholder="Search here" class="search-input">

              <button class="search-submit" aria-label="Submit search">
                <ion-icon name="search-outline"></ion-icon>
              </button>
            </div>

          </div> -->
          <a href="{{route('wishlistget')}}">     
          <button class="header-action-btn" aria-label="Open whishlist" data-panel-btn="whishlist">
            <ion-icon name="heart-outline"></ion-icon>

            <data class="btn-badge" value="{{ session('wishlist_count', 0) }}">  
                    {{ session('wishlist_count', 0) }}
</data>

          </button>
</a>
          <a href="{{route('showcart')}}">
          <button class="header-action-btn" aria-label="Open shopping cart" data-panel-btn="cart">
    <ion-icon name="basket-outline"></ion-icon>
    <data class="btn-badge" value="{{ session('cart_count', 0) }}">
        {{ session('cart_count', 0) }}
    </data>
</button>
</a>

<button class="header-action-btn" aria-label="Open shopping cart" data-panel-btn="cart">
          <a href="{{route('myorder')}}"><i class="fa-solid fa-bag-shopping"></i></a>
           
          </button>
           
     <button class="header-action-btn" aria-label="Open shopping cart" data-panel-btn="cart">
          <a href="{{route('login')}}">login/signup</a>
           
          </button>
           
          <button class="header-action-btn" aria-label="Open shopping cart" data-panel-btn="cart">
          <a href="{{route('logout')}}">logout</a>
           
          </button>


        </div>

      </div>
    </div>

  </header>

  <script src="{{ asset('public/')}}/assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>