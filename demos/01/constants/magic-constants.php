<?php
//Magic constants are not "really" constants and are resolved at COMPILE TIME instead of RUNTIME.
//Some examples:
echo "This output comes from line " . __LINE__ . PHP_EOL;
echo "This output comes from line " . __LINE__ . PHP_EOL;
echo "This is the directory: " . __DIR__ . PHP_EOL;
