## udemy Laravel口座

## ダウンロード方法
git clone

git clone https://github.com/tky0084/umarche.git

git clone ブランチを指定してダウンロードする場合

git clone -b ブランチ名 https://github.com/tky0084/umarche.git

## インストール方法
cd laravel_install
composer install
npm install
npm run dev

.env.example をコピーして .env ファイルを作成

.env ファイル内の下記をご利用の環境に合わせて変更してください。
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_umarche
DB_USERNAME=umarche
DB_PASSWORD=password123

XAMMP/MAMMPまたはほかの開発環境で起動した後に

php artisan migrate:fresh --seed

と実行してください。（データベーステーブルとダミーデータが追加されればOK)

最後に
php artisan key:generate
を入力してkeyを生成後、

php artisan serve
を入力してサーバーを起動してください。


## インストール後の実施事項

画像のダミーデータは
public/imagesフォルダ内に
sample.jpg ～ sample6.jpg として
保存しています

php artisan storage:linkで
storageフォルダにリンク後

storage/app/public/productsフォルダ内に
保存すると表示されます
(productsフォルダがない場合は作成してください)

ショップの画像も表示する場合は
storage\app\public\shopsフォルダを作成し、画像を保存してください