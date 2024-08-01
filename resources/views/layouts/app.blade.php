<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <!-- SweetAlert CSS -->
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- SweetAlert JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <div class="container mt-5">
            @yield('content')
            <div id="session-messages"
                data-success="{{ session('success') }}"
                data-error="{{ $errors->first() }}">
            </div>
        </div>

        @stack('modals')

        @livewireScripts

        <script>
        document.addEventListener('DOMContentLoaded', function () {

            var deleteForms = document.querySelectorAll('.delete-form');
            deleteForms.forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    var form = this;
                    Swal.fire({
                        title: 'Você tem certeza?',
                        text: "Esta ação não pode ser desfeita!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sim, deletar!',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            var messagesElement = document.getElementById('session-messages');
            var successMessage = messagesElement.getAttribute('data-success');
            var errorMessage = messagesElement.getAttribute('data-error');

            if (successMessage) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso!',
                    text: successMessage,
                    confirmButtonText: 'OK'
                });
            } else if (errorMessage) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: errorMessage,
                    confirmButtonText: 'OK'
                });
            }
        });
    </script>
    </body>
</html>
