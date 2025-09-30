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
    </tr>

    <?php
    if(isset($_SESSION['matriculas'])){
            foreach($_SESSION['matriculas'] as $matricula){
                echo '<tr><td>'.$matricula['nome_aluno'].'</td>';
                echo '<td>'.$matricula['nome_curso'].'</td></tr>';
            }
        }else{
            echo '<tr><td>Ainda não foi cadastrado nenhum aluno</td></tr>';
    }
    ?>
</table>