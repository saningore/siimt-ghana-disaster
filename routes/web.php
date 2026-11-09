<?php

foreach (['pages', 'admin'] as $group) {
    foreach (glob(__DIR__."/{$group}/*.php") ?: [] as $routeFile) {
        require $routeFile;
    }
}
