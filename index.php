<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\ProductController;

$page = $_GET['page'] ?? 'products';

if ($page === 'products') {
    $controller = new ProductController();
    $controller->index();
} else {
    echo "404 - Page Not Found";
}
