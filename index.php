<?php
/**
 * Local dev shim — forward root requests to `public/index.php`.
 * Safe for local/XAMPP development only; prefer a VirtualHost in production.
 */

require __DIR__.'/public/index.php';
