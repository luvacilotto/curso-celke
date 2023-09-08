<?php

if (isset($this->data['form'])) {
    $valorForm = $this->data['form'];
}

// Criptografar a senha
//echo password_hash("123456a", PASSWORD_DEFAULT);

?>

<h1>Área Restrita</h1>

<?php
if(isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

<form method="POST" action="">
    <?php
    $user  = "";
    if(isset($valorForm['user'])) {
        $user = $valorForm['user'];
    }
    ?>
    <label for="user">Usuário:</label>
    <input type="text" name="user" id="user" placeholder="Digite o usuário" value="<?php echo $user; ?>"><br><br>

    <?php
    $password = "";
    if (isset($valorForm['password'])) {
        $password = $valorForm['password'];
    }
    ?>

    <label for="password">Senha:</label>
    <input type="password" name="password" id="password" placeholder="Digite a senha"><br><br>

    <input type="submit" name="SendLogin" value="Acessar">
</form>