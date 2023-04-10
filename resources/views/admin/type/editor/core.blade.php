<?php 
if(getisset("save")) {
    print2($_POST);
    $title = post("title");
    $slug = str_slug($title);
    $path = "storage/app/files/urunler/$slug";
    $mockupPath = "$path/$slug-mockup.jpg";
    $rawPath = "$path/$slug-raw.jpg";
    @unlink($mockupPath);
    @unlink($rawPath);

    @mkdir("storage/app/files/urunler/$slug",0777,true);
    base64Image(post("mockup"), $mockupPath);
    base64Image(post("raw"), $rawPath);
    ekle2([
        'title' => post("title"),
        "raw" => $rawPath,
        "mockup" => $mockupPath,
        "slug" => $slug
    ],"urunler");

    $sablon = db("urun_sablonlari")->where("id", post("sablon_id"))->first();
    if($sablon) {
        //print2($sablon);
        $data = j($sablon->json);
        $data['images'][0]['imageUrl'] = env("APP_URL")  . $mockupPath;
        $data['name'] = post("title");
        print2($data);

        //dd($data);
        sendProduct($data);
    }
    

    exit();
}

?>