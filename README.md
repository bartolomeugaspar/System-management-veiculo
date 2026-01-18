# Sistema de Gestão de Manutenção de Veículos

Este é um sistema web para gestão de manutenção de veículos, desenvolvido em PHP, MySQL, HTML, CSS e JavaScript.

## Funcionalidades

- **Dois níveis de acesso**: Administrador e Operador/Técnico
- Cadastro de veículos, proprietários, agendamentos, manutenções e alertas
- Relatórios para administradores
- Autenticação segura com sessões

## Instalação Local (XAMPP/WAMP)

1. **Instalar XAMPP ou WAMP**: Baixe e instale o XAMPP (https://www.apachefriends.org/) ou WAMP (http://www.wampserver.com/).

2. **Iniciar serviços**: Abra o XAMPP Control Panel e inicie Apache e MySQL.

3. **Criar banco de dados**:
   - Abra o phpMyAdmin (http://localhost/phpmyadmin).
   - Crie um novo banco de dados chamado `vehicle_maintenance`.
   - Importe o arquivo `sql/database.sql` para criar as tabelas.

4. **Configurar conexão**:
   - Edite `config/database.php` se necessário (usuário e senha padrão do MySQL são 'root' e vazio).

5. **Copiar arquivos**:
   - Copie toda a pasta do projeto para `htdocs` (XAMPP) ou `www` (WAMP).

6. **Acessar o sistema**:
   - Abra o navegador e vá para `http://localhost/nome-da-pasta/login.php`.
   - Login padrão: usuário `admin`, senha `admin123` (lembre-se de alterar a senha no banco).

## Estrutura do Projeto

- `assets/`: CSS e JS
- `config/`: Configuração do banco
- `controllers/`: Lógica de controle
- `models/`: Modelos de dados
- `views/`: Interfaces
- `sql/`: Script do banco

## Tecnologias

- PHP 7+
- MySQL
- HTML5, CSS3, JavaScript

## Notas

- Senhas são encriptadas com password_hash.
- Sessões são usadas para controle de acesso.
- Apenas administradores podem gerir utilizadores e ver relatórios completos.