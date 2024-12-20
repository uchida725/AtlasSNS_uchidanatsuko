        <div id="head">
            <!-- ↓↓アトラスロゴにヘッダーへ戻るリンクを設定 -->
            <h1><a href="/top"><img src="images/atlas.png" alt="Atlas"></a></h1>
            <div id="">
                <div id="">
                    <!-- ログイン名を表示させる↓ -->
                    <p>{{Auth::user()->username}}さん<img src="images/icon1.png"></p>
                </div>
                <ul>
                    <li><a href="">ホーム</a></li>
                    <li><a href="">プロフィール</a></li>
                    <li><a href="">ログアウト</a></li>
                </ul>
            </div>
        </div>
