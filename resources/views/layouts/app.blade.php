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
            <div class="d-flex flex-column flex-shrink-0 bg-white shadow" style="width: 280px; height: 100vh; position: fixed;">
                <!-- Logo -->
                <div class="text-center border-bottom p-3">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo" height="48">
                </div>

                <!-- Navigation -->
                <ul class="nav nav-pills flex-column mb-auto p-3">
                    <li class="nav-item mb-2">
                        <a href="{{ route('dashboard') }}" 
                           class="nav-link {{ request()->routeIs('dashboard') ? 'active bg-purple' : 'text-dark' }}">
                            <i class="bi bi-house-door me-2"></i>
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item mb-2">
                        <a href="{{ route('cuti.index') }}" 
                           class="nav-link {{ request()->routeIs('cuti.index') ? 'active bg-purple' : 'text-dark' }}">
                            <i class="bi bi-file-text me-2"></i>
                            Data Cuti
                        </a>
                    </li>

                    <li class="nav-item mb-2">
                        <a href="{{ route('cuti.create') }}" 
                           class="nav-link {{ request()->routeIs('cuti.create') ? 'active bg-purple' : 'text-dark' }}">
                            <i class="bi bi-file-earmark-plus me-2"></i>
                            Permohonan Cuti
                        </a>
                    </li>

                    <!-- Dropdown Approval -->
                    <li class="nav-item mb-2">
                        <button class="nav-link w-100 d-flex justify-content-between align-items-center border-0 bg-transparent {{ request()->routeIs('approval.*') ? 'active bg-purple' : 'text-dark' }}"
                                type="button"
                                data-bs-toggle="collapse" 
                                data-bs-target="#approvalCollapse" 
                                aria-expanded="true"
                                aria-controls="approvalCollapse">
                            <div>
                                <i class="bi bi-check-circle me-2"></i>
                                Approval
                            </div>
                            <i class="bi bi-chevron-down small transition-transform"></i>
                        </button>
                        <div class="collapse" id="approvalCollapse">
                            <ul class="nav flex-column ms-3 mt-2">
                                <li class="nav-item mb-2">
                                    <a href="{{ route('cuti.approval.index') }}" 
                                       class="nav-link {{ request()->routeIs('approval.index') ? 'active bg-purple' : 'text-dark' }}">
                                        <i class="bi bi-arrow-right me-2 small"></i>
                                        Approval 1 & 2
                                    </a>
                                </li>
                                <li class="nav-item mb-2">
                                    <a href="{{ route('approval.hrd') }}" 
                                       class="nav-link {{ request()->routeIs('approval.hrd') ? 'active bg-purple' : 'text-dark' }}">
                                        <i class="bi bi-arrow-right me-2 small"></i>
                                        Approval HRD
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item mb-2">
                        <a href="{{ route('hrd.index') }}" 
                           class="nav-link {{ request()->routeIs('hrd.index') ? 'active bg-purple' : 'text-dark' }}">
                            <i class="bi bi-people me-2"></i>
                            Data Karyawan
                        </a>
                    </li>
                </ul>

                <!-- User Info -->
                <div class="border-top p-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <a href="{{ route('profile.edit') }}" class="text-decoration-none">
                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center" 
                                     style="width: 40px; height: 40px;">
                                    <i class="bi bi-person text-secondary"></i>
                                </div>
                            </a>
                        </div>
                        <div class="ms-3">
                            <a href="{{ route('profile.edit') }}" class="text-decoration-none">
                                <h6 class="mb-0 text-dark">{{ Auth::user()->name }}</h6>
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-link text-secondary p-0 small">
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
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
        .nav-pills .nav-link {
            border-radius: 8px;
            padding: 10px 16px;
        }
        .nav-pills .nav-link.active {
            background-color: #7C3AED !important;
        }
        .nav-pills .nav-link:hover:not(.active) {
            background-color: #F3F4F6;
        }
        .bg-purple {
            background-color: #7C3AED !important;
            color: white !important;
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
