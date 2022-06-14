<?php
    session_start();
    include_once("conexao.php");

    if(isset($_POST['btnEnvia'])){
        $nome = trim(ucwords($_POST['nome']));
        $usuario = trim($_POST['user']);
        $email = trim($_POST['email']);
        $telefone = trim($_POST['phone']);
        $cpf = trim($_POST['cpf']);
        $data_nasc = $_POST['data_nasc'];
        $idade = calculaIdade($data_nasc);
        $local = trim($_POST['cep']." ,".$_POST['rua']." ,".$_POST['bairro']." ,".$_POST['cidade']." ,".$_POST['uf']." ,".$_POST['comp']);
        $tipo = $_POST['tipo']; 
        $senha = password_hash(trim($_POST['senha']), PASSWORD_DEFAULT);
        
        if(!empty($nome) && !empty($usuario) && !empty($email) && !empty($telefone) && !empty($cpf) && !empty($data_nasc) && !empty($local) && !empty($tipo) && !empty($senha)){

            if (preg_match('/[\'\\/^£$%&*()}{@#~?><>,|=_+¬\-0-9]/', $nome)){
                    $_SESSION['msgerro'] = "Seu nome não pode conter caracteres especiais nem números";
                    header("Location: ../pags/cadastro.php");
                }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $_SESSION['msgerro'] = "Email Inválido";
                header("Location: ../pags/cadastro.php");
            }
            if(!preg_match('/\(?\d{2}\)?\s?\d{5}\-?\d{4}/', $telefone))
            {
                $_SESSION['msgerro'] = "Telefone inválido";
                header("Location: ../pags/cadastro.php");
            }

                $telefone = (int)str_replace(" ","",preg_replace('/[\'\\/^£$%&*()}{@#~?><>,|=_+¬\-]/', "",$telefone));

            if(!validaCPF($cpf)){
                $_SESSION['msgerro'] = "CPF inválido";
                header("Location: ../pags/cadastro.php");
            }

                $cpf = preg_replace('/[^0-9]/', "", $cpf);

            if($idade < 16){
                $_SESSION['msgerro'] = "Você não tem idade suficiente para se cadastrar";
                header("Location: ../pags/cadastro.php");
            }

            $result_existe = "SELECT * FROM usuario WHERE username = '$usuario' OR  email = '$email' OR telefone = '$telefone' OR cpf = '$cpf'";
            $query_result_existe = mysqli_query($connect, $result_existe);

            if(mysqli_num_rows($query_result_existe) != 0){
                $row_erros = mysqli_fetch_assoc($query_result_existe);
                switch($row_erros){
                    case $row_erros['username'] == $usuario:
                        $_SESSION['msgerro'] = "Este nome de usuario já está cadastrado";
                        header("Location: ../pags/cadastro.php");
                        break;
                    case $row_erros['email'] == $email:
                        $_SESSION['msgerro'] = "Este email já está cadastrado";
                        header("Location: ../pags/cadastro.php");
                        break;
                    case $row_erros['telefone'] == $telefone:
                        $_SESSION['msgerro'] = "Este telefone já está cadastrado";
                        header("Location: ../pags/cadastro.php");
                        break;
                    case $row_erros['cpf'] == $cpf:
                        $_SESSION['msgerro'] = "Este cpf já está cadastrado";
                        header("Location: ../pags/cadastro.php");
                        break;
                }
            }else{
                echo $nome . "<br>";
                echo $usuario . "<br>";
                echo $data_nasc . "<br>";
                echo $local . "<br>";
                echo $tipo . "<br>";
                echo $email . "<br>";
                echo $senha . "<br>";
                echo strlen($cpf) . "<br>";
                echo $telefone . "<br>";

                $result_cadastro = "INSERT INTO usuario (nome, username, data_nasc, local ,tipo_usuario, email, senha, cpf, telefone ,idimgperfil) VALUES ('$nome', '$usuario', '$data_nasc', '$local', $tipo, '$email', '$senha', $cpf, $telefone, 1)";
                $query_usuario = mysqli_query($connect, $result_cadastro);
                $_SESSION['msg'] = "Cadastrado com sucesso!";
                header("Location: ../pags/login.php");
            }
        }else{
            $_SESSION['msgerro'] = "Insira credenciais válidas";
            header("Location: ../pags/cadastro.php");
        }
    }else{
        $_SESSION['msgerro'] = 'Você não deveria estar aqui';
        header("Location: ../pags/cadastro.php");
    }
    

    function calculaIdade($data){

     // separando yyyy, mm, ddd
     list($ano, $mes, $dia) = explode('-', $data);
 
     // data atual
     $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
     // Descobre a unix timestamp da data de nascimento do fulano
     $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
 
     // cálculo
     $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
      return $idade;
    }

    function validaCPF($number) {

        $cpf = preg_replace('/[^0-9]/', "", $number);
    
        if (strlen($cpf) != 11 || preg_match('/([0-9])\1{10}/', $cpf)) {
            return false;
        }
    
        $number_quantity_to_loop = [9, 10];
    
        foreach ($number_quantity_to_loop as $item) {
    
            $sum = 0;
            $number_to_multiplicate = $item + 1;
        
            for ($index = 0; $index < $item; $index++) {
    
                $sum += $cpf[$index] * ($number_to_multiplicate--);
        
            }
    
            $result = (($sum * 10) % 11);
    
            if ($cpf[$item] != $result) {
                return false;
            }
    
        }
    
        return true;
    }
?>