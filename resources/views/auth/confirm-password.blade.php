<!DOCTYPE html>
<html lang="pt-BR" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Restrita | Confirmação</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background: radial-gradient(circle at bottom left, #111827, #1f2937, #111827);
        }
    </style>
</head>
<body class="h-full flex items-center justify-center p-4  ">

<div class="w-full max-w-md ">
    <div class="bg-gray-800/50 backdrop-blur-xl p-10 rounded-3xl border border-gray-700 shadow-2xl relative overflow-hidden">
        
        <div class="absolute -top-6 -right-6 w-24 h-24 bg-blue-500/10 rounded-full blur-2xl"></div>

        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-600/20 rounded-full mb-4 border border-blue-500/30">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-white tracking-tight">
                Área Segura
            </h2>
            <p class="text-gray-400 mt-2 text-sm">
                Confirme sua senha para validar esta ação.
            </p>
        </div>

        <form action="{{ route('password.confirm') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2 ml-1">Senha de Acesso</label>
                <input 
                    type="password" 
                    name="password" 
                    placeholder="••••••••"
                    required
                    autofocus
                    class="w-full px-4 py-3 rounded-xl bg-gray-900/50 text-white border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none placeholder:text-gray-600"
                >
            </div>

            <button
                type="submit"
                class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 py-3 rounded-xl text-white font-bold shadow-lg shadow-blue-900/20 transform active:scale-[0.98] transition-all"
            >
                Confirmar Identidade
            </button>
        </form>

        @if ($errors->any())
            <div class="mt-6 p-3 bg-red-500/10 border border-red-500/50 rounded-xl text-center">
                <p class="text-red-400 text-sm font-medium">{{ $errors->first() }}</p>
            </div>
        @endif

        <div class="mt-8 text-center">
            <a href="javascript:history.back()" class="text-gray-500 text-xs hover:text-gray-300 transition">
                Voltar para segurança
            </a>
        </div>
    </div>
</div>

</body>
</html>