# 📚 Sistema de Alunos, Cursos e Matrículas

Este projeto é um sistema simples de gerenciamento acadêmico desenvolvido em **PHP (MVC)**.  
Ele possui **CRUD completo** (Criar, Ler, Atualizar e Deletar) para as seguintes entidades:

- 🧑‍🎓 **Alunos**
- 📘 **Cursos**
- 📝 **Matrículas**

O objetivo é permitir o gerenciamento básico de informações acadêmicas de forma prática e didática, utilizando **PHP + MySQL** com **Composer Autoload**.

---

## ⚙️ Funcionalidades

✅ Cadastro de alunos  
✅ Cadastro de cursos  
✅ Cadastro de matrículas (vinculando alunos e cursos)  
✅ Listagem, edição e exclusão de registros  
✅ Arquitetura MVC com autoload via Composer  
✅ Conexão com banco de dados MySQL (via PDO)  

## 🖥️ Requisitos

Antes de executar o projeto, certifique-se de ter instalado:

- [PHP 8+](https://www.php.net/downloads)
- [Composer](https://getcomposer.org/download/)
- [XAMPP](https://www.apachefriends.org/pt_br/index.html)

---

## 🚀 Passo a Passo de Instalação

### 🧱 1. Instalar o XAMPP

1. Baixe e instale o **XAMPP** pelo link:  
   👉 [https://www.apachefriends.org/pt_br/index.html](https://www.apachefriends.org/pt_br/index.html)

2. Após instalar, abra o **Painel de Controle do XAMPP** e **inicie** os módulos:
   - ✅ **Apache**
   - ✅ **MySQL**

3. Acesse o **phpMyAdmin** no navegador:  
   [http://localhost/phpmyadmin](http://localhost/phpmyadmin)

4. Crie um novo banco de dados chamado:

   web_serv

   5. Importe o arquivo `web_serv.sql` que está na raiz do projeto:
- Clique em **Importar**
- Selecione o arquivo `web_serv.sql`
- Clique em **Executar**

---

### 🐘 2. Instalar o PHP

#### 🔹 Windows:

1. Baixe o PHP em:  
👉 [https://windows.php.net/download/](https://windows.php.net/download/)

2. Extraia o conteúdo em `C:\php`

3. Adicione o PHP ao **PATH** do sistema:
- Pesquise “variáveis de ambiente”
- Edite a variável `Path`
- Adicione:  
  ```
  C:\php
  ```

4. Verifique a instalação:
```bash

php -v

```
### 🧰 3. Instalar o Composer

Baixe o instalador do Composer:
👉 https://getcomposer.org/download/

Durante a instalação, o Composer detectará o executável do PHP automaticamente.

Após instalar, verifique no terminal:

        composer -V

### 📦 4. Instalar as dependências do projeto

No terminal, dentro da pasta do projeto, execute:

        composer install

Isso instalará o autoload do projeto e criará a pasta /vendor.

### 🌐 6. Iniciar o Servidor PHP

Agora, dentro da pasta do projeto, execute:

        php -S localhost:8080

O servidor embutido do PHP será iniciado.

Abra o navegador e acesse:

👉 http://localhost:8080

### 🛠️ Tecnologias Utilizadas

        PHP 8+

        Composer

        MySQL

        HTML/CSS

        PDO

### 👨‍💻 Desenvolvido por

        Leonardo Bonfanti
        Enzo Garcia
        João Altevir

### 🧾 Licença

Este projeto é de uso educacional e pode ser livremente utilizado para fins de aprendizado.
