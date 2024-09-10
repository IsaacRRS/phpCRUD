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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar</title>
    <!-- dependênciais para estilização -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <div class="container my-5">
        <h3>Criar novo usuário</h3>

        <?php 
        
        if (!empty($mensagemErro)) { //definir mensagem de erro
            echo "

            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$mensagemErro</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            
            ";
        }

        ?>


        <form method="post">   <!-- formulário simples -->
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
        
if (!empty($mensagemSucesso)) { //definir mensagem de sucesso

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