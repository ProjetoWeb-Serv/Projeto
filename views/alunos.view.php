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
    </tr>

    <?php
        require_once('models/Aluno.php');
        if(isset($_SESSION['alunos'])){
            foreach($_SESSION['alunos'] as $aluno){
                echo '<tr><td>'.$aluno->id.'</td>';
                echo '<td>'.$aluno->nome_aluno.'</td>';
                echo '<td>'.$aluno->data_nascimento.'</td></tr>';
            }
        }else{
            echo '<tr><td>Ainda não foi cadastrado nenhum aluno</td></tr>';
        }
    ?>
</table>