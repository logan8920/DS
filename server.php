<?php 

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Only check file extensions of interest
$ext = pathinfo($uri, PATHINFO_EXTENSION);
$extensions = [
    'css'  => 'text/css',
    'js'   => 'application/javascript',
    'json' => 'application/json',
    'png'  => 'image/png',
    'jpg'  => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'gif'  => 'image/gif',
    'svg'  => 'image/svg+xml',
    'ico'  => 'image/x-icon',
    'woff2'=> 'font/woff2',
    'ttf'  => 'font/ttf',
    'woff' => 'font/woff',
];
// Serve CSS or JS files directly
if (in_array($ext, array_keys($extensions))) {
    
    // Define file base path (optional, in case your assets live elsewhere)
    $basePath = '/var/www/html/cpanel/website/public'; // change if needed
    
    $filePath = $basePath .str_replace("/website", "", $uri);
    // die($filePath);
    // Check if file exists and is inside the basePath (for security)
    if ($filePath && file_exists($filePath)) {
        // Set correct headers
        $mime = $extensions[$ext] ?? 'text/css';
        header("Content-Type: $mime");
        header("Content-Length: " . filesize($filePath));
        readfile($filePath);
        exit;
    } else {
        // File not found
        http_response_code(404);
        echo "$ext file not found.";
        exit;
    }
}

// For all other routes: include main project index

if($uri == "/website/"){
    //die("dsfdsf");
    header("Location: login");
}else{
    include 'public/index.php';
}



 ?>