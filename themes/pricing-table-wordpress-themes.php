<?php
if ( ! defined('ABSPATH')) exit;  // if direct access 

function Pricing_Table_wordpress_table_body($postid){
	
		$featuress = get_post_meta( $postid, 'pricing_table_wp_columns');
		$pricing_table_wordpress_post_themes = get_post_meta( $postid, 'pricing_table_wordpress_post_themes', true );
		$pricing_table_wordpress_header_f_size = get_post_meta( $postid, 'pricing_table_wordpress_header_f_size', true );
		$pricing_table_wordpress_subtitle_font_color = get_post_meta( $postid, 'pricing_table_wordpress_subtitle_font_color', true );
		$pricing_table_wordpress_features_font_color = get_post_meta( $postid, 'pricing_table_wordpress_features_font_color', true );
		$pricing_table_wordpress_features_f_size = get_post_meta( $postid, 'pricing_table_wordpress_features_f_size', true );
		$pricing_table_wordpress_subtitle_f_size = get_post_meta( $postid, 'pricing_table_wordpress_subtitle_f_size', true );
		
		
		$ptwrndsk = rand(1,1000);
		
		
		if($pricing_table_wordpress_post_themes=="theme1")
			{
			$content = '';

			$content.='<div class="pricingTable-main-area_'.$ptwrndsk.'"><div class="pricingTable-bg_'.$ptwrndsk.'">';
				foreach((array)$featuress as $feature){
					$content.='
					<div class="lsw-col-lg-5 lsw-col-md-4 lsw-col-sm-2 lsw-col-xs-1">
						<div class="pricingTable_'.$ptwrndsk.'">
							<div class="pricingTable-header_'.$ptwrndsk.'">
								<span style="background:'.$feature['pricing_wordpress_header_bg_color'].';color:'.$feature['pricing_wordpress_header_font_color'].'" class="heading_'.$ptwrndsk.'">
									<h3 style="font-size:'.$pricing_table_wordpress_header_f_size.'px;">'.$feature['pricing_table_wordpress_title'].'</h3>
								</span>
								<span class="price-value_'.$ptwrndsk.'">'.$feature['pricing_table_wordpress_package_currency'].'<span>'.$feature['pricing_table_wordpress_package_price'].'</span></span>
								<span style="color:'.$pricing_table_wordpress_subtitle_font_color.';font-size:'.$pricing_table_wordpress_subtitle_f_size.'px" class="subtitle_'.$ptwrndsk.'">'.$feature['pricing_wordpress_sub_title'].'</span>
							</div>
							<div style="color:'.$pricing_table_wordpress_features_font_color.';font-size:'.$pricing_table_wordpress_features_f_size.'px" class="pricingContent_'.$ptwrndsk.'">
								<ul>';
								
								foreach ($feature['pricing_table_wordpress_features_column'] as $value) {
									$content.='<li>'.esc_attr($value).'</li>';
								}
									
								$content.='</ul>
							</div>
							<div class="pricingTable-sign-up_'.$ptwrndsk.'">
								<a style="background:'.$feature['pricing_wordpress_header_bg_color'].'" href="'.esc_url($feature['pricing_table_wordpress_package_buy_link']).'" class="btn_'.$ptwrndsk.' btn-block_'.$ptwrndsk.' btn-default">'.$feature['pricing_table_wordpress_package_buy_button'].'</a>
							</div>
						</div>
					</div>
					';
				};

				$content.='
				<style type="text/css">
				.pricingTable-main-area_'.$ptwrndsk.' {
				  display: block;
 				 overflow: hidden;
				}
				.pricingTable_'.$ptwrndsk.'{
					border: 1px solid #dbdbdb;
					box-shadow: 0 0 10px rgba(0, 0, 0, 0.14);
					border-radius: 10px;
					text-align: center;
				}
				.pricingTable_'.$ptwrndsk.' .pricingContent_'.$ptwrndsk.' > ul {
				  margin: 0;
				  padding: 0;
				}
				.pricingTable_'.$ptwrndsk.' .pricingTable-header_'.$ptwrndsk.'{
					background-color: #f5f5f5;
					color:#fff;
					padding-bottom: 25px;
				}
				.pricingTable-header_'.$ptwrndsk.' .heading_'.$ptwrndsk.'{
					background-color: #82b440;
					display: block;
					padding: 15px 10px;
					transition:0.4s ease-in-out;
				}
				.pricingTable_'.$ptwrndsk.':hover .heading_'.$ptwrndsk.'{
					background-color: #419e00;
				}
				.pricingTable_'.$ptwrndsk.' .heading_'.$ptwrndsk.' h3{
					font-weight:bold;
					margin: 0;
					text-transform: uppercase;
				}
				.pricingTable-header_'.$ptwrndsk.' .price-value_'.$ptwrndsk.' {
					display: block;
					font-size: 25px;
					font-weight: 800;
					color: #474747;
					line-height: 35px;
					margin-top: 10px;
					padding: 20px 10px 0;
				}
				.pricingTable_'.$ptwrndsk.' .price-value_'.$ptwrndsk.' span{
					font-size: 60px;
					font-weight: 100;
				}
				.pricingTable_'.$ptwrndsk.' .subtitle_'.$ptwrndsk.'{
					font-size: 13px;
					color: #262626;
					margin-top: 15px;
					display: block;
				}
				.pricingTable_'.$ptwrndsk.' .pricingContent_'.$ptwrndsk.' ul{
					list-style: none;
					padding: 0;
					margin-bottom: 0;
				}
				.pricingTable_'.$ptwrndsk.' .pricingContent_'.$ptwrndsk.' ul li{
					border-top: 1px solid #dbdbdb;
					padding: 10px 0;
					background-color: #f7fff7;
					margin:0px;
				}
				.pricingTable_'.$ptwrndsk.' .pricingContent_'.$ptwrndsk.' ul li:nth-child(odd) {
					background-color: #fff;
				}
				.pricingContent_'.$ptwrndsk.' ul li:last-child{
					border-bottom: 1px solid #dbdbdb;
				}
				.pricingTable_'.$ptwrndsk.' .pricingTable-sign-up_'.$ptwrndsk.'{
					padding: 25px 0;
				}
				.pricingTable_'.$ptwrndsk.' .btn-block_'.$ptwrndsk.'{
					background: #82b440;
					border:0px none;
					border-radius: 5px;
					color:#fff;
					width: 50%;
					padding: 10px 15px;
					margin: 0 auto;
					text-transform: capitalize;
					transition:0.3s ease;
				}
				.pricingTable_'.$ptwrndsk.' .btn-block_'.$ptwrndsk.':after{
					content: "\f090";
					font-family: "FontAwesome";
					font-size: 15px;
					padding-left: 10px;
				}
				.pricingTable_'.$ptwrndsk.' .btn-block_'.$ptwrndsk.':hover{
					background: #419e00;
					color:#fff;
				}
				@media screen and (max-width:990px){
					.pricingTable_'.$ptwrndsk.'{
						margin-bottom: 20px;
					}
				}

				.lsw-col-lg-1, .lsw-col-lg-2, .lsw-col-lg-3, .lsw-col-lg-4, .lsw-col-lg-5, .lsw-col-lg-6, .lsw-col-md-1, .lsw-col-md-2, .lsw-col-md-3, .lsw-col-md-4, .lsw-col-md-5, .lsw-col-md-6, .lsw-col-sm-1, .lsw-col-sm-2, .lsw-col-sm-3, .lsw-col-sm-4, .lsw-col-sm-5, .lsw-col-sm-6, .lsw-col-xs-1, .lsw-col-xs-2, .lsw-col-xs-3, .lsw-col-xs-4, .lsw-col-xs-5, .lsw-col-xs-6 {
					float: left;
					margin-bottom: 10px;
					min-height: 1px;
					padding-left: 5px;
					padding-right: 5px;
					position: relative;
				}
				.lsw-col-lg-1 {
					width: 100%;
				}
				.lsw-col-lg-2 {
					width: 50%;
				}
				.lsw-col-lg-3 {
					width: 33.2222%;
				}
				.lsw-col-lg-4 {
					width: 24.9%;
				}
				.lsw-col-lg-5 {
					 width: 33.2222%;
				}
				.lsw-col-lg-6 {
					width: 16.6667%;
				}				
				div.tp_logo_showcase_pro_main .tp_logo_showcase_pro_area .logo_showcase_pro_ls_items {
				  position: relative;
				  transition: all 0.3s ease 0s;
				}
				/* md */
				@media (min-width: 992px) and (max-width: 1100px) {
					.lsw-col-md-1{
						width: 100%;
					}
					.lsw-col-md-2{
						width: 50%;
					}
					.lsw-col-md-3{
						width: 33.22222222%;
					}
					.lsw-col-md-4{
						width: 24.9%;
					}
					.lsw-col-md-5{
						width: 19.9%;
					}
					.lsw-col-md-6{
						width: 16.66666666666667%;
					}

				}

				/* sm */
				@media (min-width: 650px) and (max-width: 991px) {

					.lsw-col-sm-1{
						width: 100%;
					}
					.lsw-col-sm-2{
						width: 49.9%;
					}
					.lsw-col-sm-3{
						width: 33.22222222%;
					}
					.lsw-col-sm-4{
						width: 24.9%;
					}
					.lsw-col-sm-5{
						width: 19.9%;
					}
					.lsw-col-sm-6{
						width: 16.66666666666667%;
					}


				}

				/* xs */
				@media (max-width: 651px) {
					.lsw-col-xs-1{
						width: 100%;
					}
					.lsw-col-xs-2{
						width: 49.9%;
					}
					.lsw-col-xs-3{
						width: 33.22222222%;
					}
					.lsw-col-xs-4{
						width: 24.9%;
					}
					.lsw-col-xs-5{
						width: 19.9%;
					}
					.lsw-col-xs-6{
						width: 16.66666666666667%;
					}


				}




				</style>
				';
				$content.='</div></div>';


			return $content;
            
			}
			elseif($pricing_table_wordpress_post_themes=="theme2")
			{
			$content = '';

			$content.='<div class="pricingTable-main-area_'.$ptwrndsk.'"><div class="pricingTable-bg_'.$ptwrndsk.'">';
				foreach((array)$featuress as $feature){
					$content.='
					<div class="lsw-col-lg-5 lsw-col-md-4 lsw-col-sm-2 lsw-col-xs-1">
						<div class="pricingTable_'.$ptwrndsk.'">
							<div class="pricingTable-header_'.$ptwrndsk.'">
								<span style="background:'.$feature['pricing_wordpress_header_bg_color'].';color:'.$feature['pricing_wordpress_header_font_color'].'" class="heading_'.$ptwrndsk.'">
									<h3 style="font-size:'.$pricing_table_wordpress_header_f_size.'px;">'.$feature['pricing_table_wordpress_title'].'</h3>
								</span>
								<span style="background:'.$feature['pricing_wordpress_header_bg_color'].';color:'.$feature['pricing_wordpress_header_font_color'].'" class="price-value_'.$ptwrndsk.'">'.$feature['pricing_table_wordpress_package_currency'].'<span>'.$feature['pricing_table_wordpress_package_price'].'</span></span>
							</div>
							<div style="color:'.$pricing_table_wordpress_features_font_color.';font-size:'.$pricing_table_wordpress_features_f_size.'px" class="pricingContent_'.$ptwrndsk.'">
								<ul>';
								
								foreach ($feature['pricing_table_wordpress_features_column'] as $value) {
									$content.='<li>'.esc_attr($value).'</li>';
								}
									
								$content.='</ul>
							</div>
							<div class="pricingTable-sign-up_'.$ptwrndsk.'">
								<a style="background:'.$feature['pricing_wordpress_header_bg_color'].'" href="'.esc_url($feature['pricing_table_wordpress_package_buy_link']).'" class="btn'.$ptwrndsk.' btn-block'.$ptwrndsk.' btn-default'.$ptwrndsk.'">'.$feature['pricing_table_wordpress_package_buy_button'].'</a>
							</div>
						</div>
					</div>
					';
				};

				$content.='
				<style type="text/css">

					.pricingTable_'.$ptwrndsk.'{
						text-align: center;
						border:1px solid #e7e7e7;
						transition: all 0.2s ease-in-out 0s;
					}
					.pricingTable_'.$ptwrndsk.':hover{
						margin-top: -20px;
					}
					.pricingTable_'.$ptwrndsk.' > .pricingTable-header_'.$ptwrndsk.'{
						color:#fff;
					}
					.pricingTable-header_'.$ptwrndsk.' > .heading_'.$ptwrndsk.'{
						display: block;
						padding: 50px 0 0;
						background: #34495e;
					}
					.heading_'.$ptwrndsk.' > h3{
						margin: 0;
						text-transform: uppercase;
						font-weight: bold;
						font-size: 18px;
					}
					.pricingTable-header_'.$ptwrndsk.' > .price-value_'.$ptwrndsk.'{
						background: #34495e;
						display: block;
						padding: 5px 0 50px 0;
						color:#e67e22;
						font-size: 70px;
						font-weight: bold;
						line-height: 70px;
					}
					.pricingTable_'.$ptwrndsk.' > .pricingContent_'.$ptwrndsk.'{
						color:#888888;
					}
					.pricingTable_'.$ptwrndsk.' .pricingContent_'.$ptwrndsk.' > ul {
					  margin: 0;
					  padding: 0;
					}
					.pricingTable_'.$ptwrndsk.' > .pricingContent_'.$ptwrndsk.' > ul{
						list-style: none;
						padding: 0;
						margin-bottom: 0;
					}
					.pricingTable_'.$ptwrndsk.' > .pricingContent_'.$ptwrndsk.' > ul > li{
						padding: 15px;
						border-bottom: 1px solid #e7e7e7;
					}
					.pricingTable_'.$ptwrndsk.' > .pricingContent_'.$ptwrndsk.' > ul > li:nth-child(even){
						background: #F8F8F8;
					}
					.pricingTable-sign-up_'.$ptwrndsk.'{
						padding: 15px;
						background: #F8F8F8;
					}
					.pricingTable-sign-up_'.$ptwrndsk.' > .btn-block'.$ptwrndsk.'{
						background: #e67e22;
						color:#fff;
						text-transform: uppercase;
						width:45%;
						margin: 0 auto;
						padding: 6px 10px;
						border: 0px none;
						font-weight: bold;
					}
					.mid .heading'.$ptwrndsk.', .mid .price-value_'.$ptwrndsk.'{
						background: #e67e22;
					}
					.mid .price-value_'.$ptwrndsk.'{
						color: #34495e;
					}
					@media only screen and (max-width: 990px){
						.pricingTable-header_'.$ptwrndsk.' > .heading'.$ptwrndsk.'{
							padding-top: 30px;
						}
						.pricingTable-header_'.$ptwrndsk.' > .price-value_'.$ptwrndsk.'{
							font-size: 50px;
							padding-bottom: 30px;
						}
						.pricingTable-sign-up_'.$ptwrndsk.' > .btn-block'.$ptwrndsk.'{
							width: 60%;
						}
					}
					 
					@media only screen and (max-width: 768px){
						.pricingTable_'.$ptwrndsk.'{
							margin-bottom: 40px;
						}
					}

				.lsw-col-lg-1, .lsw-col-lg-2, .lsw-col-lg-3, .lsw-col-lg-4, .lsw-col-lg-5, .lsw-col-lg-6, .lsw-col-md-1, .lsw-col-md-2, .lsw-col-md-3, .lsw-col-md-4, .lsw-col-md-5, .lsw-col-md-6, .lsw-col-sm-1, .lsw-col-sm-2, .lsw-col-sm-3, .lsw-col-sm-4, .lsw-col-sm-5, .lsw-col-sm-6, .lsw-col-xs-1, .lsw-col-xs-2, .lsw-col-xs-3, .lsw-col-xs-4, .lsw-col-xs-5, .lsw-col-xs-6 {
					float: left;
					margin-bottom: 10px;
					min-height: 1px;
					padding-left: 5px;
					padding-right: 5px;
					position: relative;
				}
				.lsw-col-lg-1 {
					width: 100%;
				}
				.lsw-col-lg-2 {
					width: 50%;
				}
				.lsw-col-lg-3 {
					width: 33.2222%;
				}
				.lsw-col-lg-4 {
					width: 24.9%;
				}
				.lsw-col-lg-5 {
					 width: 33.2222%;
				}
				.lsw-col-lg-6 {
					width: 16.6667%;
				}				
				div.tp_logo_showcase_pro_main .tp_logo_showcase_pro_area .logo_showcase_pro_ls_items {
				  position: relative;
				  transition: all 0.3s ease 0s;
				}
				/* md */
				@media (min-width: 992px) and (max-width: 1100px) {
					.lsw-col-md-1{
						width: 100%;
					}
					.lsw-col-md-2{
						width: 50%;
					}
					.lsw-col-md-3{
						width: 33.22222222%;
					}
					.lsw-col-md-4{
						width: 24.9%;
					}
					.lsw-col-md-5{
						width: 19.9%;
					}
					.lsw-col-md-6{
						width: 16.66666666666667%;
					}

				}

				/* sm */
				@media (min-width: 650px) and (max-width: 991px) {

					.lsw-col-sm-1{
						width: 100%;
					}
					.lsw-col-sm-2{
						width: 49.9%;
					}
					.lsw-col-sm-3{
						width: 33.22222222%;
					}
					.lsw-col-sm-4{
						width: 24.9%;
					}
					.lsw-col-sm-5{
						width: 19.9%;
					}
					.lsw-col-sm-6{
						width: 16.66666666666667%;
					}


				}

				/* xs */
				@media (max-width: 651px) {
					.lsw-col-xs-1{
						width: 100%;
					}
					.lsw-col-xs-2{
						width: 49.9%;
					}
					.lsw-col-xs-3{
						width: 33.22222222%;
					}
					.lsw-col-xs-4{
						width: 24.9%;
					}
					.lsw-col-xs-5{
						width: 19.9%;
					}
					.lsw-col-xs-6{
						width: 16.66666666666667%;
					}


				}




				</style>
				';
				$content.='</div></div>';


			return $content;
            
			}
		elseif($pricing_table_wordpress_post_themes=="theme3")
			{
			$content = '';

			$content.='<div class="pricingTable-main-area_'.$ptwrndsk.'"><div class="pricingTable-bg_'.$ptwrndsk.'">';
				foreach((array)$featuress as $feature){
					$content.='
					<div class="lsw-col-lg-5 lsw-col-md-4 lsw-col-sm-2 lsw-col-xs-1">
						<div class="pricingTable_'.$ptwrndsk.'">
							<div style="background:'.$feature['pricing_wordpress_header_bg_color'].';border-left:2px solid '.$feature['pricing_wordpress_header_bg_color'].';border-right:2px solid '.$feature['pricing_wordpress_header_bg_color'].';" class="pricingTable-header_'.$ptwrndsk.'">
								<h3 style="color:'.$feature['pricing_wordpress_header_font_color'].';font-size:'.$pricing_table_wordpress_header_f_size.'px;" class="heading_'.$ptwrndsk.'">'.$feature['pricing_table_wordpress_title'].'</h3>
								<span style="color:'.$pricing_table_wordpress_subtitle_font_color.';font-size:'.$pricing_table_wordpress_subtitle_f_size.'px" class="subtitle_'.$ptwrndsk.'">'.$feature['pricing_wordpress_sub_title'].'</span>
								<div class="price-value_'.$ptwrndsk.'">'.$feature['pricing_table_wordpress_package_price'].'
									<span class="currency_'.$ptwrndsk.'">'.$feature['pricing_table_wordpress_package_currency'].'</span>
									<span class="month_'.$ptwrndsk.'">/'.$feature['pricing_table_wordpress_pricing_per'].'</span>
								</div>
							</div>
							<ul class="pricing-content_'.$ptwrndsk.'">';
							
							foreach ($feature['pricing_table_wordpress_features_column'] as $value) {
								$content.='<li style="color:'.$pricing_table_wordpress_features_font_color.';font-size:'.$pricing_table_wordpress_features_f_size.'px">'.esc_attr($value).'</li>';
							}
								
							$content.='</ul>
							<a style="color:'.$feature['pricing_wordpress_header_bg_color'].';box-shadow:none;" href="'.esc_url($feature['pricing_table_wordpress_package_buy_link']).'" class="read_'.$ptwrndsk.'">'.$feature['pricing_table_wordpress_package_buy_button'].'<i class="fa fa-angle-right"></i></a>
						</div>
					</div>
					';
				};

				$content.='
				<style type="text/css">
				.pricingTable-main-area_'.$ptwrndsk.' {
				  display: block;
 				 overflow: hidden;
				}
				.pricingTable_'.$ptwrndsk.'{
					border: 2px solid #e3e3e3;
					text-align: center;
					position: relative;
					padding-bottom: 40px;
					transform: translateZ(0px);
				}
				.pricingTable_'.$ptwrndsk.':before,
				.pricingTable_'.$ptwrndsk.':after{
					content: "";
					position: absolute;
					top: -2px;
					left: -2px;
					right: -2px;
					z-index: -1;
					transition: all 0.5s ease 0s;
				}
				.pricingTable_'.$ptwrndsk.':before{
				}
				.pricingTable_'.$ptwrndsk.':after{
					border-bottom: 2px solid #08c6aa;
					border-top: 2px solid #08c6aa;
					transform: scaleX(0);
					transform-origin: 0 100% 0;
				}
				.pricingTable_'.$ptwrndsk.':hover:before{
					transform: scaleY(1);
				}
				.pricingTable_'.$ptwrndsk.':hover:after{
					transform: scaleX(1);
				}
				.pricingTable_'.$ptwrndsk.' .pricingTable-header_'.$ptwrndsk.'{
					background: #08c6aa;
					color: #fff;
					margin: -2px -2px 35px;
					padding: 40px 0;
				}
				.pricingTable_'.$ptwrndsk.' .heading_'.$ptwrndsk.'{
					font-size: 30px;
					font-weight: 600;
					margin: 0 0 5px 0;
				}
				.pricingTable_'.$ptwrndsk.' .subtitle_'.$ptwrndsk.'{
					font-size: 14px;
					display: block;
				}
				.pricingTable_'.$ptwrndsk.' .price-value_'.$ptwrndsk.'{
					font-size: 72px;
					font-weight: 600;
					margin-top: 10px;
					position: relative;
					display: inline-block;
				}
				.pricingTable_'.$ptwrndsk.' .currency_'.$ptwrndsk.'{
					font-size: 45px;
					font-weight: normal;
					position: absolute;
					top: 2px;
					left: -30px;
				}
				.pricingTable_'.$ptwrndsk.' .month_'.$ptwrndsk.'{
					font-size: 20px;
					position: absolute;
					bottom: 17px;
					right: -53px;
				}
				.pricingTable_'.$ptwrndsk.' .pricing-content_'.$ptwrndsk.'{
					list-style: none;
					padding: 0;
					margin-bottom: 30px;
				}
				.pricingTable_'.$ptwrndsk.' ul {
 					 margin: 0;
 					 padding: 0;
				}
				.pricingTable_'.$ptwrndsk.' .pricing-content_'.$ptwrndsk.' li{
					font-size: 16px;
					color: #7a7e82;
					line-height: 40px;
				}
				.pricingTable_'.$ptwrndsk.' .read_'.$ptwrndsk.'{
					display: inline-block;
					border: 2px solid #7a7e82;
					border-right: none;
					font-size: 14px;
					font-weight: 700;
					color: #7a7e82;
					padding: 9px 30px;
					position: relative;
					text-transform: uppercase;
					transition: all 0.3s ease 0s;
				}
				.pricingTable_'.$ptwrndsk.' .read_'.$ptwrndsk.':hover{
					color: #08c6aa;
				}
				.pricingTable_'.$ptwrndsk.' .read_'.$ptwrndsk.' i{
					font-size: 19px;
					margin-top: -10px;
					position: absolute;
					top: 50%;
					right: 15px;
					transition: all 0.3s ease 0s;
				}
				.pricingTable_'.$ptwrndsk.' .read_'.$ptwrndsk.':hover i{
					right: 5px;
				}
				.pricingTable_'.$ptwrndsk.' .read_'.$ptwrndsk.':before,
				.pricingTable_'.$ptwrndsk.' .read_'.$ptwrndsk.':after{
					content: "";
					display: block;
					height: 30px;
					border-left: 2px solid #7a7e82;
					position: absolute;
					right: -11px;
					transition: all 0.3s ease 0s;
				}
				.pricingTable_'.$ptwrndsk.' .read_'.$ptwrndsk.':before{
					bottom: -6px;
					transform: rotate(45deg);
				}
				.pricingTable_'.$ptwrndsk.' .read_'.$ptwrndsk.':after{
					top: -6px;
					transform: rotate(-45deg);
				}
				.pricingTable_'.$ptwrndsk.' .read_'.$ptwrndsk.':hover:before,
				.pricingTable_'.$ptwrndsk.' .read_'.$ptwrndsk.':hover:after{
					
				}
				@media screen and (max-width: 990px){
					.pricingTable_'.$ptwrndsk.'{ margin-bottom: 25px; }
				}

				.lsw-col-lg-1, .lsw-col-lg-2, .lsw-col-lg-3, .lsw-col-lg-4, .lsw-col-lg-5, .lsw-col-lg-6, .lsw-col-md-1, .lsw-col-md-2, .lsw-col-md-3, .lsw-col-md-4, .lsw-col-md-5, .lsw-col-md-6, .lsw-col-sm-1, .lsw-col-sm-2, .lsw-col-sm-3, .lsw-col-sm-4, .lsw-col-sm-5, .lsw-col-sm-6, .lsw-col-xs-1, .lsw-col-xs-2, .lsw-col-xs-3, .lsw-col-xs-4, .lsw-col-xs-5, .lsw-col-xs-6 {
					float: left;
					margin-bottom: 10px;
					min-height: 1px;
					padding-left: 5px;
					padding-right: 5px;
					position: relative;
				}
				.lsw-col-lg-1 {
					width: 100%;
				}
				.lsw-col-lg-2 {
					width: 50%;
				}
				.lsw-col-lg-3 {
					width: 33.2222%;
				}
				.lsw-col-lg-4 {
					width: 24.9%;
				}
				.lsw-col-lg-5 {
					 width: 33.2222%;
				}
				.lsw-col-lg-6 {
					width: 16.6667%;
				}				
				div.tp_logo_showcase_pro_main .tp_logo_showcase_pro_area .logo_showcase_pro_ls_items {
				  position: relative;
				  transition: all 0.3s ease 0s;
				}
				/* md */
				@media (min-width: 992px) and (max-width: 1100px) {
					.lsw-col-md-1{
						width: 100%;
					}
					.lsw-col-md-2{
						width: 50%;
					}
					.lsw-col-md-3{
						width: 33.22222222%;
					}
					.lsw-col-md-4{
						width: 24.9%;
					}
					.lsw-col-md-5{
						width: 19.9%;
					}
					.lsw-col-md-6{
						width: 16.66666666666667%;
					}

				}

				/* sm */
				@media (min-width: 650px) and (max-width: 991px) {

					.lsw-col-sm-1{
						width: 100%;
					}
					.lsw-col-sm-2{
						width: 49.9%;
					}
					.lsw-col-sm-3{
						width: 33.22222222%;
					}
					.lsw-col-sm-4{
						width: 24.9%;
					}
					.lsw-col-sm-5{
						width: 19.9%;
					}
					.lsw-col-sm-6{
						width: 16.66666666666667%;
					}


				}

				/* xs */
				@media (max-width: 651px) {
					.lsw-col-xs-1{
						width: 100%;
					}
					.lsw-col-xs-2{
						width: 49.9%;
					}
					.lsw-col-xs-3{
						width: 33.22222222%;
					}
					.lsw-col-xs-4{
						width: 24.9%;
					}
					.lsw-col-xs-5{
						width: 19.9%;
					}
					.lsw-col-xs-6{
						width: 16.66666666666667%;
					}


				}




				</style>
				';
				$content.='</div></div>';


			return $content;
            
			}
		elseif($pricing_table_wordpress_post_themes=="theme4")
			{
			$content = '';

			$content.='<div class="pricingTable-main-area_'.$ptwrndsk.'"><div class="pricingTable-bg_'.$ptwrndsk.'">';
				foreach((array)$featuress as $feature){
					$content.='
					<div class="lsw-col-lg-5 lsw-col-md-4 lsw-col-sm-2 lsw-col-xs-1">
						<div class="pricingTable_'.$ptwrndsk.'">
							<div class="pricingTable-header_'.$ptwrndsk.'">
								<span class="price-icon_'.$ptwrndsk.'"></span>
								<span class="price-value_'.$ptwrndsk.'">'.$feature['pricing_table_wordpress_package_currency'].''.$feature['pricing_table_wordpress_package_price'].'<span class="month_'.$ptwrndsk.'">'.$feature['pricing_table_wordpress_pricing_per'].'</span></span>
								<h3 class="heading_'.$ptwrndsk.'">'.$feature['pricing_table_wordpress_title'].'</h3>
							</div>
							<div class="pricingContent_'.$ptwrndsk.'">
								<ul>';
							foreach ($feature['pricing_table_wordpress_features_column'] as $value) {
								$content.='<li>'.esc_attr($value).'</li>';
							}
								$content.='</ul>
							</div>
							<div class="pricingTable-signup_'.$ptwrndsk.'">
								<a href="'.esc_url($feature['pricing_table_wordpress_package_buy_link']).'"><i class="fa fa-shopping-cart"></i> '.$feature['pricing_table_wordpress_package_buy_button'].'</a>
							</div>
						</div>
					</div>
					';
				};

				$content.='
				<style type="text/css">
				.pricingTable_'.$ptwrndsk.'{
					text-align: center;
					background: #fff;
					border-radius: 5px;
					margin-top: 60px;
				}
				.pricingTable_'.$ptwrndsk.' .pricingTable-header_'.$ptwrndsk.'{
					position: relative;
					border-bottom: 1px solid #e3e0e0;
					border-radius: 5px 5px 0 0;
					padding: 45px 0 0;
					transition: all 0.3s ease 0s;
				}
				.pricingTable_'.$ptwrndsk.':hover .pricingTable-header_'.$ptwrndsk.'{
					background-color: #b696e9;
				}
				.pricingTable_'.$ptwrndsk.' .price-icon_'.$ptwrndsk.'{
					display: block;
					width: 87px;
					height: 48px;
					background: #fff;
					border-left: 2px solid #b696e9;
					border-right: 2px solid #b696e9;
					position: absolute;
					top: -20px;
					left: 35%;
				}
				.pricingTable_'.$ptwrndsk.' .price-icon_'.$ptwrndsk.':after,
				.pricingTable_'.$ptwrndsk.' .price-icon_'.$ptwrndsk.':before{
					content: "";
					width: 61.5px;
					height: 61.5px;
					background: #fff;
					border-bottom: 3px solid #b696e9;
					border-left: 3px solid #b696e9;
					position: absolute;
					bottom: -31.012px;
					left: 10.5px;
					transform: scaleY(0.5774) rotate(-45deg);
					border-radius: 0 7px;
				}
				.pricingTable_'.$ptwrndsk.' .price-icon_'.$ptwrndsk.':before{
					border: 0px none;
					border-right: 3px solid #b696e9;
					border-top: 3px solid #b696e9;
					top: -31.012px;
				}
				.pricingTable_'.$ptwrndsk.' .price-value_'.$ptwrndsk.'{
					font-size: 25px;
					color: #b696e9;
					position: absolute;
					top: -24px;
					left: 43%;
				}
				.pricingTable_'.$ptwrndsk.' .month_'.$ptwrndsk.'{
					display: block;
					font-size: 12px;
					text-transform: uppercase;
				}
				.pricingTable_'.$ptwrndsk.' .heading_'.$ptwrndsk.'{
					font-size: 17px;
					color: #b696e9;
					letter-spacing: 1px;
					text-transform: uppercase;
					margin: 15px 0;
					transition: all 0.4s ease 0s;
				}
				.pricingTable_'.$ptwrndsk.':hover .heading_'.$ptwrndsk.'{
					color: #fff;
				}
				.pricingTable_'.$ptwrndsk.' .pricingContent_'.$ptwrndsk.' ul{
					padding: 0;
					margin: 0;
					list-style: none;
				}
				.pricingTable_'.$ptwrndsk.' .pricingContent_'.$ptwrndsk.' ul li{
					font-size: 14px;
					color: #878787;
					padding: 13px 0;
					border-bottom: 1px solid #dfeaf0;
				}
				.pricingTable_'.$ptwrndsk.' .pricingContent_'.$ptwrndsk.' ul li i{
					margin: 0 10px 0 0;
					font-style: italic;
					color: #b696e9;
				}
				.pricingTable_'.$ptwrndsk.' .pricingTable-signup_'.$ptwrndsk.'{
					padding: 30px 0;
				}
				.pricingTable_'.$ptwrndsk.' .pricingTable-signup_'.$ptwrndsk.' a{
					display: inline-block;
					font-size: 14px;
					font-style: italic;
					color: #999;
					text-transform: capitalize;
					background-color: #fff;
					border-radius: 25px;
					padding: 10px 25px;
					border: 2px solid #ece8e7;
					transition: all 0.4s ease 0s;
					box-shadow:none;
				}
				.pricingTable_'.$ptwrndsk.' .pricingTable-signup_'.$ptwrndsk.' a:hover{
					background: #b696e9;
					color: #fff;
					border-color: #b696e9;
				}
				.pricingTable_'.$ptwrndsk.' .pricingTable-signup_'.$ptwrndsk.' a i{
					margin-right: 5px;
				}
				@media screen and (max-width: 990px){
					.pricingTable_'.$ptwrndsk.'{ margin-bottom: 20px; }
					.pricingTable_'.$ptwrndsk.' .price-icon_'.$ptwrndsk.'{ left: 39%; }
					.pricingTable_'.$ptwrndsk.' .price-value_'.$ptwrndsk.'{ left: 44%;}
				}
				@media screen and (max-width: 767px){
					.pricingTable_'.$ptwrndsk.' .price-icon_'.$ptwrndsk.'{ left: 44%; }
					.pricingTable_'.$ptwrndsk.' .price-value_'.$ptwrndsk.'{ left: 48%;}
				}
				@media screen and (max-width: 480px){
					.pricingTable_'.$ptwrndsk.' .price-icon_'.$ptwrndsk.'{ left: 40%; }
					.pricingTable_'.$ptwrndsk.' .price-value_'.$ptwrndsk.'{ left: 44%;}
				}
				@media screen and (max-width: 360px){
					.pricingTable_'.$ptwrndsk.' .price-icon_'.$ptwrndsk.'{ left: 37%; }
					.pricingTable_'.$ptwrndsk.' .price-value_'.$ptwrndsk.'{ left: 48%;}
				}

				.lsw-col-lg-1, .lsw-col-lg-2, .lsw-col-lg-3, .lsw-col-lg-4, .lsw-col-lg-5, .lsw-col-lg-6, .lsw-col-md-1, .lsw-col-md-2, .lsw-col-md-3, .lsw-col-md-4, .lsw-col-md-5, .lsw-col-md-6, .lsw-col-sm-1, .lsw-col-sm-2, .lsw-col-sm-3, .lsw-col-sm-4, .lsw-col-sm-5, .lsw-col-sm-6, .lsw-col-xs-1, .lsw-col-xs-2, .lsw-col-xs-3, .lsw-col-xs-4, .lsw-col-xs-5, .lsw-col-xs-6 {
					float: left;
					margin-bottom: 10px;
					min-height: 1px;
					padding-left: 5px;
					padding-right: 5px;
					position: relative;
				}
				.lsw-col-lg-1 {
					width: 100%;
				}
				.lsw-col-lg-2 {
					width: 50%;
				}
				.lsw-col-lg-3 {
					width: 33.2222%;
				}
				.lsw-col-lg-4 {
					width: 24.9%;
				}
				.lsw-col-lg-5 {
					 width: 33.2222%;
				}
				.lsw-col-lg-6 {
					width: 16.6667%;
				}				
				div.tp_logo_showcase_pro_main .tp_logo_showcase_pro_area .logo_showcase_pro_ls_items {
				  position: relative;
				  transition: all 0.3s ease 0s;
				}
				/* md */
				@media (min-width: 992px) and (max-width: 1100px) {
					.lsw-col-md-1{
						width: 100%;
					}
					.lsw-col-md-2{
						width: 50%;
					}
					.lsw-col-md-3{
						width: 33.22222222%;
					}
					.lsw-col-md-4{
						width: 24.9%;
					}
					.lsw-col-md-5{
						width: 19.9%;
					}
					.lsw-col-md-6{
						width: 16.66666666666667%;
					}

				}

				/* sm */
				@media (min-width: 650px) and (max-width: 991px) {

					.lsw-col-sm-1{
						width: 100%;
					}
					.lsw-col-sm-2{
						width: 49.9%;
					}
					.lsw-col-sm-3{
						width: 33.22222222%;
					}
					.lsw-col-sm-4{
						width: 24.9%;
					}
					.lsw-col-sm-5{
						width: 19.9%;
					}
					.lsw-col-sm-6{
						width: 16.66666666666667%;
					}


				}

				/* xs */
				@media (max-width: 651px) {
					.lsw-col-xs-1{
						width: 100%;
					}
					.lsw-col-xs-2{
						width: 49.9%;
					}
					.lsw-col-xs-3{
						width: 33.22222222%;
					}
					.lsw-col-xs-4{
						width: 24.9%;
					}
					.lsw-col-xs-5{
						width: 19.9%;
					}
					.lsw-col-xs-6{
						width: 16.66666666666667%;
					}


				}




				</style>
				';
				$content.='</div></div>';


			return $content;
            
			}
		elseif($pricing_table_wordpress_post_themes=="theme5")
			{
			$content = '';

			$content.='<div class="pricingTable-main-area_'.$ptwrndsk.'"><div class="pricingTable-bg_'.$ptwrndsk.'">';
				foreach((array)$featuress as $feature){
					$content.='
					<div class="lsw-col-lg-5 lsw-col-md-4 lsw-col-sm-2 lsw-col-xs-1">
					
						<div class="pricingTable_'.$ptwrndsk.'">
							<div class="pricingTable-header_'.$ptwrndsk.'">
								<span style="background:'.$feature['pricing_wordpress_header_bg_color'].';color:'.$feature['pricing_wordpress_header_font_color'].'" class="heading_'.$ptwrndsk.'">
									<h3>'.$feature['pricing_table_wordpress_title'].'</h3>
									<span class="subtitle_'.$ptwrndsk.'">'.$feature['pricing_wordpress_sub_title'].'</span>
								</span>
								<span class="price-value_'.$ptwrndsk.'"><span class="usdicons_'.$ptwrndsk.'">'.$feature['pricing_table_wordpress_package_currency'].''.$feature['pricing_table_wordpress_package_price'].'</span><span></span><span class="mo_'.$ptwrndsk.'">'.$feature['pricing_table_wordpress_pricing_per'].'</span></span>
							</div>

							<div style="color:'.$pricing_table_wordpress_features_font_color.';font-size:'.$pricing_table_wordpress_features_f_size.'px" class="pricingContent_'.$ptwrndsk.'">
								<ul>';
									foreach ($feature['pricing_table_wordpress_features_column'] as $value) {
										$content.='<li>'.esc_attr($value).'</li>';
									}
								$content.='</ul>
							</div>
							
							<div class="pricingTable-sign-up_'.$ptwrndsk.'">
								<a style="background:'.$feature['pricing_wordpress_header_bg_color'].'" href="'.esc_url($feature['pricing_table_wordpress_package_buy_link']).'" class="btn btn-block_'.$ptwrndsk.' btn-default_'.$ptwrndsk.'">'.$feature['pricing_table_wordpress_package_buy_button'].'</a>
							</div>
						</div>
					
					</div>
					';
				};

				$content.='
				<style type="text/css">

				
				.pricingTable-main-area_'.$ptwrndsk.' {
				  display: block;
 				 overflow: hidden;
				}			
				
				
				.pricingTable_'.$ptwrndsk.'{
					text-align: center;
					border: 1px solid #dbdbdb;
					box-shadow: 0 0 10px rgba(0, 0, 0, 0.14);
					border-radius: 10px;
				}
				.pricingTable_'.$ptwrndsk.':hover .price-value_'.$ptwrndsk.'{
					transform: rotate(360deg);
					transition:0.6s ease;
				}
				.pricingTable_'.$ptwrndsk.' > .pricingTable-header_'.$ptwrndsk.'{
					color:#fff;
				}
				.pricingTable-header_'.$ptwrndsk.' > .heading_'.$ptwrndsk.'{
					background: #e67e22;
					display: block;
					padding: 7px 10px;
					border-radius: 10px 10px 0 0;
				}
				span.usdicons_'.$ptwrndsk.' {
				  display: block;
				  overflow: hidden;
				}
				.heading_'.$ptwrndsk.' > h3{
					font-weight:bold;
					margin: 0;
					text-transform: uppercase;
				}
				.heading_'.$ptwrndsk.' > .subtitle_'.$ptwrndsk.'{
					font-size: 13px;
					margin-top: 3px;
					display: block;
				}
				.pricingTable-header_'.$ptwrndsk.' > .price-value_'.$ptwrndsk.'{
					width: 120px;
					height: 120px;
					border-radius: 50%;
					border:2px solid #474747;
					display: block;
					margin: 0 auto;
					color:#474747;
					font-size: 25px;
					font-weight: 800;
					margin-top: 10px;
					padding: 20px 10px 0 10px;
					line-height: 35px;
				}
				.price-value_'.$ptwrndsk.' > span_'.$ptwrndsk.'{
					font-size: 40px;
				}
				.price-value_'.$ptwrndsk.' > .mo{
					display: inline-block;
					line-height: 0;
					padding-top: 13px;
					border-top: 1px solid #474747;
					text-transform: uppercase;
					letter-spacing: 2px;
					font-size: 13px;
					margin-top: -20px;
				}
				.pricingTable_'.$ptwrndsk.' > .pricingContent_'.$ptwrndsk.'{
					margin: 10px 0 0 0;
				}
				.pricingContent_'.$ptwrndsk.' > ul{
					padding: 0;
					list-style: none;
					margin-bottom: 0;
				}
				.pricingTable_'.$ptwrndsk.' .pricingContent_'.$ptwrndsk.' ul {
				  margin: 0;
				  padding: 0;
				}
				.btn.btn-block_'.$ptwrndsk.'.btn-default_'.$ptwrndsk.' {
				  color: #000;
				}
				.pricingContent_'.$ptwrndsk.' > ul > li{
					border-top: 1px solid #dbdbdb;
					padding: 10px 0;
					text-align: center;
					transition:0.4s ease-in-out;
				}
				.pricingContent_'.$ptwrndsk.' > ul > li:before{
					content: "\f101";
					font-family: "FontAwesome";
					color:#e67e22;
					margin-right: 10px;
				}
				.pricingContent_'.$ptwrndsk.' > ul > li:hover{
					padding-left: 15px;
					transition:0.4s ease-in-out;
				}
				.pricingContent_'.$ptwrndsk.' > ul > li:last-child{
					border-bottom: 1px solid #dbdbdb;
				}
				.pricingTable_'.$ptwrndsk.' > .pricingTable-sign-up_'.$ptwrndsk.'{
					padding: 25px 0;
				}
				.btn-block_'.$ptwrndsk.'{
					width: 50%;
					margin: 0 auto;
					background: #e67e22;
					border:0px none;
					padding: 10px 5px;
					color:#fff;
					text-transform: capitalize;
					transition:0.3s ease;
					border-radius: 0px;
				}
				.btn-block_'.$ptwrndsk.':after{
					content: "\f090";
					font-family: "FontAwesome";
					padding-left: 10px;
					font-size: 15px;
				}
				.btn-block_'.$ptwrndsk.':hover{
					border-radius: 10px;
					background: #e67e22;
					color:#fff;
				}
				@media screen and (max-width: 990px){
					.pricingTable_'.$ptwrndsk.'{
						margin-bottom: 20px;
					}
				}
				
				
				
				
				
				
				
				
				
				
				
				
				.lsw-col-lg-1, .lsw-col-lg-2, .lsw-col-lg-3, .lsw-col-lg-4, .lsw-col-lg-5, .lsw-col-lg-6, .lsw-col-md-1, .lsw-col-md-2, .lsw-col-md-3, .lsw-col-md-4, .lsw-col-md-5, .lsw-col-md-6, .lsw-col-sm-1, .lsw-col-sm-2, .lsw-col-sm-3, .lsw-col-sm-4, .lsw-col-sm-5, .lsw-col-sm-6, .lsw-col-xs-1, .lsw-col-xs-2, .lsw-col-xs-3, .lsw-col-xs-4, .lsw-col-xs-5, .lsw-col-xs-6 {
					float: left;
					margin-bottom: 10px;
					min-height: 1px;
					padding-left: 5px;
					padding-right: 5px;
					position: relative;
				}
				.lsw-col-lg-1 {
					width: 100%;
				}
				.lsw-col-lg-2 {
					width: 50%;
				}
				.lsw-col-lg-3 {
					width: 33.2222%;
				}
				.lsw-col-lg-4 {
					width: 24.9%;
				}
				.lsw-col-lg-5 {
					 width: 33.2222%;
				}
				.lsw-col-lg-6 {
					width: 16.6667%;
				}				
				div.tp_logo_showcase_pro_main .tp_logo_showcase_pro_area .logo_showcase_pro_ls_items {
				  position: relative;
				  transition: all 0.3s ease 0s;
				}
				/* md */
				@media (min-width: 992px) and (max-width: 1100px) {
					.lsw-col-md-1{
						width: 100%;
					}
					.lsw-col-md-2{
						width: 50%;
					}
					.lsw-col-md-3{
						width: 33.22222222%;
					}
					.lsw-col-md-4{
						width: 24.9%;
					}
					.lsw-col-md-5{
						width: 19.9%;
					}
					.lsw-col-md-6{
						width: 16.66666666666667%;
					}

				}

				/* sm */
				@media (min-width: 650px) and (max-width: 991px) {

					.lsw-col-sm-1{
						width: 100%;
					}
					.lsw-col-sm-2{
						width: 49.9%;
					}
					.lsw-col-sm-3{
						width: 33.22222222%;
					}
					.lsw-col-sm-4{
						width: 24.9%;
					}
					.lsw-col-sm-5{
						width: 19.9%;
					}
					.lsw-col-sm-6{
						width: 16.66666666666667%;
					}


				}

				/* xs */
				@media (max-width: 651px) {
					.lsw-col-xs-1{
						width: 100%;
					}
					.lsw-col-xs-2{
						width: 49.9%;
					}
					.lsw-col-xs-3{
						width: 33.22222222%;
					}
					.lsw-col-xs-4{
						width: 24.9%;
					}
					.lsw-col-xs-5{
						width: 19.9%;
					}
					.lsw-col-xs-6{
						width: 16.66666666666667%;
					}

				}
				</style>
				';
				$content.='</div></div>';


			return $content;
            
			}
		else
			{
            
            echo 'Nothing Found!!';

			}

}

?>