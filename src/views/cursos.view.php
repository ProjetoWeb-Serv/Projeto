<?php

use Projeto\Models\dao\CursoDAO;
    if(isset($_COOKIE['mensagem'])){
        echo '<p class="sucess_login">' . htmlspecialchars($_COOKIE['mensagem']) . '</p>';
    }
    if(isset($_COOKIE['mensagem_erro'])){
        echo '<p class="error_message">' . htmlspecialchars($_COOKIE['mensagem_erro']) . '</p>';
    }
?>

<div class="button_curso">
    <a href="/cursos/cadastrar">
        <button>Inserir novo curso</button>
    </a>
</div>
<table style="border: 1px solid #ccc; width: 100%">
    <tr>
        <th>Registro Curso</th>
        <th>Nome curso</th>
        <th>Carga horária</th>
        <?php if($_SESSION['role'] === 'admin'){
            echo '<th></th>';
            echo '<th></th>';
        }
        ?>
    </tr>

    <?php
       foreach($cursos as $curso){
                echo '<tr><td>'.$curso->id.'</td>';
                echo '<td>'.$curso->nome_curso.'</td>';
                echo '<td>'.$curso->carga_horaria.'</td>';

                if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'){
                    //editar
                    echo '<td>
                        <form method="GET" action="/cursos/editar">
                            <input type="hidden" name="id" value="' . $curso->id . '">
                            <div class="action_buttons">';
                                require('src/views/components/editButton.php');
                    echo    '</div>
                        </form>
                    </td>';

                    //deletar
                    echo '<td>
                        <form method="GET" action="/cursos/deletar">
                            <input type="hidden" name="id" value="' . $curso->id . '">
                            <div class="action_buttons">';
                                require('src/views/components/deleteButton.php');
                    echo    '</div>
                        </form>
                    </td>';
                }
                echo '<tr>';
            }
    ?>
</table>