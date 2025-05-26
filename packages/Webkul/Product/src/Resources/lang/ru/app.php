<?php

return [
    'checkout' => [
        'cart' => [
            'integrity' => [
                'qty-missing'   => 'По крайней мере, у одной услуги должно быть более 1 количество.',
            ],

            'invalid-file-extension'   => 'Найдено недопустимое расширение файла.',
            'inventory-warning'        => 'Запрошенное количество недоступно, пожалуйста, попробуйте позже.',
            'missing-links'            => 'Отсутствуют загружаемые ссылки для этой услуги.',
            'missing-options'          => 'Отсутствуют опции для этой услуги.',
            'selected-products-simple' => 'Выбранные услуги должны быть простого типа.',
        ],
    ],

    'datagrid' => [
        'copy-of-slug'                  => 'копия-:value',
        'copy-of'                       => 'Копия :value',
        'variant-already-exist-message' => 'Вариант с теми же параметрами атрибута уже существует.',
    ],

    'response' => [
        'product-can-not-be-copied' => 'Услуги типа :type не могут быть скопированы',
    ],

    'sort-by'  => [
        'options' => [
            'cheapest-first'  => 'Сначала дешевые',
            'expensive-first' => 'Сначала дорогие',
            'from-a-z'        => 'От А до Z',
            'from-z-a'        => 'От Z до A',
            'latest-first'    => 'Сначала новые',
            'oldest-first'    => 'Сначала старые',
        ],
    ],

    'type'     => [
        'abstract'     => [
            'offers' => 'Покупайте :qty по :price за каждый и экономьте :discount',
        ],

        'bundle'       => 'Набор',
        'booking'      => 'Бронирование',
        'configurable' => 'Настроенный',
        'downloadable' => 'Загружаемый',
        'grouped'      => 'Группированный',
        'simple'       => 'Простой',
        'virtual'      => 'Виртуальный',
    ],
];
