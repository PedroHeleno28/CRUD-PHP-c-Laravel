## Faça o clone do repositório
    -> Pressione as teclas Crtl + Shift + P.
    -> Digite: 'Git: Clone' e selecione a opção.
    -> Cole a Url do repositório: https://github.com/PedroHeleno28/CRUD-PHP-c-Laravel.git

## Configure o arquivo .env com:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Automotivos
DB_USERNAME=root
DB_PASSWORD=

## Criçao do banco e das tabelas:
Rode o comando abaixo para fazer a criação do banco, tabelas e incluir registros para teste:
php artisan migrate --seed

## Acesso a área administrativa:
Usuário e senha para fazer o acesso:
usuário: fatap46950@limtu.com
senha: teste1234

## Rode o comando para iniciar o projeto: 
php artisan serve

## Acesse o endpoint '/home' para ir para a página inicial:
Acesso a área pública inicial, onde mostra as marcas cadastradas e os modelos cadastradors, além de opções na parte superior:
-   Home: Página inicial
-   Carros: Veículos cadastrados
-   Login: Acesso a área administrativa

<p align="center"><a target="_blank"><img src="https://i.ibb.co/SwC33P7M/Home.png" 
width="400" alt="Página Home"></a></p>

## Opção 'Carros':
Irá aparecer as opções de veículos e informações principais.
<p align="center"><a target="_blank"><img src="https://i.ibb.co/BVQnmyPF/Carros.png" 
width="400" alt="Página Home"></a></p>

## Ver detalhes: 
Clicar no botão "Ver detalhes" para acessar todas as informações do veículo.
<p align="center"><a target="_blank"><img src="https://i.ibb.co/27Mcgb88/Detalhes-pt1.png" 
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










<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
