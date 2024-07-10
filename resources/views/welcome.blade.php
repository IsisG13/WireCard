@extends('template')

@section('content')
    <div>
        <a href="/login" class="button-login">
            <button>Entrar</button>
        </a>
        <h1>Bem vindos a WireCard</h1>
        <p>Para evitar erros no pagamento, faça seu login antes!</p>
        <p>Preencha os campos abaixo e faça seu pagamento.</p>
        <div id="payment-form">
            <form id="payment-initial-form" @submit.prevent="handleInitialSubmit">
                @csrf <!-- Diretiva do Blade para gerar o token CSRF -->
                <div class="dados">
                    <label for="amount">Valor para pagar:</label>
                    <input placeholder="Ṛ$: " type="number" id="amount" v-model="amount" required><br>

                    <label for="type">Forma de pagamento:</label><br>
                    <div class="typeCard">
                        <input type="radio" id="cartao" name="formaPagamento" value="cartao" v-model="formaPagamento">
                        <label for="cartao" class="radio-label">Cartão</label>
                    </div>
                    <div class="typeCard">
                        <input type="radio" id="boleto" name="formaPagamento" value="boleto" v-model="formaPagamento">
                        <label for="boleto" class="radio-label">Boleto</label>
                    </div>

                    <button type="submit">Pagar</button>
                </div>
            </form>

            <div v-if="formaPagamento === 'boleto' && boletoNumber" class="n-msg">
                <p class="n-msg">Número do Boleto: ${boletoNumber}</p>
            </div>

            <div v-if="formaPagamento === 'cartao' && showCardForm">
                <form @submit.prevent="submitCartao">
                    <div class="form">
                        <label for="card_number">Número do Cartão:</label>
                        <input placeholder="16 números" minlength="16" type="number" id="card_number"  v-model="card_number" required><br>

                        <label for="card_name">Nome no Cartão:</label>
                        <input placeholder="Ex: Ello" type="text" id="card_name" v-model="card_name" required><br>

                        <label for="card_cvv">CVV:</label>
                        <input placeholder="3 números" minlength="4" type="number" id="card_cvv" v-model="card_cvv" required><br>

                        <label for="card_expiration">Data de Validade:</label>
                        <input type="date" id="card_expiration" v-model="card_expiration" required><br>

                        <button type="submit">Enviar Pagamento</button>
                    </div>
                    @csrf
                </form>
            </div>

            <div v-if="paymentSuccessMessage" class="msg">
                <h3>${paymentSuccessMessage}</h3>
            </div>
        </div>
    </div>
@endsection
