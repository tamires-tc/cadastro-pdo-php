<h2>Logs módulo usuário</h2>

<?php

$sql = "SELECT * FROM logs";

$result = $conn->query($sql, PDO::FETCH_ASSOC);

?>

<table>
    <tr>
        <th>Número do registro</th>
        <th>Usuário Executor</th>
        <th>Ação executada</th>
        <th>Data e hora</th>
    </tr>
    <?php
        while($linha = $result->fetch()){
    ?>
        <tr>
            <?php 
                foreach($linha as $chave => $valor){
            ?>
                <td><?= $valor ?></td>
                
            <?php
                }
            ?>          
        </tr>
    <?php
        }
    ?>
</table>