<?php
    if(isset($_COOKIE['mensagem'])){
        echo '<p class="sucess_login">' . htmlspecialchars($_COOKIE['mensagem']) . '</p>';
    }
    if(isset($_COOKIE['mensagem_erro'])){
        echo '<p class="error_message">' . htmlspecialchars($_COOKIE['mensagem_erro']) . '</p>';
    }
?>

<div class="button_aluno">
    <a href="/alunos/cadastrar">
    <button>Inserir novo aluno</button>
    </a>
</div>
<table style="border: 1px solid #ccc; width: 100%">
    <tr>
        <th>Registro Aluno</th>
        <th>Nome aluno</th>
        <th>Data Nascimento</th>
        <?php if($_SESSION['role'] === 'admin'){
            echo '<th></th>';
            echo '<th></th>';
        }
        ?>
    </tr>

    <?php

        require_once('models/Aluno.php');

        if(isset($_SESSION['alunos'])){
            
            foreach($_SESSION['alunos'] as $aluno){
                echo '<tr><td>'.$aluno->id.'</td>';
                echo '<td>'.$aluno->nome_aluno.'</td>';
                $strQuebrada = explode('-', $aluno->data_nascimento);
                echo '<td>'.$strQuebrada[2].'/'.$strQuebrada[1].'/'.$strQuebrada[0].'</td>';

                if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'){
                    //editar
                    echo '<td>
                        <form method="GET" action="/alunos/editar">
                            <input type="hidden" name="id" value="' . $aluno->id . '">
                            <div class="action_buttons">';
                                require('views/components/editButton.php');
                    echo    '</div>
                        </form>
                    </td>';

                    //deletar
                    echo '<td>
                        <form method="GET" action="/alunos/deletar">
                            <input type="hidden" name="id" value="' . $aluno->id . '">
                            <div class="action_buttons">';
                                require('views/components/deleteButton.php');
                    echo    '</div>
                        </form>
                    </td>';
                }
                echo '<tr>';
            }
        }else{
            echo '<tr><td>Ainda não foi cadastrado nenhum aluno</td></tr>';
        }
    ?>
</table>