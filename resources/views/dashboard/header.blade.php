<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow">
    <a href="#" class="navbar-brand col-lg-2 col-md-3 me-0 px-3 fs-6" style="font-family: 'Courier New', Courier, monospace, 'Times New Roman'">StaryStealer</a>
    
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            {{-- <div class="dropdown">
                <button class="btn dropdown-toggle text-white" id="dropdownMenu" data-bs-toggle="dropdown" aria-expanded="false" type="button">
                    hi, {{ auth()->user()->name }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                    <li>
                        <a href="/profile" class="dropdown-item">Profile</a>
                    </li>
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </div> --}}
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="nav-link px-3 border-0">Log Out</button>
            </form>
        </div>
    </div>
</header>