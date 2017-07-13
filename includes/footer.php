<div class="footer">
	<p>
		<?php 
			$count_m_b = count($menu_bar); 
			foreach( $menu_bar as $f_menu ){ 
				if($count_m_b > 1){ ?>
				<a href="<?php echo $f_menu[1] ?>"><?php echo $f_menu[0] ?></a> |
				<?php }else{ ?>
				<a href="<?php echo $f_menu[1] ?>"><?php echo $f_menu[0] ?></a>
				<?php 
					} 
				$count_m_b--;
				} ?>

		
	</p>

	<p>
		Powered by
	</p>
</div>