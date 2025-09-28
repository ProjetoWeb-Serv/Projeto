<h2>Inserir Novo Aluno</h2>

<form id="formulario_alunos">
    <input type="text" name="nome_aluno" placeholder="Insira o nome do aluno">
    <input type="text" name="data_nascimento" placeholder="Insira a data de nascimento">
    <button type="submit">Inserir aluno</button>
</form>
<div id="message">
    
</div>

<script>
    document.getElementById("formulario_alunos").addEventListener("submit",async function(e) {
        e.preventDefault() 
        const formData = new FormData (this)
        try {
            const response = await fetch ("/web_client_t1/controller/control_inserir_aluno.php", {
                method:"POST", body:formData
            })
            const result = await response.text()
            document.getElementById("message").innerHTML = result
            setTimeout(() => {
                document.getElementById("message").innerHTML = ""
            }, 5000);
        } catch (error) {
            document.getElementById("message").innerHTML = "Falha ao cadastrar aluno ! :("
        }
    });
</script>
