<nav id="sidebarMenu" class="col-lg-2 col-md-3 d-md-block bg-light sidebar collapse shadow">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="/home" class="nav-link {{ request()->is('home') ? 'active' : '' }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="/profile" class="nav-link {{ request()->is('profile') ? 'active' : '' }}">My Profile</a>
            </li>

            {{-- di route pakai middleware, di blade pakai gate. karena middleware gak bisa atur hak akses di blade --}}
            @can('superadmin')
                <li class="nav-item">
                    <a href="/users" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">User</a>
                </li>
                <li class="nav-item">
                    <a href="/customers" class="nav-link {{ request()->is('customers*') ? 'active' : '' }}">Customer</a>
                </li>
                <li class="nav-item">
                    <a href="/categories" class="nav-link {{ request()->is('categories*') ? 'active' : '' }}">Category</a>
                </li>
                <li class="nav-item">
                    <a href="/penalties" class="nav-link {{ request()->is('penalties*') ? 'active' : '' }}">Denda</a>
                </li>
                <li class="nav-item">
                    <a href="/usages" class="nav-link {{ request()->is('usages*') ? 'active' : '' }}">Pemakaian</a>
                </li>
                <li class="nav-item">
                    <a href="/transactions" class="nav-link {{ request()->is('transactions*') ? 'active' : '' }}">Tagihan</a>
                </li>
                <li class="nav-item">
                    <a href="/payments" class="nav-link {{ request()->is('payments*') ? 'active' : '' }}">Pembayaran</a>
                </li>
            @endcan

            @can('petugas')
                <li class="nav-item">
                    <a href="/usages/check" class="nav-link {{ request()->is('usages*') ? 'active' : '' }}">Pemakaian</a>
                </li>
            @endcan

            @can('admin')
                <li class="nav-item">
                    <a href="/payments/check" class="nav-link {{ request()->is('payments*') ? 'active' : '' }}">Pembayaran</a>
                </li>
            @endcan
        </ul>
    </div>
</nav>