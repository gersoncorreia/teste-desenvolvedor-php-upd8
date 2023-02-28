<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sistema de cadastro de clientes

Este presente projeto foi desenvolvido para fins de aplicar conhecimentos e práticas desenvolvimento, ainda está em desenvolvimento. Foi utilizado Laravel PHP com VueJs, Inertia Taiwind. Também foi utilizado o kit start Breeze do Laravel para agilizar o desenvolvimento, com isso foi implementado de forma extra o sistema de login básico.

- [Laravel PHP](https://laravel.com).
- [Inertia](https://inertiajs.com/).
- [VueJs](https://vuejs.org/).
- [Taiwind](https://tailwindcss.com/).
- [Kti Start Breeze Laravel](https://laravel.com/docs/10.x/starter-kits#laravel-breeze)

## Manuseio do sistema

Como solicitado pela empresa, para o rodar o projeto localmente tem alguns passos a serem feitos:

- Criar banco de dados com nome db_teste_desenvolvedor_php.
- Usar o arquivo .env.example para poder ter acesso as configurações de ambiente.
- Usar o comando php artisan migrate para rodar as migrations do banco.
- Usar o comando php artisan db:seed, para criar os dados fakes. Obs: nessa seeds já e criando um usuário exemplo para ter acesso.
- Usar o comando php artisan serve para rodar o sistema.
- Usar o comando npm run dev, para rodar o vite e os assest do front junto com o VueJs

### Usuário Teste

Usuário para acessar o sistema:
    - login: test@example.com
    - senha: password

## Observações
Pode-se acontecer alguns bugs com relação autenticação, pois não deu tempo de fazer as correções, caso a tela não mostre nenhuma informação e possivel que o tempo de sessão tenha acabado e precise atualizar a pagina para se autenticar de novo.

