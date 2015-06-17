<?php

return array(

    'fields' => function() {

        return array(
            'rus_name' => array(
                'title' => 'Название на русском языке (если требуется)',
                'type' => 'text',
            ),
            'brand_type' => array(
                'title' => 'Тип',
                'type' => 'select',
                'values' => Config::get('site.brand_type'),
                'default' => Input::get('filter.fields.brand_type') ?: null,
            ),
            'content' => array(
                'title' => 'Полное описание',
                'type' => 'textarea_redactor',
            ),
            'header_image' => array(
                'title' => 'Изображение для шапки',
                'type' => 'image',
                'params' => array(
                    'maxFilesize' => 8, // MB
                    #'acceptedFiles' => 'image/*',
                    #'maxFiles' => 2,
                ),
            ),
            'image' => array(
                'title' => 'Изображение бутылки',
                'type' => 'image',
                'params' => array(
                    'maxFilesize' => 8, // MB
                    #'acceptedFiles' => 'image/*',
                    #'maxFiles' => 2,
                ),
            ),

        );
    },

    /**
     * MENUS - дополнительные пункты верхнего меню, под названием словаря.
     */
    'menus' => function($dic, $dicval = NULL) {
        $menus = array();
        $menus[] = array('raw' => '<br/>');

        #$lists = Config::get('temp.lists');
        $brand_type = Config::get('site.brand_type');

        /**
         * Добавляем доп. элементы в меню, в данном случае: выпадающие поля для организации фильтрации записей по их свойствам
         */
        $menus[] = Helper::getDicValMenuDropdown('brand_type', 'Все типы', $brand_type, $dic);
        return $menus;
    },

    'slug_label' => 'URL-адрес',

    /*
    'second_line_modifier' => function($line, $dic, $dicval) {
        return (isset($dicval->published_at) && $dicval->published_at ? '<i>' . $dicval->published_at . '</i> &mdash; ' : '') . $dicval->slug;
    },
    */

    'seo' => ['title', 'description', 'keywords'],

    /**
     * Запретить сортировку записей, если не выбраны элементы для фильтрации
     * Можно указывать список - массивом: ['city', 'category']
     */
    'disable_ordering_without_filter' => 'brand_type',
);