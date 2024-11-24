# SATE - Sistema de Agendamento de Transporte Extraclasse

## CONFIGURAÇÃO INICIAL
Renomeie o arquivo `.env.exemple` para `.env` e preencha com as informações necessárias

Execute no terminal `composer install`

Use o arquivo `sql\database_structure` para fazer um dump da estrutura do banco de dados

## AMBIENTE DE DESENVOLVIMENTO
* Para rodar a aplicação em desenvolvimento, execute:

### a partir do Composer:
```bash
composer start
```

### diretamente:

* dentro do diretório `public/`:
```bash
cd public
php -S localhost:8080
```
ou

```bash
php -S localhost:8080 -t public
```

Abra o navegador com a url: [http://localhost:8000](http://localhost:8000)
