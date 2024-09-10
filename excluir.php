<?php 

include 'conexaoDB.php'; // conexão com o banco

if (isset($_GET["id"])) {    //verificar e obter ID
    $id = $_GET["id"];
    
    $sql = "DELETE FROM pessoas WHERE id=$id"; //instrução para deletar um usuário do banco através do ID
    $conexao->query($sql); //executar a instrução

}

header("location: index.php"); //redirecionamento para o index
exit;

?>