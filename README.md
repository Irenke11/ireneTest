啟動專案 (nginx + mysql)
docker-compose up -d nginx mysql
docker-compose up nginx mysql

進入 workspace 容器:
docker-compose exec workspace bash

docker-machine env
@FOR /f "tokens=*" %i IN ('docker-machine env') DO @%i
mysql passwad :irene  Irenke789456123

SET DOCKER_HOST=tcp://192.168.99.100:2376

docker-compose exec php-fpm id www-data
uid=1000(www-data) gid=1000(www-data) groups=1000(www-data)

chown -R 1000:1000 ../www/storage/
sudo chown -R $USER ~/.npm

npm install --verbose
mysql port 3307
root password 123456
repeat password 123456
php artisan config:cache  让config可以调用的指令
php artisan make:model Flight --all 可以用这个一次全健好

migration
php artisan make:migration create_players_table --table=players
     php artisan make:migration create_account_player_table --table=accountPlayer

php artisan make:migration create_bets_table --table=bets
php artisan make:migration create_gameList_table --table=gameList
php artisan make:migration create_dailySettlement_table --table=dailySettlement
php artisan migrate

controller
php artisan make:controller Backend/PlayerController --resource
php artisan make:controller Backend/GamesController --resource
php artisan make:controller Backend/BetsController --resource
php artisan make:controller Backend/DailyController --resource

model&seed
php artisan make:model Backend/Players --seed
php artisan make:model Backend/Games --seed
php artisan make:model Backend/Bets --seed
php artisan make:model Backend/Daily 

['en'=>'endefault','cn'=>'cndefault','tw'=>'twdefault']


Php laravel 框架（api、排程），前端搭配vue.js，資料庫使用mysql
（可上網找example套用，API、排程邏輯、ＤＢ資料表自己寫）
使用docker compose 開發

玩家維護功能
（新增、查詢，玩家帳號、名稱、幣別）

遊戲維護功能
（新增、修改、查詢，
遊戲繁簡英名稱、代號、遊戲類型）

注單查詢功能
（搜尋條件-可依日期[同一天不同時段]、依局號）
顯示欄位-注單編號、下注時間、遊戲名稱、會員帳號、幣別、投注額、派彩、局號[多筆注單對應到同一局號]

查看每日注單結算報表功能
（需使用排程每日結算，搜尋條件-日期）
顯示欄位-遊戲分類[slot、poker、fish]、總單量、總投注、總派彩

