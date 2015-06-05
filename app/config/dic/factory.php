<?php

return array(

    'fields' => function() {

        return array(
            'fullname' => array(
                'title' => 'Полное название',
                'type' => 'text',
            ),
            'popup' => array(
                'title' => 'Текст внутри поп-апа',
                'type' => 'textarea',
            ),
            'content' => array(
                'title' => 'Полное описание',
                'type' => 'textarea_redactor',
            ),
            'coords' => array(
                'title' => 'КООРДИНАТЫ НА ВИРТУАЛЬНОЙ КАРТЕ',
                'type' => 'text',
            ),
        );
    },

    'slug_label' => 'URL-адрес',

    /*
    'second_line_modifier' => function($line, $dic, $dicval) {
        return (isset($dicval->published_at) && $dicval->published_at ? '<i>' . $dicval->published_at . '</i> &mdash; ' : '') . $dicval->slug;
    },
    */

    'seo' => ['title', 'description', 'keywords'],
);