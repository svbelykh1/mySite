<?php
 class Util{
    //mvd2f
    public function mvd2f($chto_pisat, $kuda_pisat){
        $backtrace = debug_backtrace();
        $s = '';
        $strHelp = date("Y-m-d H:i:s")." || start in ".$backtrace[0]['file']." at ".$backtrace[0]['line']." :\n"; 
        $f = fopen($kuda_pisat, "a");
        $s .= var_export($chto_pisat,true);
        fwrite($f,($strHelp.$s."\n"));
        fclose($f);
    }
        //функция уничтожения сессии
    public function destroy_session_and_data(){
        $_SESSION = array();
        setcookie(session_name(), '', time() - 2592000, '/');
        session_destroy();
    }
} 
?>