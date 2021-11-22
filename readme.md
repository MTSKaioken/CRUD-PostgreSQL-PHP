
## O projeto deve:

- [ x ] Create
- [ x ] Read
- [ x ] Update
- [ x ] Delete

## Requisistos
- Feito em PHP 8.0.13, então preferencialmente esta versão ou equivalente
- PostgreSQL ou um de sua preferência, desde que altere o ConnectionFactory e faça as devidas adaptações.
- ter o seguinte esquema de tabelas: 
```SQL

CREATE TABLE Tecnicos (
    Codigo SERIAL,  
    Nome VARCHAR(50) NOT NULL,
    Salario DECIMAL NOT NULL
)

CREATE TABLE Produtos (
    Codigo SERIAL,  
    Descricao VARCHAR(50) NOT NULL,
    Estoque DECIMAL NOT NULL,
    Ativo VARCHAR(3) NOT NULL,  /* 'on' or 'off' */
    Valor DECIMAL NOT NULL,
    Custo DECIMAL NOT NULL
)

CREATE TABLE Clientes(
    Codigo SERIAL,
    Nome VARCHAR(5O),
    CPF VARCHAR(11),
    Celular VARCHAR(11),                  
    Email VARCHAR(50)
)
```
## Etapas. 
1. Alterar as variaveis CRUD e USER dentro de ConnectionFactory

2. Iniciar o Servidor com o comando php -S [endereco]:[porta]

ex: php -S localhost:8000

# Feature's futuras :bulb:

- [ ] Implementar relacionamentos entre as tabelas e arrumar os tipos de dados da tabela Produtos.
- [ ] Implementar busca com filtros específicos.
- [ ] Estilizar os páginas
- [ ] Rota para redirecionamento de erro
- [ ] Consumir uma api
