<main class="flex-1 overflow-y-auto p-6">

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-500 text-white rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div x-show="tab === 'products'" x-cloak>
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Produtos</h2>

            <button 
                @click="$dispatch('open-modal')" 
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition"
            >
                + Novo
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($products as $product)
                <div class="bg-white dark:bg-gray-900 p-4 rounded-xl border dark:border-gray-800 flex flex-col justify-between">
                    
                    <div>
                        <img 
                            src="{{ asset('img/cards_img/' . $product->image) }}" 
                            class="h-32 w-full object-cover rounded-md mb-2" 
                            alt="{{ $product->name }}"
                        >

                        <p class="font-bold dark:text-white">
                            {{ $product->name }}
                        </p>

                        <p class="text-blue-500 font-bold">
                            R$ {{ number_format($product->price, 2, ',', '.') }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">
                            {{ $product->description }}
                        </p>
                    </div>

                    <div class="flex gap-2 mt-2">
                        <form 
                            action="{{ route('admin.destroy', $product->id) }}" 
                            method="POST"
                            onsubmit="return confirm('Deseja excluir este produto?')"
                        >
                            @csrf
                            @method('DELETE')

                            <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm">
                                Excluir
                            </button>
                        </form>
    <button
    @click="$dispatch('open-update', { 
        id: {{ $product->id }}, 
        name: @js($product->name), 
        desc: @js($product->description), 
        price: {{ $product->price }} 
    })"
    type="button"
    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">
    Atualizar
</button>

                    </div>
                   
                </div>
                
            @endforeach
        </div>
    </div>

    <div x-show="tab === 'users'" x-cloak>
        <h2 class="text-2xl font-bold mb-6">Usuários</h2>

        <div class="bg-white dark:bg-gray-900 rounded-xl border dark:border-gray-800 overflow-hidden">
            <table class="w-full text-left text-sm">
                
                <thead class="bg-gray-50 dark:bg-gray-800 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">Nome</th>
                        <th class="px-6 py-3 text-right">Ações</th>
                    </tr>
                </thead>

                <tbody class="divide-y dark:divide-gray-800">
                    @foreach($users as $u)
                        <tr class="dark:text-gray-300">
                            
                            <td class="px-6 py-4">
                                {{ $u->name }}
                            </td>

                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-4">
                                    
                                    <button
                                        @click="$dispatch('openUpdate', { 
                                            id: {{ $u->id }}, 
                                            name: @js($u->name) 
                                        })"
                                        class="text-blue-500 hover:underline"
                                    >
                                        Atualizar
                                    </button>

                                    <form 
                                        action="{{ route('admin.destroy', $u->id) }}" 
                                        method="POST"
                                     
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button class="text-red-500 hover:underline">
                                            Excluir
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

</main>
