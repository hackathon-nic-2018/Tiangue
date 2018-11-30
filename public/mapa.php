<?php


$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

$con=new PDO("mysql:host=localhost;dbname=tiangue;charset=UTF8", "root", "");
$clave=$_REQUEST['clave'];
$query = "SELECT * FROM negocio where descripcion like '%$clave%'";
$datos=$con->query($query);
$row=$datos->fetchAll();
header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each

for($i=0;$i<count($row);$i++){
  // Add to XML document node
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id",$row[$i]['idnegocio']);
  $newnode->setAttribute("name",$row[$i]['nombre_negocio']);
  $newnode->setAttribute("address", $row[$i]['direccion']);
  $newnode->setAttribute("lat", $row[$i]['latitudnegocio']);
  $newnode->setAttribute("lng", $row[$i]['longitudnegocio']);
  $newnode->setAttribute("type", $row[$i]['descripcion']);
  $newnode->setAttribute("abre", $row[$i]['horaabierto']);
  $newnode->setAttribute("cierra", $row[$i]['horacerrado']);
}



echo $dom->saveXML();

?>