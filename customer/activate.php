<?php $page_title = 'Account Shop Activated - Kasi Mall'; ?>
<?php include_once('includes/header.php'); ?>


<section class="container card-show">
    <center>
        <div class="card card1 card-spacing">

            <div class="container logo" align="center">
                <img src="images/kasilogo.jpg" alt="">
            </div>

            <form class="" action="" method="post">

                <?php if (isset($result)) echo $result; ?>
                <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>


            </form>

        </div>
    </center>
</section>



<?php include('includes/footer.php'); ?>