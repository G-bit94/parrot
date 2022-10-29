</div><!-- #content .site-content -->


</div><!-- #page -->

<?php if (get_theme_mod('back-top-on', true)) : ?>

	<div id="back-top">
		<a href="#top" title="<?php echo esc_html('Back to top', 'blogsite'); ?>"><span class="genericon genericon-collapse"></span></a>
	</div>

<?php endif; ?>

<script type="text/javascript">
	var e = document.getElementsByTagName('a');

	for (var i = 0; i < e.length; i++) {
		e[i].style.textDecoration = 'none';
	}

	var x = document.getElementsByClassName('footer-heading');

	for (var i = 0; i < x.length; i++) {
		x[i].style.textColor = '#fff';
	}
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/parrot/footer.php'; ?>