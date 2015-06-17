<?
/**
 * TITLE: Главная страница
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?
/*
$header_image_id = isset($page_meta_settings['fields']['image']) ? $page_meta_settings['fields']['image'] : NULL;
$header_image = NULL;
if (is_numeric($header_image_id) && $header_image_id) {
    $header_image = Photo::find($header_image_id);
}
*/

$slides = Dic::valuesBySlug('slider', null, ['fields', 'textfields'], true, true, true);
$slides = DicLib::loadImages($slides, 'image');
#Helper::tad($slides);
?>


@section('style')
@stop


@section('content')

    <div class="main-content">

        @if (isset($slides) && count($slides))
            <div class="content">
                <div data-nav="dots" data-arrows="false" data-click="false" data-swipe="false" data-width="1140" data-height="350" data-autoplay="true" data-loop="true" class="slider fotorama">
                    @foreach ($slides as $slide)
                        <div class="slide-item">
                            <div class="img-holder"><img src="{{ $slide->img_full('image') }}"></div>
                            <div class="content-holder">
                                <h3>{{ $slide->name }}</h3>
                                @if ($slide->content)
                                    <p>{{ $slide->content }}</p>
                                @endif
                                @if ($slide->link && $slide->link_text)
                                    <a href="{{ $slide->link }}">{{ $slide->link_text }}</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="content">
            <div class="row-head">
                <h3>О компании</h3>
            </div>
            <div class="blocks-row">
                <div class="block red"><img src="{{ Config::get('site.theme_path') }}/images/block-company.jpg">
                    <h4>Наша компания</h4>
                    <p>	Компания работает на<br>	пивоваренном рынке<br>	России 15 лет и занимает<br>	одну из ведущих позиций.</p>
                </div>
                <div class="block-big grey">
                    <h4>Философия</h4>
                    <p>	Компания работает на пивоваренном рынке России 15 <br>	лет и занимает одну из ведущих позиций.</p><img src="{{ Config::get('site.theme_path') }}/images/block-philosophy.jpg">
                </div>
                <div class="block orange"><img src="{{ Config::get('site.theme_path') }}/images/block-contacts.jpg">
                    <h4>Контакты</h4>
                    <p>	На российских<br>	предприятиях «САН<br>	ИнБев» работает около<br>	5000 человек.</p>
                </div>
                <div class="block grey"><img src="{{ Config::get('site.theme_path') }}/images/block-senior.jpg">
                    <h4>Руководство компании</h4>
                    <p>	На российских<br>	предприятиях «САН<br>	ИнБев» работает около<br>	5000 человек.</p>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="row-head">
                <h3 class="grey">Бренды</h3>
            </div>
            <div class="brands">
                <div class="brand"><img src="{{ Config::get('site.theme_path') }}/images/brand-1.jpg">
                    <h4>Глобальные</h4>
                    <p>Ведущий пивной бренд в мире и единственный, который входит в сотню лучших мировых брендов.</p>
                </div>
                <div class="brand"><img src="{{ Config::get('site.theme_path') }}/images/brand-2.jpg">
                    <h4>Международные</h4>
                    <p>Ведущий пивной бренд в мире и единственный, который входит в сотню лучших мировых брендов.</p>
                </div>
                <div class="brand"><img src="{{ Config::get('site.theme_path') }}/images/brand-3.jpg">
                    <h4>Народные</h4>
                    <p>Ведущий пивной бренд в мире и единственный, который входит в сотню лучших мировых брендов.</p>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="row-head">
                <h3>Социальная ответственность</h3>
            </div>
            <div class="blocks-row">
                <div class="block red"><img src="{{ Config::get('site.theme_path') }}/images/block-druids.jpg">
                    <h4>Наша компания</h4>
                    <p>	Компания работает на<br>	пивоваренном рынке<br>	России 15 лет и занимает<br>	одну из ведущих позиций.</p>
                </div>
                <div class="block-big grey">
                    <h4>Философия</h4>
                    <p>	Компания работает на пивоваренном рынке России 15 <br>	лет и занимает одну из ведущих позиций.</p><img src="{{ Config::get('site.theme_path') }}/images/block-humans.jpg">
                </div>
                <div class="block orange"><img src="{{ Config::get('site.theme_path') }}/images/block-bar.jpg">
                    <h4>Контакты</h4>
                    <p>	На российских<br>	предприятиях «САН<br>	ИнБев» работает около<br>	5000 человек.</p>
                </div>
                <div class="block grey"><img src="{{ Config::get('site.theme_path') }}/images/block-hails.jpg">
                    <h4>Руководство компании</h4>
                    <p>	На российских<br>	предприятиях «САН<br>	ИнБев» работает около<br>	5000 человек.</p>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="row-head orange">
                <h3 class="orange">Карьера</h3>
            </div>
            <div class="blocks-row">
                <div class="block red"><img src="{{ Config::get('site.theme_path') }}/images/block-sciense.jpg">
                    <h4>Наша компания</h4>
                    <p>	Компания работает на<br>	пивоваренном рынке<br>	России 15 лет и занимает<br>	одну из ведущих позиций.</p>
                </div>
                <div class="block-big grey">
                    <h4>Философия</h4>
                    <p>	Компания работает на пивоваренном рынке России 15 <br>	лет и занимает одну из ведущих позиций.</p><img src="{{ Config::get('site.theme_path') }}/images/block-no.jpg">
                </div>
                <div class="block orange"><img src="{{ Config::get('site.theme_path') }}/images/block-handshaking.jpg">
                    <h4>Контакты</h4>
                    <p>	На российских<br>	предприятиях «САН<br>	ИнБев» работает около<br>	5000 человек.</p>
                </div>
                <div class="block grey"><img src="{{ Config::get('site.theme_path') }}/images/block-momo.jpg">
                    <h4>Руководство компании</h4>
                    <p>	На российских<br>	предприятиях «САН<br>	ИнБев» работает около<br>	5000 человек.</p>
                </div>
            </div>
        </div>

        @if (0)
            <div class="content">

                НАСТРОЙКИ МЕТА-ЗАПИСИ ГЛАВНОЙ СТРАНИЦЫ (для текущего языка)

                {{ Helper::ta($page_meta_settings) }}

                КАРТИНКА ДЛЯ ШАПКИ

                {{ Helper::ta($header_image) }}

                {{ is_object($header_image) ? '<img src="' . $header_image->full() . '" /><br/>' . PHP_EOL : '' }}

                ОСНОВНОЕ МЕНЮ

                {{ Menu::placement('main_menu') }}

                КОНТЕНТ ГЛАВНОЙ СТРАНИЦЫ

                {{ Helper::ta($page) }}

            </div>
        @endif
    </div>

@stop


@section('scripts')
@stop