<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/login/ress.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/login/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/help/corporateHelp.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/login/responsive.css') }}">
    <title>Document</title>
    <script type="module" src="{{ asset('/js/help/main.js') }}"></script>
</head>

<body>
<header>
        <div class="header common">
            <h1><a href=""><img src="{{ asset('images/hitLogo.svg') }}" alt="HITスクールのロゴ"></a></h1>
            <form class="headerSearch" action="" method="get">
                <input class="search" type="search" name="ageSearch" placeholder="キーワード">
                <input class="submit" type="submit" value="検索" name="submit">
                <p class="searchDetail">条件詳細▲</p>
            </form>
            <div class="headerLogin">
                <form method="POST" action="{{ route('logout') }}">
                    <p><a class="user-name" href="">ユーザー:　<span>{{ Auth::user() ? Auth::user()->name : ''}}</span></a></p>
                    @csrf
                    <p><button class="sign-out" type="submit">サインアウト</button></p>
                </form>
            </div>
        </div>
    </header>
    <div class="globalNav menu_nav">
        <nav>
            <ul class="common">
                <li><a href="/notifications">Top</a></li>
                <li><a href="/students">生徒情報</a></li>
                <li><a href="/scouts">スカウト中</a></li>
                <li><a href="/jobs">求人管理</a></li>
                <li><a href="/favorites">お気に入り</a></li>
                <li><a href="/browsing_histories">閲覧履歴</a></li>
                <li class="has-child"><a href="">設定</a>
                    <ul class="menuDrop">
                        <li><a href="{{ route('corporations.view', ['id' => Auth::user()->id]) }}">企業詳細</a></li>
                        <li><a href="{{route('corporations.edit', ['id' => Auth::user()->id])}}">企業更新</a></li>
                        <li><a href="">パスワード再設定</a></li>
                    </ul>
                </li>
                <li><a href="/helps">ヘルプ</a></li>
            </ul>
        </nav>
    </div>
    <main>
        <h2 class="corporateHelp_title">ヘルプ</h2>
        <div class="helpContents">
          @if (empty($entityListByCategory))
        <p class="text-muted text-center"><?= __('登録されていません。') ?></p>
            @else
            <!-- <form class="helpSearch" action="" method="post"> -->
            <form class="helpSearch" action="{{ route('helps.index') }}" method="get">
                <!-- <input class="helpSearch_input" type="search" name="ageSearch" placeholder="キーワード"> -->
                <input class="helpSearch_input" type="search" name="search_param"
                 class="helpSearch_input" placeholder="キーワード" value="@if (isset($search)) {{ $search }} @endif">
                <input class="helpSubmit" type="submit" value="検索" name="submit" id="seach_btn">
            </form>
            <div class="accordion_area gutter">
              @foreach ($entityListByCategory as $categoryName => $entities)
                <!-- アコーディオン① -->
                <div class="accordion_one">
                    <div class="ac_header">
                        <div class="p-faq__headinner">
                            <p class="p-faq__q-txt text-item">
                                <span>
                                    <img src="{{ asset('/images/hash_icon.png') }}" alt="">
                                </span>
                                {{ $categoryName }}
                            </p>
                        </div>
                        <div class="i_box"></div>
                    </div>
                    <div class="ac_inner">
                        <!-- アコーディオン下層① -->
                        @foreach ($entities as $entity)
                        <div class="p-faq__bodyinner">
                            <div class="accordion_one">
                                <div class="ac_header">
                                    <div class="p-faq__headinner">
                                        <!-- <p class="p-faq__q-txt">Q.パスワードの設定変更について</p> -->
                                        <p class="p-faq__q-txt text-item">{{ $entity['title'] }}</p>
                                    </div>
                                    <div class="i_box"></div>
                                </div>
                                <div class="ac_inner">
                                    <div class="p-faq__bodyinner">
                                        <p class="p-faq__a-txt answer text-item">{{ $entity['content'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
          @endif
        </div>
    </main>
</body>
