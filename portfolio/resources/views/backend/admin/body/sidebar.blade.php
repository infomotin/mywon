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
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link" target="_blank">
                    <i class="link-icon" data-feather="globe"></i>
                    <span class="link-title">Visit Website</span>
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
                        <li class="nav-item">
                            <a href="{{ route('service.index') }}"
                                class="nav-link">Service</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('portfolio.index') }}"
                                class="nav-link">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('resume.index') }}"
                                class="nav-link">Resume</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('education.index') }}"
                                class="nav-link">Education</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('myskill.index') }}"
                                class="nav-link">My Skill</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('testimonial.index') }}"
                                class="nav-link">Testimonial</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact.index') }}"
                                class="nav-link">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blog.index') }}"
                                class="nav-link">Blog</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Setting</li>
            <li class="nav-item">
                <a href="{{ route('theme.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="layout"></i>
                    <span class="link-title">Theme Customizer</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('setting.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="settings"></i>
                    <span class="link-title">Website Setting</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('smtp.setting') }}" class="nav-link">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Mail Configuration</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('live.chat.setting') }}" class="nav-link">
                    <i class="link-icon" data-feather="settings"></i>
                    <span class="link-title">Live Chat Setting</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.chat.inbox') }}" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Chat Inbox</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('subscriber.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Subscribers</span>
                </a>
            </li>
            <li class="nav-item nav-category">System</li>
            <li class="nav-item">
                <a href="{{ route('queue.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="server"></i>
                    <span class="link-title">Queue Manager</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('security.setting') }}" class="nav-link">
                    <i class="link-icon" data-feather="shield"></i>
                    <span class="link-title">Security Manager</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
<!-- <nav class="settings-sidebar">
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
</nav> -->