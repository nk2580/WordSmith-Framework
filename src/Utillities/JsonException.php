<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace nk2580\wordsmith\Utillities;

/**
 * Description of JsonException
 *
 * @author Nik Kyriakidis
 */
class JsonException {

    public static function show($code = 100, $message = "an error occured") {
        echo json_encode(['status' => 'error', 'code' => $code, 'message' => $message]);
        exit;
    }
}
