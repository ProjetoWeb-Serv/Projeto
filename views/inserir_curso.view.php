<div class="curso_title">
    <h2>Inserir Novo Curso</h2>
</div>
    <form id="formulario_cursos" method="POST" action="/cursos/gravar">
        <div class="curso_nome">
            <input type="text" name="nome_curso" placeholder="Insira o nome do curso">

        </div>
        <div class="curso_carga_horaria">
            <input type="number" name="carga_horaria" placeholder="Insira a carga horária do curso (total de horas)">
            
        </div>
        <div class="button_curso">
            <button type="submit">Inserir curso</button>
            
        </div>
    </form>
    <div id="message">    
    </div>
