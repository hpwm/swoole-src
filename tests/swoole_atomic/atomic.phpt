--TEST--
swoole_atomic: add/sub/get/cmpset
--SKIPIF--
<?php require __DIR__ . '/../include/skipif.inc'; ?>
--FILE--
<?php
require __DIR__ . '/../include/bootstrap.php';

$atomic = new swoole_atomic(1);

Assert::eq($atomic->add(199), 200);
Assert::eq($atomic->sub(35), 165);
Assert::eq($atomic->get(), 165);
assert($atomic->cmpset(165, 1));
assert(!$atomic->cmpset(1555, 0));
?>
--EXPECT--
