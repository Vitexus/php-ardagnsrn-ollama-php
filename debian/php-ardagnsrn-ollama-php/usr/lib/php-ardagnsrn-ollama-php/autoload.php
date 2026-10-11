<?php

declare(strict_types=1);

require_once '/usr/share/php/Composer/InstalledVersions.php';
require_once '/usr/share/php/GuzzleHttp/autoload.php';

spl_autoload_register(function (string $class): void {
    $prefix = 'ArdaGnsrn\\Ollama\\';
    if (str_starts_with($class, $prefix)) {
        $file = '/usr/lib/php-ardagnsrn-ollama-php/src/' . str_replace('\\', '/', substr($class, strlen($prefix))) . '.php';
        if (file_exists($file)) {
            require $file;
        }
    }
});

(function (): void {
    $versions = [];
    foreach (\Composer\InstalledVersions::getAllRawData() as $d) {
        $versions = array_merge($versions, $d['versions'] ?? []);
    }
    $name    = 'ardagnsrn/ollama-php';
    $version = '0.1.0';
    $versions[$name] = ['pretty_version' => $version, 'version' => $version,
        'reference' => null, 'type' => 'library', 'install_path' => __DIR__,
        'aliases' => [], 'dev_requirement' => false];
    \Composer\InstalledVersions::reload([
        'root' => ['name' => $name, 'pretty_version' => $version, 'version' => $version,
            'reference' => null, 'type' => 'library', 'install_path' => __DIR__,
            'aliases' => [], 'dev' => false],
        'versions' => $versions,
    ]);
})();
