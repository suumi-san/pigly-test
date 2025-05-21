#　ピグリー

##　環境構築
1   docker-compose up -d --build


２　　.envファイルの作成

　　　.env.exampleをコピーして.envファイルを作成

   
3   アプリキー生成
　　php artisan key:generate


4 　マイグレーション
　　php artisan migrate


5  シーディング
   php artisan db:seed

##　実行環境
　　Laravel:8.0.26
  
  　mysql:8.0.26

   PHP:7.4.9-fpm
