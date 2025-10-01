<?php
    if(isset($_COOKIE['mensagem'])){
        echo '<p class="sucess_login">' . htmlspecialchars($_COOKIE['mensagem']) . '</p>';
    }
    if(isset($_COOKIE['mensagem_erro'])){
        echo '<p class="error_message">' . htmlspecialchars($_COOKIE['mensagem_erro']) . '</p>';
    }
?>

<div class="button_curso">
    <a href="/matriculas/cadastrar">
        <button>Inserir nova matrícula</button>
    </a>
</div>
<table style="border: 1px solid #ccc; width: 100%">
    <tr>
        <th>Nome Aluno</th>
        <th>Nome Curso</th>
        <th>Carga Horária</th>
        <?php if($_SESSION['role'] === 'admin'){
            echo '<th></th>';
            echo '<th></th>';
        }
        ?>
    </tr>

    <?php
    if(isset($_SESSION['matriculas'])){
        require_once __DIR__ . '/../models/Matricula.php';
            foreach($_SESSION['matriculas'] as $matricula){

                echo '<tr><td>'.$matricula->buscarNomeAluno().'</td>';
                echo '<td>'.$matricula->buscarCursoNome().'</td>';
                echo '<td>'. $matricula->buscarCargaHoraria(). '</td>';

                if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'){
                    //editar
                    echo '<td>
                        <form method="GET" action="/matriculas/editar">
                            <input type="hidden" name="id" value="' . $matricula->id . '">
                            <div class="action_buttons">';
                                require('views/components/editButton.php');
                    echo    '</div>
                        </form>
                    </td>';

                    //deletar
                    echo '<td>
                        <form method="GET" action="/matriculas/deletar">
                            <input type="hidden" name="id" value="' . $matricula->id . '">
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