# My Store

Loja ficticia de produtos que permite realizar todas operações de um CRUD.

## Funcionalidades

![Listagem](/.github/screenshot1.jpg)
Imagens quebradas por conta do seeder :c

1. Filtrar pelo nome (Página home)
   Utilizando o query builder do Eloquent ORM (trecho do código)

```php
public function index(Request $request)
  {
      $inputSearch = $request->search;
      $products = Product::query();

      if ($inputSearch) {
          $products->where('name', 'like', "%$inputSearch%");
      }

      $products = $products->get();

      return view('index', compact('products'));
  }
```

2. Listar, Editar, Criar e Excluir produtos
   As operações foram feitas como um CRUD normal e a visualização foi feita utilizando os templates do Blade.
   ![Estrutura de das views](.github/screenshot2.jpg)

3. Validação dos campos de input (Criar, Editar)
   Separando a camada de validação do controller utilizando o FormRequest.
   ![Estrutura de das views](/.github/screenshot3.jpg)

## Como Rodar o Projeto

1. **Requisitos do Ambiente:**
   - Certifique-se de ter o PHP instalado. Você pode verificar a instalação usando o comando `php -v` no terminal.
   - Instale o Composer, que é o gerenciador de dependências do PHP. Consulte o [site oficial do Composer](https://getcomposer.org/) para obter instruções de instalação.
   - Instale o Laravel Installer globalmente usando o Composer: `composer global require laravel/installer`.
   - Certifique-se de ter um servidor de banco de dados (como MySQL, PostgreSQL ou SQLite) instalado e configurado.
   - Instale o Node.js e o npm para gerenciar dependências JavaScript. Consulte o [site oficial do Node.js](https://nodejs.org/) para obter instruções de instalação.

2. **Clone o Projeto:**
   - Clone o repositório do projeto do Laravel para o seu ambiente local usando Git. Vá para o diretório onde deseja armazenar o projeto e execute o seguinte comando:
     ```bash
     git clone https://github.com/adriel-mp3/crud-laravel.git nome-do-projeto
     ```

3. **Instale as Dependências do PHP:**
   - Navegue até o diretório do projeto e execute o seguinte comando para instalar as dependências do PHP:
     ```bash
     cd nome-do-projeto
     composer install
     ```

4. **Instale as Dependências do JavaScript (Tailwind CSS):**
   - Execute o seguinte comando para instalar as dependências do JavaScript usando o npm:
     ```bash
     npm install
     ```

5. **Crie um Arquivo de Configuração do Ambiente:**
   - Copie o arquivo `.env.example` para um novo arquivo chamado `.env`. Configure as informações do banco de dados e outras configurações necessárias no arquivo `.env`.

6. **Gere a Chave de Aplicação:**
   - Execute o seguinte comando para gerar a chave de aplicação no Laravel:
     ```bash
     php artisan key:generate
     ```

7. **Migrar o Banco de Dados:**
   - Execute as migrações do banco de dados para criar as tabelas necessárias:
     ```bash
     php artisan migrate
     ```

8. **Inicie o Servidor Embutido:**
   - Inicie o servidor embutido do Laravel com o seguinte comando:
     ```bash
     php artisan serve
     ```
     O servidor será iniciado em `http://localhost:8000` por padrão.

9. **Compilar os Recursos JavaScript e CSS:**
   - Execute o seguinte comando para compilar os recursos JavaScript e CSS:
     ```bash
     npm run dev
     ```

10. **Acesse o Projeto:**
    - Abra seu navegador e acesse `http://localhost:8000` para ver o projeto Laravel em execução.
