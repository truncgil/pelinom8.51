<?php function authorTitle($a) {
    $j = j($a->json);
    $yazarlar = explode(",", $j['authors']); 
	$ulke = explode(",", $j['country']); 
	$sonuc = array();
	for($k=0;$k<count($yazarlar);$k++) {
		@array_push($sonuc, "{$yazarlar[$k]} - {$ulke[$k]}");
	}
	return implode(", ", $sonuc);
} ?>