<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                <!-- Sidenav Menu Heading (Account)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                {{-- <div class="sidenav-menu-heading d-sm-none">Account</div>
                <!-- Sidenav Link (Alerts)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <a class="nav-link d-sm-none" href="#!">
                    <div class="nav-link-icon"><i data-feather="bell"></i></div>
                    Alerts
                    <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
                </a>
                <!-- Sidenav Link (Messages)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <a class="nav-link d-sm-none" href="#!">
                    <div class="nav-link-icon"><i data-feather="mail"></i></div>
                    Messages
                    <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
                </a> --}}
                <!-- Sidenav Menu Heading (Core)-->
                <div class="sidenav-menu-heading">Halaman Utama</div>
                <!-- Sidenav Accordion (Dashboard)-->
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Dashboards
                </a>
                <!-- Sidenav Heading (Custom)-->
                <div class="sidenav-menu-heading">App</div>
                <!-- Sidenav Accordion (Pages)-->
                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                    data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="nav-link-icon"><i data-feather="grid"></i></div>
                    Engineering
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" data-bs-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                        <!-- Nested Sidenav Accordion (Pages -> Account)-->
                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                            data-bs-target="#importDataEngineering" aria-expanded="false"
                            aria-controls="importDataEngineering">
                            Import Engineering
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="importDataEngineering" data-bs-parent="#accordionSidenavAppsMenu">
                            <nav class="sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('engineering-partlist') }}">Part List</a>
                                <a class="nav-link" href="{{ route('engineering-assembly') }}">Assembly List</a>
                                <a class="nav-link" href="{{ route('engineering-asspart') }}">Assembly Part List</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="javascript:void(0);">
                            Detail Data Engineering
                        </a>
                        <!-- Nested Sidenav Accordion (Pages -> Authentication)-->
                        <a class="nav-link" href="javascript:void(0);">
                            Kebutuhan Baut
                        </a>
                    </nav>
                </div>
                <!-- Sidenav Accordion (Applications)-->
                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                    data-bs-target="#collapseApps" aria-expanded="false" aria-controls="collapseApps">
                    <div class="nav-link-icon"><i data-feather="globe"></i></div>
                    PPC
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseApps" data-bs-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavAppsMenu">
                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                            data-bs-target="#appsCollapseUserManagement" aria-expanded="false"
                            aria-controls="appsCollapseUserManagement">
                            Data Karyawan
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="appsCollapseUserManagement"
                            data-bs-parent="#accordionSidenavAppsMenu">
                            <nav class="sidenav-menu-nested nav">
                                <a class="nav-link" href="">Karyawan</a>
                                <a class="nav-link" href="">Tambah Karyawan</a>
                                <a class="nav-link" href="">Bagian</a>
                                <a class="nav-link" href="">Penempatan Pekerjaan</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                            data-bs-target="#appsCollapseKnowledgeBase" aria-expanded="false"
                            aria-controls="appsCollapseKnowledgeBase">
                            Data Project
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="appsCollapseKnowledgeBase" data-bs-parent="#accordionSidenavAppsMenu">
                            <nav class="sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('project') }}">Project</a>
                                <a class="nav-link" href="{{ route('subproject') }}">Sub-Project</a>
                                <a class="nav-link" href="{{ route('phase') }}">Phase</a>
                            </nav>
                        </div>

                        <!-- Nested Sidenav Accordion (Apps -> PPC)-->
                        <a class="nav-link" href="">
                            Data SKID
                        </a>
                        <a class="nav-link" href="charts.html">
                            Master Berat Baut
                        </a>
                    </nav>
                </div>
                <!-- Sidenav Accordion (Flows)-->
                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                    data-bs-target="#collapseWarehouse" aria-expanded="false" aria-controls="collapseWarehouse">
                    <div class="nav-link-icon"><i data-feather="globe"></i></div>
                    Warehouse
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseWarehouse" data-bs-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavAppsMenu">
                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                            data-bs-target="#appsCollapseWarehouse" aria-expanded="false"
                            aria-controls="appsCollapseWarehouse">
                            Data Stock
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                    data-bs-target="#collapseFlows" aria-expanded="false" aria-controls="collapseFlows">
                    <div class="nav-link-icon"><i data-feather="repeat"></i></div>
                    Fabrikasi
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseFlows" data-bs-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav">
                        <a class="nav-link" href="">Laporan Fabrikasi</a>
                        <a class="nav-link" href="">Laporan Single Part</a>
                        <a class="nav-link" href="">Approval Laporan</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                    data-bs-target="#collapsePengiriman" aria-expanded="false" aria-controls="collapsePengiriman">
                    <div class="nav-link-icon"><i data-feather="repeat"></i></div>
                    Kelola Pengiriman
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePengiriman" data-bs-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav">
                        <a class="nav-link" href="">Pengiriman Material</a>
                        <a class="nav-link" href="">Pengiriman Baut</a>
                    </nav>
                </div>

                <!-- Sidenav Heading (UI Toolkit)-->
                <div class="sidenav-menu-heading">Tools</div>
                <!-- Sidenav Accordion (Layout)-->
                <!-- Sidenav Accordion (Components)-->
                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                    data-bs-target="#collapseComponents" aria-expanded="false" aria-controls="collapseComponents">
                    <div class="nav-link-icon"><i data-feather="package"></i></div>
                    Account
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseComponents" data-bs-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav">
                        <a class="nav-link" href="alerts.html">Profile</a>
                        <a class="nav-link" href="avatars.html">Ganti Password</a>
                    </nav>
                </div>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="nav-link border-0 bg-transparent">
                        <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                        Logout
                    </button>
                </form>
            </div>
        </div>
        <!-- Sidenav Footer-->
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title">{{ auth()->user()->nama }}</div>
            </div>
        </div>
    </nav>
</div>
