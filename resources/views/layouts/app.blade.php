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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('head')
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <!-- Sidebar -->
            <div class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg">
                <div class="flex flex-col h-full">
                    <!-- Logo -->
                    <div class="flex items-center justify-center h-20 border-b">
                        <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="h-12">
                    </div>

                    <!-- Navigation -->
                    <nav class="flex-1 px-4 py-6 space-y-1">
                        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-50' }} flex items-center px-4 py-3 text-sm font-medium rounded-lg group">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Dashboard
                        </a>

                        <a href="{{ route('cuti.index') }}" class="{{ request()->routeIs('cuti.index') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-50' }} flex items-center px-4 py-3 text-sm font-medium rounded-lg group">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            Data Cuti
                        </a>

                        <a href="{{ route('cuti.create') }}" class="{{ request()->routeIs('cuti.create') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-50' }} flex items-center px-4 py-3 text-sm font-medium rounded-lg group">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Permohonan Cuti
                        </a>

                        <!-- Setelah menu Approval Cuti, tambahkan submenu dengan dropdown -->
                        <div x-data="{ open: false }" class="space-y-1">
                            <!-- Menu Approval dengan dropdown -->
                            <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-lg group">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>Approval</span>
                                </div>
                                <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <!-- Submenu -->
                            <div x-show="open" class="pl-11 space-y-1">
                                <!-- Approval Manager (1 & 2) -->
                                <a href="{{ route('cuti.approval.index') }}" class="{{ request()->routeIs('cuti.approval.index') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-50' }} flex items-center px-4 py-2 text-sm font-medium rounded-lg">
                                    Approval 1 & 2
                                </a>

                                <!-- Approval HRD -->
                                <a href="{{ route('approval.hrd') }}" class="{{ request()->routeIs('approval.hrd') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-50' }} flex items-center px-4 py-2 text-sm font-medium rounded-lg">
                                    Approval HRD
                                </a>
                            </div>
                        </div>

                        <!-- Setelah menu Approval Cuti -->
                        <a href="{{ route('hrd.index') }}" class="{{ request()->routeIs('hrd.index') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-50' }} flex items-center px-4 py-3 text-sm font-medium rounded-lg group">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Data Karyawan
                        </a>
                    </nav>

                    <!-- User Info -->
                    <div class="border-t px-4 py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <a href="{{ route('profile') }}" class="block hover:opacity-80">
                                    <svg class="h-8 w-8 rounded-full bg-gray-200 text-gray-600 p-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="ml-3">
                                <a href="{{ route('profile') }}" class="block text-sm font-medium text-gray-700 hover:text-gray-900">
                                    {{ Auth::user()->name }}
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="text-xs text-gray-500 hover:text-gray-700">
                                        Keluar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="pl-64">
            <!-- Page Heading -->
                @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
                @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>

</html>
