<nav class="navbar navbar-expand-lg py-4 shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold color-black" href="/">Eazy Play!</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="w-50 d-flex justify-content-center hstack gap-5">
        <a href="/" class="text-decoration-none text-dark fw-bold">Home</a>
        <a href="" class="text-decoration-none text-dark fw-bold">About</a>
        <a href="/products" class="text-decoration-none text-dark fw-bold">All Product</a>
      </div>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 hstack gap-3">
          <li class="nav-item">
            <a href="{{ route('cart') }}" class="nav-link"><i class="bi bi-cart4"></i></a>
          </li>
          @auth
            <li class="nav-item">
              <div class="nav-item dropdown">
                <a href="" class="text-dark text-decoration-none dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 12px">
                  {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                  <li><a class="dropdown-item" href="/orders">Order</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form action="/logout" method="POST">
                      @csrf
                      <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                  </li>
                </ul>
              </div>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link {{ (Request::is('login*')) ? 'active' : '' }} fw-semibold" aria-current="page" href="/login"><i class="bi bi-person-fill"></i></a>
            </li>
          @endauth
          <li>
            <form action="/products">
              <input type="text" class="rounded-4 border border-1 px-3 py-1 w-75" name="search" value="{{ request('search') }}" placeholder="Search" style="font-size: 12px">
              <button type="submit" class="border-0 bg-transparent mx-3"><i class="bi bi-search"></i></button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>