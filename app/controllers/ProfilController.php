<?php

require_once __DIR__ . '/../models/Struktur.php';

class ProfilController {

    public function visiMisi() {
        require_once __DIR__ . '/../views/profil/visi_misi.php';
    }

    public function sejarah() {
        require_once __DIR__ . '/../views/profil/sejarah.php';
    }

    public function struktur() {
        // 1. Ambil semua data dari tabel 'struktur'
        $strukturModel = new Struktur();
        $semuaData = $strukturModel->getAll();

        // 2. Siapkan wadah kosong untuk dipilah
        $kepsek = null;
        $komite = null;
        $waliKelas = [];
        
        // [BARU] Wadah khusus untuk Guru Mapel dan Staf
        $guruMapel = []; 
        $staf = [];      

        // 3. Pilah data berdasarkan tulisan di kolom 'JABATAN'
        foreach ($semuaData as $orang) {
            // Ubah jabatan jadi huruf kecil semua biar pencocokan lebih mudah
            $jabatan = strtolower(trim($orang['jabatan']));

            // --- KEPALA SEKOLAH ---
            if ($jabatan == 'kepala sekolah') {
                $kepsek = $orang;
            } 
            // --- KOMITE ---
            elseif ($jabatan == 'ketua komite') {
                $komite = $orang;
            } 
            // --- WALI KELAS ---
            elseif (strpos($jabatan, 'wali kelas') !== false) {
                preg_match('/\d+/', $jabatan, $matches);
                $kelas = isset($matches[0]) ? $matches[0] : 99; 
                $waliKelas[$kelas] = $orang;
            } 
            // --- GURU MAPEL (Cek kata 'guru' atau 'pengajar') ---
            elseif (strpos($jabatan, 'guru') !== false || strpos($jabatan, 'pengajar') !== false) {
                $guruMapel[] = $orang;
            }
            // --- STAF / TENAGA KEPENDIDIKAN (Sisanya: TU, Operator, Penjaga) ---
            else {
                $staf[] = $orang;
            }
        }

        // Urutkan Wali Kelas dari 1 sampai 6
        ksort($waliKelas);

        // 4. Kirim data yang sudah dipilah ke View
        require_once __DIR__ . '/../views/profil/struktur.php';
    }
}