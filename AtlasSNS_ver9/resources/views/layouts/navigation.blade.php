 <div id="head">
    <script src="{{ asset('js/script.js') }}"></script>


            <!-- ↓↓アトラスロゴにヘッダーへ戻るリンクを設定 -->
            <div class="logo"><a href="/top"><img src="/../images/atlas.png" alt="Atlas"></a></div>
            <!-- <div id="">
                <div id=""> -->
                <!-- </div> -->
                <div class="nav-open">
                        <p class="header-name">{{Auth::user()->username}}さん</p>
                        <div class="menu-btn"></div>
    <nav>
                <ul class="tag">
                    <li><a href="/top"><p class="am-tag">HOME</p></a></li>
                    <li><a href="/profile"><p class="am-tag">プロフィール編集</p></a></li>
                    <li><a href="/logout"><p class="am-tag">ログアウト</p></a></li>
                </ul>
    </nav>

    @if(Auth::user()->icon_image !== 'icon1.png')
 <p class="header-icon"><img src="{{ asset('storage/' . Auth::user()->icon_image) }}">
</p>
@else
   <img src="{{ asset('images/icon1.png') }}" alt="初期アイコン" class="header-icon">
@endif
                    </div>
                </div>
            </div>
        </div>
