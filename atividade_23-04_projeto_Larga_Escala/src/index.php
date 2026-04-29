<?php
/**
 * Projeto: Plataforma Acadêmica Inteligente (PAI)
 * Componente: Protótipo de Validação e Recomendação
 * Disciplina: Pensamento Computacional - UDF
 */

// 1. Simulação de Banco de Dados (Abstração)
$alunos = [
    'Daniel' => ['status' => 'Ativo', 'media' => 8.5, 'faltas' => 2],
    'Marcus' => ['status' => 'Ativo', 'media' => 9.0, 'faltas' => 0],
    'Eduardo' => ['status' => 'Trancado', 'media' => 6.0, 'faltas' => 5],
    'Alisson' => ['status' => 'Ativo', 'media' => 5.5, 'faltas' => 10],
];

// 2. Algoritmo de Recomendação Inteligente (Decomposição)
function gerarRecomendacao($nome, $dados) {
    if ($dados['status'] !== 'Ativo') {
        return "⚠️ Alerta: Aluno com matrícula trancada. Favor procurar a secretaria.";
    }

    if ($dados['media'] >= 7 && $dados['faltas'] < 5) {
        return "✅ Desempenho excelente! Recomendamos o curso avançado de 'Sistemas de Larga Escala'.";
    } elseif ($dados['media'] < 7) {
        return "📘 Recomendação: Notamos uma queda na média. Que tal revisar os módulos de 'Lógica de Programação'?";
    } else {
        return "📌 Atenção: Sua média é boa, mas cuidado com as faltas!";
    }
}

// 3. Interface de Saída (Simulando o Console do Sistema)
echo "=== PLATAFORMA ACADÊMICA INTELIGENTE - Módulo de Verificação ===\n\n";

foreach ($alunos as $nome => $info) {
    echo "Processando aluno: $nome...\n";
    echo "Média: {$info['media']} | Faltas: {$info['faltas']}\n";
    
    // Execução do Algoritmo
    $resultado = gerarRecomendacao($nome, $info);
    
    echo "Resultado: $resultado\n";
    echo "------------------------------------------------------------\n";
}

echo "\nProcessamento finalizado com sucesso.";
