<?php
//We keep it very simple here and assume to receive three parameters in the query.
//We do not pay attention to errors.
//- response: the response to be sent back to the client
//- format: the format for the response (html, json)
//- responseCode: the HTTP status code (200, 404...)
$response = $_GET['response'];
$format = $_GET['format'];
$responseCode = $_GET['responseCode'];

//This file is identical to the example "create-response" except that it sets also
//the response headers and status code correctly.
//- Response headers
if ($format != 'json') {
    header('Content-Type: text/html;charset=UTF-8');
} else {
    header('Content-Type: application/json;charset=UTF-8');
}
//- Status code
http_response_code((int)$responseCode);
?>

<?php
//This is where the generation of the HTML (respectively JSON) content starts.
//The default format is HTML.
if ($format != 'json'): ?>

    <!DOCTYPE html>
    <html lang="en-US">

    <head>
        <title>Set Response Headers and Status Code</title>
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