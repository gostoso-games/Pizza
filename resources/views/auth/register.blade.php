<!DOCTYPE html>
<html lang="pt-BR" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crie sua conta | Registro</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] { display: none !important; }
        body {
            background: radial-gradient(circle at top left, #111827, #1f2937, #111827);
        }
    </style>
</head>
<body class="h-full flex items-center justify-center p-4">

<div class="w-full max-w-md">
    <div class="bg-gray-800/50 backdrop-blur-xl p-10 rounded-3xl border border-gray-700 shadow-2xl">
        
        <div class="text-center mb-10">
            <h2 class="text-3xl font-extrabold text-white tracking-tight">
                Criar conta
            </h2>
            <p class="text-gray-400 mt-2 text-sm">Comece sua jornada conosco hoje.</p>
        </div>

        <form action="/register" method="POST" class="space-y-5">
            @csrf 
            
            <div>
                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1 ml-1">Nome Completo</label>
                <input 
                    type="text"
                    name="name" 
                    value="{{ old('name') }}"
                    placeholder="Ex: João Silva"
                    required
                    class="w-full px-4 py-3 rounded-xl bg-gray-900/50 text-white border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none placeholder:text-gray-600"
                >
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1 ml-1">E-mail</label>
                <input 
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="seu@email.com"
                    required
                    class="w-full px-4 py-3 rounded-xl bg-gray-900/50 text-white border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none placeholder:text-gray-600"
                >
            </div>

            <div class="grid grid-cols-1 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1 ml-1">Senha</label>
                    <input 
                        type="password"
                        name="password"
                        placeholder="••••••••"
                        required
                        class="w-full px-4 py-3 rounded-xl bg-gray-900/50 text-white border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none placeholder:text-gray-600"
                    >
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1 ml-1">Confirmar Senha</label>
                    <input 
                        type="password"
                        name="password_confirmation"
                        placeholder="••••••••"
                        required
                        class="w-full px-4 py-3 rounded-xl bg-gray-900/50 text-white border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none placeholder:text-gray-600"
                    >
                </div>
            </div>

            <button
                type="submit"
                class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 py-3 rounded-xl text-white font-bold shadow-lg shadow-blue-900/20 transform active:scale-[0.98] transition-all mt-4"
            >
                Finalizar Cadastro
            </button>
        </form>

        @if ($errors->any())
            <div class="mt-6 p-4 bg-red-500/10 border-l-4 border-red-500 rounded-r-xl">
                <div class="flex">
                    <div class="ml-2">
                        <ul class="text-red-400 text-xs space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        
        <div class="mt-8 pt-6 border-t border-gray-700 text-center">
            <p class="text-gray-400 text-sm">
                Já tem uma conta? 
                <a href="/login" class="text-blue-400 font-semibold hover:text-blue-300 transition underline-offset-4 hover:underline">Entre aqui</a>
            </p>
        </div>
    </div>
</div>

</body>
</html>