<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li id="nav-home" class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block"><svg
                                    xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Home
                            </span>
                        </a>
                    </li>
                    @can('viewAny', App\Models\Developer::class)
                    <li id="nav-developer-list" class="nav-item">
                        <a class="nav-link" href="{{ route('developer-list') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="3" y1="21" x2="21" y2="21" />
                                <path d="M5 21v-14l8 -4v18" />
                                <path d="M19 21v-10l-6 -4" />
                                <line x1="9" y1="9" x2="9" y2="9.01" />
                                <line x1="9" y1="12" x2="9" y2="12.01" />
                                <line x1="9" y1="15" x2="9" y2="15.01" />
                                <line x1="9" y1="18" x2="9" y2="18.01" />
                            </svg>

                            <span class="nav-link-title">
                                Developers
                            </span>
                        </a>
                    </li>
                    @endcan
                    @can('viewAny', App\Models\Property::class)
                    <li id="nav-property-list" class="nav-item">
                        <a class="nav-link" href="{{ route('property-list') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="3" y1="21" x2="21" y2="21" />
                                <line x1="9" y1="8" x2="10" y2="8" />
                                <line x1="9" y1="12" x2="10" y2="12" />
                                <line x1="9" y1="16" x2="10" y2="16" />
                                <line x1="14" y1="8" x2="15" y2="8" />
                                <line x1="14" y1="12" x2="15" y2="12" />
                                <line x1="14" y1="16" x2="15" y2="16" />
                                <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16" />
                            </svg>
                            <span class="nav-link-title">
                                Properties
                            </span>
                        </a>
                    </li>
                    @endcan
                    <li id="nav-project-list" class="nav-item">
                        <a class="nav-link" href="{{ route('project-list') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 21h4l13 -13a1.5 1.5 0 0 0 -4 -4l-13 13v4" />
                                <line x1="14.5" y1="5.5" x2="18.5" y2="9.5" />
                                <polyline points="12 8 7 3 3 7 8 12" />
                                <line x1="7" y1="8" x2="5.5" y2="9.5" />
                                <polyline points="16 12 21 17 17 21 12 16" />
                                <line x1="16" y1="17" x2="14.5" y2="18.5" />
                            </svg>
                            <span class="nav-link-title">
                                Projects
                            </span>
                        </a>
                    </li>
                    @can('viewAny', App\Models\User::class)
                    <li id="nav-member-list" class="nav-item">
                        <a class="nav-link" href="{{ route('team-list') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                            </svg>
                            <span class="nav-link-title">
                                Relocation Team
                            </span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </div>
        </div>
    </div>
</div>
