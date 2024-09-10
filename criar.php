<?php 

include 'conexaoDB.php'; // conexão com o banco


$nome = ""; //iniciar variáveis para armazenar dados futuramente
$email = "";
$celular = "";

$mensagemErro = "";
$mensagemSucesso = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') { //verificar método

$nome = $_POST["nome"]; //obter e armazenar valores do form
$email = $_POST["email"];
$celular = $_POST["celular"];

do {
    if (empty($nome) || empty($email) || empty($celular)) { //caso os campos estejam vazios, exibe mensagem
        $mensagemErro = "Preencha todos os campos";
        break;
    }
        //instrução sql para adicionar um novo usuário
    $sql = "INSERT INTO pessoas (nome,email,celular)" . "VALUES ('$nome', '$email', '$celular')";
    $resultado = $conexao->query($sql);

    if (!$resultado) { //para verificar se há erro na execução
        $mensagemErro = "Falha: " . $conexao->error;
        break;
    }


    $nome = ""; //limpar os campos após mandar dados
    $email = "";
    $celular = "";
  
    $mensagemSucesso = "Usuário adicionado";  

    header("location: index.php"); //redireciona para index
    exit;

} while(false);

}

?>
