<div class="sidebar collapse" data-background-color="white" data-active-color="danger">

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="" class="simple-text">
                Mouri Shop Admin
            </a>
        </div>

        <ul class="nav">
            <li>
                <a href="{{ url('/admin') }}">
                    <i class="ti-panel"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/products/create') }}">
                    <i class="ti-archive"></i>
                    <p>Tambah Produk</p>
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/products') }}">
                    <i class="ti-view-list-alt"></i>
                    <p>Lihat Produk</p>
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/orders') }}">
                    <i class="ti-calendar"></i>
                    <p>Order</p>
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/users') }}">
                    <i class="fa fa-users"></i>
                    <p>User</p>
                </a>
            </li>
        </ul>
    </div>
</div>
