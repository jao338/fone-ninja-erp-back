# Fone Ninja - Desafio Técnico

Este projeto utiliza **Laravel + Nginx + PHP-FPM + MySQL** rodando em containers Docker.
Os arquivos sensíveis ou específicos de ambiente **não são versionados**; para isso, são fornecidos arquivos `.example` e `-dev` que devem ser copiados e configurados localmente.

## 🔐 Autenticação

A API utiliza autenticação via **Laravel Sanctum**.

Fluxo:
1. POST `/api/login`
2. Recebe token
3. Enviar token via header:

## 🔗 Principais endpoints

### Login
POST `/api/login`

### Produtos
GET `/api/products`
POST `/api/products`

### Compras
POST `/api/shopping`
DELETE `/api/shopping/{uuid}`

### Vendas
POST `/api/sale`
DELETE `/api/sales/{uuid}`


---

## 📁 Estrutura de arquivos

Os seguintes arquivos **não são versionados** e devem ser criados a partir dos exemplos:

| Arquivo base                      | Deve ser copiado para     |
| --------------------------------- | ------------------------- |
| `docker-compose-dev.yml`          | `docker-compose.yml`      |
| `.env.example`                    | `.env`                    |
| `nginx/conf/default.conf.example` | `nginx/conf/default.conf` |

---

## 🚀 Instalação e configuração inicial

### 1️⃣ Clone o repositório

```bash
git clone https://github.com/jao338/fone-ninja-erp-back.git
cd fone-ninja-erp-back
```

---

### 2️⃣ Criar os arquivos de configuração locais

Copie os arquivos de exemplo:

```bash
cp docker-compose-dev.yml docker-compose.yml
cp .env.example .env
cp nginx/conf/default.conf.example nginx/conf/default.conf
```

---

### 3️⃣ Configurar o arquivo `.env`

Edite o arquivo `.env` e ajuste, no mínimo, as configurações de banco de dados para Docker:

```env
DB_CONNECTION=mysql
DB_HOST=docker_example_mysql
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
DB_ROOT_PASSWORD=senha_root

SESSION_DRIVER=file
```

> ⚠️ O valor de `DB_HOST` **deve ser exatamente o nome do serviço MySQL** definido no `docker-compose.yml`.

Após isso, gere a chave da aplicação (mais adiante).

---

### 4️⃣ Configurar o `default.conf` do Nginx

Edite o arquivo `nginx/conf/default.conf` e **substitua o placeholder** abaixo:

```nginx
fastcgi_pass nome_do_servico_do_php:9000;
```

Pelo nome correto do serviço PHP:

```nginx
fastcgi_pass php:9000;
```


---

### 5️⃣ Subir os containers

Na raiz do projeto, execute:

```bash
docker-compose up -d --build
```

Verifique se todos os containers estão em execução:

```bash
docker-compose ps
```

---

### 6️⃣ Instalar dependências do Laravel (Composer)

Utilize o container de Composer:

```bash
docker-compose run --rm composer install --ignore-platform-reqs
```

---

### 7️⃣ Gerar a chave da aplicação

```bash
docker-compose exec php php artisan key:generate
```

---

## 🔐 Ajuste de permissões

Como o projeto utiliza **volumes bindados**, é necessário ajustar as permissões para que o PHP-FPM consiga escrever nos diretórios do Laravel.

Execute **no host**, na raiz do projeto:

```bash
sudo chown -R 82:82 storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

> O UID `82` corresponde ao usuário `www-data` no Alpine Linux.

Sem esse passo, erros como o abaixo ocorrerão:

```
Failed to open stream: Permission denied
```

---

## 🌐 Criar base de dados e popular base de dados

Depois de ter configurado sua variável de ambiente, instalado todas as dependências e subido os serviços, faça:
Com alguma ferramenta como o MySql Workbench, crie a sua base de dados:

```
CREATE DATABASE nome_do_banco;
```

Agora que a base de dados foi criada, rode o seguinte comando na raiz do projeto: 

```
docker-compose run --rm php php artisan migrate:fresh --seed
```

Depois de rodar esses comandos, as tabelas foram populadas com dados fictícios.
O seeder vai criar um usuário padrão do sistema. Esse usuário recém criado é assim:

```
{
    "nome": "admin",
    "email": "admin@teste.com",
}
```
A senha é a mesma definida na chave "DEFAULT_PASSWORD" na variável de ambiente
Para testar a aplicação, use esse usuário ou crie outro.

---

## 🌐 Acesso à aplicação

Após todos esses passos, acesse:

```
http://localhost
```
