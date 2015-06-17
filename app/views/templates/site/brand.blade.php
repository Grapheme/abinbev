<?
/**
 * TITLE: Страница бренда
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?php
$page_mode = isset($page) && is_object($page);
if ($page_mode) {

    $header_image = NULL;
    $header_image_id = isset($page_meta_settings['fields']['image']) ? $page_meta_settings['fields']['image'] : NULL;
    if (is_numeric($header_image_id) && $header_image_id) {
        $header_image = Photo::find($header_image_id);
    }
} else {

    $seo = $brand->seo;
    $page_title = $brand->name;
}

?>


@section('style')
@stop


@section('content')

    <div class="main-content brand">
        <div class="content">
            <div class="brand-page-head" @if($header_image) style="background-image:url({{ $header_image->full() }})" @endif>
                <span>

                    @if (1)
                        @if ($page_mode)
                            {{ nl2br($page->field('slogan')) }}
                        @elseif ($brand->slogan != '')
                            {{ nl2br($brand->slogan) }}
                        @else
                            Построение высоких марок<br>	качества
                        @endif
                    @endif

                </span>
            </div>
            <div class="column-left">

                @include(Helper::layout('_brands_menu'))

            </div>
            <div class="column-right">
                <ul class="breadcrumbs">
                    <li><a href="{{ URL::route('mainpage') }}">Главная</a></li>
                    @if ($page_mode)
                        <li><span>Бренды</span></li>
                    @else
                        <li><a href="{{ URL::route('page', pageslug('brands')) }}">Бренды</a></li>
                        <li><span>{{ $brand->name }}</span></li>
                    @endif
                </ul>

                @if ($page_mode)

                    @if (count($page->blocks))
                        @foreach ($page->blocks as $block)
                            {{ $page->block($block->slug) }}
                        @endforeach
                    @endif

                @else

                    {{ $brand->content }}

                @endif

            </div>
        </div>
    </div>


@stop


@section('scripts')
@stop