<?php
$a = -20;
echo (boolean) $a . PHP_EOL; // виведе 1, тобто істина

// Отриманий результат пояснюється тим, що під час приведденя змінної до типу boolean
// наступні значення розглядаються як FALSE: 
//  - boolean FALSE;
//  - integer 0; 
//  - float 0.0; 
//  - пустий рядок і рядок який містить "0";
//  - масив без елементів;
//  - особливий тип NULL;
//  - обєкти SimpleXML, створені з пустих тегів.

//  Всі інші значення розглядаются як TRUE.