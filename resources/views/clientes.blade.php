<!DOCTYPE html>
<html>
<head>
    <title>Clientes-Pagamento</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
</head>
<body>
        <div id="app">
            <input   />
            <h1>Meu nome é ${name}</h1>            
        </div>

        <script>

            new Vue({
                el: '#app',
                delimiters: ['${', '}'],
                data() {
                    return {
                        name: "Marcelly"
                    }
                }
            });
        </script>
    </body>
</html>
