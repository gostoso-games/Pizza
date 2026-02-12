@csrf
<script>
    const CART_KEY = 'pizza_cart';

    const cartModal = document.getElementById('cart-modal');
    const mobileMenu = document.getElementById('mobile-menu');
    const cartItemsContainer = document.getElementById('cart-items');
    const cartTotalDisplay = document.getElementById('cart-total');
    const cartCountDesktop = document.getElementById('cart-count');
    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');

    let cart = [];

    function saveCart() {
        localStorage.setItem(CART_KEY, JSON.stringify(cart));
    }

    function loadCart() {
        const savedCart = localStorage.getItem(CART_KEY);
        if (savedCart) {
            cart = JSON.parse(savedCart);
            updateCart();
        }
    }

    function openCart() {
        cartModal.classList.remove('hidden');
        cartModal.classList.add('flex');
        if (mobileMenu) mobileMenu.classList.add('hidden');
    }

    function closeCart() {
        cartModal.classList.add('hidden');
        cartModal.classList.remove('flex');
    }

    addToCartButtons.forEach(button => {
        button.addEventListener('click', () => {
            const productName = button.getAttribute('data-name');
            const productPrice = parseFloat(button.getAttribute('data-price'));

            const existingItem = cart.find(item => item.name === productName);

            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    name: productName,
                    price: productPrice,
                    quantity: 1
                });
            }

            updateCart();
            openCart();
        });
    });

    function removeItem(name) {
        cart = cart.filter(item => item.name !== name);
        updateCart();
    }

    function openWhatzap() {
        window.open('https://wa.me/5511999999999', '_blank', 'noopener,noreferrer');
    }
    function changeQuantity(name, delta) {
        const item = cart.find(item => item.name === name);
        if (!item) return;

        item.quantity += delta;
        if (item.quantity <= 0) {
            removeItem(name);
        } else {
            updateCart();
        }
    }

    function updateCart() {
        cartItemsContainer.innerHTML = "";
        let total = 0;
        let totalItems = 0;

        if (cart.length === 0) {
            cartItemsContainer.innerHTML =
                '<p class="text-gray-500 text-center font-medium py-4">Seu carrinho está vazio...</p>';
        } else {
            cart.forEach(item => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;
                totalItems += item.quantity;

                cartItemsContainer.innerHTML += `
                    <div class="flex justify-between items-center mb-6 border-b pb-4">
                        <div class="flex-1">
                            <p class="font-bold text-gray-800 text-lg">${item.name}</p>
                            <p class="text-red-600 font-medium">
                                R$ ${item.price.toLocaleString('pt-br', { minimumFractionDigits: 2 })}
                            </p>

                            <div class="flex items-center gap-4 mt-2">
                                <button onclick="changeQuantity('${item.name}', -1)"
                                    class="w-8 h-8 flex items-center justify-center bg-gray-200 rounded-full hover:bg-gray-300 transition">
                                    <i class="ri-subtract-line font-bold"></i>
                                </button>

                                <span class="font-bold text-lg w-4 text-center">${item.quantity}</span>

                                <button onclick="changeQuantity('${item.name}', 1)"
                                    class="w-8 h-8 flex items-center justify-center bg-gray-200 rounded-full hover:bg-gray-300 transition">
                                    <i class="ri-add-line font-bold"></i>
                                </button>
                            </div>
                        </div>

                        <div class="flex flex-col items-end gap-2">
                            <p class="font-bold text-gray-900">
                                R$ ${itemTotal.toLocaleString('pt-br', { minimumFractionDigits: 2 })}
                            </p>
                            <button onclick="removeItem('${item.name}')"
                                class="text-gray-400 hover:text-red-600 transition p-1">
                                <i class="ri-delete-bin-line text-xl"></i>
                            </button>
                        </div>
                    </div>
                `;
            });
        }

        cartTotalDisplay.innerText =
            `R$ ${total.toLocaleString('pt-br', { minimumFractionDigits: 2 })}`;

        if (cartCountDesktop) {
            cartCountDesktop.innerText = totalItems;
            cartCountDesktop.classList.toggle('hidden', totalItems === 0);
        }

        saveCart();
    }

    function sendToWhatsApp() {
        if (cart.length === 0) return;

        let message = "🍕 *Novo Pedido - Pizzaria*\n\n";
        cart.forEach(item => {
            message += `• *${item.quantity}x* ${item.name} - R$ ${(item.price * item.quantity)
                .toLocaleString('pt-br', { minimumFractionDigits: 2 })}\n`;
        });

        message += `\n💰 *Total: ${cartTotalDisplay.innerText}*`;

        const encodedMessage = encodeURIComponent(message);
        window.open(
            `https://wa.me/5511999999999?text=${encodedMessage}`,
            '_blank',
            'noopener,noreferrer'
        );

      
        saveCart();
        updateCart();
    }

    cartModal.addEventListener('click', (e) => {
        if (e.target === cartModal) closeCart();
    });

    document
        .querySelector('button[aria-label="Abrir menu"]')
        ?.addEventListener('click', (e) => {
            e.stopPropagation();
            mobileMenu?.classList.toggle('hidden');
        });

    document.addEventListener('click', () => {
        mobileMenu?.classList.add('hidden');
    });

    loadCart();
</script>
