<?php

require_once(ABSPATH.WPINC.'/wp-db.php');

class my_wpdb extends wpdb
{
    public $tables = array(
        'posts',
        'comments',
        'links',
        'options',
        'postmeta',
        'terms',
        'term_taxonomy',
        'term_relationships',
        'termmeta',
        'commentmeta',
        'holiday',
        'holiday_week',
        'holiday_day'
    );
}

if(!isset($wpdb)) {
    $wpdb = new my_wpdb(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
}
