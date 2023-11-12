<?php
    function calcularIMC($peso, $altura) {
        $peso = isset($_POST['peso']) ? $_POST['peso'] : 0;
        $altura = isset($_POST['altura']) ? $_POST['altura'] : 0;

    // Check if both weight and height are provided
    if ($peso > 0 && $altura > 0) {
        $imc_final = number_format($peso / ($altura * $altura), 1);
        $classificacoes = array(
            'Magreza' => 18.5,
            'Saudável' => 24.9,
            'Sobrepeso' => 29.9,
            'Obesidade Grau I' => 34.9,
            'Obesidade Grau II' => 39.9,
            'Obesidade Grau III' => PHP_FLOAT_MAX // assuming anything 40+ is 'ob3'
        );
        
        $classificacao = '';
        foreach ($classificacoes as $nome => $limite) {
            if ($imc_final <= $limite) {
                $classificacao = $nome;
                break;
            }
        }
        
        return 'Atenção, seu IMC é ' . $imc_final . ', e você está classificado como ' . ucfirst($classificacao);
    } else {
        return 'Por favor, preencha peso e altura para calcular o IMC.';
    }
    }
?>

<div class="text-white">
    <p><?php echo calcularIMC($peso, $altura) ?></p>
</div>