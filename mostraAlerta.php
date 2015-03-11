<?php
	session_cache_expire(1); // Expira a sessão em 1 minuto
	session_start();

    function mostraAlerta($tipo) {
        if (isset($_SESSION[$tipo])) {
    ?>
				<div class="alert alert-<?=$tipo?> alert-dismissible" role="alert">
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<?=$_SESSION[$tipo]?>
				</div>

    <?php
         unset($_SESSION[$tipo]);
       }
    }
?>
