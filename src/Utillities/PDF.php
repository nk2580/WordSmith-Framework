<?php
namespace nk2580\wordsmith\Utillities;

use \Knp\Snappy\Pdf as Snappy;

/**
 * PDF Exporter Wrapper for snappy PDF - this utillitiy relies uppon the wkhtmltopdf binary
 * please ensure your server has access to this binary before using this class or it will return an error
 * for information on this binary  - 
 *
 * @author accounts
 */
class PDF {

    public $snappy;

    /**
     * Constructor for the PDF class
     * 
     * if the constructor is not passed a path to wkhtmltopdf then it assumes the path
     * - if running windows :  C:\wkhtmltopdf\bin\wkhtmltopdf.exe
     * - if other OS : /usr/local/bin/wkhtmltopdf
     * 
     * @param string $path
     */
    public function __construct(string $path = NULL) {
        if (!empty($path)) {
            $pdf_binary_path = $path;
        } else if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $pdf_binary_path = 'C:\wkhtmltopdf\bin\wkhtmltopdf.exe';
        } else {
            $pdf_binary_path = '/usr/local/bin/wkhtmltopdf';
        }
        $this->snappy = new Snappy($pdf_binary_path);
        $upload_dir = wp_upload_dir();
        $this->snappy->setTemporaryFolder($upload_dir['path']);
    }

    /**
     * Generate a PDF from a URL and return its filename
     * 
     * @param string $url
     * @param string $filename
     * @param array $options
     * @param boolean $clean
     * @return string
     */
    public function generate(string $url,string $filename,array $options = array(),boolean $clean = true) {
        if ($clean) {
            $this->cleanExport($filename);
        }
        $this->snappy->generate($url, $filename, $options);
        return $filename;
    }

    /**
     * Generate a PDF from HTML and reutrn it's filename
     * 
     * @param string $html
     * @param string $filename
     * @param array $options
     * @param boolean $clean
     * @return string
     */
    public function generateFromHtml(string $html,string $filename,Array $options = array(),boolean $clean = true) {
        if ($clean) {
            $this->cleanExport($filename);
        }
        $this->snappy->generateFromHtml($html, $filename, $options);
        return $filename;
    }

    /**
     * show the output of a PDF generated on the fly with a URL
     * 
     * @param string $url
     * @param string $filename
     * @param array $options
     */
    public function output(string $url, string $filename, array $options = array()) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        echo $this->snappy->getOutput($url, $options);
    }

    /**
     * show the output of a PDF generated on the fly with HTML
     * 
     * @param string $html
     * @param string $filename
     * @param array $options
     */
    public function outputFromHtml(string $html,string $filename,array $options = array()) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        echo $this->snappy->getOutputFromHtml($html, $options);
    }

    /**
     * Cleans the Export location, ensuring the filename supplied is written to correctly
     * 
     * @param string $filename
     */
    private function cleanExport(string $filename) {
        if (isset($filename) && file_exists($filename)) {
            unlink($filename);
        }
    }

}
