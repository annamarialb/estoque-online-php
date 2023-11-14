<?php

    if(!empty($_GET['iditem'])){
       
        include_once('config.php');

        $iditem = $_GET['iditem'];

        $sqlSelect = "SELECT * FROM itens WHERE iditem=$iditem";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0){
            while($user_data = mysqli_fetch_assoc($result)){
                $nomeitem = $user_data['nomeitem'];
                $quantitens = $user_data['quantitens'];
                $valcompraitens = $user_data['valcompraitens'];
                $valorvendaitens = $user_data['valorvendaitens'];
            }
        }else{
            header('Location: listarproduto.php');
        }
    }else{
        header('Location: listarproduto.php');
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(45deg, #91d1dd, #5ec2d4);
        }
        .box{
            color: #fff;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.7);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid #1f9bed;
        }
        legend{
            border: 2px solid #1f9bed;
            padding: 10px;
            text-align: center;
            background-color: #1f9bed;
            border-radius: 9px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid #fff;
            outline: none;
            color: #fff;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput, .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: #1f9bed;
        }
        #update{
            background-image: linear-gradient(45deg, #1f9bed, #1f9bed);
            width: 100%;
            border: none;
            padding: 13px;
            color: #fff;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px; 
        }
        #update:hover{
            background-image: linear-gradient(45deg, #43abf0, #43abf0);
        }
    </style>
</head>
<body>
    <a href="listarproduto.php">Voltar</a>
    <div class="box">
        <form action="saveEdit.php" method="POST">
            <fieldset>
                <legend><b>Cadastro de Clientes</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nomeitem" id="nomeitem" class="inputUser" value="<?php echo $nomeitem ?>" required>
                    <label for="nomeitem" class="labelInput">Nome do Item</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="quantitens" id="quantitens" class="inputUser" value="<?php echo $quantitens ?>" required>
                    <label for="quantitens" class="labelInput">Quantidade de Itens</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="valcompraitens" id="valcompraitens" class="inputUser" value="<?php echo $valcompraitens ?>" required>
                    <label for="valcompraitens" class="labelInput">Valor de Compra do Item</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="valorvendaitens" id="valorvendaitens" class="inputUser" value="<?php echo $valorvendaitens ?>" required>
                    <label for="valorvendaitens" class="labelInput">Valor de Venda do Item</label>
                </div>
                <br>
                <input type="hidden" name="iditem" value="<?php echo $iditem ?>">
                <input type="submit" name="update" id="update">
            </fieldset>
        </form>
    </div>
</body>
</html>