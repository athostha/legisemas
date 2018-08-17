<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        
        <title>           
            <?php echo $title_for_layout; ?>
        </title>

        <?php
        echo $this->fetch('meta');

        echo $this->Html->meta('icon');

        echo $this->Html->css(array(
            "/lib/bootstrap/css/bootstrap",
            "/lib/jquery-ui-1.10.1/css/smoothness/jquery-ui-1.10.1.custom.min",
            "/lib/jquery-ui-timepicker-addon/jquery-ui-timepicker-addon",
            "estilo.publico",
            "/lib/bootstrap/css/bootstrap-responsive",
            "/lib/lightbox/lightbox.css",
        )) . "\n";

        echo $this->Html->script(array(
            "/lib/jquery-ui-1.10.1/js/jquery-1.9.1",
            "/lib/bootstrap/js/bootstrap",
            "/lib/jquery-ui-1.10.1/js/jquery-ui-1.10.1.custom.min",
            "/lib/jquery-ui-timepicker-addon/jquery-ui-timepicker-addon",
            "/lib/lightbox/lightbox.min.js",
            "/lib/app"
        )) . "\n";

        //echo $this->fetch('css') . "\n";
        echo $this->fetch('script') . "\n";
        ?>
    </head>
    <body>

                    <?php echo $this->fetch('content'); ?>
    </body>
</html>
