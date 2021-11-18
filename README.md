Configurar o .env
Rodar as migrations: php artisan migrate
Executar o seed do usuário admin no terminal: php artisan db:seed --class="UserSeeder"
Dados para o login:
E-mail: admin@targetit.com
Senha: 123456789

O usuário admin pode cadastrar outros usuários, definir permissões para estes usuários e cadastrar endereços. Ao cadastrar um endereço deve-se definir o usuário do endereço.

É possível também cadastrar endereços pela API através da rota (POST) '/api/cadastrarendereco' passando os dados como JSON, onde deve ser informado o token de verificação, exemplo:

{
    "token": "999999",
    "endereco": 
        {
            "logradouro": 'Estrada A',
            "bairro": 'Centro',
            "complemento": 'casa A',
            "numero": "5587",
            "cep": "22025002",
            "user_id": "1"
        }
}