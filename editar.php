<?php 

include 'conexaoDB.php'; // conexão com o banco

$id = "";   //iniciar variáveis para armazenamento futuro
$nome = "";
$email = "";
$celular = "";

$mensagemErro = "";
$mensagemSucesso = "";

if ( $_SERVER['REQUEST_METHOD'] == 'GET') { //verificar o método

    if (!isset($_GET["id"])) { //verificar o ID
        header("location: index.php"); //mandar para index caso não haja ID
        exit;
    }

    $id = $_GET["id"]; //obter ID

    $sql = "SELECT * FROM pessoas WHERE id=$id"; //instrução SQL para selecionar o usuário de acordo com o ID
    $resultado = $conexao->query($sql); //executa a instrução
    $linha = $resultado->fetch_assoc(); //variável para pegar a linha de dados da consulta

    if (!$linha) { //se houver erro, manda para o index
        header("location: index.php");
        exit;
    }

    $nome = $linha["nome"]; //preenche as variáveis com dados do form
    $email = $linha["email"];
    $celular = $linha["celular"];

}

else {

    $id = $_POST["id"]; //armazena os valores trazidos do form
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $celular = $_POST["celular"];

    do {
           //verificar se ps campos estão vazios
        if ( empty($id) || empty($nome) || empty($email) || empty($celular)) {
                //mensagem caso estejam
            $mensagemErro = "Preencha todos os campos";
            break;

        }   
            //instrução SQL para atualizar o usuário
        $sql = " UPDATE pessoas SET nome = '$nome', email = '$email', celular = '$celular' WHERE id = $id";
            //execução SQL
        $resultado = $conexao->query($sql);

        if (!$resultado) {  //verificar a consulta

            $mensagemErro = "Falha: " . $conexao->error;
            break;

        }
            //caso não haja erros, manda mensagem de sucesso
        $mensagemSucesso = "Usuário atualizado";
            //redireciona para index
        header("location: index.php");
        exit;

    } while (false);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <!-- dependênciais para estilização -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
</head>
<body>

    <div class="container my-5">
        <h3>Editar usuário</h3>

        <?php 

        if (!empty($mensagemErro)) { //manda mensagem de erro caso haja necessidade
            echo "

            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$mensagemErro</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            
            ";
        }

        ?>


        <form method="post"> <!-- formulário simples -->
        <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nome</label>
                <div class="col-sm-6">
                    <input type="text" name="nome" value="<?php echo $nome; ?>" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" name="email" value="<?php echo $email; ?>" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Celular</label>
                <div class="col-sm-6">
                    <input type="text" name="celular" value="<?php echo $celular; ?>" class="form-control">
                </div>
            </div>

<?php 
        
if (!empty($mensagemSucesso)) { //manda mensagem de sucesso caso haja necessidade

echo "
            
    <div class='row mb-3'>
        <div class='offset-sm-3 col-sm-6>
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$mensagemSucesso</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
        </div>
    </div>
    ";

}
        
?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="index.php" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>