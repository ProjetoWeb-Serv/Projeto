<div class="curso_title">
    <h2>Editar Curso</h2>
</div>
    <form id="formulario_cursos" method="POST" action="/cursos/modificar">
        <input type="hidden" name="id" value="<?php echo isset($Curso) ? htmlspecialchars($Curso->__get('id')) : ''; ?>">
        <div class="curso_nome">
            <input type="text" name="nome_curso" value="<?php echo isset($Curso) ? htmlspecialchars($Curso->__get('nome_curso')) : ''; ?>" placeholder="Insira o nome do curso">

        </div>
        <div class="curso_carga_horaria">
            <input type="number" name="carga_horaria" value="<?php echo isset($Curso) ? htmlspecialchars($Curso->__get('carga_horaria')) : ''; ?>" placeholder="Insira a carga horária do curso (total de horas)">
            
        </div>
        <div class="button_curso">
            <button type="submit">Editar curso</button>
            
        </div>
    </form>