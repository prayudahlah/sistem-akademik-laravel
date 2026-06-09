<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Akademik')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex space-x-8">
                    <a href="/" class="flex items-center text-gray-700 hover:text-blue-600">
                        <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        <span class="font-semibold">Sistem Akademik</span>
                    </a>
                    <a href="/mahasiswa" class="flex items-center text-gray-700 hover:text-blue-600">Mahasiswa</a>
                    <a href="/dosen" class="flex items-center text-gray-700 hover:text-blue-600">Dosen</a>
                    <a href="/mata-kuliah" class="flex items-center text-gray-700 hover:text-blue-600">Mata Kuliah</a>
                    <a href="/perkuliahan" class="flex items-center text-gray-700 hover:text-blue-600">Perkuliahan</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    <script src="https://cdn.tailwindcss.com"></script>
    @stack('scripts')
</body>
</html>
