<div class="logo">
<?php if ($theme->get_option('themater_logo_source') == 'image') { ?>
<a href="<?php echo home_url(); ?>"><img src="<?php $theme->option('logo'); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" /></a>
<?php } else { ?>
<?php if($theme->display('site_title')) { ?>
<h1 class="site_title"><a href="<?php echo home_url(); ?>"><?php $theme->option('site_title'); ?></a></h1>
<?php } ?>

<?php if($theme->display('site_description')) { ?>
<h2 class="site_description"><?php $theme->option('site_description'); ?></h2>
<?php } ?>
<?php } ?>
</div><!-- .logo -->