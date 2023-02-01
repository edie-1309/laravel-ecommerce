<nav id="sidebar">
    <div class="sidebar-header justify-content-center">
        <div class="header-title text-center">
            <h5>Admin</h5>
            <p>{{ auth()->user()->name }}</p>
        </div>
    </div>

    <ul class="list-unstyled components">

        <p>Dashboard</p>
        <li>
            <a href="/dashboard" class="{{ Request::is('dashboard') ? 'active' : '' }}">Dashboard</a>
        </li>

        <p>Product</p>
        <li>
            <a href="/dashboard/products" class="{{ Request::is('dashboard/product*') ? 'active' : '' }}">Products</a>
        </li>
        <li>
            <a href="/dashboard/stock" class="{{ Request::is('dashboard/stock*') ? 'active' : '' }}">Stock</a>
        </li>

        <p>Category</p>
        <li>
            <a href="/dashboard/categories" class="{{ Request::is('dashboard/categories*') ? 'active' : '' }}">Categories</a>
        </li>

        <p>Platform</p>
        <li>
            <a href="/dashboard/platform" class="{{ Request::is('dashboard/platform*') ? 'active' : '' }}">Platform</a>
        </li>

        <p>Order</p>
        <li>
            <a href="/dashboard/orders" class="{{ Request::is('dashboard/orders*') ? 'active' : '' }}">Order List</a>
        </li>
        
        <p>Discount</p>
        <li>
            <a href="/dashboard/discount" class="{{ Request::is('dashboard/discount*') ? 'active' : '' }}">Discount</a>
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