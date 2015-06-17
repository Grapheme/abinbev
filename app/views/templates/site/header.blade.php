<?
/**
 * TEMPLATE_IS_NOT_SETTABLE
 */
?>

<header>
    <div class="header"><a href="{{ URL::route('mainpage') }}" class="logo"></a>
<!--
        <ul class="main-menu">
            <li><a href="/">О компании</a></li>
            <li><a href="/brand.html">Бренды</a></li>
            <li><a href="/">Пивоварение</a></li>
            <li><a href="/">Пресс-центр</a></li>
            <li><a href="/">Производство</a></li>
            <li><a href="/">Социальная ответственность</a></li>
            <li><a href="/">Карьера</a></li>
            <li><a href="/">Культура потребления пива</a></li>
            <li><a href="/">Раскрытие информации</a></li>
        </ul>
-->

        {{ Menu::placement('main_menu') }}

        <div class="search-field">
            <form name="search">
                <input for="search" placeholder="Поиск по сайту">
            </form>
        </div>
    </div>
</header>
