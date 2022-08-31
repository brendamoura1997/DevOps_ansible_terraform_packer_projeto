<!doctype html>
<html>
<head>
        <meta charset="UTF-8">
        <title>Usuários</title>
        <style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background: #484848;
}
.topnav {
  overflow: hidden;
  background-color:rgba(44, 130, 201, 1);
  height: 70px;
  border: 3px solid #3333ff
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 35px;
  font-weight: bold;
}

.topnav-right {
  float: right;
}
fieldset { 
	background: #FAFAFA;
	padding: 10px;
   margin:auto;
   max-width:450px;
	box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
	border-radius: 10px;
	border: 6px solid  rgba(44, 130, 201, 1);


}



 </style>
</head>
<body>
<div class="topnav">
            <a href="index.php">Cadastro de Usuários</a>
          </div>

<form>
    <button type="submit" formaction="index.php" style="margin:15px;height: 30px;width: 100px;cursor:pointer;border-radius:15px;
border: 3px solid #3333ff;background-color:rgba(44, 130, 201, 1);color:#f2f2f2;font-size:17px;">Voltar</button>
</form>  
<form method="post" action="addUser.php">  
<fieldset>
  <input type="text" name="firstName" placeholder="Nome" style="width:100%;height:30px;
   border: 2px solid  rgba(44, 130, 201, 1); border-radius:3px;  background:transparent;"  required>
  <br><br>
   <input type="text" name="lastName" placeholder="Sobrenome"  style="width:100%;height:30px;
   border: 2px solid  rgba(44, 130, 201, 1); border-radius:3px;  background:transparent;"  required>
  <br><br>
   <input type="text" name="email" placeholder="Email"  style="width:100%;height:30px;
   border: 2px solid  rgba(44, 130, 201, 1); border-radius:3px;  background:transparent;"  required>
  <br><br>
  <input type="text" name="city" placeholder="Cidade"  style="width:100%;height:30px;
   border: 2px solid  rgba(44, 130, 201, 1); border-radius:3px;  background:transparent;"  required>
  <br><br>
  <input type="text" name="country" placeholder="País"  style="width:100%;height:30px;
   border: 2px solid  rgba(44, 130, 201, 1); border-radius:3px;  background:transparent;"  min="0" required>
  <br><br>
  <input type="submit" name="submit" value="Salvar" style="width:100%;height:30px;
   border: 2px solid  rgba(44, 130, 201, 1); border-radius:3px; cursor:pointer;background-color:rgba(44, 130, 201, 1)">&ensp; 
  </fieldset> 
</form> 
</body>
</html>
<?php
if(isset($_POST["submit"]))
{
 // definir variáveis e definir valores vazios
$servername = "localhost";
$username = "user_manager";
$password = "Qwerty123";
$dbname = "user_inventory";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);
// Checar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
} 


$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$email= $_POST["email"];
$city = $_POST["city"];
$country = $_POST["country"];


$sql = "INSERT INTO users(firstName,lastName,email,city,country)
VALUES ('$firstName','$lastName','$email','$city','$country')";
if ($conn->multi_query($sql) == TRUE) {
  echo'<div>
  <h1 style="color:#f2f2f2;font-size:20px; font-family: "Roboto", sans-serif;margin:auto;">Novo usuário inserido com sucesso!</h1>
     </div>';
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

?>
