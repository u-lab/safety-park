# インストール手順

今回はXAMPPでLaravelを動かします。  
Windows,  Macともに同じような手順でできるのでXAMPPを採用します。

## 環境

- PHP 7.4
- Laravel 7

## 手順

### 手順 1

Download [XAMPP](https://www.apachefriends.org/jp/index.html)  

適宜、解凍などをすること。

#### 参考記事 (手順1)

[WindowsでXAMPPを使えばLaravel環境構築は簡単](https://reffect.co.jp/laravel/windows-xampp-laravel-install)  
[Macにxamppをインストール](https://qiita.com/hinataysi29734/items/00a3a990205b80f42df3)

### 手順 2

Download [Composer](https://getcomposer.org/)

#### Windows 

Composer の Download ページから exeをダウンロートして解凍してください

##### 参考記事

[xamppでLaravelの環境構築](https://qiita.com/maruyama42/items/43d7029d7e00e587bf0b)

#### Mac

Composerに関しては、動けばいいので、参考記事の方法以外でもいいです。  
調べたところ、 Homebrew を使うといいらしい。

##### 参考記事 

[macOS に composer をインストールする](https://qiita.com/tomk79/items/e6e1db94ea8b661b1e86)

### 手順 3 

1. [本リポジトリ](https://github.com/u-lab/u-lab-laravel-hands-on) をForkする
2. Forkしたプロジェクトをcloneする

### 手順 4

1. `.env.example`をコピーして`.env`を作る。
2. 以下のコマンドを実行

```shell script
$ composer install # packageをinstallする

$ php artisan key:generate # keyの生成 
```

### 手順 5

1. サーバー起動 `php artisan serve` を入力。
2. ブラウザで `http://localhost:8000` にアクセス。
3. 画面に `Laravel` と表示されたら終わり。

