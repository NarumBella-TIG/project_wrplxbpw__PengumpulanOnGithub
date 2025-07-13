<?php
require_once __DIR__ . '/../Models/LogAktivitas.php';

class LogController {
    public function log_aktivitas() {
        $model = new logAktivitas();
        $logAktivitas = $model->getAllLog();
        include __DIR__ . '/../Views/dashboard/log_aktivitas.php';
    }
}