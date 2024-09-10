# Demonstração do funcionamento de um CRUD

CRUD (Create-Read-Update-Delete) são as quatro operações básicas que se podem realizar em uma aplicação que gerencia um banco de dados.

## 📝 Requerimentos

> IDE de sua escolha (VScode, PhpStorm..)
>
> Banco de Dados (MySQL, PostgreSQL..)
>
> Linguagem PHP
> 
> Ferramenta de hospedagem (Apache, Nginx, LiteSpeed..)
>
> 
🤝 Dica: O XAMPP, além de oferecer MySQL e PHP numa única instalação, também fornece um servidor Apache. 

## 🧑‍🏫 Explicação

***criar.php***
- Conexão com o Banco: Estabelece a conexão necessária para interagir com o banco de dados.
  
- Processamento de Dados: Recebe dados do formulário, valida, insere no banco e lida com mensagens de erro e sucesso.
  
- Exibição de Formulário: Fornece uma interface para o usuário inserir novos dados e exibe feedbacks baseados nas ações do usuário.
  
***index.php***

- Conexão com o Banco de Dados incluída
  
- Exibição da Tabela: Cria uma tabela HTML para listar usuários.
  
- Ações: Oferece botões para adicionar, editar e excluir usuários.
  
- Dados Dinâmicos: Os dados são recuperados do banco de dados e exibidos na tabela, com opções para editar ou excluir cada usuário.
  
***editar.php***

- Conexão com o Banco: Inclui a conexão com o banco de dados.
  
- O PHP lida com a lógica de carregamento dos dados do usuário e o processamento das atualizações.
  
- O HTML fornece a interface para editar os dados do usuário e exibe mensagens de feedback.

***excluir.php***

- Conexão com o banco de dados: Estabelece a conexão com o banco de dados.
  
- Recebimento do ID: Obtém o ID do usuário a partir da URL, se disponível.
  
- Deletar o Registro: Executa uma consulta SQL para excluir o registro correspondente do banco de dados.
  
- Redirecionar: Após a exclusão, redireciona o usuário para a página principal (index.php).

### 📚 Observações

- Comentários no código da aplicação foram adicionados para um melhor entendimento
- Isto é APENAS uma demonstração, não utilize essa estrutura em 'situações reais' 
