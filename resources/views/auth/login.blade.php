<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    @vite('resources/css/app.css', 'resources/js/app.js')
</head>
<body class="bg-gray-900">

<div class="min-h-screen flex items-center justify-center">
    <div class="bg-gray-800 p-8 rounded-2xl w-96 shadow-2xl">
        <h2 class="text-2xl text-white mb-6 text-center font-bold">Login</h2>

        <form action="/login" method="POST">
            @csrf
            
            <input 
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Email"
                required
                class="w-full mb-4 px-4 py-2 rounded-lg bg-gray-700 text-white border border-gray-600 focus:outline-none focus:border-blue-500"
            >

            <input 
                type="password"
                name="password"
                placeholder="Senha"
                required
                class="w-full mb-4 px-4 py-2 rounded-lg bg-gray-700 text-white border border-gray-600 focus:outline-none focus:border-blue-500"
            >

            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 py-2 rounded-lg text-white font-bold transition"
            >
                Entrar
            </button>
        </form>

        @if ($errors->any())
            <p class="text-red-400 mt-4 text-sm text-center">{{ $errors->first() }}</p>
        @endif
        
        <div class="mt-4 text-center">
            <a href="/register" class="text-blue-400 text-xs hover:underline">Criar uma conta</a>
        </div>
    </div>
</div>

</body>
</html><!DOCTYPE html>
<html lang="pt-BR" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesse sua conta | Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background: radial-gradient(circle at top right, #111827, #1f2937, #111827);
        }
    </style>
</head>
<body class="h-full flex items-center justify-center p-4">

<div class="w-full max-w-md">
    <div class="bg-gray-800/50 backdrop-blur-xl p-10 rounded-3xl border border-gray-700 shadow-2xl">
        
        <div class="text-center mb-10">
            <h2 class="text-3xl font-extrabold text-white tracking-tight">
                Bem-vindo
            </h2>
            <p class="text-gray-400 mt-2 text-sm">Identifique-se para continuar.</p>
        </div>

        <form action="/login" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2 ml-1">E-mail</label>
                <div class="relative">
                    <input 
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="seu@email.com"
                        required
                        class="w-full px-4 py-3 rounded-xl bg-gray-900/50 text-white border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none placeholder:text-gray-600"
                    >
                </div>
            </div>

            <div>
                <div class="flex justify-between mb-2 ml-1">
                    <label class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Senha</label>
                    <a href="#" class="text-xs text-blue-400 hover:text-blue-300 transition">Esqueceu?</a>
                </div>
                <input 
                    type="password"
                    name="password"
                    placeholder="••••••••"
                    required
                    class="w-full px-4 py-3 rounded-xl bg-gray-900/50 text-white border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none placeholder:text-gray-600"
                >
            </div>

            <button
                type="submit"
                class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 py-3 rounded-xl text-white font-bold shadow-lg shadow-blue-900/20 transform active:scale-[0.98] transition-all"
            >
                Entrar no Sistema
            </button>
        </form>

        @if ($errors->any())
            <div class="mt-6 p-3 bg-red-500/10 border border-red-500/50 rounded-xl text-center">
                <p class="text-red-400 text-sm font-medium">{{ $errors->first() }}</p>
            </div>
        @endif
        
        <div class="mt-8 pt-6 border-t border-gray-700 text-center">
            <p class="text-gray-400 text-sm">
                Novo por aqui? 
                <a href="/register" class="text-blue-400 font-semibold hover:text-blue-300 transition underline-offset-4 hover:underline">Crie sua conta</a>
            </p>
        </div>
    </div>
</div>

</body>
</html>