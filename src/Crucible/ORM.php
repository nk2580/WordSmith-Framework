<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace nk2580\wordsmith\Crucible;

/**
 * Description of ORM
 *
 * @author Nik Kyriakidis
 */
class ORM {

    public static function Capsule() {
        
        global $wpdb;
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver' => 'mysql',
            'host' => DB_HOST,
            'database' => DB_NAME,
            'username' => DB_USER,
            'password' => DB_PASSWORD,
            'charset' => DB_CHARSET,
            'prefix' => $wpdb->prefix.'__cc__',
        ]);
        $capsule->bootEloquent();
        return $capsule;
    }

}
