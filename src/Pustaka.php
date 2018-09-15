<?php 
namespace agungdh;

class Pustaka {
	// echo rupiah(100000);
	// echo rupiah(100000.20);
	// echo rupiah(100000, false);
	// echo rupiah(100000.20, false);
	// echo rupiah(100000, false, false);
	// echo rupiah(100000.20, false, false);
	// echo rupiah(100000, false, true);
	// echo rupiah(100000.20, false, true);
	public function rupiah($angka, $rp = true, $koma = true) {
		if ($koma == true) {
			$dua = 2;
		} else {
			$dua = 0;
		}

		$hasil_rupiah = number_format($angka,$dua,',','.');

		if ($rp == true) {
			$hasil_rupiah = 'Rp' . $hasil_rupiah;
		}

		return $hasil_rupiah;
	}

	// echo tanggalIndo(date('Y-m-d'));
	public function tanggalIndo($tanggal) {
		return date("d-m-Y", strtotime($tanggal));
	}	

	// echo tanggalWaktuIndo(date('Y-m-d H:i:s'));
	public function tanggalWaktuIndo($tanggalWaktu) {
		return date("d-m-Y H:i:s", strtotime($tanggalWaktu));
	}	

	// echo tanggalIndoString(date('Y-m-d'));
	public function tanggalIndoString($tanggal){
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $tanggal);
	 
		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}
	
	// echo tanggalIndoStringBulanTahun(date('m-Y'));
	public function tanggalIndoStringBulanTahun($bulanTahun){
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $bulanTahun);
	 
		return $bulan[ (int)$pecahkan[0] ] . ' ' . $pecahkan[1];
	}

	// echo tanggalWaktuIndoString(date('Y-m-d H:i:s'));
	public function tanggalWaktuIndoString($tanggalWaktu){
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$tanggal = explode(' ', $tanggalWaktu)[0];
		$waktu = explode(' ', $tanggalWaktu)[1];
		$pecahkan = explode('-', $tanggal);
	 
		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0] . ' ' . $waktu;
	}
}