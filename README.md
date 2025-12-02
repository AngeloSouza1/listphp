# 🚀 Aplicação CodeIgniter 3 - Sistema de Gerenciamento de Produtos

Uma aplicação web moderna desenvolvida com **CodeIgniter 3**, demonstrando um sistema completo de CRUD (Create, Read, Update, Delete) para gerenciamento de produtos.

## ✨ Características

- ✅ **CRUD Completo**: Criar, visualizar, editar e deletar produtos
- ✅ **Design Moderno**: Interface com gradientes vibrantes e animações suaves
- ✅ **Validação de Formulários**: Validação robusta de dados no backend
- ✅ **Banco de Dados SQLite**: Fácil configuração sem necessidade de servidor MySQL
- ✅ **Arquitetura MVC**: Código organizado seguindo o padrão Model-View-Controller
- ✅ **Responsivo**: Interface adaptável para diferentes tamanhos de tela

## 📋 Pré-requisitos

- PHP 7.2 ou superior
- SQLite3
- Servidor web (Apache, Nginx) ou PHP built-in server

## 🚀 Como Executar

### Opção 1: Usando o servidor embutido do PHP (Recomendado para desenvolvimento)

```bash
cd /home/angelo/.gemini/antigravity/scratch/codeigniter-app
php -S localhost:8000
```

Depois acesse no navegador: **http://localhost:8000**

### Opção 2: Usando Apache

1. Configure o DocumentRoot do Apache para apontar para o diretório do projeto
2. Certifique-se de que o mod_rewrite está habilitado
3. Acesse através do navegador

## 📁 Estrutura do Projeto

```
codeigniter-app/
├── application/
│   ├── controllers/        # Controllers (Welcome, Produtos)
│   ├── models/            # Models (Produto_model)
│   ├── views/             # Views (templates, welcome, produtos)
│   ├── config/            # Configurações
│   └── database/          # Banco de dados SQLite
├── system/                # Core do CodeIgniter
├── index.php              # Ponto de entrada
└── .htaccess             # Configuração de URLs amigáveis
```

## 🎯 Funcionalidades

### Página Inicial
- Dashboard com cards informativos
- Links rápidos para principais funcionalidades
- Lista de recursos da aplicação

### Gerenciamento de Produtos
- **Listar Produtos**: Visualize todos os produtos em uma tabela elegante
- **Ver Detalhes**: Veja informações completas de cada produto
- **Criar Produto**: Adicione novos produtos com validação
- **Editar Produto**: Atualize informações de produtos existentes
- **Deletar Produto**: Remova produtos com confirmação

## 🗄️ Banco de Dados

O banco de dados SQLite já está configurado e populado com produtos de exemplo.

### Estrutura da Tabela `produtos`

| Campo         | Tipo          | Descrição                    |
|---------------|---------------|------------------------------|
| id            | INTEGER       | Chave primária (auto-increment) |
| nome          | VARCHAR(100)  | Nome do produto              |
| descricao     | TEXT          | Descrição detalhada          |
| preco         | DECIMAL(10,2) | Preço do produto             |
| estoque       | INTEGER       | Quantidade em estoque        |
| criado_em     | DATETIME      | Data de criação              |
| atualizado_em | DATETIME      | Data da última atualização   |

### Reiniciar o Banco de Dados

Para reiniciar o banco de dados com os dados de exemplo:

```bash
cd /home/angelo/.gemini/antigravity/scratch/codeigniter-app
rm application/database/codeigniter.db
sqlite3 application/database/codeigniter.db < application/database/schema.sql
```

## 🎨 Personalização

### Alterar Cores

As cores principais estão definidas no arquivo `application/views/templates/header.php`. 
Você pode personalizar os gradientes e cores alterando os valores CSS.

### Adicionar Novos Módulos

1. Crie um novo controller em `application/controllers/`
2. Crie o model correspondente em `application/models/`
3. Crie as views em `application/views/`
4. Adicione as rotas no menu do header

## 📝 Rotas Disponíveis

- `/` - Página inicial
- `/produtos` - Lista de produtos
- `/produtos/criar` - Formulário de criação
- `/produtos/ver/{id}` - Detalhes do produto
- `/produtos/editar/{id}` - Formulário de edição
- `/produtos/deletar/{id}` - Deletar produto

## 🔧 Configuração

### Base URL

A base URL está configurada em `application/config/config.php`:

```php
$config['base_url'] = 'http://localhost:8000/';
```

Altere conforme necessário para seu ambiente.

### Banco de Dados

A configuração do banco está em `application/config/database.php`. 
Por padrão, usa SQLite3 com o arquivo em `application/database/codeigniter.db`.

## 🛠️ Tecnologias Utilizadas

- **CodeIgniter 3.1.13** - Framework PHP
- **SQLite3** - Banco de dados
- **HTML5/CSS3** - Interface
- **PHP 7+** - Backend

## 📚 Próximos Passos

Sugestões para expandir a aplicação:

- [ ] Adicionar autenticação de usuários
- [ ] Implementar upload de imagens de produtos
- [ ] Criar sistema de categorias
- [ ] Adicionar paginação na lista de produtos
- [ ] Implementar busca e filtros
- [ ] Criar dashboard com gráficos
- [ ] Adicionar API REST
- [ ] Implementar carrinho de compras

## 📄 Licença

Este projeto é um exemplo educacional e está disponível para uso livre.

## 🤝 Contribuindo

Sinta-se à vontade para fazer fork, modificar e melhorar este projeto!

---

Desenvolvido com ❤️ usando CodeIgniter 3
# listphp
