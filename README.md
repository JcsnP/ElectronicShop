# ใน common-> models -> User ให้เปลี่ยน function CollectionName() ตามนี้
    'public static function CollectionName()
    {
        return ['ElectronicShop','users'];
    }'
# ใน common->config->main-local <br> ใช้ connection mongodb ตามนี้
    'mongodb' => [
            'class' => '\yii\mongodb\Connection',
            'dsn' => 'mongodb+srv://root:*****@db01.uyg1g.mongodb.net/test',
            'defaultDatabaseName'=>'ElectronicShop'
    ]
# โดยให้ create database in mongocompass ก่อน ตั้งชื่อว่า ElectronicShop<p/>

<h2>
    <p>
        หากไม่สามารถเปิดหน้าได้ โดยมันแจ้ง error เรื่อง vendor ให้ทำการติดตั้ง composer
    </p>
    <p>
        <a href="https://l.messenger.com/l.php?u=https%3A%2F%2Fwww.hostinger.com%2Ftutorials%2Fhow-to-install-composer&h=AT0rkU2-uep1u58ROZZjOnmXiCRFYmJXf_FLF0ZksjOAImRTzCPGDNrY3QM3X4lPWZpnm7e0j8ZBVuQzCnWwmUJxgwm1dejGpCJVRBbktwxC3g8eI6jdP1H2_1YNEL26PgPrBQ">การติดตั้ง composer</a>
        <br> และใช้คำสั่ง <code>composer install</code> ในโฟลเดอร์ของ ElectronicShop
    </p>
    <p>หากมีปัญหากรุณาเปิด issue</p>
</h2>

<p>
    <h3>ลิ้งของ Template</h3>
    <a href="https://themewagon.com/themes/free-bootstrap-4-html5-ecommerce-website-template-aranoz/">Frontend Template</a>
</p>

<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <br>
</p>

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![build](https://github.com/yiisoft/yii2-app-advanced/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-advanced/actions?query=workflow%3Abuild)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
