<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth" 
      :class="{ 'dark': darkMode }" 
      x-data="{ 
        darkMode: localStorage.getItem('theme') === 'dark', 
        sidebarOpen: window.innerWidth >= 1024, 
        tab: 'products' 
      }"
      x-init="$watch('darkMode', val => localStorage.setItem('theme', val ? 'dark' : 'light'))">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style> [x-cloak] { display: none !important; } </style>
</head>
<body class="bg-gray-50 dark:bg-gray-950 text-gray-900 dark:text-gray-100 min-h-screen transition-colors duration-200">
    
    <div class="flex h-screen overflow-hidden">
        @include('admin.components.modals.add')
        @include('admin.components.modals.update')

        @include('admin.components.sidebar')

        <div class="flex-1 flex flex-col overflow-hidden">
            @include('admin.components.header')

            @include('admin.components.main')
        </div>
    </div>

</body>
</html>