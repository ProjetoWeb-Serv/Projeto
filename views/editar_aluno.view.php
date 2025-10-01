<div class="aluno_title">
    <h2>Edite o Aluno</h2>
</div>

<form id="formulario_alunos" method="POST" action="/alunos/gravar">
    <div class="aluno_nome">
        <input type="text" name="nome_aluno" value="<?php echo isset($Aluno) ? htmlspecialchars($Aluno->__get('nome_aluno')) : ''; ?>" placeholder="Insira o nome do aluno">
    </div>
    <div class="aluno_nascimento">
        <input type="date" name="data_nascimento" value="<?php echo isset($Aluno) ? htmlspecialchars($Aluno->__get('data_nascimento')) : ''; ?>" placeholder="Insira a data de nascimento">
    </div>
    <div class="button_aluno">
        <button type="submit">Inserir aluno</button>
    </div>
</form>
