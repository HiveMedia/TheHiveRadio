# The Hive Radio Website

![The Hive Radio](public/img/logo.png?raw=true)

This repo is a copy of [The Hive Radio's][1] website, here you can see how it works and even submit pull requests for new features or bug fixes!

## Version

'0.3.0'

## Technology

Our website and development environment is built off the following technologies:

* [PHP][11] (OOP Server Side Scripting)
* [Composer][5] (PHP Dependency Management)
* [Bower][13] (Front-End Package Management)
* [NPM][14] (Javascript Package Management)
* [Gulp][15] (Streaming Build System)
* [Laravel][4] (PHP MVC Framework)
* [Vagrant][6] (Local Development)
* [Memcached][7] (Distributed Memory Object Caching System)
* [CentOS][8] (Enterprise Based Linux Distro)
* [NGINX][9] (Lightweight Web Server)
* [MariaDB][10] (SQL DBMS)


## Developing Locally

* Install [Vagrant][6]
* Install Vagrant [Hostsupdater Plugin][12]
* Open a Shell in the root of this repo
* Run `vagrant up` in the shell.
* Once the box is online run `vagrant ssh`
* `cd /var/www/html && sudo /usr/local/composer udpate`
* `bower update`
* `npm update`
* `./node_modules/.bin/gulp`
* Run `mysql -u root` then query `create database THR_CMS;`
* `php artisan migrate`
* `php artisan db:seed`

This will create the following default accounts:

| Username                  | Password             |
|:--------------------------|:---------------------|
| admin@local.host          | admin                |
| showHost@local.host       | showHost             |
| showStaff@local.host      | showStaff            |
| Editor@local.host         | Editor               |
| Commenter@local.host      | Commenter            |


## Config

    APP_DEBUG=true
    APP_ENV=dev
    
    DB_HOST=localhost
    DB_DATABASE=THR_CMS
    DB_USERNAME=root
    DB_PASSWORD=
    
    CACHE_DRIVER=memcached
    SESSION_DRIVER=memcached
    
    ICECAST_HOST=127.0.0.1
    ICECAST_PORT=8000
    ICECAST_USER=
    ICECAST_PASS=
    
    ShoutIRC_HOST=127.0.0.1
    ShoutIRC_PORT=9050
    ShoutIRC_USER=
    ShoutIRC_PASS=
    
    COVERS_API_KEY=
    COVERS_NF_IMG=public/img/unknown_artist.png
    COVERS_CACHE_TIME=24
    
    SMTP_HOST=smtp.mailgun.org
    SMTP_PORT=
    SMTP_USR=
    SMTP_PASS=
    MAILGUN_DOMAIN=
    MAILGUN_SECRET=
    MAIL_FROM=no-reply@mg.hiveradio.net
    MAIL_NAME='Hive Radio'

## License and Author

|                      |                                                    |
|:---------------------|:---------------------------------------------------|
| **Author**           | Liam Haworth (<liam.haworth@hivemedia.net.au>)     |
| **Author**           | Kyle Hunter (<kyle.hunter@hivemedia.net.au>)       |
|                      |                                                    |
| **Copyright**        | Copyright (c) 2015, Hive Media Productions.        |

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.

[1]: https://hiveradio.net
[2]: http://opensource.org/licenses/MIT
[3]: https://github.com/laravel/laravel
[4]: http://laravel.com/
[5]: https://getcomposer.org/
[6]: http://www.vagrantup.com/
[7]: http://memcached.org/
[8]: http://centos.org/
[9]: http://nginx.org/
[10]: http://mariadb.com
[11]: https://php.net/
[12]: https://github.com/cogitatio/vagrant-hostsupdater
[13]: http://bower.io
[14]: http://npmjs.com
[15]: http://gulpjs.com