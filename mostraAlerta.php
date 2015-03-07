<?php 
	session_cache_expire(1); // Expira a sessão em 1 minuto
	session_start();

    function mostraAlerta($tipo) {
        if (isset($_SESSION[$tipo])) {
    ?>
        <p style="padding:15;" class="bg-<?=$tipo?>"><?=$_SESSION[$tipo]?></p>        
    <?php
         unset($_SESSION[$tipo]);
       }
    }
?>