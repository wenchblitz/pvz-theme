<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

			</div><!--#content-wrapper-->                
            <div class="border-bottom">&nbsp;</div>
        </div><!--#conatiner-->            
        
        	<div class="clear"></div>
            
		<footer>
        	<div id="inner-footer">
            	<p class="left allrights">All rights Reserved &reg; 2012</p>
                <p class="right poweredby">Powered by: <a href="http://wordpress.org/" title="Wordpress" alt="">Wordpress</a></p>      
                
                <div id="design-by">
                    <p class="right the-author">Themes by: <a href="http://wenchblitz.x10.mx/" title="wenchblitz" alt="wenchblitz">wenchblitz</a></p>
                </div><!--#design-by-->
            </div><!--#inner-footer-->             
        </footer>    
                   
    </div><!--#inner-wrapper-->
</div><!--#outer-wrapper-->

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
