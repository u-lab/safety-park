# README FOR API

## 環境構築

[インストール手順](../.docs/Installation.md)を見ること。

### サーバ起動

``` shell
# サーバー起動
$ php artisan serve
```

### 簡易的なセットアップ手順

1. `composer install`
2. `.env.example`をコピーして、`.env`の作成
3. `php artisan key:generate`でkeyを生成する
4. `php artisan migrate --seed`でDBのマイグレーションをする

### 更新手順

1. `composer update`
2. `php artisan config:cache`
3. `php artisan migrate:refresh --seed`でDBの再マイグレーションをする

## コマンド

``` shell
# GeoJsonを生成する
$ php artisan create:geojson

# migrate用のjsonファイルを作成する (xmlをjsonへ変換)
$ php artisan create:parkcache
```
