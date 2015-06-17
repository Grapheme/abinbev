<?php

return array(

    'fields' => function() {

        return array(
            'content' => array(
                'title' => 'Текст на слайде',
                'type' => 'textarea',
            ),
            'image' => array(
                'title' => 'Изображение для слайда',
                'type' => 'image',
            ),
            'link' => array(
                'title' => 'Ссылка',
                'type' => 'text',
                'default' => 'http://',
            ),
            'link_text' => array(
                'title' => 'Текст ссылки',
                'type' => 'text',
            ),
        );
    },

    #'seo' => ['title', 'description', 'keywords'],
);