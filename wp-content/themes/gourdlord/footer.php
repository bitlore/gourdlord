<?php ?>
          </div> <!-- end container -->
          
        </div>  <!-- end .off-canvas-content -->
            
      </div> <!-- end .off-canvas-wrapper -->
      
    </main> <!-- end former #gl-main-content -->
      
      
      <?php if (  !is_shop() && !is_home() ): ?>
      
			<footer class="footer" role="contentinfo">
        
				<div class="container inner-footer grid-x">
					
          <!-- <div><strong>Current template:</strong>
            <?php get_current_template( true ); ?>
          </div> -->
          
					<div class="footer-cell small-12 medium-12 large-12 cell">
						<nav role="navigation">
    					<?php joints_footer_links(); ?>
  					</nav>
  				</div>
          
          <div class="footer-cell small-6 medium-4 large-3 cell">
            <ul>
              <li>About</li>
              <li><a href="<?php echo get_site_url(); ?>/about">Gourd Lord & Co.</a></li>
              <li><a href="<?php echo get_site_url(); ?>/about#what-is-yerba">Yerba Mate</a></li>
            </ul>
          </div>
          <div class="footer-cell small-6 medium-4 large-3 cell">
            <ul>
              <li>Shop</li>
              <?php list_product_categories(); ?>
            </ul>
          </div>
          <div class="footer-cell small-6 medium-4 large-3 cell">
            <ul>
              <li><b>Policy</b></li>
              <li><a href="<?php echo get_site_url(); ?>/returns">Returns</a></li>
              <li><a href="<?php echo get_site_url(); ?>/terms">Terms &amp; Conditions</a></li>
              <li><a href="<?php echo get_site_url(); ?>/privacy">Privacy</a></li>
              <li><a href="<?php echo get_site_url(); ?>/disclaimer">Disclaimer</a></li>
            </ul>
          </div>
          <div class="footer-cell small-6 medium-4 large-3 cell">
            <ul>
              <li>Contact</li>
              <li>
                <a href="mailto:'<?php echo get_bloginfo( 'admin_email' ) ?>'">
                  <?php echo get_bloginfo( 'admin_email' ) ?>
                </a>
              </li>
              <li>
                <a href="tel:'<?php echo '+19713500969'; ?>'"><?php echo '(971) 350-0969'; ?></a>
              </li>
              <li>Portland, OR</li>
              <br>
              <li>&copy;<?php echo date('Y'); ?> <?php bloginfo('name'); ?></li>
            </ul>
          </div>
				
				</div> <!-- end #inner-footer -->
        
      <?php endif ?>
			
		</footer> <!-- end .footer -->
    
		<?php wp_footer(); ?>
		
	</body>
	
</html> <!-- end page -->