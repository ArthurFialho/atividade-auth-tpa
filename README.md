# Sistema de Gestão de Estoque com Autenticação (Laravel)

## 💡 Visão Geral do Projeto
O projeto será um **sistema de gestão de estoque**, onde usuários autenticados (por exemplo, funcionários da empresa) poderão **gerenciar produtos**: cadastrar, visualizar, atualizar e remover itens. O sistema também deve garantir que **somente usuários logados** possam acessar essas funcionalidades.

***

## 1. Requisitos Funcionais

Estes descrevem **o que o sistema faz** do ponto de vista do usuário.

### 1.1. Autenticação de Usuário
- O sistema deve permitir **registro** de novos usuários, através da rota `/register`.
- O sistema deve permitir que usuários **façam login e logout** com email e senha, através da rota `/login`.
- Apenas usuários **autenticados** podem acessar as telas de produtos.

📘 *Dica:* use o Breeze para gerar o sistema de autenticação pronto. 

### 1.2. Gestão de Produtos
- Considere a rota `/products` como base para criar essas operações, criando uma rota de recurso completa.
- O usuário autenticado deve poder **cadastrar novos produtos**, com os campos:
  - Nome do produto (`string`)
  - Descrição (`text`)
  - Quantidade em estoque (`integer`)
  - Preço unitário (`decimal`)
- O usuário deve poder **visualizar uma lista de produtos** já cadastrados.
- O usuário deve poder **editar** informações de um produto existente.
- O usuário deve poder **remover** produtos do sistema.

📘 *Dica:* cada funcionalidade pode ser implementada criando um **CRUD completo** com `php artisan make:model Product -mcr`. Depois, edite a migration para incluir os campos e rode `php artisan migrate`.

### 1.3. Validação e Mensagens
- Campos obrigatórios devem ser validados (ex: nome, quantidade e preço).
- O sistema deve informar o usuário quando algo estiver incorreto no formulário (ex: “O campo nome é obrigatório.”).

📘 *Dica didática:* use a função `validate()` no controller, e mostre mensagens de erro usando o componente `@error` nas views Blade.

### 1.4. Organização Visual
- Crie um **layout base** (por exemplo, `layouts/app.blade.php`) com cabeçalho e menu de navegação.
- Mostre o nome do usuário logado no topo e um botão de logout.
- Liste os produtos em uma tabela simples.

📘 *Dica:* reuso de layouts com `@yield` e `@section`, fundamentais para manter consistência nas páginas.

***

## 2. Requisitos Técnicos

Estes tratam das **ferramentas, configurações e boas práticas**.

### 2.1. Ferramentas e Tecnologias
- Framework principal: **Laravel (versão 10 ou superior)**
- Banco de dados: **MySQL** (ou SQLite caso não consiga usar o MySQL)
- Front-end: **Blade Templates** e **Bootstrap** para estilização básica

### 2.2. Estrutura de Rotas
Organize as rotas no arquivo `routes/web.php` assim:
```php
// Página inicial (login ou dashboard)
Route::get('/', function() {
    return redirect()->route('login');
});

// Rotas protegidas por autenticação
Route::middleware(['auth'])->group(function() {
    Route::resource('products', ProductController::class);
});
```

📘 *Explicação:* o middleware `auth` impede acesso às rotas de produtos para quem não estiver logado.

### 2.3. Estrutura de Pastas e Arquivos
- `app/Models/Product.php` ➝ Modelo do produto.
- `app/Http/Controllers/ProductController.php` ➝ Controlador responsável pelo CRUD.
- `resources/views/produtos/` ➝ Contém as views: `index.blade.php`, `create.blade.php`, `edit.blade.php`, `show.blade.php`.

### 2.4. Segurança
- Utilize **CSRF protection** (Laravel faz isso automaticamente com `@csrf` nos formulários).
- Use middleware `auth` nas rotas restritas.

***

## 3. Etapas de Desenvolvimento
1. **Crie um novo projeto Laravel** com `laravel new estoque`.
2. **Configure o banco de dados** no `.env`.
3. **Gere o sistema de autenticação** (Laravel Breeze recomendado).
4. **Crie o modelo e CRUD de produtos.**
5. **Proteja as rotas com middleware `auth`.**
6. **Valide dados de formulário e exiba mensagens.**
7. **Melhore o layout com Blade e Bootstrap.**
8. **Realize testes navegando pelo sistema.**

***

## 4. Desafio Extra 
- Adicione um campo de **categoria** ao produto e implemente um filtro.
- Gere relatórios simples (por exemplo, produtos com estoque abaixo de 10 unidades).
- Permita uploads de imagens dos produtos usando `Storage::disk('public')`.


7. Testando o Sistema
7.1. Inicie o servidor
bash
php artisan serve
7.2. Fluxo de Teste
Registre um usuário em /register
Faça login em /login
Cadastre produtos em /products/create
Visualize a lista em /products
Edite um produto clicando no botão de editar
Visualize detalhes clicando no botão de visualizar
Delete um produto (com confirmação)
Teste o logout
8. Comandos Úteis
bash
# Limpar cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Recriar banco de dados
php artisan migrate:fresh

# Criar dados de teste (opcional)
php artisan make:factory ProductFactory
php artisan make:seeder ProductSeeder
📚 Conceitos Importantes Aplicados
✅ MVC (Model-View-Controller)
✅ Eloquent ORM (mapeamento objeto-relacional)
✅ Migrations (controle de versão do banco)
✅ Blade Templates (motor de templates)
✅ Middleware (proteção de ro

