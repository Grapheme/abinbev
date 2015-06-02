<?
/**
 * TITLE: Главная страница
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?
?>


@section('style')
@stop


@section('content')

    НАСТРОЙКИ МЕТА-ЗАПИСИ ГЛАВНОЙ СТРАНИЦЫ (для текущего языка)

    {{ Helper::ta($page_meta_settings) }}

    КОНТЕНТ ГЛАВНОЙ СТРАНИЦЫ

    {{ Helper::ta($page) }}

@stop


@section('scripts')
@stop