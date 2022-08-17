<?php
header("Content-type: text/xml");
$base_url = base_url();
$url =  "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$atom_url= htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
echo "<?xml version='1.0' encoding='UTF-8'?> 
<rss version='2.0' xmlns:atom='http://www.w3.org/2005/Atom'>
<channel>
<title>Dinamani</title>
<link>$base_url</link>
<atom:link href=\"$atom_url\" rel=\"self\" type=\"application/rss+xml\"/>
<description>RSS Feed from Dinamani</description>
<language>en-us</language>
<copyright>Copyright ".date('Y')." Dinamani. All rights reserved.</copyright>\n";
echo "<item>\n";
echo "<panchangamDate>".$panchangam['Panchangam_date']."</panchangamDate>\n";
echo "</item>\n";
echo "<item>\n";
echo "<week>".$panchangam['Tamilday']."</week>\n";
echo "</item>\n";
echo "<item>\n";
echo "<tamilYearAndMonth>".$panchangam['Tamilyearandmonth']."</tamilYearAndMonth>\n";
echo "</item>\n";
echo "<item>\n";
echo "<nallaNeramKalai>காலை : ".$panchangam['NallaNeramKalai']."</nallaNeramKalai>\n";
echo "</item>\n";
echo "<item>\n";
echo "<nallaNeramMalai>மாலை : ".$panchangam['NallaNeramMalai']."</nallaNeramMalai>\n";
echo "</item>\n";
echo "<item>\n";
echo "<raaguKaalam>ராகு காலம் : ".$panchangam['RaaguKaalam']."</raaguKaalam>\n";
echo "</item>\n";
echo "<item>\n";
echo "<yemmakandam>எமகண்டம் : ".$panchangam['Yemmakandam']."</yemmakandam>\n";
echo "</item>\n";
echo "<item>\n";
echo "<kuligai>குளிகை : ".$panchangam['Kuligai']."</kuligai>\n";
echo "</item>\n";
echo "<item>\n";
echo "<thithi>திதி : ".$panchangam['Thithi']."</thithi>\n";
echo "</item>\n";
echo "<item>\n";
echo "<natchatram>நட்சத்திரம் : ".$panchangam['Natchatram']."</natchatram>\n";
echo "</item>\n";
echo "<item>\n";
echo "<chandrashtam>சந்திராஷ்டமம் : ".$panchangam['Chandrashtam']."</chandrashtam>\n";
echo "</item>\n";
echo "<item>\n";
echo "<rasi>மேஷம் : ".$panchangam['MeshamRasiPalan']."</rasi>\n";
echo "</item>\n";
echo "<item>\n";
echo "<rasi>ரிஷபம் : ".$panchangam['RishabamRasiPalan']."</rasi>\n";
echo "</item>\n";
echo "<item>\n";
echo "<rasi>மிதுனம் : ".$panchangam['MidhunamRasiPalan']."</rasi>\n";
echo "</item>\n";
echo "<item>\n";
echo "<rasi>கடகம் : ".$panchangam['KadahamRasiPalan']."</rasi>\n";
echo "</item>\n";
echo "<item>\n";
echo "<rasi>சிம்மம் : ".$panchangam['SimamRasiPalan']."</rasi>\n";
echo "</item>\n";
echo "<item>\n";
echo "<rasi>கன்னி : ".$panchangam['KanniRasiPalan']."</rasi>\n";
echo "</item>\n";
echo "<item>\n";
echo "<rasi>துலாம் : ".$panchangam['ThulamRasiPalan']."</rasi>\n";
echo "</item>\n";
echo "<item>\n";
echo "<rasi>விருச்சிகம் : ".$panchangam['ViruchagammRasiPalan']."</rasi>\n";
echo "</item>\n";
echo "<item>\n";
echo "<rasi>தனுசு : ".$panchangam['DanushuRasiPalan']."</rasi>\n";
echo "</item>\n";
echo "<item>\n";
echo "<rasi>மகரம் : ".$panchangam['MagaramRasiPalan']."</rasi>\n";
echo "</item>\n";
echo "<item>\n";
echo "<rasi>கும்பம் : ".$panchangam['KumbamRasiPalan']."</rasi>\n";
echo "</item>\n";
echo "<item>\n";
echo "<rasi>மீனம் : ".$panchangam['MenamRasiPalan']."</rasi>\n";
echo "</item>\n";
echo "</channel>\n";
echo "</rss>";
?>