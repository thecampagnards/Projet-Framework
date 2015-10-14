<h1><?php echo $title; ?></h1>
<hr>
<p class="titre" align="center"">
Salut : <?php echo $texte; ?>
</p>
<?php content_for('side'); ?>
<ul>
<li><a href="<?php echo url_for('/pages/item1')?>">Item 1</a></li>
<li><a href="<?php echo url_for('/pages/item2')?>">Item 2</a></li>
</ul>
<?php end_content_for(); ?>
