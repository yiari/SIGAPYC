<?php

require_once "modelos/conexcion.php";

$stmt = conexcion::conectar();

print_r(conexcion::conectar()->errorInfo());

//$stmt->close();