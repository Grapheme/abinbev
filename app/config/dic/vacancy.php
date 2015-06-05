<?php

return array(

    'fields' => function() {

        $lists = Config::get('temp.lists');
        $lists_ids = Config::get('temp.lists_ids');

        return array(
            'region' => array(
                'title' => 'Регион',
                'type' => 'select',
                'values' => $lists['vacancy-region'], ## Используется предзагруженный словарь
                'default' => Input::get('filter.fields.region') ?: null,
            ),
            'category' => array(
                'title' => 'Категория',
                'type' => 'select',
                'values' => $lists['vacancy-category'], ## Используется предзагруженный словарь
                'default' => Input::get('filter.fields.category') ?: null,
            ),
            'salary' => array(
                'title' => 'Уровень зарплаты',
                'type' => 'text',
            ),
            'experience' => array(
                'title' => 'Требуемый опыт работы',
                'type' => 'text',
            ),
            'description' => array(
                'title' => 'Описание вакансии',
                'type' => 'textarea_redactor',
            ),
        );
    },

    'hooks' => array(
        'before_index_view' => function ($dic, $dicvals) {
            /**
             * Предзагружаем нужные словари с данными, по системному имени словаря, для дальнейшего использования.
             * Делается это одним SQL-запросом, для снижения нагрузки на сервер БД.
             */
            $dics_slugs = array(
                'vacancy-region',
                'vacancy-category',
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
        $menus[] = Helper::getDicValMenuDropdown('region', 'Все регионы', $lists['vacancy-region'], $dic);
        $menus[] = Helper::getDicValMenuDropdown('category', 'Все категории', $lists['vacancy-category'], $dic);
        return $menus;
    },


    'second_line_modifier' => function($line, $dic, $dicval) {

        $lists = Config::get('temp.lists');
        $lists_ids = Config::get('temp.lists_ids');

        #Helper::ta($lists);
        #Helper::ta($lists_ids);
        #Helper::ta($dicval);

        $region = @$lists['vacancy-region'][$dicval->region];
        $category = @$lists['vacancy-category'][$dicval->category];

        $data = [];
        if ($region)
            $data[] = $region;
        if ($category)
            $data[] = $category;
        if ($dicval->salary)
            $data[] = $dicval->salary;

        return implode(' - ' , $data);
    },


    #'seo' => ['title', 'description', 'keywords'],
);