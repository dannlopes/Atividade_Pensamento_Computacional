<?php
/**
 * Projeto: Plataforma Acadêmica Inteligente (PAI)
 * Componente: Protótipo de Validação e Recomendação
 * Disciplina: Pensamento Computacional - UDF
 */

// 1. Simulação de Banco de Dados (Abstração)
$alunos = [
    'Daniel Lopes' => ['status' => 'Ativo', 'media' => 8.5, 'faltas' => 2, 'foto' => 'https://ui-avatars.com/api/?name=Daniel+Lopes&background=0D8ABC&color=fff'],
    'Marcus Silva' => ['status' => 'Ativo', 'media' => 9.2, 'faltas' => 0, 'foto' => 'https://ui-avatars.com/api/?name=Marcus+Silva&background=6f42c1&color=fff'],
    'Eduardo Souza' => ['status' => 'Trancado', 'media' => 6.0, 'faltas' => 5, 'foto' => 'https://ui-avatars.com/api/?name=Eduardo+Souza&background=adb5bd&color=fff'],
    'Alisson Rocha' => ['status' => 'Ativo', 'media' => 5.5, 'faltas' => 12, 'foto' => 'https://ui-avatars.com/api/?name=Alisson+Rocha&background=d63384&color=fff'],
];

// 2. Algoritmo de Recomendação Inteligente (Decomposição e Algoritmos)
function gerarRecomendacao($dados) {
    if ($dados['status'] !== 'Ativo') {
        return ["status" => "warning", "msg" => "Matrícula Trancada. Procure a secretaria para regularização."];
    }

    if ($dados['media'] >= 7 && $dados['faltas'] < 5) {
        return ["status" => "success", "msg" => "Desempenho excelente! Recomendamos o curso de 'Sistemas de Larga Escala'."];
    } elseif ($dados['media'] < 7) {
        return ["status" => "danger", "msg" => "Alerta Acadêmico: Recomendamos reforço nos módulos de 'Lógica de Programação'."];
    } else {
        return ["status" => "info", "msg" => "Atenção: Sua média é satisfatória, mas seu índice de faltas está elevado."];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAI - Dashboard Acadêmico</title>
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #34495e;
            --bg: #f4f7f6;
            --success: #27ae60;
            --danger: #e74c3c;
            --warning: #f39c12;
            --info: #3498db;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg);
            color: var(--primary);
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 3px solid var(--primary);
            padding-bottom: 10px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 20px;
            transition: transform 0.2s;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 15px;
            border: 3px solid var(--bg);
        }

        .nome {
            font-size: 1.2rem;
            font-weight: bold;
            margin: 5px 0;
        }

        .stats {
            display: flex;
            gap: 15px;
            margin: 10px 0;
            font-size: 0.9rem;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 20px;
            color: white;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .recommendation {
            margin-top: 15px;
            padding: 12px;
            border-radius: 8px;
            font-size: 0.85rem;
            line-height: 1.4;
            text-align: center;
        }

        /* Cores Dinâmicas */
        .bg-success { background-color: var(--success); }
        .bg-danger { background-color: var(--danger); }
        .bg-warning { background-color: var(--warning); }
        .bg-info { background-color: var(--info); }
        
        .border-success { border-top: 5px solid var(--success); }
        .border-danger { border-top: 5px solid var(--danger); }
        .border-warning { border-top: 5px solid var(--warning); }
        .border-info { border-top: 5px solid var(--info); }

        footer {
            text-align: center;
            margin-top: 50px;
            font-size: 0.8rem;
            color: #7f8c8d;
        }
    </style>
</head>
<body>

<div class="container">
    <header>
        <h1>Plataforma Acadêmica Inteligente (PAI)</h1>
        <p>Módulo de Processamento de Desempenho em Larga Escala</p>
    </header>

    <div class="grid">
        <?php foreach ($alunos as $nome => $info): 
            $rec = gerarRecomendacao($info);
        ?>
            <div class="card border-<?php echo $rec['status']; ?>">
                <img src="<?php echo $info['foto']; ?>" alt="Avatar" class="avatar">
                <div class="nome"><?php echo $nome; ?></div>
                <div class="badge <?php echo ($info['status'] == 'Ativo' ? 'bg-success' : 'bg-warning'); ?>">
                    <?php echo $info['status']; ?>
                </div>
                
                <div class="stats">
                    <span><strong>Média:</strong> <?php echo number_format($info['media'], 1); ?></span>
                    <span><strong>Faltas:</strong> <?php echo $info['faltas']; ?></span>
                </div>

                <div class="recommendation bg-<?php echo $rec['status']; ?>" style="color: white;">
                    <?php echo $rec['msg']; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <footer>
        <p>&copy; 2026 - Daniel Lopes Aguiar | Projeto de Pensamento Computacional - UDF</p>
    </footer>
</div>

</body>
</html>
echo "\nProcessamento finalizado com sucesso.";
