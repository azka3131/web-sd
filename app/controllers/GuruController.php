<?php

require_once __DIR__ . '/../models/Guru.php';

class GuruController {

    public function index() {
        $guruModel = new Guru();
        // Ambil semua data guru dari database
        $data = $guruModel->getAll();

        // --- LOGIKA SORTING CUSTOM ---
        usort($data, function($a, $b) {
            // Ambil jabatan dan ubah ke huruf kecil biar mudah dicek
            $jabatanA = strtolower($a['jabatan']);
            $jabatanB = strtolower($b['jabatan']);

            // Dapatkan skor ranking (makin kecil angkanya, makin di atas posisinya)
            $rankA = $this->getRanking($jabatanA);
            $rankB = $this->getRanking($jabatanB);

            if ($rankA == $rankB) {
                return 0; // Jika ranking sama, biarkan urutannya
            }
            // Urutkan dari ranking terkecil (1) ke terbesar (99)
            return ($rankA < $rankB) ? -1 : 1;
        });
        // -----------------------------

        require_once __DIR__ . '/../views/guru.php';
    }

    // Fungsi Pembantu untuk Menentukan Ranking Jabatan
    private function getRanking($jabatan) {
        // 1. Kepala Sekolah (Paling Atas)
        if (strpos($jabatan, 'kepala sekolah') !== false) return 1;

        // 2. Guru Kelas (Urut dari Kelas 6 ke Kelas 1)
        if (strpos($jabatan, 'guru kelas 6') !== false) return 2;
        if (strpos($jabatan, 'guru kelas 5') !== false) return 3;
        if (strpos($jabatan, 'guru kelas 4') !== false) return 4;
        if (strpos($jabatan, 'guru kelas 3') !== false) return 5;
        if (strpos($jabatan, 'guru kelas 2') !== false) return 6;
        if (strpos($jabatan, 'guru kelas 1') !== false) return 7;

        // 3. Guru Mata Pelajaran (Inggris, Agama, PJOK, dll)
        // Cek kata kunci: inggris, agama, pai, pjok, olah raga
        if (strpos($jabatan, 'inggris') !== false || 
            strpos($jabatan, 'agama') !== false || 
            strpos($jabatan, 'pai') !== false ||
            strpos($jabatan, 'pjok') !== false ||
            strpos($jabatan, 'olah raga') !== false) {
            return 8;
        }

        // 4. Staf & Lainnya (Paling Bawah)
        return 99;
    }
}