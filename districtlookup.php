<?php 
	
	$addr = rawurlencode(strtoupper($_GET["addr"]));
	$which = $_GET["q"];
	$type = $_GET["type"];
	
	$url = "http://50.17.237.182/arcgis/rest/services/SFFind/MapServer/find?f=json&searchText=$addr&contains=false&returnGeometry=true&layers=37&searchFields=$type&sr=102113";
	$json = json_decode(file_get_contents( $url, false, $context ),true);
	$displayaddress = $json["results"][0]["attributes"]["ADDRESS"];
	$geo = rawurlencode(json_encode($json["results"][0]["geometry"]));
	
	$resulturl = "http://50.17.237.182/arcgis/rest/services/SFFind/MapServer/identify?f=json&geometry=$geo&tolerance=0&returnGeometry=false&mapExtent=%7B%22xmin%22%3A-13630559.274948731%2C%22ymin%22%3A4546350.972750895%2C%22xmax%22%3A-13630411.178206474%2C%22ymax%22%3A4546537.288007284%2C%22spatialReference%22%3A%7B%22wkid%22%3A102113%2C%22latestWkid%22%3A3785%7D%7D&imageDisplay=496%2C624%2C96&geometryType=esriGeometryPolygon&sr=102113&layers=all%3A0%2C1%2C2%2C3%2C4%2C5%2C6%2C8%2C9%2C10%2C11%2C12%2C13%2C14%2C15%2C16%2C17%2C18%2C19%2C20%2C21%2C22%2C23%2C24%2C25%2C26%2C27%2C28%2C29%2C30%2C31%2C32%2C33%2C34%2C35%2C36%2C37%2C38%2C39%2C40";
	
	$resultjson = json_decode(file_get_contents( $resulturl, false, $context ),true);
	
	foreach ($resultjson["results"] as &$layer) {
		if(strpos($layer["layerName"],$which) !== false) {
			if($which == "Supervisor") {
				$result = $layer["attributes"]["supervisor"];
			} else if($which == "BART") {
				preg_match('/[0-9]+/', $layer["attributes"]["bartdist"], $matches);
				$result = $matches[0];
			}
		}
	}
	
	$output = [
		"address" => $displayaddress,
		"district" => $result
	];
	
	echo json_encode($output);
	
?>