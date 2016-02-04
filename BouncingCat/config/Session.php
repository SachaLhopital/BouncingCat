<?php

	class Session {
		public static function is_user ( $login ) {			
			return ( !empty( $_SESSION['log']) && ( $_SESSION['log'] == $login ));
		}
	}
?>
