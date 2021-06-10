啟動專案 (nginx + mysql)
docker-compose up -d nginx mysql php-worker gitlab
docker-compose up nginx mysql php-worker
docker-compose up -d php-worker
進入 workspace 容器:
docker-compose exec workspace bash
docker-compose exec -u laradock workspace /bin/bash
docker-machine env
@FOR /f "tokens=*" %i IN ('docker-machine env') DO @%i

mysql passwad :irene  Irenke789456123
ls -l 查詢權限------------------------------------------

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
php artisan make:migration create_dailyBet_table --table=dailyBet
php artisan migrate  建立
php artisan migrate:rollback 重置
     migrate   Run the database migrations                
      migrate:fresh    Drop all tables and re-run all migrations  
      migrate:install  Create the migration repository            
      migrate:refresh  Reset and re-run all migrations            
      migrate:reset    Rollback all database migrations           
      migrate:rollback Rollback the last database migration       
      migrate:status   Show the status of each migration.      
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


git config --global user.email "a0966832986@gmail.com"
The authenticity of host 'github.com (52.192.72.89)' can't be established.
RSA key fingerprint is SHA256:nThbg6kXUpJWGl7E1IGOCspRomTxdCARLviKw6E5SY8.

------排程----- 要去看laradock的說明書 --》已經設置好了 打開就可以了
crontab -l 查看
crontab -e 編輯
php artisan schedule:list  列表

tail -f storage/logs/laravel.log
* * * * * php www/artisan schedule:run >> /dev/null 2>&1
* * * * * php /path/to/artisan schedule:run >> /dev/null 2>&1
php artisan make:command dailySettlement
php artisan make:command bets

php artisan view:clear
php artisan config:cache
php artisan cache:clear










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

artisan schedule:run


laradock@432da5a6cbeb:/var/www$ npm install
npm WARN deprecated urix@0.1.0: Please see https://github.com/lydell/urix#deprecated
npm WARN deprecated resolve-url@0.2.1: https://github.com/lydell/resolve-url#deprecated
npm WARN deprecated chokidar@2.1.8: Chokidar 2 will break on node v14+. Upgrade to chokidar 3 with 15x less dependencies.
npm WARN deprecated uuid@3.4.0: Please upgrade  to version 7 or higher.  Older versions may use Math.random() in certain circumstances, which is known to be problematic.  See https://v8.dev/blog/math-random for details.
npm WARN deprecated uuid@3.4.0: Please upgrade  to version 7 or higher.  Older versions may use Math.random() in certain circumstances, which is known to be problematic.  See https://v8.dev/blog/math-random for details.
npm WARN deprecated popper.js@1.16.1: You can find the new Popper v2 at @popperjs/core, this package is dedicated to the legacy v1

added 1258 packages, and audited 1265 packages in 2m

68 packages are looking for funding
  run `npm fund` for details

52 vulnerabilities (45 moderate, 7 high)

To address issues that do not require attention, run:
  npm audit fix

To address all issues (including breaking changes), run:
  npm audit fix --force

Run `npm audit` for details.