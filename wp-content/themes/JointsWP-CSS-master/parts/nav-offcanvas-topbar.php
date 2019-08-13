<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="top-bar" id="top-bar-menu">
	<div class="top-bar-left float-left">
		<ul class="dropdown menu" data-dropdown-menu>
			<li>
				<a href="<?php echo home_url(); ?>">
					home
				</a>
			</li>
			<li>
				<a href="#">
					about
				</a>
				<ul class="menu">
					<li>
						<a href="#">who we are</a>
					</li>
					<li>
						<a href="#">stories</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#">
					yerba
				</a>
			</li>
			<li>
				<a href="#">
					equipment
				</a>
				<ul class="menu">
					<li>
						<a href="#">gourds</a>
					</li>
					<li>
						<a href="#">bombillas</a>
					</li>
					<li>
						<a href="#">materas</a>
					</li>
					<li>
						<a href="#">yerberas</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
	<div class="top-bar-right show-for-medium">
		<?php joints_top_nav(); ?>	
	</div>
	<div class="top-bar-left float-left show-for-small-only">
		<ul class="menu">
			<!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
			<!-- <li><a data-toggle="off-canvas"><?php _e( 'Menu', 'jointswp' ); ?></a></li> -->
		</ul>
	</div>
</div>