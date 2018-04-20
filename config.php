<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 4/20/2018
 * Time: 5:35 PM
 */
require 'composer/vendor/autoload.php';


date_default_timezone_set('UTC');

use Aws\DynamoDb\Exception\DynamoDbException;
use Aws\DynamoDb\Marshaler;


$sdk = new Aws\Sdk([
    'region'   => 'us-west-2',
    'version'  => 'latest',
    'credentials' => array(
        'key' => 'AKIAJK67RKM37AN2VLUA',
        'secret'  => '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',
    )
]);

$dynamodb = $sdk->createDynamoDb();
$marshaler = new Marshaler();
?>