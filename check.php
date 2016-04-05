<?php

// 检测PHP最低版本
if (version_compare(PHP_VERSION, '5.3.0', '<')) {
    echo "wow...<br />PHP版本最低要求: 5.3.0<br />当前版本: ".PHP_VERSION;
    exit;
}
