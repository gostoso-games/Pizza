<header class="bg-white dark:bg-gray-950 h-16 shadow-sm flex items-center justify-between px-6 border-b border-gray-200 dark:border-gray-800 transition-colors duration-200">
    
    <div class="flex items-center gap-4">
        <button @click="sidebarOpen = !sidebarOpen" 
                class="text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 focus:outline-none lg:hidden transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <a href="{{ route('home') }}" 
           class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 font-medium flex items-center gap-2 transition-colors">
        
            <span class="hidden sm:inline">Página inicial</span>
        </a>
    </div>

    <div class="flex items-center gap-4">
       

        <div class="flex items-center gap-3">
            <span class="text-sm font-semibold hidden md:block dark:text-white">Admin</span>
            <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white text-xs font-bold shadow-sm">
                AD
            </div>
        </div>
    </div>
</header>