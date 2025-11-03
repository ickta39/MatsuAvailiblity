松の空席状況を見るサイトです。
各ブースで空き状況を手動で更新する必要があります。

# デプロイ
1. PHPが実行できるHTTPサーバーを建てる
2. Webページのルートディレクトリ (e.g /var/www/html/)に`change.php`, `index.html`, `submit.html`を配置。
3. `intervalcamera/main.py`の画像の保存先をWebページのルートディレクトリに書き換える。
4. pipでopencvを導入する (Venvがおすすめ)
5. main.pyを実行するユーザーに画像の保存先へ書き込めるように権限を渡す。
6. main.pyを常時実行しておく
