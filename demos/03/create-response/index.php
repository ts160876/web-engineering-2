<?php
//We keep it very simple here and assume to receive three parameters in the query.
//We do not pay attention to errors.
//- response: the response to be sent back to the client
//- format: the format for the response (html, json)
//- responseCode: the HTTP status code (200, 404...)
$response = $_GET['response'];
$format = $_GET['format'];
$responseCode = $_GET['responseCode'];
?>

<?php
//This is where the generation of the HTML (respectively JSON) content starts.
//The default format is HTML.
if ($format != 'json'): ?>

    <!DOCTYPE html>
    <html lang="en-US">

    <head>
        <title>Create Response</title>
        <meta charset="UTF-8" />
    </head>

    <body>
        <ul>
            <li>response: <?php echo $response ?></li>
            <li>format: <?php echo $format ?></li>
            <li>responseCode: <?php echo $responseCode ?></li>
        </ul>
    </body>

<?php
//Even if JSON is requested, we do not set the "Content-Type" header. We accept that the content type is wrong.
else: ?>
    {
    "response": "<?php echo $response ?>",
    "format": "<?php echo $format ?>",
    "responseCode": <?php echo $responseCode ?>
    }
<?php endif; ?>