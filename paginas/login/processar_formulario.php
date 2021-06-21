<?php

if(!empty($_POST)){
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    if($usuario == "adm" && md5($senha) == md5("adm")){
        $_SESSION["nome"] = "Tamires";

?>
        <span style="color:green;">Login efetuado!</span>
        <script>
            setTimeout(function() {
                window.location.href = "?pg=area_restrita";
            }, 3000);
        </script>
<?php
    }
    else{
?>
        <p style="color:red;">Dados inválidos! Tente novamente.</p>
        <p><a href="javascript:history.back();">Voltar</a></p>
<?php
    }
}
else{
    header("Location: ?pg=login/formulario");
}
?>
