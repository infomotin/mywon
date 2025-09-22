<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            MJ-<span>NAMADI</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="dashboard.html" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Portfolio Management</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button"
                    aria-expanded="false" aria-controls="uiComponents">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">Basic UI Components</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="uiComponents">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('hero.index') }}"
                                class="nav-link">Hero</a>
                        </li>
                        
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button"
                    aria-expanded="false" aria-controls="advancedUI">
                    <i class="link-icon" data-feather="anchor"></i>
                    <span class="link-title">Advanced UI</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="advancedUI">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ asset('Backend/pages/advanced-ui/cropper.html') }}"
                                class="nav-link">Cropper</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('Backend/pages/advanced-ui/owl-carousel.html') }}"
                                class="nav-link">Owl carousel</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('Backend/pages/advanced-ui/sortablejs.html') }}"
                                class="nav-link">SortableJs</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('Backend/pages/advanced-ui/sweet-alert.html') }}"
                                class="nav-link">Sweet Alert</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#forms" role="button"
                    aria-expanded="false" aria-controls="forms">
                    <i class="link-icon" data-feather="inbox"></i>
                    <span class="link-title">Forms</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="forms">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ asset('Backend/pages/forms/basic-elements.html') }}"
                                class="nav-link">Basic Elements</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('Backend/pages/forms/advanced-elements.html') }}"
                                class="nav-link">Advanced Elements</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('Backend/pages/forms/editors.html') }}"
                                class="nav-link">Editors</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('Backend/pages/forms/wizard.html') }}"
                                class="nav-link">Wizard</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#charts" role="button"
                    aria-expanded="false" aria-controls="charts">
                    <i class="link-icon" data-feather="pie-chart"></i>
                    <span class="link-title">Charts</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="charts">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ asset('Backend/pages/charts/apex.html') }}" class="nav-link">Apex</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('Backend/pages/charts/chartjs.html') }}"
                                class="nav-link">ChartJs</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('Backend/pages/charts/flot.html') }}" class="nav-link">Flot</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('Backend/pages/charts/morrisjs.html') }}"
                                class="nav-link">Morris</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('Backend/pages/charts/peity.html') }}"
                                class="nav-link">Peity</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('Backend/pages/charts/sparkline.html') }}"
                                class="nav-link">Sparkline</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#tables" role="button"
                    aria-expanded="false" aria-controls="tables">
                    <i class="link-icon" data-feather="layout"></i>
                    <span class="link-title">Table</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="tables">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ asset('Backend/pages/tables/basic-table.html') }}"
                                class="nav-link">Basic Tables</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('Backend/pages/tables/data-table.html') }}"
                                class="nav-link">Data Table</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#icons" role="button"
                    aria-expanded="false" aria-controls="icons">
                    <i class="link-icon" data-feather="smile"></i>
                    <span class="link-title">Icons</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="icons">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ asset('Backend/pages/icons/feather-icons.html') }}"
                                class="nav-link">Feather Icons</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('Backend/pages/icons/flag-icons.html') }}"
                                class="nav-link">Flag Icons</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('Backend/pages/icons/mdi-icons.html') }}" class="nav-link">Mdi
                                Icons</a>
                        </li>
                    </ul>
                </div>
            </li>
            
        </ul>
    </div>
</nav>
{{-- <nav class="settings-sidebar">
    <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
            <i data-feather="settings"></i>
        </a>
        <div class="theme-wrapper">
            <h6 class="text-muted mb-2">Light Theme:</h6>
            <a class="theme-item" href="{{ asset('Backend/demo1/dashboard.html') }}">
                <img src="{{ asset('Backend/assets/images/screenshots/light.jpg') }}" alt="light theme">
            </a>
            <h6 class="text-muted mb-2">Dark Theme:</h6>
            <a class="theme-item active" href="{{ asset('Backend/demo2/dashboard.html') }}">
                <img src="{{ asset('Backend/assets/images/screenshots/dark.jpg') }}" alt="light theme">
            </a>
        </div>
    </div>
</nav> --}}