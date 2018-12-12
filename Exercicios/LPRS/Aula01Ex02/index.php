<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Aula 01 - Ex 02</title>
</head>
<body class="container">
    


    <main class="my-5">
        <a href="create_db.php" class="btn btn-outline-danger">Criar um Banco de dados [ Agenda ]</a>
        <a href="create_table.php" class="btn btn-outline-success">Criar uma Tabela de telefones</a>
        <br> <br>
        
        <hr>

        <h1 class="lead">Adicionar Telefone</h1>
        
        <form action="insert_getlastid.php" method="POST">
            <input type="text" name="nome" placeholder="Nome" class="p-1">
            <input type="number" name="dd" placeholder="11" class="p-1" style="width: 50px">
            <input type="number" name="numero" placeholder="912345678" class="p-1">
            <br>
            <input type="submit" value="Salvar Contato" class="btn btn-outline-secondary mt-3">
        </form>

        <hr>

        <?php
            require 'connect.php';

            $sql = "SELECT id, nome, dd, numero FROM agenda";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "ID: " . $row["id"]. " - Name: " . $row["nome"]. " " . "(" .$row["dd"] . ")" . " " . $row["numero"]. "<br>";
                }
            } else {
                echo "<span class='lead text-danger my-3'>0 results</span>";
            }

            $conn->close();
        ?>

        <hr>

        <a href="delete.php" class="text-danger">Deleta Tudo</a>
    </main>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>