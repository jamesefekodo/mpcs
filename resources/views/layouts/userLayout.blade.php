<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="{{ associationLogo() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title') · {{ basicSystemInfo()?->association_acronym ?? config('app.name') }}
    </title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <link rel="stylesheet" href="{{ asset('system/styles/userDashboard.css') }}">

    {{-- Sweet Alert --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.min.css">

    <!-- Toastr CSS and JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    @livewireStyles


    @yield('style')
</head>

<body>
    <div class="sidebar-overlay" id="sidebarOverlay" aria-hidden="true"></div>
    <div class="app">

        <!-- ================= SIDEBAR ================= -->
        <aside class="sidebar" id="sidebar">
            <a href="{{ url('/') }}">
                <div class="brand">
                    <div class="brand-logo">
                        <img src="{{ associationLogo() }}"
                            alt="{{ basicSystemInfo()?->association_acronym ?? config('app.name') }} logo">
                    </div>

                    <div class="brand-text">
                        <div class="brand-name">{{ basicSystemInfo()?->association_acronym }}</div>
                        <div class="brand-sub">{{ basicSystemInfo()?->association_name }}</div>
                    </div>

                    <button class="sidebar-close" id="sidebarClose" aria-label="Close navigation menu"
                        aria-controls="sidebar">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </a>
            @php
                $userType = getUserType();
            @endphp

            @if (in_array($userType, ['root', 'admin'], true))
                @include('layouts.include.adminSidebar')
            @elseif ($userType === 'member')
                {{-- @include('layouts.include.memberSidebar') --}}
            @endif
        </aside>

        <!-- ================= MAIN ================= -->
        <main class="main">
            @include('layouts/include/userHeader')
            <section class="content">

                @yield('content')
            </section>

            @include('layouts.include.supportModal')

            <p class="footer-note">
                <i class="fa-solid fa-handshake-angle"></i>
                CoopSuite · Multipurpose Cooperative Society Management System
            </p>
        </main>


    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            /* ---------------- Sidebar Submenus ---------------- */
            const submenuButtons = document.querySelectorAll(".nav-item.has-sub");
            const submenuLinks = document.querySelectorAll(".submenu a");

            submenuButtons.forEach((button) => {
                button.addEventListener("click", () => {
                    const submenu = button.nextElementSibling;

                    if (!submenu || !submenu.classList.contains("submenu")) {
                        return;
                    }

                    document.querySelectorAll(".submenu.open").forEach((openMenu) => {
                        if (openMenu !== submenu) {
                            openMenu.classList.remove("open");
                            openMenu.previousElementSibling?.classList.remove("open");
                        }
                    });

                    submenu.classList.toggle("open");
                    button.classList.toggle("open");
                });
            });

            submenuLinks.forEach((link) => {
                link.addEventListener("click", (event) => {
                    const href = link.getAttribute("href");

                    // Prevent navigation only for placeholder links.
                    if (!href || href === "#") {
                        event.preventDefault();
                    }

                    // Update the active child link.
                    submenuLinks.forEach((item) => item.classList.remove("active"));
                    link.classList.add("active");

                    // Update the active parent menu.
                    const submenu = link.closest(".submenu");
                    const parent = submenu?.previousElementSibling;

                    if (parent) {
                        document.querySelectorAll(".nav-item.active").forEach((item) => {
                            if (item !== parent) {
                                item.classList.remove("active");
                            }
                        });

                        parent.classList.add("active");
                    }

                    // Close the mobile sidebar after selecting a real link.
                    if (href && href !== "#") {
                        closeSidebar();
                    }
                });
            });

            /* ---------------- Mobile Sidebar ---------------- */
            const sidebar = document.getElementById("sidebar");
            const sidebarOverlay = document.getElementById("sidebarOverlay");
            const menuBtn = document.getElementById("menuBtn");
            const sidebarClose = document.getElementById("sidebarClose");

            function openSidebar() {
                if (!sidebar) return;

                sidebar.classList.add("mobile-open");
                sidebarOverlay?.classList.add("active");
                menuBtn?.setAttribute("aria-expanded", "true");
                document.body.style.overflow = "hidden";
            }

            function closeSidebar() {
                if (!sidebar) return;

                sidebar.classList.remove("mobile-open");
                sidebarOverlay?.classList.remove("active");
                menuBtn?.setAttribute("aria-expanded", "false");
                document.body.style.overflow = "";
            }

            menuBtn?.addEventListener("click", () => {
                if (sidebar.classList.contains("mobile-open")) {
                    closeSidebar();
                } else {
                    openSidebar();
                }
            });

            sidebarClose?.addEventListener("click", closeSidebar);
            sidebarOverlay?.addEventListener("click", closeSidebar);

            /* ---------------- User Dropdown ---------------- */
            const userMenuBtn = document.getElementById("userMenuBtn");
            const userDropdown = document.getElementById("userDropdown");

            function openUserMenu() {
                userDropdown?.classList.add("open");
                userMenuBtn?.setAttribute("aria-expanded", "true");
            }

            function closeUserMenu() {
                userDropdown?.classList.remove("open");
                userMenuBtn?.setAttribute("aria-expanded", "false");
            }

            userMenuBtn?.addEventListener("click", (event) => {
                event.stopPropagation();

                if (userDropdown?.classList.contains("open")) {
                    closeUserMenu();
                } else {
                    openUserMenu();
                }
            });

            document.addEventListener("click", (event) => {
                if (
                    userDropdown?.classList.contains("open") &&
                    !userMenuBtn?.contains(event.target) &&
                    !userDropdown.contains(event.target)
                ) {
                    closeUserMenu();
                }
            });

            /* ---------------- Escape Key ---------------- */
            document.addEventListener("keydown", (event) => {
                if (event.key === "Escape") {
                    closeUserMenu();

                    if (sidebar?.classList.contains("mobile-open")) {
                        closeSidebar();
                        menuBtn?.focus();
                    }
                }
            });

            /* ---------------- Theme Toggle ---------------- */
            const themeBtn = document.getElementById("themeBtn");
            const themeIcon = themeBtn?.querySelector("i");

            themeBtn?.addEventListener("click", () => {
                document.body.classList.toggle("dark");

                if (document.body.classList.contains("dark")) {
                    themeIcon.className = "fa-solid fa-sun";
                } else {
                    themeIcon.className = "fa-solid fa-moon";
                }

                if (typeof financeChart !== "undefined") {
                    financeChart.update();
                }

                if (typeof loanChart !== "undefined") {
                    loanChart.update();
                }
            });

            /* ---------------- Charts ---------------- */
            const financeCanvas = document.getElementById("financeChart");
            const loanCanvas = document.getElementById("loanChart");

            const isDark = () => document.body.classList.contains("dark");
            const gridColor = () =>
                isDark() ? "rgba(148,163,184,.18)" : "rgba(15,23,42,.08)";
            const textColor = () => (isDark() ? "#cbd5e1" : "#475569");

            Chart.defaults.font.family = "Inter, sans-serif";
            Chart.defaults.color = textColor();

            let financeChart = null;
            let loanChart = null;

            if (financeCanvas) {
                financeChart = new Chart(financeCanvas, {
                    type: "bar",
                    data: {
                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"],
                        datasets: [{
                                label: "Savings Deposits",
                                data: [8.2, 9.1, 10.4, 9.8, 11.2, 12.6, 11.8, 13.4, 14.1, 15.2],
                                backgroundColor: "#14b8a6",
                                borderRadius: 6
                            },
                            {
                                label: "Loan Repayments",
                                data: [5.4, 6.1, 6.8, 7.2, 7.9, 8.4, 8.1, 9.2, 9.8, 10.6],
                                backgroundColor: "#2563eb",
                                borderRadius: 6
                            },
                            {
                                label: "Loan Disbursements",
                                data: [6.8, 5.9, 7.4, 8.1, 7.6, 9.2, 8.8, 10.1, 9.4, 11.2],
                                backgroundColor: "#f59e0b",
                                borderRadius: 6
                            },
                            {
                                label: "Expenses",
                                data: [2.1, 2.4, 2.2, 2.8, 2.6, 3.1, 2.9, 3.3, 3.1, 3.6],
                                backgroundColor: "#dc2626",
                                borderRadius: 6
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        interaction: {
                            mode: "index",
                            intersect: false
                        },
                        plugins: {
                            legend: {
                                position: "bottom",
                                labels: {
                                    usePointStyle: true,
                                    boxWidth: 8
                                }
                            }
                        },
                        scales: {
                            x: {
                                grid: {
                                    display: false
                                }
                            },
                            y: {
                                grid: {
                                    color: gridColor()
                                },
                                ticks: {
                                    callback: value => "₦" + value + "M"
                                }
                            }
                        }
                    }
                });
            }

            if (loanCanvas) {
                loanChart = new Chart(loanCanvas, {
                    type: "doughnut",
                    data: {
                        labels: ["Performing", "Watchlist", "Overdue", "Restructured", "Written Off"],
                        datasets: [{
                            data: [72, 12, 9, 5, 2],
                            backgroundColor: [
                                "#059669",
                                "#f59e0b",
                                "#dc2626",
                                "#2563eb",
                                "#64748b"
                            ],
                            borderWidth: 0,
                            hoverOffset: 8
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: "64%",
                        plugins: {
                            legend: {
                                position: "bottom",
                                labels: {
                                    usePointStyle: true,
                                    boxWidth: 8,
                                    padding: 16
                                }
                            }
                        }
                    }
                });
            }

            /* Expose chart updaters for the theme toggle */
            window.updateDashboardCharts = function() {
                financeChart?.update();
                loanChart?.update();
            };
        });
    </script>
    @livewireScripts

</body>

</html>
