# 環境構築手順
## docker-compose 使用
### 1. docker-compose でイメージ作成〜コンテナ作成
`
docker-compose up -d
`
### 2. apacheコンテナに入る
`
docker-compose exec php8-apache bash
`
### 3. /var/www/html に作成されたファイルを削除して空にする。
`
root@472b92ed6871:/var/www/html# rm -fr ./* ./.*
`
### 4. composerでLaravelをインストール
`
root@472b92ed6871:/var/www/html# composer create-project laravel/laravel .
`
### 5. VSCode のlaunch.jsonを作成してpathMappingsを追加
`
        {
            "name": "Listen for Xdebug",
            "type": "php",
            "request": "launch",
            "port": 9003,
            "pathMappings": {
                "/var/www/html":"/Users/hmurotani/Documents/workspace_php/laravel-apache-docker8/src"
            }
        },
`

