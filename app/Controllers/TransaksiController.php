<?php
class TransaksiController {
    public function index() {
        require_once __DIR__ . '/../Models/Transaksi.php';
        $model = new Transaksi();
        $dataTransaksi = $model->getAll();
        include __DIR__ . '/../Views/transaksi/index.php';
    }

    public function create() {
        include __DIR__ . '/../Views/transaksi/create.php';
    }

    public function store() {
        session_start(); // ✅ pastikan sesi aktif
        require_once __DIR__ . '/../Models/Transaksi.php';
        $model = new Transaksi();

        $data = $_POST;
        $data['tipe'] = $_POST['tipe'];
        $data['unit'] = $_POST['unit'];
        $data['satuan'] = $_POST['satuan'];
        $data['dibuat_oleh'] = $_SESSION['user']['id_users'] ?? 1;

        $model->insert($data);

         require_once __DIR__ . '/../Helpers/functions.php';
    $id_user = $_SESSION['user']['id_users'];
    $keterangan = $data['keterangan'] ?? '-';
    $jumlah = number_format($data['jumlah'] ?? 0, 0, ',', '.');
    tulisLog($id_user, "Menambahkan transaksi: $keterangan sebesar Rp $jumlah");

        header('Location: index.php?action=transaksi');
    }
    

    public function edit() {
        require_once __DIR__ . '/../Models/Transaksi.php';
        $model = new Transaksi();
        $transaksi = $model->getById($_GET['id']);
        include __DIR__ . '/../Views/transaksi/edit.php';
    }

    public function update() {
        session_start(); // ✅ agar bisa akses $_SESSION['user']
        require_once __DIR__ . '/../Models/Transaksi.php';
        $model = new Transaksi();

        $data = $_POST;
        $data['tipe'] = $_POST['tipe'];
        $data['dibuat_oleh'] = $_SESSION['user']['id_users'] ?? 1;

        $model->update($_POST['id'], $data);
        header('Location: index.php?action=transaksi');
    }

    public function delete() {
        require_once __DIR__ . '/../Models/Transaksi.php';
        $model = new Transaksi();
        $model->delete($_GET['id']);
        header('Location: index.php?action=transaksi');
    }

    public function laporan_keuangan() {
        require_once __DIR__ . '/../Models/Transaksi.php';
        require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

        $model = new Transaksi();

        // Ambil filter dari GET
        $start = $_GET['start'] ?? null;
        $end = $_GET['end'] ?? null;
        $jenis = $_GET['jenis'] ?? null;
        $pembuat = $_GET['pembuat'] ?? null;

        $dataLaporan = $model->getLaporan($start, $end, $jenis, $pembuat);

        // ✅ Jika export PDF
        if (isset($_GET['export']) && $_GET['export'] === 'pdf') {
            ob_start();
            ?>
            <div style="text-align: center; margin-bottom: 20px;">
                <img src="logo_project.png" class="w-20 h-auto">
                <h2 style="margin: 0;">Laporan Keuangan</h2>
                <p style="margin: 0;">Periode: <?= htmlspecialchars($start) ?> s.d <?= htmlspecialchars($end) ?></p>
            </div>
            <table border="1" cellspacing="0" cellpadding="5" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Unit</th>
                        <th>Satuan</th>
                        <th>Jenis</th>
                        <th>Jumlah</th>
                        <th>Pembuat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($dataLaporan)): ?>
                        <tr><td colspan="6" align="center">Tidak ada data</td></tr>
                    <?php else: foreach ($dataLaporan as $i => $lap): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= htmlspecialchars($lap['tanggal']) ?></td>
                            <td><?= htmlspecialchars($lap['keterangan']) ?></td>
                            <td><?= htmlspecialchars($lap['unit'] ?? '-') ?></td>
                            <td><?= htmlspecialchars($lap['satuan'] ?? '-') ?></td>
                            <td><?= htmlspecialchars($lap['jenis']) ?></td>
                            <td>Rp <?= number_format($lap['jumlah'], 0, ',', '.') ?></td>
                            <td><?= htmlspecialchars($lap['pembuat']) ?></td>
                        </tr>

                    <?php endforeach; endif; ?>
                </tbody>
            </table>
            <?php
            $html = ob_get_clean();

            $dompdf = new \Dompdf\Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            // Tampilkan langsung di browser (inline, bukan download)
            $dompdf->stream('laporan_keuangan.pdf', ['Attachment' => false]);
            exit;
        }

        // ✅ Jika bukan PDF, tampilkan view biasa
        include __DIR__ . '/../Views/dashboard/laporan_keuangan.php';
    }


}
