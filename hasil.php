<?php
	$data_antrian = explode(',',$_POST['ant']);
	$data_pelayanan = explode(',',$_POST['plyn']);
	$max_bilacak = $_POST['bil_acak'];
	$a = $_POST['kons_a'];
	$c = $_POST['kons_i'];
	$modulus = $_POST['modul'];
	$z = array($_POST['z0']);
	//menampung data minimal dan maximal dari interval kelas

	//banyak data di antrian atau pelayanan
	$banyak_ant = count($data_antrian);
	$banyak_plyn = count($data_pelayanan);

	//min dan max data antrian
	$min_data_ant = min($data_antrian);
	$max_data_ant = max($data_antrian);
	
	//min dan max data pelayanan
	$min_data_plyn = min($data_pelayanan);
	$max_data_plyn = max($data_pelayanan);

	//menghitung jumlah angka yang muncul
	$angka_mncl_ant = array_count_values($data_antrian); //menghitung angka muncul
	$angka_mncl_plyn = array_count_values($data_pelayanan);
	//Jumlah angka muncul dari variabel atas
	$banyak_angka_mncl_ant = count($angka_mncl_ant);
	$banyak_angka_mncl_plyn = count($angka_mncl_plyn);

	//array untuk fix angkanya
	$angka_fix_ant = array();
	$angka_fix_plyn = array();
	foreach ($angka_mncl_ant as $k => $v){
	    array_push($angka_fix_ant, array("Nilai" => $k ,"Jumlah" => $v));
	}
	foreach ($angka_mncl_plyn as $k => $v){
	    array_push($angka_fix_plyn, array("Nilai" => $k ,"Jumlah" => $v));
	}

	//jangkauan data
	$j_ant = $max_data_ant - $min_data_ant;
	$j_plyn = $max_data_plyn - $min_data_plyn;

	//banyak kelas int
	$k_ant = round(1+3.3*(log10(count($data_antrian))));
	$k_plyn = round(1+3.3*(log(count($data_pelayanan))));

	//panjang interval kelas
	$c_ant = round($j_ant / $k_ant);
	$c_plyn = round($j_plyn / $k_plyn);


	//menampung data untuk min dan maks nilai stat
	$min_int_ant[] = (float) $min_data_ant; 
	$max_int_ant = array();
	$min_int_plyn[] = (float) $min_data_plyn; 
	$max_int_plyn = array();

	//menampung frekuensi dari data
	$frekuensi_ant = array();
	$frekuensi_plyn = array();

	//nilai statistik pelayanan
	for ($i=0; $i < $k_ant; $i++) { 
		$max_int_ant[$i] = ($min_int_ant[$i]+$c_ant)-1;
		$min_int_ant[$i+1] = $max_int_ant[$i]+1;
	}

	//cek bilangan masuk ke interval berapa
	$cek = 0;
	while ($cek < $banyak_angka_mncl_ant) {
	    for ($i=0; $i < count($min_int_ant); $i) { 
	        if (($angka_fix_ant[$cek]["Nilai"] >= $min_int_ant[$i]) && ($angka_fix_ant[$cek]["Nilai"] <= $max_int_ant[$i])) {
	            if(!empty($frekuensi_ant ))
	            {
	                    $cari = array_search($min_int_ant[$i], array_column($frekuensi_ant , 'Min'));
	                    // var_dump($cari);
	                    if ($cari === 0 || $cari > 0) {
	                        $n = $frekuensi_ant [$cari]["Jumlah"];
	                        $tot = $n +$angka_fix_ant[$cek]["Jumlah"];
	                        $frekuensi_ant [$cari]["Jumlah"] = $tot;
	                    }
	                    else {
	                        array_push($frekuensi_ant , array("Min" => $min_int_ant[$i],"Jumlah" => $angka_fix_ant[$cek]["Jumlah"]));
	                    }
	            }
	            if (empty($frekuensi_ant )) {
	                array_push($frekuensi_ant , array("Min" => $min_int_ant[$i],"Jumlah" => $angka_fix_ant[$cek]["Jumlah"]));
	            }
	            break;
	            $i = 0;
	        }
	        else {
	            $i++;
	        }
	    }
	    	$cek++;
	}

	
	//nilai statistik data pelayanan
	for ($i=0; $i < $k_plyn; $i++) { 
		$max_int_plyn[$i] = ($min_int_plyn[$i]+$c_plyn)-1;
		$min_int_plyn[$i+1] = $max_int_plyn[$i]+1;
	}

	//masuk interval mana dari data pelayanan
	$b = 0;
	while ($b < $banyak_angka_mncl_plyn) {
	    for ($i=0; $i < count($min_int_plyn); $i) { 
	        if (($angka_fix_plyn[$b]["Nilai"] >= $min_int_plyn[$i]) && ($angka_fix_plyn[$b]["Nilai"] <= $max_int_plyn[$i])) {
	            if(!empty($frekuensi_plyn))
	            {
	                    $cari = array_search($min_int_plyn[$i], array_column($frekuensi_plyn, 'Min'));
	                    // var_dump($cari);
	                    if ($cari === 0 || $cari > 0) {
	                        $n = $frekuensi_plyn[$cari]["Jumlah"];
	                        $tot = $n +$angka_fix_plyn[$a]["Jumlah"];
	                        $frekuensi_plyn[$cari]["Jumlah"] = $tot;
	                    }
	                    else {
	                        array_push($frekuensi_plyn, array("Min" => $min_int_plyn[$i],"Jumlah" => $angka_fix_plyn[$b]["Jumlah"]));
	                    }
	            }
	            if (empty($frekuensi_plyn)) {
	                array_push($frekuensi_plyn, array("Min" => $min_int_plyn[$i],"Jumlah" => $angka_fix_plyn[$b]["Jumlah"]));
	            }
	            break;
	            $i = 0;
	        }
	        else {
	            $i++;
	        }
	    }
	    	$b++;
	}

	//kelebihan array
	while (count($min_int_ant) > $k_ant || count($min_int_plyn) > $k_plyn) {
		unset($min_int_ant[$k_ant]);
		unset($min_int_plyn[$k_plyn]);
	}
	//untuk menampung Minimal dari frekuensi untuk mencari apakah ada yang tidak sma dengan minimum
	foreach ($frekuensi_ant as $key => $value) {
		$aTmp1[] = $value['Min'];
	}
	//mencari perbedaan antara minimum interval dengan hasil frekuensi
	$diff_ant = array_diff($min_int_ant, $aTmp1);
	if(!empty($diff_ant))
	{
		$index_diff = array_keys($diff_ant);
		for ($i=0; $i < count($diff_ant) ; $i++) { 
			array_push($frekuensi_ant , array("Min" => $diff_ant[$index_diff[$i]],"Jumlah" => 0));
		}
	}

	asort($frekuensi_ant);
	$keyi = array_keys($frekuensi_ant);
	for($i = 0; $i < $k_ant; $i++) {
	    $xi_ant[] = (($min_int_ant[$i]+$max_int_ant[$i]))/2; //nilai xi
	    $fi_ant += $frekuensi_ant[$keyi[$i]]["Jumlah"]; //jumlah fi
		$fixi_ant[] = ($xi_ant[$i]*$frekuensi_ant[$keyi[$i]]["Jumlah"]); //nilai fixi
		$xi2fi_ant[] = (pow($xi_ant[$i],2)*$frekuensi_ant[$keyi[$i]]["Jumlah"]); //nilai fixi^2
	}

	$sum_fixi_ant = array_sum($fixi_ant); //jumlah nilai fixi
	$sum_fixi2_ant = array_sum($xi2fi_ant); //jumlah nilai fixi^2
	$x_ant = $sum_fixi_ant / $fi_ant; //rata rata
	$is = round(($sum_fixi2_ant - (pow($sum_fixi_ant, 2) / $fi_ant))/ ($fi_ant-1));
	$baku_ant = round(sqrt($is));

	$phi = 22/7;
	for ($i=0; $i < $max_bilacak+1 ; $i++) { 
		$z[$i+1] = (($a * $z[$i])+$c)%$modulus;
		$u[$i] = round($z[$i+1]/$modulus,3);
	}

	for ($i=0; $i < $max_bilacak ; $i++) { 
		$u_1[$i] = $u[$i+1];
		$Z[$i] = round(pow(-2*log($u[$i]), 0.5),3) * sin(round(2*$phi*$u_1[$i],3));
		$X[$i] = round($x_ant + $Z[$i]*$baku_ant);
	}
	
// 	for($i = 0; $i < $k_ant; $i++) {
//     echo $keyi[$i] . "{<br>";
//     foreach($frekuensi_ant[$keyi[$i]] as $key => $value) {
//         echo $key . " : " . $value . "<br>";
//     }
//     echo "}<br>";
// }

?>