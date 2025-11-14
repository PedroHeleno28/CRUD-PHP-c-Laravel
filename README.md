## Faça o clone do repositório
    -> Pressione as teclas Crtl + Shift + P.
    -> Digite: 'Git: Clone' e selecione a opção.
    -> Cole a Url do repositório: https://github.com/PedroHeleno28/CRUD-PHP-c-Laravel.git

## Instale o composer
```bash 
composer install
```

## Renomeia o arquivo .env.exemple
- Se não rodar, copiar o nome do arquivo e colar onde está '.env.example'
```bash 
mv .env.exemple .env
```

## Cria a chave de criptografia
```bash 
php artisan key:generate
```

## Configure o arquivo .env com:
```bash 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Automotivos
DB_USERNAME=root
DB_PASSWORD=
```

## Criação do banco e das tabelas:
Rode o comando abaixo para fazer a criação do banco, tabelas e incluir registros para teste:
```bash 
php artisan migrate --seed
```

## Acesso a área administrativa:
Usuário e senha para fazer o acesso:
```bash
usuário: fatap46950@limtu.com
senha: Teste1234
```

## Rode o comando para iniciar o projeto:
```bash 
php artisan serve
```

## Página inicial:
Acesso a área pública inicial, onde mostra as marcas cadastradas e os modelos cadastradors, além de opções na parte superior:
-   Home: Página inicial
-   Carros: Veículos cadastrados
-   Login: Acesso a área administrativa

<p align="center"><a target="_blank"><img src="https://i.ibb.co/SwC33P7M/Home.png" 
width="400" alt="Página Home"></a></p>

## Opção 'Carros':
Irá aparecer as opções de veículos e informações principais.
<p align="center"><a target="_blank"><img src="https://s10.aconvert.com/convert/p3r68-cdx67/as7kl-bxls0.png" 
width="400" alt="Página Home"></a></p>

## Ver detalhes: 
Clicar no botão "Ver detalhes" para acessar todas as informações do veículo.
<p align="center"><a target="_blank"><img src="https://s10.aconvert.com/convert/p3r68-cdx67/aehox-rezf8.png" 
width="400" alt="Página Home"></a></p>
<p align="center"><a target="_blank"><img src="https://i.ibb.co/Myx5PXsf/Detalhes-pt2.png" 
width="400" alt="Página Home"></a></p>

## Opção 'Login':
Será redirecionado a tela de login, como na tela abaixo:
*Se não tiver login, cadastrar clicando no "Cadastre-se"
<p align="center"><a target="_blank"><img src="https://i.ibb.co/rRypFr6Y/Login.png"
 width="400" alt="Página Home"></a></p>

## Cadastrar-se
Criar o cadastro para ter acesso a área administrativa.
<p align="center"><a target="_blank"><img src="https://i.ibb.co/7tGTfnHv/Cadastro.png" 
width="400" alt="Página Home"></a></p>

## Área administrativa
Todos os formulários tem o mesmo padrão. 
- Tabela com os registros gravados;
    - No cabeçalho, informções principais e botão para "Incluir";
    - Em cada registro tem a opção de editar ou excluir;

<p align="center"><a target="_blank"><img src="https://i.ibb.co/3VyKSHv/Ve-culos-Adm.png" 
width="400" alt="Página Home"></a></p>
<p align="center"><a target="_blank"><img src="https://i.ibb.co/KpdDhtjB/Inclus-o-de-Ve-culos.png" 
width="400" alt="Página Home"></a></p>
<p align="center"><a target="_blank"><img src="https://i.ibb.co/8LtyN1ZQ/Alterar-Ve-culos.png" 
width="400" alt="Página Home"></a></p>    

## Alteração de dados do usuário
No canto superior esquerdo, tem um ícone de pessoa, nele há 3 opções:
    - Meus dados: Alterar dados de usuário;
    - Alterar senha: Fazer a alteração de senha;
    - Logout: Encerrar a sessão logada;
+ Há outro botão, 'Home' em cima do ícone para acessar a Home mesmo logado, para voltar, basta clicar na opção 'Login' novamente. 
<p align="center"><a target="_blank"><img src="https://i.ibb.co/pv68Lrjt/Logout.png" 
width="400" alt="Página Home"></a></p>  

<p align="center"><a target="_blank"><img src="https://i.ibb.co/jdcmWRh/profile.png" 
width="400" alt="Página Home"></a></p>

<p align="center"><a target="_blank"><img src="https://i.ibb.co/Nd7Hj9NL/Alt-Senha.png" 
width="400" alt="Página Home"></a></p>
