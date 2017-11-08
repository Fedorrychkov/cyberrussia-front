
<?php include "../../partials/header.php"; ?>
<?php

$DOC_ROOT2 = $_SERVER['DOCUMENT_ROOT'].'/cyberfront';
$DOC_ROOT = '//'.$_SERVER['HTTP_HOST'].'/cyberfront';

?>

<main class="main wrapper class-flex">
    <?php for($i=0; $i<10; $i++) {?>
    <article class="class">
        <div class="class-prev">
            <img src="<?php echo $DOC_ROOT; ?>/assets/img/preview.jpg" alt="">
        </div>
        <div class="class-desc">
            <div class="class-text">
                sadsadasd
            </div>
            <di class="class-controller">
                <a type="submit" href="<?php echo $DOC_ROOT?>/pages/streams" id="regbutton" class="waves-effect waves-light btn">Смотреть</a>
            </div>
        </div>
    </article>
    <?php }?>
</main>

<?php include "../../partials/footer.php"; ?>
