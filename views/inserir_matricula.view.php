<h1>Inserir nova matrícula</h1>

<form id="formulario_matriculas" method="POST" action="/matriculas/gravar">
    <p>Selecione o aluno</p>
    <select id="aluno" name="nome_aluno">
            <?php 
            foreach($_SESSION['alunos'] as $aluno){
                echo '<option value="'.$aluno['nome_aluno'].'">' . $aluno['nome_aluno'] . '</option>';
            }
            ?> 
    </select>
    <p>Selecione o curso</p>
    <select id="curso" name="nome_curso">
            <?php 
            foreach($_SESSION['cursos'] as $curso){
                echo '<option value="'.$curso['nome_curso'].'">' . $curso['nome_curso'] . '</option>';
            }
            ?> 
    </select>
    <div class="button_aluno">
        <button type="submit">Inserir matrícula</button>
    </div>
</form>