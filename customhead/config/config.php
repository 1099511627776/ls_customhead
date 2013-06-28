<?php
$config = array();

$config['headers'] = array(
    array(
        'pattern' => '/personal_blog/i',
        'title' => 'Персональный блог',
        'description' => 'Описание персонального лога',
        'keywords' => 'Блог, Персональный'
    ),
    array(
        'pattern' => '/personal_blog\/discussed/i',
        'title' => 'Обсуждаемое Персональный блог',
        'description' => 'Описание обсуждаемого персонального лога',
        'keywords' => 'Блог, Персональный,обмуждаемое',
    )
);
return $config;
?>