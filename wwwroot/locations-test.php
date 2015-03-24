<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Google Maps AJAX + MySQL/PHP Example</title>
<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAA1fEDSdxR3qeEd0gXXNiT2RS45ipYmAPbuflkonYumCE__MY7vRSF2jMnR5w6fpYoHASDfMg8fGv-Bw" type="text/javascript"></script>

    <script src="js/page-locations.js" type="text/javascript"></script>
  </head>

  <body onload="load()" onunload="GUnload()">
    Address: <input type="text" id="addressInput"/>
    Radius: <select id="radiusSelect">

      <option value="25" selected>25</option>
      <option value="100">100</option>

      <option value="200">200</option>

    </select>

    <input type="button" onclick="searchLocations()" value="Search Locations"/>
    <br/>    
    <br/>
<div style="width:600px; font-family:Arial, 
sans-serif; font-size:11px; border:1px solid black">
  <table> 
    <tbody> 
      <tr id="cm_mapTR">

        <td width="200" valign="top"> <div id="sidebar" style="overflow: auto; height: 400px; font-size: 11px; color: #000"></div>

        </td>
        <td> <div id="map" style="overflow: hidden; width:400px; height:400px"></div> </td>

      </tr> 
    </tbody>
  </table>
</div>    
  </body>
</html>