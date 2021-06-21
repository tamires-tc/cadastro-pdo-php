<?php


if(!empty($_POST)){
    
    $nome = $_POST["nome"];
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $data_hora_criacao = date('Y-m-d H:i:s');
    $usuario_resp= $_SESSION["nome"];
    $descricao = ("Cadastro de usuario");
    $data_hora = date('Y-m-d H:i:s');

    # Insert no banco de dados
    $stmt = $conn->prepare("INSERT INTO usuarios (nome, usuario, senha, data_hora_criacao) VALUES (:nome, :usuario, :senha, :data_hora_criacao)");
    $stmt1 = $conn->prepare("INSERT INTO logs (usuario_resp, descricao, data_hora) VALUES (:usuario_resp, :descricao, :data_hora)");

    $bind_param = ["nome" => $nome, "usuario" => $usuario, "senha" => md5($senha), "data_hora_criacao" => $data_hora_criacao ];
    $bind_param1 = ["usuario_resp"=> $usuario_resp, "descricao" =>$descricao, "data_hora"=>$data_hora];

    try {
        $conn->beginTransaction();
        $stmt->execute($bind_param);
        $stmt1->execute($bind_param1);
        echo '<div class="msg-cadastro-contato msg-cadastro-sucesso">Registro ' . $conn->lastInsertId() . ' inserido no banco!</div>';
        $conn->commit();
    } catch(PDOExecption $e) {
        $conn->rollback();
        echo '<div class="msg-cadastro-contato msg-cadastro-erro">Erro ao inserir registro no banco: ' . $e->getMessage() . '</div>';
    }

}

?>

<div id="btn-limpar-sessao">
    <a href="?pg=usuario/usuarios">Voltar</a>
</div>