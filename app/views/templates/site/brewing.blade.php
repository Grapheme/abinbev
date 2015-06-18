<?
/**
 * TITLE: Общий шаблон раздела "Пивоварение"
 */
?>
<?php
$page_name = 'brewing';
$menu = 'brewing_menu';
$breadcrumbs = (!isset($page) || $page->slug != pageslug($page_name) ? '<li><a href="' . URL::route('page', pageslug($page_name)) . '">' . pagename($page_name) . '</a></li>' : '');
?>
@extends(Helper::layout('_typical'))