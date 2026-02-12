<div x-data="{ 
        show: false, 
        id: null, 
        name: '', 
        desc: '', 
        price: '' 
    }" 
    @open-update.window="
        show = true; 
        id = $event.detail.id; 
        name = $event.detail.name; 
        desc = $event.detail.desc || ''; 
        price = $event.detail.price || ''
    " 
    x-show="show" 
    x-transition.opacity
    class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm" 
    x-cloak>
    
    <div class="bg-white dark:bg-gray-900 p-8 rounded-2xl w-full max-w-md shadow-2xl border dark:border-gray-800" 
         @click.away="show = false">
        
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold dark:text-white">Atualizar Produto</h3>
            <button @click="show = false" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        
        <form :action="'/admin/ProductsUpdate/' + id" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1 dark:text-gray-300">Nome</label>
                <input type="text" 
                       name="name" 
                       x-model="name" 
                       class="w-full p-2.5 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500 outline-none transition" 
                       required>
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1 dark:text-gray-300">
                    Descrição <span class="text-xs font-normal text-gray-500" :class="desc.length >= 23 ? 'text-red-500' : ''">(<span x-text="desc.length"></span>/23)</span>
                </label> 
                <input type="text" 
                       x-model="desc" 
                       maxlength="23" 
                       name="description" 
                       class="w-full p-2.5 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500 outline-none transition" 
                       required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1 dark:text-gray-300">Preço (R$)</label>
                <input type="number" 
                       step="0.01" 
                       name="price" 
                       x-model="price" 
                       class="w-full p-2.5 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500 outline-none transition" 
                       required>
            </div>
          
            <div class="mb-6">
                <label class="block text-sm font-medium mb-1 dark:text-gray-300">Imagem </label>
                <input type="file" 
                required
                       name="image" 
                       class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 dark:file:bg-gray-800 dark:file:text-blue-400 hover:file:bg-blue-100 transition">
            </div>

            <div class="flex space-x-3">
                <button type="button" 
                        @click="show = false" 
                        class="flex-1 bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 py-2.5 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition font-medium">
                    Cancelar
                </button>
                <button type="submit" 
                        class="flex-1 bg-blue-600 text-white py-2.5 rounded-lg hover:bg-blue-700 transition font-medium shadow-md shadow-blue-500/20">
                    Salvar Alterações
                </button>
            </div>
        </form>
    </div>
</div>