<?php

// Include the required libraries
require_once 'index.php';

// Initialize the API
$baidu_pan_api = new Baidu_Pan_API();

// Create a UI to allow the user to paste a Baidu Pan direct link
echo '<html>
<head>
    <title>Baidu Pan Direct Link Parser</title>
</head>
<body>
    <h1>Baidu Pan Direct Link Parser</h1>
    <p>
        Paste the direct link from Baidu Pan here:
    </p>
    <form method="post">
        <input type="text" name="baidu_pan_link" />
        <input type="submit" value="Parse Link" />
    </form>
    <h2>Results</h2>';

// Check if the user has submitted a link
if (isset($_POST['baidu_pan_link'])) {
    // Parse the link and get the file info
    $file_info = $baidu_pan_api->parseLink($_POST['baidu_pan_link']);

    // Output the result
    if ($file_info) {
        echo '<p><strong>File Name:</strong> ' . $file_info['name'] . '</p>';
        echo '<p><strong>File Size:</strong> ' . $file_info['size'] . '</p>';
    } else {
        echo '<p>An error occurred while parsing the link.</p>';
    }
}

// Close the UI
echo '</body>
</html>';

?>