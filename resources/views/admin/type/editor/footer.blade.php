<link rel="stylesheet" href="{{url("assets/admin/css/mobile-footer.css")}}">
<footer class="main-footer step step-2 editor-footer mobile-footer d-none ">
    <div class="container">
        <ul class="nav nav-pills nav-justified">
            <li class="nav-item"><a class="nav-link waves active waves-effect urun-sec-btn"><span><i
                            class="nav-icon si si-grid"></i> <span
                            class="nav-text">{{e2("Ürün Seç")}}</span></span></a></li>
            <li class="nav-item"><a 
                    class="nav-link waves waves-effect gorsel-yukle-btn"><span><i class="nav-icon si si-cloud-upload"></i> <span
                            class="nav-text">{{e2("Görsel Yükle")}}</span></span></a></li>
            <li class="nav-item centerbutton">
                <div onclick="$(this).toggleClass('active');" class="nav-link"><span
                        class="theme-radial-gradient"><i class="close fas fa-plus"></i> <img
                            src="{{e2("logos/logo-white.svg")}}" alt="" class="nav-icon"></span>
                    <div class="nav-menu-popover justify-content-between">
                            <button type="button"
                                class="btn btn-lg btn-icon-text"><i
                                    class="fa fa-circle-o size-32 loader"></i><span>{{e2("Siyaha Uyarla")}}</span></button>
                            <button   type="button" class="btn btn-lg btn-icon-text loader"><i
                                    class="fas fa-circle size-32"></i><span>{{e2("Beyaza Uyarla")}}</span></button>
                                    <button    type="button" class="btn btn-lg btn-icon-text loader"><i
                                    class="fa fa-search-plus zoomin size-32"></i><span>{{e2("Yakınlaştır")}}</span></button>
                            <button   type="button" class="btn btn-lg btn-icon-text"><i
                                    class="fas fa-search-minus zoomout size-32 loader"></i><span>{{e2("Uzaklaştır")}}</span></button>
                </div>
            </li>
            
            <li class="nav-item"><a 
                    class="nav-link waves waves-effect zoomout"><span><i class="nav-icon fa fa-search-minus"></i> <span
                            class="nav-text">{{e2("Uzaklaştır")}}</span></span></a></li>
            <li class="nav-item"><a
                    
                    class="nav-link waves zoomin" data-toggle="layout" data-action="side_overlay_toggle"><span><i class="nav-icon fa fa-search-plus"></i> <span
                            class="nav-text">{{e2("Yakınlaştır")}}</span></span></a></li>
        </ul>
    </div>
</footer>
