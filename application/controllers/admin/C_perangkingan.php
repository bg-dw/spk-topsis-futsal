<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_perangkingan extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller Beranda di jalankan
        parent::__construct();
        $this->load->model('M_turnamen');
        $this->load->model('M_club');
        $this->load->model('M_pertandingan');
        $this->load->model('M_kriteria');
        $this->load->model('M_perangkingan');

        if ($this->session->userdata('ses_login') == FALSE) {
            redirect(base_url('login/')); //mengarahkan ke halaman login
        }
    }

    //halaman awal perangkingan
    public function index()
    {
        $data['content'] = 'admin/perangkingan/V_perangkingan';
        $data['turnamen'] = $this->M_turnamen->get_data('tbl_turnamen')->result();
        $this->load->view('admin/Main', $data);
    }

    //halaman hasil perangkingan
    public function hasil_perangkingan()
    {
        $id = $this->input->post('id_turnamen');
        $pos = $this->input->post('posisi');

        $kriteria = $this->M_pertandingan->kriteria_join_turnamen($id, $pos)->result(); //sebanyak kriteria turnamen per posisi
        $statistik = $this->M_perangkingan->get_statistik($id, $pos)->result(); //sebanyak statistik per posisi
        $pemain = $this->M_perangkingan->pemain_statistik($id, $pos)->result(); //sebanyak pemain berdasarkan posisi terpilih

        foreach ($kriteria as $key) { //membuat array numerik
            $id_kt[] = $key->id_kriteria; //menampung data kedalam array numerik
            $nama_kt[] = $key->nama_kriteria;
            $bobot_kt[] = ($key->bobot / 100); //setelah diolah
            $tipe_kt[] = $key->tipe_kriteria;
        }
        // var_dump($bobot_kt);

        foreach ($pemain as $val) { //membuat array numerik
            $id_pemain[] = $val->id_pemain;
            $nama_pemain[] = $val->nama;
            $no_punggung[] = $val->no_punggung;
            $nama_tim[] = $val->nama_tim;
        }
        // var_dump($id_pemain);

        for ($i = 0; $i < count($id_pemain); $i++) {
            foreach ($statistik as $val) { //membuat array numerik 2 dimensi
                if ($val->id_pemain == $id_pemain[$i]) {
                    $nilai[$i][] = $val->nilai;
                }
            }
        }
        // var_dump($nilai);

        //Hasil Parameter
        // echo "Hasil Parameter";
        // echo "<br>";
        for ($i = 0; $i < count($id_pemain); $i++) {
            for ($j = 0; $j < count($id_kt); $j++) {
                $nilai_matrix[$i][$j] = $nilai[$i][$j];
                // echo $nama_pemain[$i] . "=>" . $nilai[$i][$j];
                // echo "<br>";
            }
            // echo "<br>";
        }
        // var_dump($nilai_matrix);

        //nilai matrix di pangkat 2
        for ($i = 0; $i < count($id_pemain); $i++) {
            for ($j = 0; $j < count($id_kt); $j++) {
                $matrix_pow[$i][$j] =  pow(($nilai_matrix[$i][$j]), 2); //nilai di pangkat 2
                // echo $nama_pemain[$i] . "=>" .  pow(($nilai_matrix[$i][$j]), 2);
                // echo "<br>";
            }
            // echo "<br>";
        }

        //Mencari Pembagi
        // echo "Mencari Pembagi";
        // echo "<br>";

        for ($i = 0; $i < count($id_kt); $i++) { //perulangan sebanyak kriteria
            $nilai_pangkat = array_sum(array_column($matrix_pow, $i)); //penjumlahan array 2 dimensi berdasarkan kolom

            if (sqrt($nilai_pangkat) == 0) {
                $pembagi[$i] = 1;
            } else {
                $pembagi[$i] = sqrt($nilai_pangkat);
            }
            // echo "<br>";
            // echo sqrt($nilai_pangkat);
        }
        // echo "<br>";
        // var_dump($nilai_pangkat);

        //Matrix Keputusan Ternoramalisasi
        // echo "<br>";
        // echo "Matrix Keputusan Ternoramalisasi";
        // echo "<br>";
        for ($i = 0; $i < count($id_pemain); $i++) {
            for ($j = 0; $j < count($id_kt); $j++) {
                $matrix_normalisasi[$i][$j] = (($nilai_matrix[$i][$j]) / ($pembagi[$j]));
                // echo $nama_pemain[$i] . "=>" . (($nilai_matrix[$i][$j]) / ($pembagi[$j]));
                // echo "<br>";
            }
            // echo "<br>";
        }
        // var_dump($matrix_normalisasi);

        //Matrix Keputusan Ternoramalisasi Terbobot
        // echo "<br>";
        // echo "Matrix Keputusan Ternoramalisasi Terbobot";
        // echo "<br>";
        for ($i = 0; $i < count($id_pemain); $i++) {
            for ($j = 0; $j < count($id_kt); $j++) {
                $matrix_terbobot[$i][$j] = ($matrix_normalisasi[$i][$j]) * ($bobot_kt[$j]);
                // echo $nama_pemain[$i] . "=>" . ($matrix_normalisasi[$i][$j]) * ($bobot_kt[$j]);
                // echo "<br>";
            }
            // echo "<br>";
        }
        // var_dump($matrix_terbobot);


        //Mencari A+
        // echo "Mencari A+";
        // echo "<br>";

        for ($i = 0; $i < count($id_kt); $i++) { //perulangan sebanyak kriteria
            if ($tipe_kt[$i] == "COST") {
                $A_plus[$i] = min(array_column($matrix_terbobot, $i)); //penjumlahan array 2 dimensi berdasarkan kolom
                // echo  min(array_column($matrix_terbobot, $i));
            } else {
                $A_plus[$i] = max(array_column($matrix_terbobot, $i)); //penjumlahan array 2 dimensi berdasarkan kolom
                // echo  max(array_column($matrix_terbobot, $i));
            }
            // echo "<br>";
        }
        // echo "<br>";
        // var_dump($A_plus);


        //Mencari A-
        // echo "Mencari A-";
        // echo "<br>";

        for ($i = 0; $i < count($id_kt); $i++) { //perulangan sebanyak kriteria
            if ($tipe_kt[$i] == "COST") {
                $A_min[$i] = max(array_column($matrix_terbobot, $i)); //penjumlahan array 2 dimensi berdasarkan kolom
                // echo  max(array_column($matrix_terbobot, $i));
            } else {
                $A_min[$i] = min(array_column($matrix_terbobot, $i)); //penjumlahan array 2 dimensi berdasarkan kolom
                // echo  min(array_column($matrix_terbobot, $i));
            }
            // echo "<br>";
        }
        // echo "<br>";
        // var_dump($A_min);


        //Mencari D+
        // echo "Mencari D+";
        // echo "<br>";

        for ($x = 0; $x < count($id_pemain); $x++) {
            $D_sementara = 0;
            for ($j = 0; $j < count($id_kt); $j++) {
                $D_sementara += pow(($A_plus[$j] - $matrix_terbobot[$x][$j]), 2); //menambahkan setiap hasil pangkat pada setiap baris
            }
            $D_plus[$x] = sqrt($D_sementara);
            // echo sqrt($D_sementara);
            // echo "<br>";
        }
        // echo "<br>";
        // var_dump($D_plus);

        //Mencari D-
        // echo "Mencari D-";
        // echo "<br>";

        for ($x = 0; $x < count($id_pemain); $x++) {
            $D_sementara = 0;
            for ($j = 0; $j < count($id_kt); $j++) {
                $D_sementara += pow(($matrix_terbobot[$x][$j] - $A_min[$j]), 2); //menambahkan setiap hasil pangkat pada setiap baris
            }
            $D_min[$x] = sqrt($D_sementara);
            // echo sqrt($D_sementara);
            // echo "<br>";
        }
        // echo "<br>";
        // var_dump($D_min);


        //Hasil Akhir
        // echo "Hasil Akhir";
        // echo "<br>";

        for ($x = 0; $x < count($id_pemain); $x++) {
            $hasil[$x] = ($D_min[$x]) / (($D_min[$x]) + ($D_plus[$x]));
            // echo ($D_min[$x]) / (($D_min[$x]) + ($D_plus[$x]));
            // echo "<br>";
        }
        // echo "<br>";
        // var_dump($hasil);

        //rangking
        for ($i = 0; $i < count($id_pemain); $i++) { //sebanyak baris
            $rank[$i]['id'] = $id_pemain[$i];
            $rank[$i]['nama'] = $nama_pemain[$i];
            $rank[$i]['no_punggung'] = $no_punggung[$i];
            $rank[$i]['club'] = $nama_tim[$i];
            $rank[$i]['nilai'] = $hasil[$i];
        }
        array_multisort(array_column($rank, "nilai"), SORT_DESC, $rank); //sort dari nilai terbesar ke terkecil

        for ($i = 0; $i < count($id_pemain); $i++) { //sebanyak baris
            $final[$i]['id'] = $rank[$i]['id'];
            $final[$i]['nama'] = $rank[$i]['nama'];
            $final[$i]['no'] = $rank[$i]['no_punggung'];
            $final[$i]['club'] = $rank[$i]['club'];
            $final[$i]['nilai'] =  $rank[$i]['nilai'];
            $final[$i]['rank'] = $i + 1;
        }
        // echo "<br>";
        // echo "<br>";

        array_multisort(array_column($final, "id"), SORT_ASC, $final); //sort dari id terkecil ke terbesar
        // for ($i = 0; $i < count($id_pemain); $i++) { //sebanyak baris
        //     echo $final[$i]['nama'];
        //     echo "<br>";
        //     echo $final[$i]['nilai'];
        //     echo "<br>";
        //     echo "Ranking=" . $final[$i]['rank'];
        //     echo "<br>";
        //     echo "<br>";
        // }
        $data['content'] = 'admin/perangkingan/V_hasil_perangkingan';
        $data['id_pemain'] = $id_pemain;
        $data['final'] = $final;
        $this->load->view('admin/Main', $data);
    }
}
