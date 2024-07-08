<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
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
                    el: '#payment-form',
                    delimiters: ['${', '}'],
                    data() {
                        return {
                            amount: '',
                            formaPagamento: '',
                            card_number: '',
                            card_name: '',
                            card_cvv: '',
                            card_expiration: '',
                            boletoNumber: '',
                            showCardForm: false,
                            paymentSuccessMessage: ''
                        }
                    },
                    methods: {
                        handleInitialSubmit() {
                            const csrfToken = document.querySelector('input[name="_token"]').value;
                            if (this.formaPagamento === 'boleto') {
                                this.fetchBoleto(csrfToken);
                            } else if (this.formaPagamento === 'cartao') {
                                this.showCardForm = true;
                            }
                        },
                        fetchBoleto(csrfToken) {
                            fetch('/pagamento', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': csrfToken
                                    },
                                    body: JSON.stringify({
                                        client_id: 1, // ID do cliente definido como 1
                                        amount: this.amount,
                                        type: 'boleto'
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    this.boletoNumber = data.boleto_number; // Mostra o número do boleto
                                    // setTimeout(() => {
                                    //     this.boletoNumber = '';
                                    //     this.amount = '';
                                    //     this.formaPagamento = '';
                                    // }, 2000);
                                })
                                .catch(error => {
                                    console.error('Erro ao gerar boleto:', error);
                                });
                        },

                        submitCartao() {
                            const csrfToken = document.querySelector('input[name="_token"]').value;
                            fetch('/pagamento', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': csrfToken
                                    },
                                    body: JSON.stringify({
                                        client_id: 1, // ID do cliente definido como 1
                                        amount: this.amount,
                                        type: 'cartao',
                                        card_number: this.card_number,
                                        card_name: this.card_name,
                                        card_cvv: this.card_cvv,
                                        card_expiration: this.card_expiration
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    this.showCardForm = false;
                                    this.paymentSuccessMessage = data.message;
                                    setTimeout(() => {
                                        this.paymentSuccessMessage = '';
                                    }, 2000);
                                    this.amount = '';
                                    this.formaPagamento = '';
                                    this.card_name = '';
                                    this.card_number = '';
                                    this.card_cvv = '';
                                    this.card_expiration = '';
                                })
                                .catch(error => {
                                    console.error('Erro ao processar pagamento com cartão:', error);
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
