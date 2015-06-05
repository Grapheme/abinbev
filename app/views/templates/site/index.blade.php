<?
/**
 * TITLE: Главная страница
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
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

    НАСТРОЙКИ МЕТА-ЗАПИСИ ГЛАВНОЙ СТРАНИЦЫ (для текущего языка)

    {{ Helper::ta($page_meta_settings) }}

    КАРТИНКА ДЛЯ ШАПКИ

    {{ Helper::ta($header_image) }}

    {{ is_object($header_image) ? '<img src="' . $header_image->full() . '" /><br/>' . PHP_EOL : '' }}

    ОСНОВНОЕ МЕНЮ

    {{ Menu::placement('main_menu') }}

    КОНТЕНТ ГЛАВНОЙ СТРАНИЦЫ

    {{ Helper::ta($page) }}

@stop


@section('scripts')
@stop