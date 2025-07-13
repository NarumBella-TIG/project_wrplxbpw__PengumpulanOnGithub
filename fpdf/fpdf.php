<?php
// Minimal placeholder for fpdf.php
define('FPDF_VERSION','1.82');
class FPDF {
    function AddPage() {}
    function SetFont($family, $style='', $size=null) {}
    function Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='') {}
    function Ln($h=null) {}
    function Output($dest='', $name='', $isUTF8=false) {
        echo "FPDF Output called";
    }
}
?>
