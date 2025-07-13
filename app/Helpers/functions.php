<?php
function tulisLog($id_user, $aktivitas) {
    $conn = new mysqli("localhost", "root", "", "db_palmsysfinance");
    if ($conn->connect_error) return;
    $aktivitas = $conn->real_escape_string($aktivitas);
    $conn->query("INSERT INTO log_aktivitas (id_user, aktivitas) VALUES ('$id_user', '$aktivitas')");
}