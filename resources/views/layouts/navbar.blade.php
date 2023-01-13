<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
    <div class="container">
      <a class="navbar-brand fw-bolder" href="#">Eazy Play!</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @auth
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <div class="nav-item dropdown">
                <a href="" class="text-white text-decoration-none dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form action="/logout" method="POST">
                      @csrf
                      <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                  </li>
                </ul>
              </div>
            </ul>
        @else
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link {{ (Request::is('login*')) ? 'active' : '' }} fw-semibold" aria-current="page" href="/login">Login</a>
            </li>
          </ul>
        @endauth
      </div>
    </div>
  </nav>