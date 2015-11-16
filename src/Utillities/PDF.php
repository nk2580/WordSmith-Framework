<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace nk2580\wordsmith\Utillities;

/**
 * PDF Exporter Wrapper for snappy PDF - this utillitiy relies uppon the wkhtmltopdf binary
 * please ensure your server has access to this binary before using this class or it will return an error
 * for information on this binary  - 
 *
 * @author accounts
 */
class PDF extends \Knp\Snappy\Pdf {

    protected $binary;

    public function __construct($binary = null, array $options = array(), array $env = null) {
        if (!$binary) {
            $this->setupBinary();
        }
        $this->setupEnvironment();
        parent::__construct($this->binary, $options, $env);
    }

    private function setupEnvironment() {
        $this->setupTempDir(WP_CONTENT_DIR . "/__pdf_tmp");
    }

    private function setupTempDir($path) {
        if (!dir($path)) {
            mkdir($path);
        }
        $this->setTemporaryFolder($path);
    }

    private function setupBinary($path = null) {
        if (!$path) {
            if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                $path = 'C:\wkhtmltopdf\bin\wkhtmltopdf.exe';
            } else {
                $path = '/usr/local/bin/wkhtmltopdf';
            }
        }
        $this->setBinary($path);
    }

    public function export($input, $output, $options, $overwrite) {
        $this->generate($input, $output, $options, $overwrite);
        return $output;
    }

    public function output($input, $options) {
        echo $this->getOutput($input, $options);
    }

}
