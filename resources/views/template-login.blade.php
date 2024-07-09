<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
</head>

<body>
    <div id="app">
        <main>
            @yield('content')
        </main>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                new Vue({
                    el: '#login-form',
                    delimiters: ['${', '}'],
                    data() {
                        return {
                            nome: '',
                            email: '',
                            cpf: '',
                            messageLogin: ''
                        }
                    },
                    methods: {
                        handleLogin() {
                            const csrfToken = document.querySelector('input[name="_token"]').value;
                            fetch('/login', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': csrfToken
                                    },
                                    body: JSON.stringify({
                                        nome: this.nome,
                                        email: this.email,
                                        cpf: this.cpf
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.client_id) {
                                        window.location.href = `/?client_id=${data.client_id}`;
                                    } else {
                                        this.messageLogin = data.message;
                                    }
                                })
                                .catch(error => {
                                    console.error('Erro ao fazer login:', error);
                                });
                        }
                    }
                });
            });
        </script>
    </div>

    @yield('scripts')
</body>

</html>
