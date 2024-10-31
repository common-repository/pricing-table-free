<?php
if ( ! defined('ABSPATH')) exit;  // if direct access 
	/*==========================================================================
		Register Pricing Table WordPress Post Type
	==========================================================================*/

	function pricing_table_wordpress_post_types_register(){
		$labels = array(
			'name'               => _x( 'Pricing Table', 'post type general name', 'ptwlang' ),
			'singular_name'      => _x( 'Pricing Table', 'post type singular name', 'ptwlang' ),
			'menu_name'          => _x( 'Pricing Tables', 'admin menu', 'ptwlang' ),
			'name_admin_bar'     => _x( 'Pricing Table', 'add new on admin bar', 'ptwlang' ),
			'add_new'            => _x( 'Add New', 'Pricing Table', 'ptwlang' ),
			'add_new_item'       => __( 'Add New Pricing Table', 'ptwlang' ),
			'new_item'           => __( 'New Pricing Table', 'ptwlang' ),
			'edit_item'          => __( 'Edit Pricing Table', 'ptwlang' ),
			'view_item'          => __( 'View Pricing Table', 'ptwlang' ),
			'all_items'          => __( 'All Pricing Table', 'ptwlang' ),
			'search_items'       => __( 'Search Pricing Tables', 'ptwlang' ),
			'parent_item_colon'  => __( 'Parent Pricing Tables:', 'ptwlang' ),
			'not_found'          => __( 'No Pricing Table found.', 'ptwlang' ),
			'not_found_in_trash' => __( 'No Pricing Table found in Trash.', 'ptwlang' )
		);

		$args = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'ptwlang' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'Pricing Table' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title'),
			'menu_icon'   => 'dashicons-admin-settings',
		);
		register_post_type( 'ptwposttype', $args );
	}



	/*==========================================================================
		Change Pricing Table WordPress Post Title
	==========================================================================*/	
	
	function pricing_table_wordpress_title( $title ){

	  $screen = get_current_screen();
	  if  ( 'ptwposttype' == $screen->post_type ) {
		$title = 'Pricing Table Group Title';
	  }  
	  return $title;
	}	
	
	
	
	
	
	
	
	
	
	/*==========================================================================
		Adds a box to the main column on the Post and Page edit screens
	==========================================================================*/

	function pricing_table_wordpress_add_custom_box() {
			$screens = array( 'ptwposttype' );
			foreach ( $screens as $screen )
			{
			add_meta_box('pricing_table_sectionid', __( 'Pricing Table Configure','ptwlang' ),'pricing_table_wordpress_inner_custom_box', $screen);
			}     
	}



	/*==========================================================================
		Prints the box content 
	==========================================================================*/

	function pricing_table_wordpress_inner_custom_box() {
		global $post;
		// Use nonce for verification
		wp_nonce_field( plugin_basename( __FILE__ ), 'pricing_table_wordpress_dynamicMeta_noncename' );
		?>
		<?php

		//get the saved meta as an arry
		
		$pricing_table_wordpress_post_themes = get_post_meta( $post->ID, 'pricing_table_wordpress_post_themes', true );
		$pricing_table_wordpress_header_f_size = get_post_meta( $post->ID, 'pricing_table_wordpress_header_f_size', true );
		$pricing_table_wordpress_features_f_size = get_post_meta( $post->ID, 'pricing_table_wordpress_features_f_size', true );
		$pricing_table_wordpress_subtitle_font_color = get_post_meta( $post->ID, 'pricing_table_wordpress_subtitle_font_color', true );
		$pricing_table_wordpress_features_font_color = get_post_meta( $post->ID, 'pricing_table_wordpress_features_font_color', true );
		$pricing_table_wordpress_subtitle_f_size = get_post_meta( $post->ID, 'pricing_table_wordpress_subtitle_f_size', true );
		
		
		?>	

		
		<div id="tabs-container">
			<ul class="tabs-menu">
				<li class="current"><a href="#tab-1"><?php _e('Pricing Table Settings', 'ptwlang')?></a></li>
				<li><a href="#tab-2"><?php _e('Shortcode', 'ptwlang')?></a></li>
			</ul>	
		
		
			<div class="tab">
				<div id="tab-1" class="tab-content">
					<div class="wrap">				
						<table class="form-table">
							<tr valign="top">
								<th scope="row"><label style="padding-left:10px;" for="pricing_table_wordpress_post_themes"><?php echo __('Select Themes:', 'ptwlang'); ?></label></th>
								<td style="vertical-align:middle;">
								<select class="timezone_string" name="pricing_table_wordpress_post_themes">
									<option value="theme1" <?php if($pricing_table_wordpress_post_themes=='theme1') echo "selected"; ?> ><?php echo __('Default', 'ptwlang'); ?></option>
									<option value="theme2" <?php if($pricing_table_wordpress_post_themes=='theme2') echo "selected"; ?> ><?php echo __('Theme Flat', 'ptwlang'); ?></option>
									<option value="theme3" <?php if($pricing_table_wordpress_post_themes=='theme3') echo "selected"; ?> ><?php echo __('Theme Arc', 'ptwlang'); ?></option>
									<option value="theme4" disabled ><?php echo __('Theme Ultra (disabled)', 'ptwlang'); ?></option>
									
									<option value="theme5" <?php if($pricing_table_wordpress_post_themes=='theme5') echo "selected"; ?> ><?php echo __('Theme Light', 'ptwlang'); ?></option>
									
								</select><br/>
								<span class="tp_accordions_pro_hint"><?php echo __('Choose Pricing Table Themes', 'ptwlang'); ?></span>
								</td>
							</tr>
							<tr valign="top">
								<th scope="row"><label style="padding-left:10px;" for="pricing_table_wordpress_header_f_size"><?php echo __('Title Font Size:', 'ptwlang'); ?></label></th>
								<td style="vertical-align:middle;">
								<select class="timezone_string" name="pricing_table_wordpress_header_f_size">
									<option value="15" <?php if($pricing_table_wordpress_header_f_size=='15') echo "selected"; ?> ><?php _e('15 px','ptwlang'); ?></option>
									<option value="16" <?php if($pricing_table_wordpress_header_f_size=='16') echo "selected"; ?> ><?php _e('16 px','ptwlang'); ?></option>				
									<option value="17" <?php if($pricing_table_wordpress_header_f_size=='17') echo "selected"; ?> ><?php _e('17 px','ptwlang'); ?></option>				
									<option value="18" <?php if($pricing_table_wordpress_header_f_size=='18') echo "selected"; ?> ><?php _e('18 px','ptwlang'); ?></option>
									<option value="19" <?php if($pricing_table_wordpress_header_f_size=='19') echo "selected"; ?> ><?php _e('19 px','ptwlang'); ?></option>
									<option value="20" <?php if($pricing_table_wordpress_header_f_size=='20') echo "selected"; ?> ><?php _e('20 px','ptwlang'); ?></option>
									<option value="21" <?php if($pricing_table_wordpress_header_f_size=='21') echo "selected"; ?> ><?php _e('21 px','ptwlang'); ?></option>
									<option value="22" <?php if($pricing_table_wordpress_header_f_size=='22') echo "selected"; ?> ><?php _e('22 px','ptwlang'); ?></option>
									<option value="23" <?php if($pricing_table_wordpress_header_f_size=='23') echo "selected"; ?> ><?php _e('23 px','ptwlang'); ?></option>
									<option value="24" <?php if($pricing_table_wordpress_header_f_size=='24') echo "selected"; ?> ><?php _e('24 px','ptwlang'); ?></option>
									<option value="25" <?php if($pricing_table_wordpress_header_f_size=='25') echo "selected"; ?> ><?php _e('25 px','ptwlang'); ?></option>			
									<option value="26" <?php if($pricing_table_wordpress_header_f_size=='26') echo "selected"; ?> ><?php _e('26 px','ptwlang'); ?></option>			
									<option value="27" <?php if($pricing_table_wordpress_header_f_size=='27') echo "selected"; ?> ><?php _e('27 px','ptwlang'); ?></option>			
									<option value="28" <?php if($pricing_table_wordpress_header_f_size=='28') echo "selected"; ?> ><?php _e('28 px','ptwlang'); ?></option>			
									<option value="29" <?php if($pricing_table_wordpress_header_f_size=='29') echo "selected"; ?> ><?php _e('29 px','ptwlang'); ?></option>			
									<option value="30" <?php if($pricing_table_wordpress_header_f_size=='30') echo "selected"; ?> ><?php _e('30 px','ptwlang'); ?></option>			
								</select><br/>
								<span class="tp_accordions_pro_hint"><?php echo __('Choose Pricing Table Title Font Size.', 'ptwlang'); ?></span>
								</td>
							</tr>
							
							<tr valign="top" >
								<th scope="row" ><label style="padding-left:10px;" for="pricing_table_wordpress_subtitle_font_color"><?php echo __('Subtitle Font Color:', 'ptwlang'); ?></label></th>
								<td style="vertical-align:middle; width:165px; ">
									<input  size='7' name='pricing_table_wordpress_subtitle_font_color' class='pricing_table_wordpress_subtitle-font-color' id="pricing_table_wordpress_subtitle_font_color" type='text' value='<?php echo sanitize_text_field($pricing_table_wordpress_subtitle_font_color) ?>' />
									<br/>
									<span class="tp_accordions_pro_hint"><?php echo __('Choose Pricing Table Subtitle font color', 'ptwlang'); ?></span>
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row"><label style="padding-left:10px;" for="pricing_table_wordpress_subtitle_f_size"><?php echo __('Subtitle Font Size:', 'ptwlang'); ?></label></th>
								<td style="vertical-align:middle;">
								<select class="timezone_string" name="pricing_table_wordpress_subtitle_f_size">
									<option value="12" <?php if($pricing_table_wordpress_subtitle_f_size=='12') echo "selected"; ?> ><?php _e('12 px','ptwlang'); ?></option>
									<option value="13" <?php if($pricing_table_wordpress_subtitle_f_size=='13') echo "selected"; ?> ><?php _e('13 px','ptwlang'); ?></option>
									<option value="14" <?php if($pricing_table_wordpress_subtitle_f_size=='14') echo "selected"; ?> ><?php _e('14 px','ptwlang'); ?></option>
									<option value="15" <?php if($pricing_table_wordpress_subtitle_f_size=='15') echo "selected"; ?> ><?php _e('15 px','ptwlang'); ?></option>
									<option value="16" <?php if($pricing_table_wordpress_subtitle_f_size=='16') echo "selected"; ?> ><?php _e('16 px','ptwlang'); ?></option>				
									<option value="17" <?php if($pricing_table_wordpress_subtitle_f_size=='17') echo "selected"; ?> ><?php _e('17 px','ptwlang'); ?></option>				
									<option value="18" <?php if($pricing_table_wordpress_subtitle_f_size=='18') echo "selected"; ?> ><?php _e('18 px','ptwlang'); ?></option>
									<option value="19" <?php if($pricing_table_wordpress_subtitle_f_size=='19') echo "selected"; ?> ><?php _e('19 px','ptwlang'); ?></option>
									<option value="20" <?php if($pricing_table_wordpress_subtitle_f_size=='20') echo "selected"; ?> ><?php _e('20 px','ptwlang'); ?></option>
									<option value="21" <?php if($pricing_table_wordpress_subtitle_f_size=='21') echo "selected"; ?> ><?php _e('21 px','ptwlang'); ?></option>
									<option value="22" <?php if($pricing_table_wordpress_subtitle_f_size=='22') echo "selected"; ?> ><?php _e('22 px','ptwlang'); ?></option>
									<option value="23" <?php if($pricing_table_wordpress_subtitle_f_size=='23') echo "selected"; ?> ><?php _e('23 px','ptwlang'); ?></option>
									<option value="24" <?php if($pricing_table_wordpress_subtitle_f_size=='24') echo "selected"; ?> ><?php _e('24 px','ptwlang'); ?></option>
									<option value="25" <?php if($pricing_table_wordpress_subtitle_f_size=='25') echo "selected"; ?> ><?php _e('25 px','ptwlang'); ?></option>			
									<option value="26" <?php if($pricing_table_wordpress_subtitle_f_size=='26') echo "selected"; ?> ><?php _e('26 px','ptwlang'); ?></option>			
									<option value="27" <?php if($pricing_table_wordpress_subtitle_f_size=='27') echo "selected"; ?> ><?php _e('27 px','ptwlang'); ?></option>			
									<option value="28" <?php if($pricing_table_wordpress_subtitle_f_size=='28') echo "selected"; ?> ><?php _e('28 px','ptwlang'); ?></option>			
									<option value="29" <?php if($pricing_table_wordpress_subtitle_f_size=='29') echo "selected"; ?> ><?php _e('29 px','ptwlang'); ?></option>			
									<option value="30" <?php if($pricing_table_wordpress_subtitle_f_size=='30') echo "selected"; ?> ><?php _e('30 px','ptwlang'); ?></option>			
								</select><br/>
								<span class="tp_accordions_pro_hint"><?php echo __('Choose Pricing Table Sub Title Font Size.', 'ptwlang'); ?></span>
								</td>
							</tr>
							
							
							<tr valign="top">
								<th scope="row"><label style="padding-left:10px;" for="pricing_table_wordpress_features_f_size"><?php echo __('Features Font Size:', 'ptwlang'); ?></label></th>
								<td style="vertical-align:middle;">
								<select class="timezone_string" name="pricing_table_wordpress_features_f_size">
									<option value="15" <?php if($pricing_table_wordpress_features_f_size=='15') echo "selected"; ?> ><?php _e('15 px','ptwlang'); ?></option>
									<option value="16" <?php if($pricing_table_wordpress_features_f_size=='16') echo "selected"; ?> ><?php _e('16 px','ptwlang'); ?></option>				
									<option value="17" <?php if($pricing_table_wordpress_features_f_size=='17') echo "selected"; ?> ><?php _e('17 px','ptwlang'); ?></option>				
									<option value="18" <?php if($pricing_table_wordpress_features_f_size=='18') echo "selected"; ?> ><?php _e('18 px','ptwlang'); ?></option>
									<option value="19" <?php if($pricing_table_wordpress_features_f_size=='19') echo "selected"; ?> ><?php _e('19 px','ptwlang'); ?></option>
									<option value="20" <?php if($pricing_table_wordpress_features_f_size=='20') echo "selected"; ?> ><?php _e('20 px','ptwlang'); ?></option>
									<option value="21" <?php if($pricing_table_wordpress_features_f_size=='21') echo "selected"; ?> ><?php _e('21 px','ptwlang'); ?></option>
									<option value="22" <?php if($pricing_table_wordpress_features_f_size=='22') echo "selected"; ?> ><?php _e('22 px','ptwlang'); ?></option>
									<option value="23" <?php if($pricing_table_wordpress_features_f_size=='23') echo "selected"; ?> ><?php _e('23 px','ptwlang'); ?></option>
									<option value="24" <?php if($pricing_table_wordpress_features_f_size=='24') echo "selected"; ?> ><?php _e('24 px','ptwlang'); ?></option>
									<option value="25" <?php if($pricing_table_wordpress_features_f_size=='25') echo "selected"; ?> ><?php _e('25 px','ptwlang'); ?></option>			
									<option value="26" <?php if($pricing_table_wordpress_features_f_size=='26') echo "selected"; ?> ><?php _e('26 px','ptwlang'); ?></option>			
									<option value="27" <?php if($pricing_table_wordpress_features_f_size=='27') echo "selected"; ?> ><?php _e('27 px','ptwlang'); ?></option>			
									<option value="28" <?php if($pricing_table_wordpress_features_f_size=='28') echo "selected"; ?> ><?php _e('28 px','ptwlang'); ?></option>			
									<option value="29" <?php if($pricing_table_wordpress_features_f_size=='29') echo "selected"; ?> ><?php _e('29 px','ptwlang'); ?></option>			
									<option value="30" <?php if($pricing_table_wordpress_features_f_size=='30') echo "selected"; ?> ><?php _e('30 px','ptwlang'); ?></option>			
								</select><br/>
								<span class="tp_accordions_pro_hint"><?php echo __('Choose Pricing Table Features Font Size.', 'ptwlang'); ?></span>
								</td>
							</tr>
							
							<tr valign="top" >
								<th scope="row" ><label style="padding-left:10px;" for="pricing_table_wordpress_features_font_color"><?php echo __('Features Font Color:', 'ptwlang'); ?></label></th>
								<td style="vertical-align:middle; width:165px; ">
									<input  size='7' name='pricing_table_wordpress_features_font_color' class='pricing_table_wordpress_subtitle-font-color' id="pricing_table_wordpress_features_font_color" type='text' value='<?php echo sanitize_text_field($pricing_table_wordpress_features_font_color) ?>' />
									<br/>
									<span class="tp_accordions_pro_hint"><?php echo __('Choose Pricing Table Features font color', 'ptwlang'); ?></span>
								</td>
							</tr>
							
						</table>		
					</div>
				</div>
				<div id="tab-2" class="tab-content">	
					<div id="meta_inner">
						<div class="tp-accordions-pro-shortcodes">
							<h2><?php _e('Shortcodes', 'ptwlang');?></h2>
							<p><?php _e('Use following shortcode to display the Pricing Table anywhere:', 'ptwlang');?></p>
							<textarea cols="30" rows="1" onClick="this.select();">[ptwcode <?php echo 'id="'.$post->ID.'"';?>]</textarea>
							
							<p><?php _e('If you need to put the shortcode in theme file use this:', 'ptwlang');?></p>            
							<textarea cols="54" rows="1" onClick="this.select();"><?php echo '<?php echo do_shortcode("[ptwcode id='; echo "'".$post->ID."']"; echo '");?>';?></textarea>
						
						</div>
					</div>
				</div>
				
				
				
			</div>
		</div>	
				<?php

	}

	
	
	/*==========================================================================
		When the post is saved, saves our custom data
	==========================================================================*/	

	function pricing_table_wordpress_save_postdata( $post_id ) {
		// verify if this is an auto save routine. 
		// If it is our form has not been submitted, so we dont want to do anything
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $post_id;

		// verify this came from the our screen and with proper authorization,
		// because save_post can be triggered at other times
		if ( !isset( $_POST['pricing_table_wordpress_dynamicMeta_noncename'] ) )
			return;

		if ( !wp_verify_nonce( $_POST['pricing_table_wordpress_dynamicMeta_noncename'], plugin_basename( __FILE__ ) ) )
			return;

		// OK, we're authenticated: we need to find and save the data


		$pricing_table_wordpress_post_themes = sanitize_text_field( $_POST['pricing_table_wordpress_post_themes'] );
		$pricing_table_wordpress_header_f_size = sanitize_text_field( $_POST['pricing_table_wordpress_header_f_size'] );
		$pricing_table_wordpress_features_f_size = sanitize_text_field( $_POST['pricing_table_wordpress_features_f_size'] );
		$pricing_table_wordpress_subtitle_font_color = sanitize_text_field( $_POST['pricing_table_wordpress_subtitle_font_color'] );
		$pricing_table_wordpress_features_font_color = sanitize_text_field( $_POST['pricing_table_wordpress_features_font_color'] );
		$pricing_table_wordpress_subtitle_f_size = sanitize_text_field( $_POST['pricing_table_wordpress_subtitle_f_size'] );
		
		
		
		
		
		update_post_meta( $post_id, 'pricing_table_wordpress_post_themes', $pricing_table_wordpress_post_themes );
		update_post_meta( $post_id, 'pricing_table_wordpress_header_f_size', $pricing_table_wordpress_header_f_size );
		update_post_meta( $post_id, 'pricing_table_wordpress_features_f_size', $pricing_table_wordpress_features_f_size );
		update_post_meta( $post_id, 'pricing_table_wordpress_subtitle_font_color', $pricing_table_wordpress_subtitle_font_color );
		update_post_meta( $post_id, 'pricing_table_wordpress_features_font_color', $pricing_table_wordpress_features_font_color );
		update_post_meta( $post_id, 'pricing_table_wordpress_subtitle_f_size', $pricing_table_wordpress_subtitle_f_size );
		
		
	}


	

















?>