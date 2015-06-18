<?
/**
 * TITLE: Общий шаблон раздела "Раскрытие информации"
 */
?>
<?php
$page_name = 'disclosure';
$menu = 'disclosure_menu';
$breadcrumbs = (!isset($page) || $page->slug != pageslug($page_name) ? '<li><a href="' . URL::route('page', pageslug($page_name)) . '">' . pagename($page_name) . '</a></li>' : '');
?>
@extends(Helper::layout('_typical'))