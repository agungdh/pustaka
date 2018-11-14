<?php 
namespace agungdh;

class Pustaka {
	public static function arrangeForSelectCollective($raw, $params)
    {
        $selectValue = $params[0];
        
        unset($params[0]);
        $params = array_values($params);

        $datas = [];
        
        foreach ($raw as $value) {
            $display = '';
            foreach ($params as $forDisplay) {
                if (strpos($forDisplay, '__') !== false) {
                    $toDisplay = str_replace('__', '', $forDisplay);
                    $display .= $value->$toDisplay;
                } else {
                    $display .= $forDisplay;
                }
            }
            $datas[$value->$selectValue] = $display;
        }

        return $datas;
    }

	public static function parseTanggalIndo($tanggal)
	{
		return date_format(date_create($tanggal),"Y-m-d");
	}

	// echo rupiah(100000);
	// echo rupiah(100000.20);
	// echo rupiah(100000, false);
	// echo rupiah(100000.20, false);
	// echo rupiah(100000, false, false);
	// echo rupiah(100000.20, false, false);
	// echo rupiah(100000, false, true);
	// echo rupiah(100000.20, false, true);
	public static function rupiah($angka, $rp = true, $koma = true) {
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
	public static function tanggalIndo($tanggal) {
		return date("d-m-Y", strtotime($tanggal));
	}	

	// echo tanggalWaktuIndo(date('Y-m-d H:i:s'));
	public static function tanggalWaktuIndo($tanggalWaktu) {
		return date("d-m-Y H:i:s", strtotime($tanggalWaktu));
	}	

	// echo tanggalIndoString(date('Y-m-d'));
	public static function tanggalIndoString($tanggal){
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
	public static function tanggalIndoStringBulanTahun($bulanTahun){
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
	public static function tanggalWaktuIndoString($tanggalWaktu){
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