<a href="/cursos/cadastrar">Inserir novo curso</a>
<table style="border: 1px solid #ccc; width: 100%">
    <tr>
        <th>Nome curso</th>
        <th>Carga horária</th>
    </tr>

    <?php
        if(isset($_SESSION['cursos'])){
            foreach($_SESSION['cursos'] as $curso){
                echo '<tr><td>'.$curso['nome_curso'].'</td>';
                echo '<td>'.$curso['carga_horaria'].'</td></tr>';
            }
        }else{
            echo '<tr><td>Ainda não foi cadastrado nenhum curso</td>,</tr>';
        }
    ?>
</table>