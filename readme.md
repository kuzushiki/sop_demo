# もしSOPが無かったら

## これ何？

SOPが無いとどういった攻撃が可能になるのか、というのをわかりやすく説明するためのデモです。

以下の3台のサーバで構成されています。

1. app

通常のサーバ。ログイン機能があり、ログインするとなにかしら大事な情報が得られる、という設定です。

2. evil_app

攻撃者の罠サーバ。appの利用者のアカウント情報や秘密情報を窃取しキャプチャサーバに送信します。

3. capture

攻撃者のサーバからの通信を待ち受けるサーバ。ここにapp利用者に関する情報が送られる。

## どうやって使うの?

### 事前に用意するもの

- docker
- docker-compose
- SOPを無効にしたブラウザ (例えばChromeなら`google-chrome --disable-web-security --user-data-dir=[ブラウザのデータを保存するディレクトリ]`でセキュリティ機構を無効にできます。)

### 使い方

このリポジトリをcloneし、docker-compose.ymlがおいてあるディレクトリに移動してから以下を実行します。

```sh
docker-compose up
```

上記の３台のサーバが立ち上がるので、ブラウザでアクセスしてみましょう。

- app: http://localhost:8001 (ログインアカウントはID:hoge, PW:hogeです。)
- evil_app: http://localhost:8002
- capture: http://localhost:8003 (待ち受け用のサーバなので特に何もありません)

### デモの流れ

0. (じっくり取り組みたい方向け) 事前に[app](app/)と[evil_app](evil_app/)のソースを読んで挙動を推測してみましょう。

1. まずはSOPを有効にしたブラウザでappにアクセスし、どんなアプリか確認してみましょう。

2. 次はSOPを無効にしたブラウザでevil_appにアクセスしてみましょう。captureサーバにはどのタイミングでどんな情報が送られているでしょうか？

3. さらにSOPを有効にしたブラウザでevil_appにアクセスしましょう。先程とどのような違いがあるでしょうか？

4. (じっくり取り組みたい方向け) SOPが有効であれば問題ないと言えるでしょうか？appサーバには何か脆弱性がありませんか？[ソースコード](app/)をよく見てみましょう。

5. (じっくり取り組みたい方向け) 見つけた脆弱性を使ってSOP無効にできた攻撃を再現してみましょう。