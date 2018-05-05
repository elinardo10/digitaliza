<?php

Breadcrumb::define('home', function ($breadcrumb) {
    $breadcrumb->add('Home', action('ArquivoController@list'));
});