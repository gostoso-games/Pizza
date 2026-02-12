
 
 
 <header

      class=" top-0 z-50 hidden items-center justify-center  gap-6 bg-white p-6 text-2xl shadow-2xl md:flex "
    > 

      <div class="flex items-center justify-center gap-6 flex-1">
        <a
          href="#inicio"
          class="flex items-center gap-2 p-3 font-medium transition-colors hover:text-red-600"
        >
          <i class="ri-home-3-fill"></i> Início
        </a>
        <a
          href="#cardapio"
          class="flex items-center gap-2 p-3 font-medium transition-colors hover:text-red-600"
        >
          <i class="ri-restaurant-line"></i> Cardápio
        </a>
        <a
          href="#localizacao"
          class="flex items-center gap-2 p-3 font-medium transition-colors hover:text-red-600"
        >
          <i class="ri-map-pin-2-fill"></i> Localização
        </a>
        <a
        href="#contato"
        class="flex items-center gap-2 p-3 font-medium transition-colors hover:text-red-600 "
      >
        <i class="ri-phone-fill"></i> Contato
      </a>
      </div>
      
      <button id="cart-button" onclick="openCart()"
        class="flex items-center gap-2 p-3  hover:text-red-600 rounded-full bg-red-600 px-6 py-3 font-medium text-white transition-colors hover:bg-red-700"
      >
        <i class="ri-shopping-cart-2-line"></i> Carrinho
      </button>
    </header>

    <header
      class="relative z-50 flex justify-end bg-white p-6 text-2xl shadow-2xl md:hidden"
    >
    <header class="relative z-50 flex justify-end bg-white p-6 text-2xl shadow-2xl md:hidden">
  <button
    id="menu-button"
    class="p-2 text-3xl"
    aria-label="Abrir menu"
  >
    <i class="ri-menu-line"></i>
  </button>
  
  <nav
    id="mobile-menu"
    class="absolute right-4 top-full mt-2 hidden flex-col gap-2 rounded-xl bg-white p-4 shadow-xl z-100 min-w-[150px border border-gray-100"
  >
    <a href="#inicio" class="rounded px-4 py-2 text-lg hover:bg-gray-100">Início</a>
    <a href="#cardapio" class="rounded px-4 py-2 text-lg hover:bg-gray-100">Cardápio</a>
    <a href="#localizacao" class="rounded px-4 py-2 text-lg hover:bg-gray-100">Localização</a>
    <a href="#contato" class="rounded px-4 py-2 text-lg hover:bg-gray-100">Contato</a>
    <button onclick="openCart()" class="text-left rounded px-4 py-2 text-lg hover:bg-gray-100 text-red-600 font-bold">
      Carrinho
    </button>
  </nav>
</header>
    </header>

    