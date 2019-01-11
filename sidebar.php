<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

 <aside>
    <div class="aside-border-top">&nbsp;</div>
    <div id="aside-content">
        <div class="sidebar-contents">
            
            <ul id="sidebar-menu">
                <li id="aside-meta">
                <?php if (!(current_user_can('level_0'))){ ?>
                    <div>
                        <h2>Login</h2>
                         <div>
                            <form action="<?php echo get_option('home'); ?>/wp-login.php" method="post" class="login-form">
                                <p><input type="text" class="login-txtbox" name="log" id="log" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" title="username" size="20" /></p>
                                <p><input type="password" class="login-txtbox" name="pwd" id="pwd" title="password" size="20" /></p>
                                <p><input type="submit" name="submit" value="Sign In" class="button login-button" /></p>
                                <p class="center"><label for="rememberme"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" <?php checked( $rememberme ); ?>/>Remember Me</label>
                                <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />&nbsp;&frasl;&nbsp;&nbsp;<a href="<?php echo get_option('home'); ?>/wp-login.php?action=lostpassword">Forgot your password?</a></p>
                            </form>                        
                        </div>
                    </div>
                    
                <?php } else { ?>
                
                    <div>   
                        <h2>
                            <?php global $current_user;
                                  get_currentuserinfo();
                            
                                  echo 'Hello&nbsp;' . $current_user->user_login . '!'; 
                            ?>
                        </h2> 
                        
                        <div>              
                            <div class="user-avatar"><?php echo get_avatar( get_the_author_meta('user_email'), 51 ); ?></div>
                           	<p><a href="<?php bloginfo('url')?>/wp-admin/">Dashboard</a>&nbsp;&frasl;&nbsp;<a href="<?php echo wp_logout_url( home_url() ); ?>" title="Logout">Logout</a></p>  
                        </div>
                    </div>
                                  
                <?php }?>
                                              
                </li>             
                <li id="category">
                    <div>
                        <h2>Category</h2>
                        <ul>
                            <?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0&exclude=3'); ?>
                        </ul>                        
                    </div>
                </li>
                
                <li id="archives">
                    <div>
                        <h2>Archives</h2>
                        <ul>
                            <?php wp_get_archives('type=monthly'); ?>
                        </ul>                        
                    </div>                                
                </li>
                
                <li id="recent-post">
                    <div>
                        <h2>Recent Post</h2>
                        <ul>
                        <?php
                            $args = array( 'numberposts' => '5' );
                            $recent_posts = wp_get_recent_posts( $args );
                            foreach( $recent_posts as $recent ){
                                echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
                            }
                        ?>
                        </ul>                        
                    </div>                                
                </li>
                
                <li id="tags">
                	<div>
                    	<h2>Tags</h2>
                        <ul>
                        	<li>
								<?php 
                                  $args = array(
                                    'taxonomy'  => array('post_tag','category'), 
                                   ); 
                                   
                                  wp_tag_cloud($args);
                                ?>
                        	</li>
                    	</ul>
                    </div>
                </li>
                
                <li id="recent-comments">
                    <div>
                        <h2>Recent Comments</h2>
                        <ul>                            
                            <?php
                              $comments = get_comments('number=10&amp;amp;status=approve');                
                              $true_comment_count = 0;                
                              foreach($comments as $comment) :
                            ?>
                            
                            <?php $comment_type = get_comment_type(); ?>
                            <?php if($comment_type == 'comment') { ?>
                            
                            <?php $true_comment_count = $true_comment_count +1; ?>
                            
                            <?php $comm_title = get_the_title($comment->comment_post_ID);?>
                            <?php $comm_link = get_comment_link($comment->comment_ID);?>
                            <?php $comm_comm_temp = get_comment($comment->comment_ID,ARRAY_A);?>
                            <?php $comm_content = $comm_comm_temp['comment_content'];?>
                            
                            <li>
                            <?php echo get_avatar( $comment, '51' ); ?>
                            <span class="footer_comm_author"><?php echo ("<strong>".$comment->comment_author."</strong>")?>:</span>&nbsp;<a href="<?php echo($comm_link)?>" title="<?php echo $comm_title?>"><?php echo wp_html_excerpt( $comment->comment_content, 100 ); ?>...</a>
                            </li> 
                            
                            <?php } ?>
                            
                            <?php if($true_comment_count == 5) {break;} ?>
                            <?php endforeach;?>
                            
                        </ul>                         
                    </div>                                
                </li>                                                                                                                          
            </ul>                            
            
        </div><!--.sidebar-contentst-->
    </div><!--#aside-content-->
    <div class="aside-border-bottom">&nbsp;</div>
</aside>
