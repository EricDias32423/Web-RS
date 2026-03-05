<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Se ainda quiser usar o Vite, mantenha comentado -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    
    <!-- CSS personalizado (opcional) -->
    <style>
        /* Seu CSS personalizado aqui se necessário */
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <a href="/">
                <!-- Seu logo aqui -->
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>

    <!-- 📍 ADICIONE O JAVASCRIPT AQUI - ANTES DO FECHAMENTO DO BODY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        // Auto-esconder mensagens após 5 segundos
        setTimeout(function() {
            const messages = document.querySelectorAll('.session-message, .alert, [role="alert"]');
            messages.forEach(function(message) {
                message.style.transition = 'opacity 0.5s ease';
                message.style.opacity = '0';
                setTimeout(function() {
                    if (message.parentNode) {
                        message.remove();
                    }
                }, 500);
            });
        }, 5000);

        // Se precisar de mais funcionalidades, adicione aqui
        $(document).ready(function() {
            console.log('Página carregada com jQuery!');
            
            // Exemplo: máscara para telefone
            // $('#telefone').mask('(00) 00000-0000');
        });
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>