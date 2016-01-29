<?php echo "success" ?>

<?php
    require_once ('api_eby/ebay-sdk-php-autoloader.php');
    require_once ('api_aws/aws-autoloader.php');

    require_once ('eco_lib/autoloader.php');

    use eco_lib\Library as Library;
    use eco_lib\config\AWSConfig as AWSConfig;
    use eco_lib\config\EBYConfig as EBYConfig;

    $lib = new Library(new AWSConfig(), new EBYConfig());
?>