@php
$links = [
    [
        "href" => "dashboard",
        "text" => "ホームページ",
        "is_multi" => false,
    ],
    [
        "href" => [
            [
                "section_text" => "看護師",
                "section_list" => [
                    ["href" => "user", "text" => "看護師データ"],
                    ["href" => "user.new", "text" => "新しい看護師"]
                ]
            ],
            [
                "section_text" => "患者",
                "section_list" => [
                    ["href" => "patient", "text" => "患者データ"],
                    ["href" => "patient.new", "text" => "新しい患者"]
                ]
            ],
            [
                "section_text" => "患者マスター",
                "section_list" => [
                    ["href" => "patient_master", "text" => "患者マスターデータ"],
                    ["href" => "patient_master.new", "text" => "新しい患者マスター"]
                ]
            ]
        ],
        "text" => "アカウント",
        "is_multi" => true,
    ],
    [
        "href" => [
            [
                "section_text" => "部屋",
                "section_list" => [
                    ["href" => "room", "text" => "部屋データ"],
                    ["href" => "room.new", "text" => "新しい部屋"]
                ]
            ],
            [
                "section_text" => "ベッド",
                "section_list" => [
                    ["href" => "bed", "text" => "ベッドデータ"],
                    ["href" => "bed.new", "text" => "新しいベッド"]
                ]
            ],
            [
                "section_text" => "フロア",
                "section_list" => [
                    ["href" => "floor", "text" => "フロアデータ"],
                    ["href" => "floor.new", "text" => "新しいフロア"]
                ]
            ]
        ],
        "text" => "レイアウト",
        "is_multi" => true,
    ],
];
$navigation_links = array_to_object($links);
@endphp

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">青森 慈恵会</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
        </div>
        @foreach ($navigation_links as $link)
        <ul class="sidebar-menu">
            <li class="menu-header">{{ $link->text }}</li>
            @if (!$link->is_multi)
            <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route($link->href) }}"><i class="fas fa-fire"></i><span>青森 慈恵会</span></a>
            </li>
            @else
                @foreach ($link->href as $section)
                    @php
                    $routes = collect($section->section_list)->map(function ($child) {
                        return Request::routeIs($child->href);
                    })->toArray();

                    $is_active = in_array(true, $routes);
                    @endphp

                    <li class="dropdown {{ ($is_active) ? 'active' : '' }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-chart-bar"></i> <span>{{ $section->section_text }}</span></a>
                        <ul class="dropdown-menu">
                            @foreach ($section->section_list as $child)
                                <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}"><a class="nav-link" href="{{ route($child->href) }}">{{ $child->text }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            @endif
        </ul>
        @endforeach
    </aside>
</div>
