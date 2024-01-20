<!-- Menu -->
<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal  menu bg-menu-theme flex-grow-0">
    <div class="container-xxl d-flex h-100">
        <ul class="menu-inner">
            <!-- Dashboards -->
            <li class="menu-item active">
                <a href="{{ route('dasbor') }}" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Dashboards">Dashboards</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item active">
                        <a href="{{ route('DashboardMaintenance') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-chart-pie-2"></i>
                            <div data-i18n="Maintenance">Maintenance</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('DashboardKlaimhandling') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-3d-cube-sphere"></i>
                            <div data-i18n="Klaim Customer">Klaim Customer</div>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Productions -->
            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-file"></i>
                    <div data-i18n="Productions">Productions</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-user-circle"></i>
                            <div data-i18n="Corrective">Corrective</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="" class="menu-link">
                                    <div data-i18n="Create Corrective">Create Corrective</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="" class="menu-link">
                                    <div data-i18n="History Corrective">History Corrective</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <!-- Maintenance -->
            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-file"></i>
                    <div data-i18n="Maintenance">Maintenance</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-user-circle"></i>
                            <div data-i18n="Corrective">Corrective</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="" class="menu-link">
                                    <div data-i18n="Corrective Release">Corrective Release</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="" class="menu-link">
                                    <div data-i18n="Corrective Action">Corrective Action</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="" class="menu-link">
                                    <div data-i18n="History Corrective">History Corrective</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-user-circle"></i>
                            <div data-i18n="Preventive">Preventive</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="" class="menu-link">
                                    <div data-i18n="Schedule Preventive">Schedule Preventive</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="" class="menu-link">
                                    <div data-i18n="Preventive Action">Preventive Action</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="" class="menu-link">
                                    <div data-i18n="History Preventive">History Preventive</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-user-circle"></i>
                            <div data-i18n="Stock Sparepart">Stock Sparepart</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="" class="menu-link">
                                    <div data-i18n="Cutting Part">Cutting Part</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="" class="menu-link">
                                    <div data-i18n="Machining Part">Machining Part</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="" class="menu-link">
                                    <div data-i18n="H-Treatment Part">H-Treatment Part</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="" class="menu-link">
                                    <div data-i18n="Bubut Part">Bubut Part</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="" class="menu-link">
                                    <div data-i18n="Machining Costume Part">Machining Costume Part</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <!-- Deptman -->
            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-file"></i>
                    <div data-i18n="Deptman">Deptman</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-help"></i>
                            <div data-i18n="History Preventif">History Preventif</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-help"></i>
                            <div data-i18n="History Corrective">History Corrective</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-help"></i>
                            <div data-i18n="Stock Sparepart">Stock Sparepart</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-help"></i>
                            <div data-i18n="DMI - Maintenance">DMI - Maintenance</div>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Misc -->
            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-box-multiple"></i>
                    <div data-i18n="Laporan">Reporting</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="" target="_blank" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-lifebuoy"></i>
                            <div data-i18n="Report Maintenance">Report Maintenance</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="" target="_blank" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-lifebuoy"></i>
                            <div data-i18n="Report Claim Handling">Report Claim Handling</div>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Pages -->
            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-file"></i>
                    <div data-i18n="Manage Data">Manage Data</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-user-circle"></i>
                            <div data-i18n="Manage User">Manage User</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="" class="menu-link">
                                    <div data-i18n="Role">Role</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="" class="menu-link">
                                    <div data-i18n="Users">Users</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-help"></i>
                            <div data-i18n="Manage Machine">Manage Machine</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-help"></i>
                            <div data-i18n="Sparepart">Sparepart</div>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</aside>
<!-- / Menu -->
