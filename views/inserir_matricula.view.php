<div class="matricula_title">   
    <h1>Inserir nova matrícula</h1>
</div>

<div class="form_matricula">
    <form id="formulario_matriculas" method="POST" action="/matriculas/gravar">
        <div class="select_div">
            <p class="select_aluno">Selecione o aluno</p>
            <select id="aluno" name="nome_aluno">
                    <?php 
                    foreach($_SESSION['alunos'] as $aluno){
                        echo '<option value="'.$aluno->__get('nome_aluno').'">' . $aluno->__get('nome_aluno') . '</option>';
                    }
                    ?> 
            </select>
        </div>
        <div class="select_div">
            <p class="select_curso">Selecione o curso</p>
            <select id="curso" name="nome_curso">
                    <?php 
                    foreach($_SESSION['cursos'] as $curso){
                        echo '<option value="'.$curso->__get('nome_curso').'">' . $curso->__get('nome_curso') . '</option>';
                    }
                    ?> 
            </select>
        </div>
        <div class="button_aluno">
            <button type="submit">Inserir matrícula</button>
        </div>
    </form>
</div>