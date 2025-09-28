    <h2>Inserir Novo Curso</h2>

    <form id="formulario_cursos">
        <input type="text" name="nome_curso" placeholder="Insira o nome do curso">
        <input type="text" name="carga_horaria" placeholder="Insira a carga horária">
        <button type="submit">Inserir curso</button>
    </form>
    <div id="message">
        
    </div>
    
    <script>
        document.getElementById("formulario_cursos").addEventListener("submit",async function(e) {
            e.preventDefault() 
            const formData = new FormData (this)
            try {
                const response = await fetch ("/web_client_t1/controller/control_inserir_curso.php", {
                    method:"POST", body:formData
                })
                const result = await response.text()
                document.getElementById("message").innerHTML = result
                setTimeout(() => {
                    document.getElementById("message").innerHTML = ""
                }, 5000);
            } catch (error) {
                document.getElementById("message").innerHTML = "Falha ao cadastrar curso! :("
            }
        });
    </script>
