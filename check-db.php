#!/usr/bin/env php
<?php

/**
 * Database Connection Checker
 * Run this script to verify database connectivity
 * Usage: php check-db.php
 */

echo "=== Database Connection Checker ===\n\n";

// Load environment variables
if (file_exists(__DIR__ . '/.env')) {
    $lines = file(__DIR__ . '/.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        list($name, $value) = explode('=', $line, 2);
        $_ENV[trim($name)] = trim($value);
    }
}

// Check for DATABASE_URL first (Railway format)
if (isset($_ENV['DATABASE_URL'])) {
    echo "✓ DATABASE_URL found\n";
    $url = parse_url($_ENV['DATABASE_URL']);
    $host = $url['host'] ?? 'unknown';
    $port = $url['port'] ?? 5432;
    $database = ltrim($url['path'] ?? '', '/');
    $username = $url['user'] ?? 'unknown';
    $password = $url['pass'] ?? '';
    $driver = $url['scheme'] ?? 'pgsql';
} else {
    echo "ℹ DATABASE_URL not found, using individual variables\n";
    $driver = $_ENV['DB_CONNECTION'] ?? 'mysql';
    $host = $_ENV['DB_HOST'] ?? '127.0.0.1';
    $port = $_ENV['DB_PORT'] ?? ($driver === 'pgsql' ? 5432 : 3306);
    $database = $_ENV['DB_DATABASE'] ?? 'laravel';
    $username = $_ENV['DB_USERNAME'] ?? 'root';
    $password = $_ENV['DB_PASSWORD'] ?? '';
}

echo "\nConfiguration:\n";
echo "  Driver:   $driver\n";
echo "  Host:     $host\n";
echo "  Port:     $port\n";
echo "  Database: $database\n";
echo "  Username: $username\n";
echo "  Password: " . (empty($password) ? '(empty)' : str_repeat('*', strlen($password))) . "\n\n";

// Check DNS resolution
echo "Checking DNS resolution...\n";
$ip = gethostbyname($host);
if ($ip === $host && !filter_var($host, FILTER_VALIDATE_IP)) {
    echo "✗ Failed to resolve hostname: $host\n";
    echo "  This usually means:\n";
    echo "  - The hostname is incorrect\n";
    echo "  - The database service is not running\n";
    echo "  - Network connectivity issues\n";
    exit(1);
} else {
    echo "✓ Hostname resolved to: $ip\n\n";
}

// Check PDO extension
echo "Checking PDO extensions...\n";
if (!extension_loaded('pdo')) {
    echo "✗ PDO extension not loaded\n";
    exit(1);
}
echo "✓ PDO extension loaded\n";

$driverExtension = 'pdo_' . $driver;
if (!extension_loaded($driverExtension)) {
    echo "✗ $driverExtension extension not loaded\n";
    echo "  Install it with: docker-php-ext-install $driverExtension\n";
    exit(1);
}
echo "✓ $driverExtension extension loaded\n\n";

// Attempt connection
echo "Attempting database connection...\n";
try {
    $dsn = "$driver:host=$host;port=$port;dbname=$database";
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_TIMEOUT => 5,
    ]);
    
    echo "✓ Successfully connected to database!\n\n";
    
    // Test query
    echo "Testing query...\n";
    $stmt = $pdo->query("SELECT VERSION()");
    $version = $stmt->fetchColumn();
    echo "✓ Database version: $version\n\n";
    
    echo "=== All checks passed! ===\n";
    exit(0);
    
} catch (PDOException $e) {
    echo "✗ Connection failed: " . $e->getMessage() . "\n\n";
    echo "Common solutions:\n";
    echo "  1. Verify database credentials are correct\n";
    echo "  2. Ensure database service is running\n";
    echo "  3. Check firewall/security group settings\n";
    echo "  4. Verify SSL/TLS settings if required\n";
    echo "  5. For Railway: ensure DATABASE_URL is set correctly\n";
    exit(1);
}
