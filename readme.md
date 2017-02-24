# strever.cn

Just tell how i build sth ugly. :dog:

一个纯markdown的博客。使用laravel+vue+mysql+redis等等打造

## Official Documentation

## deploy wizard

### 环境信息



本向导在一台纯净的`Ubuntu 16.04 LTS`虚拟机上完成

*注意`Ubuntu 16.04`的apt源默认安装php7,如果你的Ubuntu版本低于16.04,请将php替换为php7.0,例如`apt install php-fpm`改为`apt install php7.0-fpm`*

添加`your-domain`站点CNAME或A记录至VPS

### 安装nginx、php7、mysql-server、redis-server

```shell
$ sudo apt upgrade
$ sudo apt install zip unzip
$ sudo apt install nginx
$ sudo apt install php php-fpm php-mbstring php-xml php-zip php-mysql
$ sudo apt install redis-server
$ sudo apt install mysql-server
$ mysql -u root -p
$ > CREATE DATABASE your-dbname;
$ > GRANT ALL PRIVILEGES ON your-dbname.* TO 'your-dbuser'@'%' IDENTIFIED BY 'your-dbpassword';
$ > exit
$ sudo vim /etc/nginx/sites-available/your-domain.conf

//here is a demo
server {
	listen 80;
        root /home/ubuntu/Code/strever.cn/public;
        index index.php;
        server_name strever.cn www.strever.cn admin.strever.cn api.strever.cn;

        location / {
                try_files $uri $uri/ /index.php?$query_string;
        }

        location ~ \.php$ {
                include snippets/fastcgi-php.conf;

                fastcgi_pass unix:/run/php/php7.0-fpm.sock;
        }
}



$ sudo ln -s /etc/nginx/sites-available/your-domain.conf /etc/nginx/sites-enabled/your-domain.conf
$ sudo nginx -t
$ sudo nginx -s reload
```

### clone代码,添加配置信息

```shell
$ git clone git@github.com:strever/strever.cn.git
$ cd strever.cn
$ chmod -R 777 storage
$ vim .env
```
### 安装依赖

```shell
//安装composer
$ curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename composer
$ composer update -vvv
$ php artisan key:generate
$ php artisan migrate:refresh --seed
$ composer dump-autoload --optimize

//安装npm
$ sudo apt install nodejs npm nodejs-legacy
$ npm install
$ npm run production

```


### article demo

```
## redis相关

### redis 数据类型

- string

 binary safe string, 最大512M

- list

 链表，可用于实现对列

- set

 集合

- hash

- sorted set

### redis 常用命令

$ redis-cli -h 127.0.0.1 -p 6379
$ 127.0.0.1:6379> get an:redis:key
$ 127.0.0.1:6379> set an:redis:key 1

```

## 单元测试

`$ phpunit tests/user/UserTest.php`

## todo

- 静态资源托管到七牛
- markdown-it + markdown-it-footnote
- scout 全文搜索
- .md文件生成文章
- 任务计划抓取一些热门文章

## Contact

<strever@qq.com>

## Donate

You can offer me a coffee if helped you. :smile:

[Alipay](qmailme@qq.com)

## License

Licensed under the [MIT license](http://opensource.org/licenses/MIT).