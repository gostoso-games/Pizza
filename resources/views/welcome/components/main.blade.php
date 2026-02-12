<main class="mx-auto flex max-w-6xl flex-col items-center gap-12 md:flex-row" id="inicio">
  <div class="flex flex-col gap-9 p-20">
    <h1 id="hero-h1" class="text-4xl font-bold text-gray-800 md:text-5xl p-5">
      Conteúdo da Página
    </h1>

    <p class="max-w-xl text-lg text-gray-700 p-5">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br>
        Laborum obcaecati ipsam quis est doloremque, enim voluptatem cupiditate alias inventore magnam itaque vitae atque! Aliquid asperiores quaerat nobis accusamus delectus pariatur!
    </p>
<a
  href="#contato"
  id="hero-button"
  style="filter: drop-shadow(0px 8px 0px rgba(0,0,0,.3));"
  class="inline-flex self-start items-center justify-center rounded-full bg-red-600 p-3 text-2xl text-white transition-colors hover:bg-red-700 z-2"
>
  Contato
</a>

  </div>

  <img
    src="{{ asset('img/heropizza.png') }}"
    alt="Imagem"
    style="filter: drop-shadow(0px 8px 5px rgba(0,0,0,.3));"
    class="w-full max-w-sm rounded z-3"
  />
</main>
<div class="flex flex-wrap gap-6 justify-center" id="cardapio">
  @foreach ($products as $product)
    <div class="bg-white shadow-lg rounded-xl w-72 hover:-translate-y-2 transition-all duration-300">
      <img src="{{asset('img/cards_img/' . $product->image) }}" class="h-52 w-full object-cover rounded-t-xl">

      <div class="p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $product->name }}</h2>
        <p class="text-gray-600 mb-4">{{ $product->description }}</p>

        <div class="flex items-center justify-between">
          <button  
            class="bg-red-600 text-white px-6 py-2 rounded-full hover:bg-red-700 transition add-to-cart-btn"
            data-name="{{ $product->name }}"
            data-price="{{ $product->price }}"
          >
            Pedir
          </button>

          <p class="text-xl font-bold text-gray-900">
            R$ {{ number_format($product->price, 2, ',', '.') }}
          </p>
        </div>
      </div>
    </div>
  
  @endforeach  
 
</div>
<div class="flex justify-center mt-10">
   {{ $products->links() }}
</div>
