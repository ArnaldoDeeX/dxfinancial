# DX Financial
DX Financial é um painel financeiro simples para controle de clientes, faturas e planos integrado com MercadoPago.

<img src="https://imgur.com/NISDbSc.png"/>
<img src="https://imgur.com/GIhGkdq.png"/>

<h2>📥 Instalando dependências</h2>
<pre>
composer install
</pre>

<h2>⚙️ Configuração do ENV</h2>
Copie o arquivo .env.example e renomeie como .env
Preencha as credenciais
<pre>
cp .env.example .env
</pre>

<h2>🚀 Criando banco de dados</h2>
<pre>
php artisan migrate
</pre>
<b>Operador padrão:</b><br>
Email: dxf@default.com<br>
Password: 123<br>

<h2>🔧 Ficha Técnica</h2>
<ul>
<li>Framework: Laravel 8</li>
<li>PHP Version: 7.*</li>
<li>Database: Mysql</li>
</ul>

<h2>📖 Licença</h2>
Este projeto está licenciado sob a licença MPL 2.0.