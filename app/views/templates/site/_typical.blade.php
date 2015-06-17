<?
/**
 * TITLE: Общий шаблон для страниц с меню слева
 * TEMPLATE_IS_NOT_SETTABLE
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
                <div class="fix-2"></div>
                <div class="fix"></div>
            </div>
            <div class="column-left">
                <div class="brand-menu">

                    {{ Menu::placement($menu) }}

                </div>
            </div>
            <div class="column-right">
                <ul class="breadcrumbs">
                    <li><a href="{{ URL::route('mainpage') }}">Главная</a></li>
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