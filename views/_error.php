<?php

/** @var $exception \Exception */
?>

<div class="error__container">
    <h1><?php echo $exception->getCode(); ?></h1>
    <h3><?php echo $exception->getMessage(); ?></h3>
</div>