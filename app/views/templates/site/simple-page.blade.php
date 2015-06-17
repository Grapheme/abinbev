<?
/**
 * TITLE: Простая страница
 */
?>
@extends(Helper::layout())
<?
$header_image_id = isset($page_meta_settings['fields']['image']) ? $page_meta_settings['fields']['image'] : NULL;
$header_image = NULL;
if (is_numeric($header_image_id) && $header_image_id) {
    $header_image = Photo::find($header_image_id);
}
?>


@section('style')
@stop


@section('content')

    <div class="main-content responsibility">
        <div class="content">
            <div class="responsibility-page-head" @if($header_image) style="background-image:url({{ $header_image->full() }})" @endif>
                <span>
                    {{ $page->block('slogan') }}
                </span>
                <h2>
                    {{ $page->block('menu_title') }}
                </h2>
                <div class="fix-2"></div>
                <div class="fix"></div>
            </div>
            <!--
            <div class="column-left">
                <div class="brand-menu">
                    <ul class="lvl1 responsibility">
                        <li> <span><a href="/">Ответсвеннное потребление</a></span></li>
                        <li> <span> <a href="/">Экология</a></span></li>
                        <li> <span> <a href="/">Общество</a></span></li>
                        <li> <span> <a href="/">Этические закупки</a></span></li>
                        <li> <span> <a href="/">Контакты</a></span></li>
                    </ul>
                </div>
            </div>
            -->
            <div class="column-right">
                <ul class="breadcrumbs">
                    <li><a href="#">Главная</a></li>
                    <li><span>{{ $page->name }}</span></li>
                </ul>

                {{ $page->block('content') }}

                {{--
                    @if (count($page->blocks))
                        @foreach ($page->blocks as $block)
                            {{ $page->block($block->slug) }}
                        @endforeach
                    @endif
                --}}

            </div>
        </div>
    </div>

@stop


@section('scripts')
@stop