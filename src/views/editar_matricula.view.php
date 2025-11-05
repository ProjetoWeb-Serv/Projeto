<div class="matricula_title">   
    <h1>Editar matrícula</h1>
</div>

<div class="form_matricula">
    <form id="formulario_matriculas" method="POST" action="/matriculas/modificar">
        <input type="hidden" name="id" value="<?php echo isset($Matricula) ? htmlspecialchars($Matricula->__get('id')) : ''; ?>">
        <div class="select_div">
            <p class="select_aluno">Selecione o aluno</p>
            <select id="aluno" name="id_aluno">
                    <?php 
                    foreach($_SESSION['alunos'] as $aluno){
                        $selected = '';
                        if($aluno->__get('id') == $Matricula->__get('id_aluno')) {
                            $selected = 'selected';
                        }
                        echo '<option value="'.$aluno->__get('id').'" ' . $selected . '>'
                        . $aluno->__get('nome_aluno') . '</option>';
                    }
                    ?> 
            </select>
        </div>
        <div class="select_div">
            <p class="select_curso">Selecione o curso</p>
            <select id="curso" name="id_curso">
                    <?php 
                    foreach($_SESSION['cursos'] as $curso){
                        $selected = '';
                        if($curso->__get('id') == $Matricula->__get('id_curso')) {
                            $selected = 'selected';
                        }
                        echo '<option value="'.$curso->__get('id').'"'. $selected .'>' . $curso->__get('nome_curso') . '</option>';
                    }
                    ?> 
            </select>
        </div>
        <div class="button_aluno">
            <button type="submit">Modificar matrícula</button>
        </div>
    </form>
</div>