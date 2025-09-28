<div class="aluno_title">
    <h2>Inserir Novo Aluno</h2>
</div>

<form id="formulario_alunos" method="POST" action="/alunos/gravar">
    <div class="aluno_nome">
        <input type="text" name="nome_aluno" placeholder="Insira o nome do aluno">
    </div>
    <div class="aluno_nascimento">
        <input type="text" name="data_nascimento" placeholder="Insira a data de nascimento">
    </div>
    <div class="button_aluno">
        <button type="submit">Inserir aluno</button>
    </div>
</form>
<div id="message">
    
</div>
