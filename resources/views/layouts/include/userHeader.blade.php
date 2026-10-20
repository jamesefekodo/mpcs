<header class="topbar">
    <div class="topbar-left">
        <button class="menu-btn" id="menuBtn">
            <i class="fa-solid fa-bars"></i>
        </button>

        {{-- <div class="search">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="search" placeholder="Search members, loans, sales, invoices..." />
        </div> --}}
    </div>

    <div class="topbar-right">
        {{-- <button class="icon-btn" id="themeBtn" title="Toggle theme">
            <i class="fa-solid fa-moon"></i>
        </button>

        <button class="icon-btn" title="Notifications">
            <i class="fa-regular fa-bell"></i>
            <span class="dot"></span>
        </button> --}}

        <div class="user-menu">
            <button class="user-trigger" id="userMenuBtn" aria-haspopup="true" aria-expanded="false"
                aria-controls="userDropdown">
                <div class="avatar">JF</div>

                <div class="user-meta">
                    <strong>James Fekodo</strong>
                    <span>Super Admin</span>
                </div>

                <i class="fa-solid fa-chevron-down user-caret"></i>
            </button>

            <div class="user-dropdown" id="userDropdown" role="menu" aria-labelledby="userMenuBtn">
                <div class="user-dropdown-header">
                    <div class="avatar">JF</div>

                    <div>
                        <strong>James Fekodo</strong>
                        <span>james@odusystems.com</span>
                    </div>
                </div>

                <div class="user-dropdown-divider"></div>

                <a href="#" class="user-dropdown-item" role="menuitem">
                    <i class="fa-solid fa-user"></i> My Profile
                </a>

                <a href="#" class="user-dropdown-item" role="menuitem">
                    <i class="fa-solid fa-building-columns"></i> My Accounts
                </a>

                <a href="#" class="user-dropdown-item" role="menuitem">
                    <i class="fa-solid fa-bell"></i> Notifications
                </a>

                <a href="#" class="user-dropdown-item" role="menuitem">
                    <i class="fa-solid fa-shield-halved"></i> Security
                </a>

                <div class="user-dropdown-divider"></div>

                <button class="user-dropdown-item logout" role="menuitem">
                    <i class="fa-solid fa-right-from-bracket"></i> Sign Out
                </button>
            </div>
        </div>
    </div>
</header>
