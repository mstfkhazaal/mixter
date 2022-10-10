<?php
function translations($json)
{
    if (!file_exists($json)) {
        return [];
    }
    return json_decode(file_get_contents($json), true);
}
function getCharacterOrder($locale = '')
{
    $data = Data::get('layout', $locale);
    return $data['characterOrder'];
}
