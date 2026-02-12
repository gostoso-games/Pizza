<aside x-show="sidebarOpen"
    class="fixed inset-y-0 left-0 z-50 w-64 transform bg-white dark:bg-gray-900 border-r border-gray-200 dark:border-gray-800 lg:relative lg:translate-x-0" 
    :class="{ '-translate-x-full': !sidebarOpen }">
    <div class="flex items-center justify-between h-16 px-6 border-b dark:border-gray-800">
        <h1 class="text-xl font-bold text-blue-600">Admin</h1>
    </div>
    <nav class="mt-6 px-3 space-y-2">
        <button @click="tab = 'products'" 
            :class="tab === 'products' ? 'bg-blue-600 text-white' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800'" 
            class="w-full text-left px-4 py-3 rounded-lg transition">Produtos</button>
        <button @click="tab = 'users'" 
            :class="tab === 'users' ? 'bg-blue-600 text-white' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800'" 
            class="w-full text-left px-4 py-3 rounded-lg transition">Usuários</button>
    </nav>
</aside>