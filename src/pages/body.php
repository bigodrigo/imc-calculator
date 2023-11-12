<body>    
    <div class="container">
        <h1 class="text-center">Calculadora de IMC</h1>
        <h3 class="text-center">Por favor utilize até 2 casas decimais e ponto(.) ao invés de vírgula(,)!</h3>
        <div class="row" id="columnContainer">
            <div class="col-md-6 bg-light p-2" id="column1">
                <form class="d-flex flex-column" method="post" action="" id="imcForm">
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" placeholder="Qual seu peso?" name="peso" id="pesoInput">
                        <span class="input-group-text" id="basic-addon2">kg</span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" placeholder="Qual sua altura?" name="altura" id="alturaInput">
                        <span class="input-group-text" id="basic-addon2">m</span>
                    </div>
                    <button class="btn btn-lg btn-primary text-white" type="button" onclick="calcularIMC()">
                        Calcular
                    </button>
                </form>
            </div>
            <div class="col-md-6 bg-secondary d-flex justify-content-center align-items-center" id="column2">
                <?php require_once "./src/functions/calculoimc.php"; ?>
            </div>
        </div>
    </div>    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function calcularIMC() {
            var peso = $("input[name='peso']").val();
            var altura = $("input[name='altura']").val();

            $.ajax({
                type: "POST",
                url: "./src/functions/calculoimc.php",
                data: { peso: peso, altura: altura },
                success: function (response) {
                    $("#column2").html(response);
                }
            });
        }
    </script>
</body>