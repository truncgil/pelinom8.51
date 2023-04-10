<div class="row step-1" sytle="">
           
                <?php $urun_sablonlari = db("urun_sablonlari")->get();
                    foreach($urun_sablonlari AS $sablon) {
                            $j = j($sablon->json);
                            ?>
                            <div class="col-md-4">
                                    <a class="block block-link-pop text-center sablon-sec" data-id="{{$sablon->id}}" data-file="{{p($sablon->files,1024)}}" href="javascript:void(0)">
                                        <div class="block-content block-content-full">
                                            <img class="img-fluid" loading="lazy" src="{{p($sablon->files,256)}}" alt="">
                                        </div>
                                        <div class="block-content block-content-full bg-body-light">
                                            <div class="font-w600 mb-5 title">{{$sablon->title}}</div>
                                            <div class="font-size-sm text-muted">{{@$j['salePrice']}}</div>
                                        </div>
                                    </a>
                            </div>
                    
                            <?php 
                    }
                ?>
       
        </div> 