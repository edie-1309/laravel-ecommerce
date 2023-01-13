<nav class="navbar navbar-expand-lg navbar-light">
    <div class="d-flex justify-content-between w-100">

        <button type="button" id="sidebarCollapse" class="sidebar-button btn">
            <i class="fa-solid fa-align-justify"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Web</a>
                </li>
                <li class="nav-item">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="nav-link border-0 bg-white">Logout</button>
                    </form>
                    {{-- <a class="nav-link" href="/logout">Logout</a> --}}
                </li>
            </ul>
        </div>
    </div>
</nav>