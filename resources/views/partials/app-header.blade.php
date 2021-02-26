<header class="navbar navbar-expand-md navbar-light d-print-none">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href=".">
                <img src="{{ asset('public/assets/img/static/logo.png') }}" width="110" height="32" alt="Tabler"
                    class="navbar-brand-image">
            </a>
        </h1>
        <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item dropdown d-none d-md-flex me-3">
                <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                    aria-label="Show notifications" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6">
                        </path>
                        <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                    </svg>
                    <span class="badge bg-red"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-card">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush overflow-auto" style="max-height: 35rem">
                                <div class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto">
                                            <a href="#">
                                                <span class="avatar"
                                                    style="background-image: url(./static/avatars/023f.jpg)"></span>
                                            </a>
                                        </div>
                                        <div class="col text-truncate">
                                            <div class="d-flex justify-content-between">
                                                <a href="#" class="text-body d-block">Profile Updated</a>
                                                <span class="small text-muted">3 Min ago</span>
                                            </div>
                                            <div class="text-muted text-truncate mt-n1 small" style="min-width: 320px">
                                                by Ahsan Tariq</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu" aria-expanded="false">
                    <span class="avatar avatar-sm"
                        style="background-image: url({{ asset('public/assets/img/static/avatars/001m.jpg') }})"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ $user->name }}</div>
                        <div class="mt-1 small text-muted">{{ $user->role }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="#" class="dropdown-item">Set status</a>
                    <a href="#" class="dropdown-item">Profile &amp; account</a>
                    <a href="#" class="dropdown-item">Feedback</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">Settings</a>
                    <livewire:account.logout />
                </div>
            </div>
        </div>
    </div>
</header>