 <div id="head">
    <script src="{{ asset('js/script.js') }}"></script>

            <!-- ↓↓アトラスロゴにヘッダーへ戻るリンクを設定 -->
            <h1><a href="/top"><img src="images/atlas.png" alt="Atlas"></a></h1>
            <!-- <div id="">
                <div id=""> -->
                <!-- </div> -->
                <div class="nav-open">
                        <p>{{Auth::user()->username}}さん</p>
                        <div class="menu-btn"></div>
                        <nav>
                <ul class="tag">
                    <li><a href="/top">HOME</a></li>
                    <li><a href="/profile">プロフィール編集</a></li>
                    <li><a href="/logout">ログアウト</a></li>
                </ul>
    </nav>
    <div class="icon"><img src="images/icon1.png"></div>
                    </div>
                </div>
            </div>
        </div>
