# TESTES — Portal do Aluno

Ambiente: PHP 8.3 (servidor embutido: `php -S 127.0.0.1:8099`). Testes feitos com requisições HTTP reais (curl, com cookie de sessão).

| # | Cenário | Entrada | Resultado esperado | Resultado obtido |
|---|---------|---------|--------------------|------------------|
| 1 | Primeiro acesso | Abrir `index.php` | Título, links e rodapé aparecem | OK |
| 2 | Nome não informado | Nome em branco, e-mail e idade válidos | Erro "O nome não pode estar vazio." | OK |
| 3 | E-mail inválido | Mariana Oliveira / mariana.com / 21 | Erro de e-mail e volta ao formulário | OK |
| 4 | Idade inválida | Ana / ana@senac.br / 0 | Erro "A idade deve ser um número inteiro maior que zero." | OK |
| 5 | Cadastro válido | Ana Souza / ana@senac.br / 22 | Redireciona ao resultado com dados e mensagem de sucesso | OK |
| 6 | Atualizar página | F5 no resultado | Dados continuam, mensagem de sucesso some | OK |
| 7 | Encerrar sessão | Acessar `logout.php` e depois `resultado.php` | "Nenhum aluno cadastrado nesta sessão." | OK |
| 8 | HTML no nome | `<h1>Ana</h1>` | Exibido como texto (`&lt;h1&gt;`) | OK |
| 9 | Preservação de dados | Carlos / xxx / 30 | Formulário volta com os 3 valores preenchidos | OK |

Testes extras:
- Acessar `processar_cadastro.php` direto (GET): redireciona para `cadastro.php` (302).
- Mensagem de erro some ao recarregar `cadastro.php`.
- Campo ausente no POST: tratado como erro, sem warnings.
- `php -l` em todos os arquivos: sem erros de sintaxe.
