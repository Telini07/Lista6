<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
</head>
<body>
<?php
        include('conexao.php');
        $sql = "SELECT * FROM agenda";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
    ?>
    <div align="center">
    <h1>Agendamentos</h1>
    <table border="1" width="500">
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Nome</th>
            <th>Apelido</th>
            <th>Endereco</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Telefone</th>
            <th>Celular</th>
            <th>E-mail</th>
            <th>Data</th>
            <th>Alterar</th>
            <th>Deletar</th>
        </tr>

        <?php
            do{
            echo "<tr>";
            echo "<td>".$row['id_agenda']."</td>";
            if($row['foto'] == ""){
                echo "<td></td>";
            }else {
                echo "<td><img src='". $row['foto']. "' width='80' height='100'/></td>";
            }
            echo "<td>".$row['nome']."</td>";
            echo "<td>".$row['apelido']."</td>";
            echo "<td>".$row['endereco']."</td>";
            echo "<td>".$row['bairro']."</td>";
            echo "<td>".$row['cidade']."</td>";
            echo "<td>".$row['estado']."</td>";
            echo "<td>".$row['fone']."</td>";
            echo "<td>".$row['cel']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['dt_cadastro']."</td>";
            echo "<td><a href='altera_agenda.php?id_agenda=".$row['id_agenda']."'>Alterar</a></td>";
            echo "<td><a href='deleta_agenda.php?id_agenda=".$row['id_agenda']."'>Deletar</td>";
            echo "</tr>";
            }while($row = mysqli_fetch_array($result))
        ?>
    </table>
    <br>
    <a href="index.php"><button>Voltar</button></a>
    </div>
</body>
</html>