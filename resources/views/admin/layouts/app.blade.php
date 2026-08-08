<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>PlantAI Admin</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- Sidebar -->

    <aside class="w-64 bg-green-700 text-white">

        <div class="p-6 text-2xl font-bold">

            🌿 PlantAI

        </div>

        <nav class="mt-5">

            <a href="{{ route('admin.dashboard') }}"
                class="block px-6 py-3 hover:bg-green-800">

                Dashboard

            </a>

            <a href="{{ route('plants.index') }}" class="block px-6 py-3 hover:bg-green-800">
                Kelola Tanaman
            </a>

            <a href="{{ route('plants.create') }}" class="block px-6 py-3 hover:bg-green-800">
                Tambah Tanaman
            </a>

            <form method="POST" action="{{ route('logout') }}">

                @csrf

                <button
                    class="w-full text-left px-6 py-3 hover:bg-red-600">

                    Logout

                </button>

            </form>

        </nav>

    </aside>

    <!-- Content -->

    <main class="flex-1 p-8">

        @yield('content')

    </main>

</div>

</body>

</html>