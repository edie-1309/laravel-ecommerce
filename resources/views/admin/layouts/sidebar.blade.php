<nav id="sidebar">
    <div class="sidebar-header justify-content-center">
        <div class="header-title text-center">
            <h5>Admin</h5>
            <p>Edi Nugroho</p>
        </div>
    </div>

    <ul class="list-unstyled components">

        <p>Dashboard</p>
        <li>
            <a href="/dashboard" class="{{ Request::is('dashboard') ? 'active' : '' }}">Dashboard</a>
        </li>

        <p>Products</p>
        <li>
            <a href="/dashboard/products" class="{{ Request::is('dashboard/product*') ? 'active' : '' }}">Products</a>
        </li>
        <li>
            <a href="/inventory" class="">Inventories</a>
        </li>
        <li>
            <a href="/options" class="">Options</a>
        </li>

        <hr>

        <li>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
            </form>
        </li>
    </ul>
</nav>