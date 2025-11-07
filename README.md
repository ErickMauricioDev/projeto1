# Projeto 1 - Sistema Administrativo

## Descrição
Este projeto é um sistema administrativo feito em **PHP puro**, **HTML** e **CSS**, com gerenciamento de clientes, produtos e mensagens do Fale Conosco.

## Funcionalidades Implementadas
- Área pública com páginas: Home, Quem Somos, Clientes, Fale Conosco, Produtos.
- Área administrativa (somente login):
  - Visualizar mensagens do Fale Conosco.
  - Cadastrar, listar, editar e excluir produtos.
  - Cadastrar, listar, editar e excluir clientes.
- Proteção de páginas administrativas usando **sessões**.
- Layout básico com menu de navegação e estilo simples.

## Banco de Dados
- O banco de dados está disponível no arquivo `banco_projeto.sql`.
- Contém tabelas: `clientes`, `produtos`, `mensagens`.

## Como acessar
1. Importar o arquivo `banco_projeto.sql` no **phpMyAdmin** ou outro gerenciador MySQL.
2. Configurar o arquivo `config.inc.php` com as credenciais do banco.
3. Abrir `index.php` no navegador.
4. Para acessar a área administrativa:
   - Usuário: `admin`
   - Senha: `1234`

> Observação: Se algum recurso não aparecer, verifique se o banco de dados foi importado corretamente e se o servidor local (XAMPP, WAMP, etc.) está ativo.






Gupo: Davi Guedes Fragoso Vieira, Erick Mauricio Soares Almeida, Vitor Jales Ramos Diniz
