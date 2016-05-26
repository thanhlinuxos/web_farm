<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Map_lib {

    public function strip_unicode($str) {
        if (!$str) return false;
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd' => 'đ|Đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i' => 'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );
        foreach ($unicode as $nonUnicode => $uni)
        {
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }
        return $str;
    }

    public function get($address_ = "", $type = 0) {
        $address = $this->strip_unicode($address_);

        $prepAddr = str_replace(' ', '+', $address);
        $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $prepAddr . '&sensor=false');
        $output = json_decode($geocode);

        if ($output->status == "OK") {
            if ($type == 0) {
                $data['latitude'] = $output->results[0]->geometry->location->lat; // Vĩ độ
                $data['longitude'] = $output->results[0]->geometry->location->lng; // Kinh độ
            } else {
                for ($i = 0; $i < count($output->results); $i++) {
                    $data[$i]['latitude'] = $output->results[$i]->geometry->location->lat; // Vĩ độ
                    $data[$i]['longitude'] = $output->results[$i]->geometry->location->lng; // Kinh độ
                }

                $data['address'] = $address_;
                $data['status'] = "OK";
            }
        } else {
            $data['address'] = $address_;
            $data['status'] = "NO_RESULT";
        }
        return $data;
    }

    public function map($latitude = 10.7716320, $longitude = 106.665323, $width = "650px", $height = "500px") {
        $output = <<<EOF
			<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&language=vi"></script>
			<script type="text/javascript">
				var map;
				function onLoad_GoogleMap()
				{
					  var myLatlng = new google.maps.LatLng( {$latitude}, {$longitude});
					  var myOptions = {
							zoom: 16,
							center: myLatlng,
							mapTypeId: google.maps.MapTypeId.ROADMAP
						}
					map = new google.maps.Map(document.getElementById("div_google_map"), myOptions); 
					
					var text= "";// Biến text chứa nội dung sẽ được hiển thị
					var infowindow = new google.maps.InfoWindow(
					{ content: text,
						size: new google.maps.Size(100,50),
						position: myLatlng
					});
					
					infowindow.open(map);    
					var marker = new google.maps.Marker({
					  position: myLatlng, 
					  map: map,
					  title:"CTy Giải Pháp Công Nghệ WEGO - http://webgoogle.vn"
					});
				}
			</script>
			<!-- <body onLoad="onLoad_GoogleMap()">-->
			<div id="div_google_map" style="height:{$height}; width:{$width}"></div>
EOF;

        return $output;
    }

}
