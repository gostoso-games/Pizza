<div id="cart-modal" class="fixed inset-0 z-60 hidden bg-black/50 backdrop-blur-sm items-center justify-center p-4 ">
    
    <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl overflow-hidden animate-in fade-in zoom-in duration-300">
        
        <div class="flex items-center justify-between p-6 border-b">
            <h2 class="text-2xl font-bold flex items-center gap-2">
                <i class="ri-shopping-cart-line text-red-600"></i> Seu Pedido
            </h2>
            <button onclick="closeCart()" class="text-gray-400 hover:text-red-600 transition-colors">
                <i class="ri-close-line text-3xl"></i>
            </button>
        </div>

        <div id="cart-items" class="p-6 max-h-[400px] overflow-y-auto min-h-[100px]">
            <p class="text-gray-500 text-center">Seu carrinho está vazio...</p>
        </div>

        <div class="p-6 border-t bg-gray-50">
            <div class="flex justify-between items-center mb-6 text-xl font-bold">
                <span>Total:</span>
                <span id="cart-total" class="text-green-700">R$ 0,00</span>
            </div>
            
            <button onclick="sendToWhatsApp()" class="w-full bg-green-500 hover:bg-green-600 text-white py-4 rounded-xl font-bold text-lg flex items-center justify-center gap-3 shadow-lg shadow-green-200 transition-all active:scale-95">
                <i class="ri-whatsapp-line text-2xl"></i> Finalizar no WhatsApp
            </button>
        </div>
    </div>
</div>