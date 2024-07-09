@extends('template-login')

@section('content')
    <div>
        <h1>Login</h1>
        <p>Faça o login para realizar seu pagamento!</p>
        <div id="login-form">
            <form id="login-initial-form" @submit.prevent="handleLogin">
                @csrf <!-- Diretiva do Blade para gerar o token CSRF -->
                <div class="dados">
                    <label for="nome">Nome do Cliente:</label>
                    <input type="text" id="nome" v-model="nome" required><br>

                    <label for="email">Email do Cliente:</label><br>
                    <input type="email" id="email" v-model="email" required><br>

                    <label for="cpf">CPF do Cliente:</label><br>
                    <input type="number" id="cpf" v-model="cpf" required><br>

                    <button type="submit">Logar</button>
                </div>
            </form>

            <div v-if="messageLogin">
                <h3>${messageLogin}</h3>
            </div>
        </div>
    </div>
@endsection
