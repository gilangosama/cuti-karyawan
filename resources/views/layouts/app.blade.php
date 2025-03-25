<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap CSS & Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

        @stack('head')
        @stack('styles')
    </head>
    <body>
        <div class="d-flex">
            <!-- Sidebar -->
            <div class="sidebar bg-white shadow-sm" style="width: 280px; height: 100vh; position: fixed; left: 0; top: 0;">
                <!-- Logo Container -->
                <div class="p-4 border-bottom">
                    <img src="{{ asset('images/logo.jpg ') }}" alt="Logo" class="img-fluid" style="max-height: 40px;">
                </div>

                <!-- Menu Container -->
                <div class="p-4">
                    <ul class="nav flex-column gap-2">
                        <!-- Dashboard - Semua Role -->
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" 
                               class="nav-link d-flex align-items-center {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                <i class="bi bi-house-door fs-5 me-3"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <!-- Menu untuk Role Karyawan -->
                        @if(auth()->user()->role === 'user')
                            <li class="nav-item">
                                <a href="{{ route('cuti.index') }}" 
                                   class="nav-link d-flex align-items-center {{ request()->routeIs('cuti.index') ? 'active' : '' }}">
                                    <i class="bi bi-calendar3 fs-5 me-3"></i>
                                    <span>Data Cuti</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('cuti.create') }}" 
                                   class="nav-link d-flex align-items-center {{ request()->routeIs('cuti.create') ? 'active' : '' }}">
                                    <i class="bi bi-file-earmark-plus fs-5 me-3"></i>
                                    <span>Permohonan Cuti</span>
                                </a>
                            </li>
                        @endif

                        <!-- Menu untuk Role Approval -->
                        @if(auth()->user()->role === 'approval')
                            <li class="nav-item">
                                <a href="{{ route('cuti.index') }}" 
                                   class="nav-link d-flex align-items-center {{ request()->routeIs('cuti.index') ? 'active' : '' }}">
                                    <i class="bi bi-calendar3 fs-5 me-3"></i>
                                    <span>Data Cuti</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('cuti.create') }}" 
                                   class="nav-link d-flex align-items-center {{ request()->routeIs('cuti.create') ? 'active' : '' }}">
                                    <i class="bi bi-file-earmark-plus fs-5 me-3"></i>
                                    <span>Permohonan Cuti</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('cuti.approval.index') }}" 
                                   class="nav-link d-flex align-items-center {{ request()->routeIs('cuti.approval.*') ? 'active' : '' }}">
                                    <i class="bi bi-check-square fs-5 me-3"></i>
                                    <span>Approval 1 & 2</span>
                                </a>
                            </li>
                        @endif

                        <!-- Menu untuk Role HRD -->
                        @if(auth()->user()->role === 'hrd')
                            <li class="nav-item">
                                <a href="{{ route('cuti.index') }}" 
                                   class="nav-link d-flex align-items-center {{ request()->routeIs('cuti.index') ? 'active' : '' }}">
                                    <i class="bi bi-calendar3 fs-5 me-3"></i>
                                    <span>Data Cuti</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('cuti.create') }}" 
                                   class="nav-link d-flex align-items-center {{ request()->routeIs('cuti.create') ? 'active' : '' }}">
                                    <i class="bi bi-file-earmark-plus fs-5 me-3"></i>
                                    <span>Permohonan Cuti</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <div class="nav-link d-flex align-items-center cursor-pointer" 
                                     data-bs-toggle="collapse" 
                                     data-bs-target="#approvalCollapse">
                                    <i class="bi bi-check-square fs-5 me-3"></i>
                                    <span>Approval</span>
                                    <i class="bi bi-chevron-down ms-auto"></i>
                                </div>
                                <div class="collapse {{ request()->routeIs('cuti.approval.*', 'approval.hrd') ? 'show' : '' }}" 
                                     id="approvalCollapse">
                                    <ul class="nav flex-column ms-4 mt-2">
                                        <li class="nav-item">
                                            <a href="{{ route('cuti.approval.index') }}" 
                                               class="nav-link {{ request()->routeIs('cuti.approval.index') ? 'active' : '' }}">
                                                <i class="bi bi-arrow-right me-2"></i>
                                                Approval 1 & 2
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('approval.hrd') }}" 
                                               class="nav-link {{ request()->routeIs('approval.hrd') ? 'active' : '' }}">
                                                <i class="bi bi-arrow-right me-2"></i>
                                                Approval HRD
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('hrd.index') }}" 
                                   class="nav-link d-flex align-items-center {{ request()->routeIs('hrd.*') ? 'active' : '' }}">
                                    <i class="bi bi-people fs-5 me-3"></i>
                                    <span>Data Karyawan</span>
                                </a>
                            </li>
                        @endif

                        <!-- Divider -->
                        <li class="nav-item">
                            <hr class="my-3 border-gray-200">
                        </li>

                        <!-- Profile Menu - Untuk Semua Role -->
                        <li class="nav-item">
                            <div class="nav-link d-flex align-items-center cursor-pointer" 
                                 data-bs-toggle="collapse" 
                                 data-bs-target="#profileCollapse">
                                <i class="bi bi-person-circle fs-5 me-3"></i>
                                <span>{{ auth()->user()->name }}</span>
                                <i class="bi bi-chevron-down ms-auto"></i>
                            </div>
                            <div class="collapse" id="profileCollapse">
                                <ul class="nav flex-column ms-4 mt-2">
                                    {{-- <li class="nav-item">
                                        <a href="{{ route('profile.index') }}" 
                                           class="nav-link {{ request()->routeIs('profile.index') ? 'active' : '' }}">
                                            <i class="bi bi-person me-2"></i>
                                            Lihat Profile
                                        </a>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a href="{{ route('profile.edit') }}" 
                                           class="nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                                            <i class="bi bi-pencil me-2"></i>
                                            Edit Profile
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="{{ route('logout') }}"
                                               class="nav-link text-danger"
                                               onclick="event.preventDefault(); this.closest('form').submit();">
                                                <i class="bi bi-box-arrow-right me-2"></i>
                                                Keluar
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-grow-1" style="margin-left: 280px;">
                @if (isset($header))
                <header class="bg-white shadow-sm">
                    <div class="container-fluid py-4">
                        {{ $header }}
                    </div>
                </header>
                @endif

            <main>
                {{ $slot }}
            </main>
        </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        @stack('scripts')

        <style>
        .sidebar {
            background: linear-gradient(to bottom, #ffffff, #f8f9fa);
        }

        .nav-link {
            color: #495057;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background-color: #f0f2f5;
            color: #6610f2;
        }

        .nav-link.active {
            background-color: #6610f2;
            color: #ffffff;
        }

        .nav-link.active i {
            color: #ffffff;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        /* Submenu styles */
        #approvalCollapse .nav-link {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }

        #approvalCollapse .nav-link:hover {
            background-color: #f0f2f5;
        }

        #approvalCollapse .nav-link.active {
            background-color: transparent;
            color: #6610f2;
        }

        /* Icon styles */
        .bi {
            transition: all 0.3s ease;
        }

        .nav-link:hover .bi {
            transform: scale(1.1);
        }

        #profileCollapse .nav-link {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }

        #profileCollapse .nav-link:hover {
            background-color: #f0f2f5;
        }

        #profileCollapse .nav-link.active {
            background-color: transparent;
            color: #6610f2;
        }

        #profileCollapse .text-danger:hover {
            background-color: #fee2e2;
            color: #dc2626;
        }
        </style>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mengatur rotasi icon saat dropdown dibuka/tutup
            const approvalButton = document.querySelector('[data-bs-target="#approvalCollapse"]');
            const chevronIcon = approvalButton.querySelector('.bi-chevron-down');
            
            document.getElementById('approvalCollapse').addEventListener('show.bs.collapse', function () {
                chevronIcon.style.transform = 'rotate(180deg)';
            });
            
            document.getElementById('approvalCollapse').addEventListener('hide.bs.collapse', function () {
                chevronIcon.style.transform = 'rotate(0)';
            });
            
            // Tambahkan style untuk transisi smooth
            const style = document.createElement('style');
            style.textContent = `
                .transition-transform {
                    transition: transform 0.2s ease-in-out;
                }
                .nav-link:not(.active):hover {
                    background-color: #f8f9fa;
                }
                .nav-link {
                    transition: all 0.2s ease-in-out;
                }
            `;
            document.head.appendChild(style);
        });
        </script>
    </body>

</html>
