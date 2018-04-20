<?php if (!defined('FW')) die('Forbidden'); ?>
<?php if (isset($data['slides'])): ?>
	<div id="dw-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner" role="listbox">
		<?php $i = 0; ?>
		<?php foreach ($data['slides'] as $id => $slide): ?>
			<div class="item<?php if ( 0 === $i ): echo ' active'; endif; ?>" style="/*position: relative;*/ <?php echo $slide['extra']['custom_css'];?> background-color: <?php echo $slide['extra']['bg_color']?>; background-repeat:<?php echo $slide['extra']['bg_repeat']?>; background-position:<?php echo $slide['extra']['bg_position']?>; background-image:url(<?php echo $slide['extra']['bg_image']['url']?>); background-size:<?php echo $slide['extra']['bg_size']?>;">
				<div class="container" style="position: relative; z-index: 1;">
					<div class="row">
						<?php if($slide['src']):?>
						<div class="<?php if($slide['title']=='' && $slide['desc']=='' && $slide['extra']['button_1']['status']=='hide' && $slide['extra']['button_2']['status']=='hide'): echo 'col-md-12'; else: echo 'col-md-6'; endif;?> <?php if($slide['extra']['img-align']=='left'): echo 'pull-left'; else: echo 'pull-right'; endif;?>">
							<img class="img-responsive" src="<?php echo esc_attr( $slide['src'] ); ?>" alt="<?php echo esc_attr($slide['title']); ?>">
						</div>
						<?php endif;?>
						<?php if($slide['title']!='' || $slide['desc']!='' || $slide['extra']['button_1']['status']=='show' || $slide['extra']['button_2']['status']=='show'):?>
						<div class="<?php if($slide['src']): echo 'col-md-6'; else: echo 'col-md-12'; endif;?> <?php if($slide['extra']['text-align']=='left'): echo 'text-left'; elseif ($slide['extra']['text-align']=='right'): echo 'text-right';  elseif ($slide['extra']['text-align']=='center'): echo 'text-center'; endif;?>">

							<?php if($slide['title']):?>
							<h2><?php echo esc_attr($slide['title']); ?></h2>
							<?php endif;?>

							<?php if($slide['desc']):?>
							<p><?php echo esc_attr($slide['desc']); ?></p>
							<?php endif;?>

							<?php if($slide['extra']['button_1']['status']=='show' && $slide['extra']['button_1']['show']['text_button']!=''):?>
							<a class="btn btn-<?php echo $slide['extra']['button_1']['show']['button_style'] ?> <?php echo $slide['extra']['button_1']['show']['button_size'] ?>" href="<?php echo $slide['extra']['button_1']['show']['url_button']?>"><?php echo $slide['extra']['button_1']['show']['text_button']?></a>
							<?php endif;?>

							<?php if($slide['extra']['button_2']['status']=='show' && $slide['extra']['button_2']['show']['text_button']!='' ):?>
							<a class="btn btn-<?php echo $slide['extra']['button_2']['show']['button_style'] ?> <?php echo $slide['extra']['button_2']['show']['button_size'] ?>" href="<?php echo $slide['extra']['button_2']['show']['url_button']?>"><?php echo $slide['extra']['button_2']['show']['text_button']?></a>
							<?php endif;?>
						</div>
						<?php endif;?>
					</div>
				</div>
				<?php if($slide['extra']['overlay']['status']=='on'):?>
					<div style="z-index: 0;position: absolute;top: 0; left:0; bottom:0; right:0; background: <?php echo $slide['extra']['overlay']['on']['overlay_color']?>; opacity: <?php echo $slide['extra']['overlay']['on']['overlay_opacity']?>;"></div>
				<?php endif;?>
			</div>

			<?php $i++; endforeach; ?>
		</div>

		<?php if ( 1 < $i ) : ?>
		<?php if($data['settings']['extra']['sw_control']=='show'):?>
		<a class="left carousel-control" href="#dw-carousel" role="button" data-slide="prev">
			<span class="fa fa-angle-left" aria-hidden="true"></span>
			<span class="sr-only"><?php _e( 'Previous', 'wp-starter' ); ?></span>
		</a>
		<?php endif; ?>

		<?php if($data['settings']['extra']['sw_control']=='show'):?>
		<a class="right carousel-control" href="#dw-carousel" role="button" data-slide="next">
			<span class="fa fa-angle-right" aria-hidden="true"></span>
			<span class="sr-only"><?php _e( 'Next', 'wp-starter' ); ?></span>
		</a>
		<?php endif; ?>

		<?php if($data['settings']['extra']['sw_indicators']=='show'):?>
		<ol class="carousel-indicators">
			<?php $j = 0; ?>
			<?php foreach ($data['slides'] as $id => $slide): ?>
				<li data-target="#dw-carousel" data-slide-to="<?php echo esc_attr( $j ); ?>"<?php if ( 0 === $j ) echo ' class="active"'; ?>></li>
			<?php $j++; endforeach; ?>
		</ol>
		<?php endif; ?>
	<?php endif; ?>
	</div>
<?php endif; ?>
