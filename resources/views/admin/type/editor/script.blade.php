<script>
                    $(function(){
                        
                        // first we need to create a stage
                        var bolum = 1;
                        var stage = new Konva.Stage({
                            container: 'container',   // id of container <div>
                            width: {{$width}} / bolum,
                            height: {{$height}} / bolum
                        });

                        // then create layer
                        var layer = new Konva.Layer();
                        var tr = new Konva.Transformer();
                        var seciliObje; 
                        var toolbar = $(".toolbar");
                        var loadImageURL;
                        var productTitle;
                        var scale = 1;
                        var sablonID;

                        $(".zoomin").on("click", function(){
                            scale += 0.1; 
                            var top = scale * 100;
                            $("#container").css("transform","scale("+scale+")");
                         //   $("#container").css("top","-" + top+"px");
                        });
                        $(".zoomout").on("click", function(){
                            scale -= 0.1; 
                            var top = scale * 100;
                            $("#container").css("transform","scale("+scale+")");
                        //    $("#container").css("top","-" + top+"px");
                        });

                        $(".delete").on("click", function() {
                            seciliObje.destroy();
                            tr.nodes([]);
                            toolbar.addClass("d-none");
                        });

                        $(".move-down").on("click", function() {
                            seciliObje.moveToBottom();                      
                            tr.moveToBottom();                      
                        });
                        $(".move-up").on("click", function() {
                            seciliObje.moveToTop();                      
                            tr.moveToTop();                      
                        });

                        function downloadURI(uri, name) {
                            var link = document.createElement('a');
                            link.download = name;
                            link.href = uri;
                            document.body.appendChild(link);
                            link.click();
                            document.body.removeChild(link);
                            delete link;
                        }
                        function blobToBase64(blob) {
                            return new Promise((resolve, _) => {
                                const reader = new FileReader();
                                reader.onloadend = () => resolve(reader.result);
                                reader.readAsDataURL(blob);
                            });
                        }

                        $(".download").on("click", function() {
                            tr.nodes([]);
                            var dataURL = stage.toDataURL();
                            var rawURL = loadImageURL.toDataURL();
                            productTitle += " " + $('#title').val();
                            downloadURI(dataURL, productTitle +  ' mockup-tshirthane.png');         
                            downloadURI(rawURL, productTitle +  'raw-tshirthane.png');         
                        });
                        
                        $(".save").on("click", function() {
                            $(this).html("Kaydediliyor...").attr("disabled","disabled");
                            tr.nodes([]);
                            var dataURL = stage.toDataURL();
                            var rawURL = loadImageURL.toDataURL();
                            productTitle  += " " +  $('#title').val();
                            console.log(rawURL);
                            
                            $.post("?save",{
                                mockup : dataURL,
                                raw : rawURL,
                                _token : "{{csrf_token()}}",
                                sablon_id : sablonID,
                                title : productTitle
                            },function(){
                                $(".save").html("Kaydedildi").removeAttr("disabled");
                            });
                        });
                        
                        $(".blend-mode").on("change", function() {
                            console.log($(this).val());
                            seciliObje.setAttrs({
                                globalCompositeOperation : $(this).val()
                            })             
                        });

                       

                        // add the layer to the stage
                        stage.add(layer);

                        // draw the image
                        layer.draw();
                        var sablon;
                        $(".urun-sec-btn").on("click", function(){
                            $(".step").addClass("d-none");
                            $(".step-1").removeClass("d-none");


                        });
                        $(".gorsel-yukle-btn").unbind("click").bind("click", function(){
                           $("#file_input").focus().click();

                        });
                        $(".sablon-sec").on("click", function() {

                            $("#loading").modal();
                            try {
                                sablon.destroy();
                            } catch (error) {
                                
                            }
                            
                            var url = $(this).attr("data-file");
                            productTitle = $(this).find(".title").html();
                            sablonID = $(this).attr("data-id");

                            var imageObj = new Image();
                            imageObj.onload = function () {
                                sablon = new Konva.Image({
                                x: 0,
                                y: 0,
                                image: imageObj,
                                width: {{$width}} / bolum ,
                                height: {{$height}} / bolum ,
                              
                                });

                                // add the shape to the layer
                                layer.add(sablon);
                                $("#loading").modal("hide");
                                sablon.moveToBottom();
                            };

                            $(".step-2").removeClass("d-none");
                            $(".step-1").addClass("d-none");
                            
                            imageObj.src = url;
                        });
                        
                        $("#file_input").change(function(e){

                            var imageLayer = new Konva.Layer();
                            var URL = window.webkitURL || window.URL;
                            var url = URL.createObjectURL(e.target.files[0]);
                            var img = new Image();
                            img.src = url;
                            


                            img.onload = function() {

                                var img_width = img.width;
                                var img_height = img.height;

                                // calculate dimensions to get max 300px
                                var max = 300;
                                var ratio = (img_width > img_height ? (img_width / max) : (img_height / max))

                                // now load the Konva image
                                var theImg = new Konva.Image({
                                    image: img,
                                    x: 0,
                                    y: 0,
                                    width: img_width/ratio,
                                    height: img_height/ratio,
                                    draggable: true,
                                 //   globalCompositeOperation : 'lighten',
                                    rotation: 0
                                });

                                //original size 

                                loadImageURL = new Konva.Image({
                                    image: img,
                                    x: 0,
                                    y: 0,
                                });

                                //stage.add(layer);

                                layer.add(theImg);
                                
                                
                                layer.add(tr); 
                                tr.nodes([theImg]);
                                
                                
                                

                                imageLayer.draw();


                                //events

                                theImg.on('click', function() {
                                    tr.nodes([theImg]);
                                    toolbar.removeClass('d-none');
                                    seciliObje = theImg;
                                })
                                
                            }


                        });

                    });
                    
                </script>