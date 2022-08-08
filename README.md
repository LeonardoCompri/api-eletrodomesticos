# api-eletrodomesticos
API com um CRUD básico com Laravel 9.

No repositório possui uma coleção do Postman com todas as requisições que a API possui.
Importe a coleção para o Postman para assim conseguir testar as chamadas.

Também foi feita algumas páginas com Blade que também possibilita a utilização da API porém diretamente pelo navegador.

Foi utilizado o Sail para rodar a aplicação em Laravel, então verifique se as portas 3306 e 8001 estão livres para ser possivel subir o banco de dados MySQL e a aplicação em Laravel.

Abra o terminal e acesse a pasta 'api_laravel' e rode o comando: <br/>
<b> alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail' </b>

Com essa linha será mais fácil para fazer os comandos do Sail utilizando apenas a palavra 'sail' ao invês de utilizar o caminho inteiro do arquivo.

No repositório foi incluido o arquivo '.env' já com as configurações certas para subir o projeto

Então execute o comando, para subir a aplicação: <br/>
<b> sail up -d </b>

Após subir o projeto faça a migração do banco com alguns dados, com o comando: <br/>
<b> sail artisan migrate --seed </b>

Assim o banco será criado e já será inserido alguns eletrodomésticos e as marcas e você já pode utilizar a aplicação.

Acesse: <br/>
<b> http://localhost:8001 </b>

Pronto! 

# Rotas da API

<u> List appliances </u> <br/>
<u> GET </u> <br/>
Listagem com paginação dos eletrodomésticos;

<i> http://localhost:8001/api/appliances </i>

Resposta:
<pre>
{
    "appliances": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "name": "Geladeira Frost Free",
                "description": "Este produto é totalmente versátil. Tudo para ser personalizado para comportar o que você preferir.",
                "voltage": 110,
                "brand_id": 1,
                "created_at": "2022-08-08T15:11:53.000000Z",
                "updated_at": "2022-08-08T19:39:48.000000Z",
                "deleted_at": null,
                "brand": {
                    "id": 1,
                    "name": "Electrolux",
                    "created_at": "2022-08-08T15:11:53.000000Z",
                    "updated_at": null
                }
            },
            {
                "id": 2,
                "name": "Televisão LCD",
                "description": "Muito bom",
                "voltage": 110,
                "brand_id": 2,
                "created_at": "2022-08-08T15:11:53.000000Z",
                "updated_at": "2022-08-08T20:53:57.000000Z",
                "deleted_at": null,
                "brand": {
                    "id": 2,
                    "name": "Brastemp",
                    "created_at": "2022-08-08T15:11:53.000000Z",
                    "updated_at": null
                }
            },
            {
                "id": 3,
                "name": "Monitor 4K",
                "description": "Produto em bom estado.",
                "voltage": 110,
                "brand_id": 5,
                "created_at": "2022-08-08T15:11:53.000000Z",
                "updated_at": null,
                "deleted_at": null,
                "brand": {
                    "id": 5,
                    "name": "LG",
                    "created_at": "2022-08-08T15:11:53.000000Z",
                    "updated_at": null
                }
            },
            {
                "id": 4,
                "name": "Microondas",
                "description": "Produto com marcas de uso.",
                "voltage": 220,
                "brand_id": 2,
                "created_at": "2022-08-08T15:11:53.000000Z",
                "updated_at": null,
                "deleted_at": null,
                "brand": {
                    "id": 2,
                    "name": "Brastemp",
                    "created_at": "2022-08-08T15:11:53.000000Z",
                    "updated_at": null
                }
            }
        ],
        "first_page_url": "http://localhost:8001/api/appliances?page=1",
        "from": 1,
        "last_page": 2,
        "last_page_url": "http://localhost:8001/api/appliances?page=2",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://localhost:8001/api/appliances?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": "http://localhost:8001/api/appliances?page=2",
                "label": "2",
                "active": false
            },
            {
                "url": "http://localhost:8001/api/appliances?page=2",
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "next_page_url": "http://localhost:8001/api/appliances?page=2",
        "path": "http://localhost:8001/api/appliances",
        "per_page": 4,
        "prev_page_url": null,
        "to": 4,
        "total": 8
    },
    "filter": null
}
</pre>

-----------------------------------------------------

<u> Store appliance </u> <br/>
<u> POST </u> <br/>
Inserção de novo eletrodomésticos;

<i> http://localhost:8001/api/appliance/store </i>

Dados:
<pre>
{
    "name": "Teste 2",
    "voltage": 110,
    "brand_id": 2,
    "description": "Testando"
}
</pre>

Resposta:
<pre>
{
    "message": "Appliance created!"
}
</pre>

-----------------------------------------------------

<u> Get appliance </u> <br/>
<u> GET </u> <br/>
Dados de eletrodoméstico;

<i> http://localhost:8001/api/appliance/2/edit </i>

Resposta:
<pre>
{
    "appliance": {
        "id": 2,
        "name": "Televisão LCD",
        "description": "Produto novo.",
        "voltage": 110,
        "brand_id": 5,
        "created_at": "2022-08-08T21:29:27.000000Z",
        "updated_at": null,
        "deleted_at": null
    },
    "brands": [
        {
            "id": 1,
            "name": "Electrolux",
            "created_at": "2022-08-08T21:29:27.000000Z",
            "updated_at": null
        },
        {
            "id": 2,
            "name": "Brastemp",
            "created_at": "2022-08-08T21:29:27.000000Z",
            "updated_at": null
        },
        {
            "id": 3,
            "name": "Fischer",
            "created_at": "2022-08-08T21:29:27.000000Z",
            "updated_at": null
        },
        {
            "id": 4,
            "name": "Samsung",
            "created_at": "2022-08-08T21:29:27.000000Z",
            "updated_at": null
        },
        {
            "id": 5,
            "name": "LG",
            "created_at": "2022-08-08T21:29:27.000000Z",
            "updated_at": null
        }
    ]
}
</pre>

-----------------------------------------------------

<u> Update appliance </u> <br/>
<u> PUT </u> <br/>
Atualizar o eletrodoméstico;

<i> http://localhost:8001/api/appliance/2 </i>

Dados:
<pre>
{
    "name": "Televisão LCD",
    "voltage": 110,
    "brand_id": 2,
    "description": "Muito bom"
}
</pre>

Resposta:
<pre>
{
    "message": "Appliance updated!"
}
</pre>

-----------------------------------------------------

<u> Delete appliance </u> <br/>
<u> DELETE </u> <br/>
Apagar o eletrodoméstico;

<i> http://localhost:8001/api/appliance/2/delete </i>

Resposta:
<pre>
{
    "message": "Appliance deleted!"
}
</pre>

-----------------------------------------------------