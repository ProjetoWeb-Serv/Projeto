<a href="/alunos/cadastrar">Inserir novo aluno</a>
<table style="border: 1px solid #ccc; width: 100%">
    <tr>
        <th>Nome aluno</th>
        <th>Data Nascimento</th>
    </tr>

    <?php
        if(isset($_SESSION['alunos'])){
            foreach($_SESSION['alunos'] as $aluno){
                echo '<tr><td>'.$aluno['nome_aluno'].'</td>';
                echo '<td>'.$aluno['data_nascimento'].'</td></tr>';
            }
        }else{
            echo '<tr><td>Ainda não foi cadastrado nenhum aluno</td>,</tr>';
        }
    ?>
</table>