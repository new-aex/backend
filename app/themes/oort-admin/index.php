<?php 
$msg = get_field('messages', 'options');
?>

<div class="page__inner">
<?php echo $msg['intro'];?>
</div>

<?php get_template_part('templates/add-event'); ?>
