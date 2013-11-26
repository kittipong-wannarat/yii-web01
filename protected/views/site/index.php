<?php
/* @var $this SiteController */
 
$this->pageTitle=Yii::app()->name;
// เพิ่มคำนี้ลงไปด้วย เพื่อการแสดงภาษาสมบูรณ์แบบ
header('Content-Type: text/html; charset=utf-8');
?>
 
<div class="showMap">
 
    <?php
        // รวมการตั้งค่าการใช้ jquery-gmap ทั้งหมด
        $setOptions = array(
            // ตำแหน่งไฟล์  Extension jquery-gmap
            'mapPath' => 'ext.jquery-gmap.jquery-gmap.*',
            // name :: ค้นหาจากชื่อที่อยู่, ประเทศ , position :: ค้นหาจากตำแหน่ง ละติจุด และ ลองติจุด
            'mapType' => 'position',
            // กำหนดชื่อที่อยู่, ประเทศ
            'mapAddressName' => 'Burapha University, TH',
            // ตำแหน่ง ละติจุด และลองติจุด เพื่อปักหมุด ในตำแหน่งทีกำหนด
            'mapPosition' => array(13.2817460000000001,100.9246519999999947),
            // ตำแหน่งศูนย์กลางของแผนที่
            'mapCenter' => array(0, 0),
            // ข้อความ Title
            'mapTitle' => 'อาคารสิธินธร มหาวิทยาลัยบูรพา',
            // แสดงรายละเอียดของตำแหน่งที่ปักหมุด
            'mapContent' => array(true,'อาคารสิธินธร มหาวิทยาลัยบูรพา'),
            // ความกว้างของแผนที่แสดง
            'mapSizeWidth'  => 600, 
            // ความสูงของแผนที่
            'mapSizeHight'  =>  400,
            // ระดับการ Zoom
            'mapZoom' => 10,
            // รูปภาพที่ต้องการเอามาแสดง
            'mapPathIcon' => 'http://google-maps-icons.googlecode.com/files/dolphins.png',
            'mapShowCircle' => array(
                'show' => true, // ต้องการแสดงหรือไม่
                'radius' => 1000, // ความกว้าง
                'color' => 'yellow', // สีพื้นหลัง
                'borderColer' => 'red' // สีเส้นขอบ
            ),
        );
         
         /* *************** สร้าง แผนที่โดยใช้คำสั่งดังต่อไปนี้ *******************/
         Yii::import($setOptions['mapPath']);  
 
         $gmap = new EGmap3Widget(); // สร้าง Widget แผนที่
         $gmap->setSize($setOptions['mapSizeWidth'],$setOptions['mapSizeHight']);      
 
         $options = array(
            'scaleControl' => true,
            'streetViewControl' => true,
            'zoom' => $setOptions['mapZoom'],                  
            'center' => $setOptions['mapCenter'],      
            'mapTypeId' => EGmap3MapTypeId::HYBRID, // รูปแบบการแสดงผล "เริ่มต้น"
            'mapTypeControlOptions' => array(
                'style' => EGmap3MapTypeControlStyle::DROPDOWN_MENU,
                'position' => EGmap3ControlPosition::TOP_CENTER, // ชนิดของการแสดงผล
            ),
            'zoomControlOptions' => array(
                'style' => EGmap3ZoomControlStyle::SMALL,
                'position' => EGmap3ControlPosition::BOTTOM_CENTER // ชนิดของการซูม
            ),
        );
 
        $gmap->setOptions($options); // เป็นการ SetOption ตามที่กำหนดไว้
 
        /* ************** สร้าง Marker แบบกำหนด ละดิจุด และ ลองติจุด ****************/    
        $marker = new EGmap3Marker(array(
            'title' => $setOptions['mapTitle'],
            'icon' => array(
                'url' => $setOptions['mapPathIcon'],
                'anchor' => array('x' => 1, 'y' => 36)
            )
        )); // สร้างและกำหนดรูปแบบ Marker
 
        if(isset($setOptions['mapType']) && $setOptions['mapType'] === 'name'){
            $marker->address = $setOptions['mapAddressName'];
        }else if(isset($setOptions['mapType']) && $setOptions['mapType'] === 'position'){
            $marker->latLng = $setOptions['mapPosition']; // ปักหมุด ในตำแหน่งทีกำหนด   
        }   
 
        if(!empty($setOptions['mapContent'][0])){
            $marker->data = $setOptions['mapContent'][1]; // แสดงรายละเอียดของตำแหน่งที่ปักหมุด
        }
 
        if(!empty($setOptions['mapContent'][0])){
            $js = "function(marker, event, data){
                var map = $(this).gmap3('get'),
                infowindow = $(this).gmap3({
                    action:'get',
                    name:'infowindow'
                });
 
                if (infowindow){
                    infowindow.open(map, marker);
                    infowindow.setContent(data);
                }else{
                    $(this).gmap3({
                        action:'addinfowindow',
                        anchor:marker,
                        options:{content: data}
                    });
                }
            }";
 
            $marker->addEvent('click', $js);
        }
 
        $marker->centerOnMap();
        $gmap->add($marker);        // คำสั่ง Add Marker ตามที่กำหนด
         
         /* ******************* สร้าง Circle (วงกลมรอบรัศมี) *************************/    
        if(!empty($setOptions['mapShowCircle']['show'])){
            $polyOptions = array(
                'fillColor' =>$setOptions['mapShowCircle']['color'],
                'strokeColor' => $setOptions['mapShowCircle']['borderColer']
            );
 
            $rectangleOptions = array_merge(
                $polyOptions, array('bounds' => array(40, -72, 42, -76))
            );
             
            $rectangle = new EGmap3Rectangle($rectangleOptions);
            //$rectangle->centerOnMap();
            $gmap->add($rectangle);
 
            $polygon = new EGmap3Polygon($polyOptions);
            $polygon->paths = array(
                array(18.466465, -66.118292),
                array(32.321384, -64.75737),
                array(25.774252, -80.190262),
                array(25.774252, -80.190262),
            );
             
            //$polygon->centerOnMap();
            $gmap->add($polygon);
 
            $polyline = new EGmap3Polyline(array(
                'strokeColor' => $setOptions['mapShowCircle']['borderColer']
            ));
            $polyline->path = array(
                array(25.774252, -80.190262),
                array(23.1168, -82.3885569),
                array(18.539269, -72.336408),
            );
             
            //$polyline->centerOnMap();
            $gmap->add($polyline);
 
            $circleOptions = array_merge(
                $polyOptions, array('radius' => $setOptions['mapShowCircle']['radius'])
            );
 
            $circle = new EGmap3Circle($circleOptions);
            $circle->address = $setOptions['mapAddressName'];
            //$circle->centerOnMap();
            $gmap->add($circle);
 
            $circle = new EGmap3Circle($circleOptions);
            $circle->address = $setOptions['mapAddressName'];
            $callback = 'function(circle){alert("circle center: "+circle.getCenter());}';
            $circle->addCallback($callback);
            $gmap->add($circle);
        }
 
        if(!empty($setOptions['mapContent'][0])){
            $infoWindow = new EGmap3InfoWindow(array(
                'content' =>$setOptions['mapContent'][1]
            ));
 
            $infoWindow->address = $setOptions['mapAddressName'];
            $gmap->add($infoWindow);
        }
 
        if(isset($setOptions['mapType']) && $setOptions['mapType'] === 'name'){
            $route = new EGmap3Route(array(
                'origin' =>$setOptions['mapAddressName'],
                'destination' => $setOptions['mapAddressName']
            ));
             
            $gmap->add($route);
        }
 
    $gmap->renderMap();    // คำสั่งแสดงแผนที่
 
    ?>
 
</div>