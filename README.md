#### 悦家丨叭滋食品内部系统

### 服务器环境
运行环境
```
- Nginx：1.19.1-alpine
- MySQL：8.0.13
- PHP7：7.4.7
- Redis：5.0.3-alpine
```

时区
```
Asia/Shanghai
```

### 部署
Git获取代码
```
git clone https://github.com/lufuhu/yuejia.git
```
进入项目目录 /yuejia
```
cp .env.example .env
```
修改配置
```
vim .env
```
```
APP_URL=

DB_HOST=
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

CACHE_DRIVER=redis

REDIS_HOST=

WECHAT_APP_ID=
WECHAT_APP_SECRET=
```

设置777权限
```
chmod -R 777 storage
chmod -R 777 bootstrap/cache
```
安装composer
```
composer install
```
生成key
```
php artisan key:generate
```
创建软链接
```
php artisan storage:link
```

