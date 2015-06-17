<?
/**
 * TITLE: Шаблон меню для страницы брендов
 * TEMPLATE_IS_NOT_SETTABLE
 */
?>
<?php
$_brand_types = Config::get('site.brand_type');
$_brands = Dic::valuesBySlug('brands', null, ['fields']);
$_brands = DicLib::groupByField($_brands, 'brand_type');
#Helper::tad($brands);
?>
<span class="title-red">Бренды</span>
@if (isset($_brand_types) && count($_brand_types))
    <div class="brand-menu">
        <ul>
            @foreach($_brand_types as $_brand_slug => $_brand_type)
                <li>
                    <span>{{ $_brand_type }}</span>
                    @if (isset($_brands[$_brand_slug]) && count($_brands[$_brand_slug]))
                        <ul>
                            @foreach ($_brands[$_brand_slug] as $_brand)
                                <li @if (!$page_mode && $_brand->slug == $brand->slug) class="active" @endif > <a href="{{ URL::route('app.brand', $_brand->slug) }}">{{ $_brand->name }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
@endif