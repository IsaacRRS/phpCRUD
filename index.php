<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Funcionamento</title>
    <!-- dependênciais para estilização -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'conexaoDB.php' // conexão com o banco ?>     

    <div class="container my-5">
        <h3>Lista de pessoas</h3>
        <a class="btn btn-primary" href="criar.php">Adicionar</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Celular</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
       <?php 
        $sql = "SELECT * FROM pessoas"; //variável para selecionar todos os usuários
        $resultado = $conexao->query($sql); //executar sql
        
        if(!$resultado) {
            die("Falha: " . $conexao->error); //verificar se há falhas
        }
        
        while($linha = $resultado->fetch_assoc()){ //irá mostrar cada usuário do banco de dados e suas informações
            echo "  
            <tr>
                <td>$linha[id]</td>
                <td>$linha[nome]</td>
                <td>$linha[email]</td>
                <td>$linha[celular]</td>
                <td>                                                  
                    <a class='btn btn-primary btn-sm' href='editar.php?id=$linha[id]'>Editar</a>
                    <a class='btn btn-danger btn-sm' href='excluir.php?id=$linha[id]'>Excluir</a>
                </td>
            </tr>
            ";                      // botões de direcionamento para edição ou remoção ^^^
        }
        
        
        ?>
            
        </tbody>
    </table>
</body>
</html>