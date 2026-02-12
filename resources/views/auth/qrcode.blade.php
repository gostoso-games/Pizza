@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="max-w-md mx-auto mt-12 bg-blue-900 dark:bg-gray-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-800 overflow-hidden">
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-6">
        <h2 class="text-xl font-semibold text-white flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
            Autenticação de 2 Fatores
        </h2>
    </div>

    <div class="p-8 text-gray-800 dark:text-gray-200">
        @if(!auth()->user()->two_factor_secret)
            <div class="text-center">
                <div class="mb-4 inline-flex items-center justify-center w-16 h-16 bg-blue-50 dark:bg-blue-900/40 rounded-full text-blue-600 dark:text-blue-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>

                <p class="text-gray-600 dark:text-gray-400 mb-6 leading-relaxed">
                    Proteja sua conta adicionando uma camada extra de segurança. Use um aplicativo autenticador para gerar códigos de acesso.
                </p>
                
                <form method="POST" action="{{ route('two-factor.enable') }}">
                    @csrf
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white font-bold py-3 px-4 rounded-xl transition-all shadow-md hover:shadow-lg active:scale-[0.98]">
                        Ativar Proteção Agora
                    </button>
                </form>
            </div>
        @else
            <div class="space-y-6">
                <div class="text-center">
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">
                        1. Escaneie o código com seu app (Google Authenticator, Authy):
                    </p>
                    
                    <div class="inline-block p-3 bg-white dark:bg-gray-800 border-2 border-dashed border-gray-200 dark:border-gray-700 rounded-2xl shadow-sm">
                        <div class="p-2">
                            {!! auth()->user()->twoFactorQrCodeSvg() !!}
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-100 dark:border-gray-800 pt-6">
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        2. Salve seus códigos de recuperação:
                    </p>
                    
                    <div class="grid grid-cols-2 gap-2 bg-gray-50 dark:bg-gray-800 p-4 rounded-xl border border-gray-200 dark:border-gray-700 font-mono text-xs text-gray-700 dark:text-gray-300">
                        @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code)
                            <div class="bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-700 p-2 rounded shadow-sm text-center select-all hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                {{ $code }}
                            </div>
                        @endforeach
                    </div>
                </div>

                <form method="POST" action="{{ route('two-factor.confirm') }}" class="space-y-4">
                    @csrf

                    <input 
                        type="text"
                        name="code"
                        placeholder="Digite o código do app"
                        class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-xl p-3 text-center focus:ring-2 focus:ring-green-500 focus:outline-none"
                        required
                    >

                    <button type="submit"
                        class="w-full bg-green-500 hover:bg-green-600 dark:bg-green-600 dark:hover:bg-green-700 text-white font-bold py-3 px-4 rounded-xl transition-all">
                        Concluir Configuração
                    </button>
                </form>
            </div>
        @endif
    </div>
</div>
