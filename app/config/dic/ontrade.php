<?php

return array(

    'fields' => function($dicval = null) {

        #dd($dicval->allfields);

        $lists = Config::get('temp.lists');
        #Helper::tad($lists);
        $lists_ids = Config::get('temp.lists_ids');

        return array(
            'description' => array(
                'title' => 'Описание',
                'type' => 'textarea',
            ),

            'city' => array(
                'title' => 'Город',
                'type' => 'select',
                'values' => $lists['ontrade_city'], ## Используется предзагруженный словарь
                #'values' => [], ## Используется предзагруженный словарь
                'default' => Input::get('filter.fields.city') ?: null,
            ),
            'type' => array(
                'title' => 'Тип',
                'type' => 'select',
                'values' => $lists['ontrade_types'], ## Используется предзагруженный словарь
                'default' => Input::get('filter.fields.type') ?: null,
            ),
            'cuisine' => array(
                'title' => 'Кухня',
                'type' => 'select',
                'values' => $lists['ontrade_cuisine'], ## Используется предзагруженный словарь
                'default' => Input::get('filter.fields.cuisine') ?: null,
            ),

            'address' => array(
                'title' => 'Адрес',
                'type' => 'text',
            ),
            ## КАРТА ДЛЯ ГЕОКОДИНГА
            'map' => array(
                'type' => 'custom',
                'content' => View::make('system.views.map_google_block', [
                    'element' => $dicval,

                    #'map_id' => 'map',
                    #'map_style' => 'height:300px;',
                ])->render(),
                'scripts' => View::make('system.views.map_google_script', [
                    'element' => $dicval,

                    #'map_id' => 'map',
                    #'map_type' => 'google.maps.MapTypeId.ROADMAP',
                    #'field_address' => 'address',
                    #'field_lat' => 'lat',
                    #'field_lng' => 'lng',
                    #'keyup_timer' => 1200,

                    'geo_prefix' => 'Россия, ',
                    'default_lat' => '55.754316',
                    'default_lng' => '37.620868',
                    'default_zoom' => '9',
                ])->render(),
            ),

            'lat' => array(
                'title' => 'Широта',
                'type' => 'text',
            ),
            'lng' => array(
                'title' => 'Долгота',
                'type' => 'text',
            ),

            'operation_time' => array(
                'title' => 'Время работы',
                'type' => 'text',
            ),
            'phone' => array(
                'title' => 'Телефон',
                'type' => 'text',
            ),
            'site' => array(
                'title' => 'Сайт',
                'type' => 'text',
            ),
        );
    },

    'hooks' => array(

        'before_index_view_create_edit' => function ($dic, $dicvals = null, $dicval = null) {
            /**
             * Предзагружаем нужные словари с данными, по системному имени словаря, для дальнейшего использования.
             * Делается это одним SQL-запросом, для снижения нагрузки на сервер БД.
             */
            $dics_slugs = array(
                'ontrade_city',
                'ontrade_cuisine',
                'ontrade_types',
            );
            $dics = Dic::whereIn('slug', $dics_slugs)->with('values')->get();
            $dics = Dic::modifyKeys($dics, 'slug');
            #Helper::tad($dics);
            $lists = Dic::makeLists($dics, 'values', 'name', 'id');
            #Helper::dd($lists);
            $lists_ids = Dic::makeLists($dics, null, 'id', 'slug');

            Config::set('temp.lists', $lists);
            Config::set('temp.lists_ids', $lists_ids);
        },
    ),


    /**
     * MENUS - дополнительные пункты верхнего меню, под названием словаря.
     */
    'menus' => function($dic, $dicval = NULL) {
        $menus = array();
        $menus[] = array('raw' => '<br/>');

        $lists = Config::get('temp.lists');

        /**
         * Добавляем доп. элементы в меню, в данном случае: выпадающие поля для организации фильтрации записей по их свойствам
         */
        $menus[] = Helper::getDicValMenuDropdown('city', 'Все города', $lists['ontrade_city'], $dic);
        $menus[] = Helper::getDicValMenuDropdown('cuisine', 'Все кухни', $lists['ontrade_cuisine'], $dic);
        $menus[] = Helper::getDicValMenuDropdown('type', 'Все типы', $lists['ontrade_types'], $dic);
        return $menus;
    },


    'second_line_modifier' => function($line, $dic, $dicval) {

        #/*
        $lists = Config::get('temp.lists');
        $lists_ids = Config::get('temp.lists_ids');

        #Helper::ta($lists);
        #Helper::ta($lists_ids);
        #Helper::ta($dicval);

        $city = @$lists['ontrade_city'][$dicval->city];
        $cuisine = @$lists['ontrade_cuisine'][$dicval->cuisine];
        $type = @$lists['ontrade_types'][$dicval->type];

        $data = [];
        if ($city)
            $data[] = $city;
        if ($type)
            $data[] = $type;
        if ($cuisine)
        $data[] = $cuisine;

        return implode(' - ' , $data);
        #*/
    },


    #'seo' => ['title', 'description', 'keywords'],
);