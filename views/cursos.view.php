<?php
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
    </tr>

    <?php
        require_once('models/Curso.php');
        if(isset($_SESSION['cursos'])){
            foreach($_SESSION['cursos'] as $curso){
                echo '<tr><td>'.$curso->id.'</td>';
                echo '<td>'.$curso->nome_curso.'</td>';
                echo '<td>'.$curso->carga_horaria.'</td></tr>';
            }
        }else{
            echo '<tr><td>Ainda não foi cadastrado nenhum curso</td></tr>';
        }
    ?>
</table>

<?php
    if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'){
        echo '<div class="action_buttons">';
        echo '<a href="/cursos/editar">';
        require_once('views/components/editButton.php');
        echo '</a>';
        echo '<a href="/cursos/deletar">';
        require_once('views/components/deleteButton.php');
        echo '</a>';
        echo '</div>';
    }
?>