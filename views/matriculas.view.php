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
            foreach($_SESSION['matriculas'] as $aluno){
                echo '<tr><td>'.$aluno['nome_aluno'].'</td>';
                echo '<td>'.$aluno['nome_curso'].'</td>';
            }
        }else{
            echo '<tr><td>Ainda não foi cadastrado nenhum aluno</td></tr>';
    }
    ?>
</table>