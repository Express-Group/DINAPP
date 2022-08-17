<?php header ("Content-Type:text/xml");?>
<rss version="2.0">
<channel>
<title>Breaking News</title>
<link><?php echo $baseUrl; ?></link>
<description>Tamil Live News | Tamil News |Thinamani| LIVE News in tamil | Breaking News in tamil | Dinamani | Tamilnadu News | Politics News in Tamil | Cinema news Tamil |  Latest News in Tamil - Dinamani gives the latest &amp; Breaking News in tamil</description>
<language>ta</language>
<?php
foreach($breaking_news as $content){
	$title = strip_tags(html_entity_decode($content['Title'],ENT_QUOTES,"UTF-8"));
	$link ='';
	if($content['Content_ID']!=''){
		$content_details = $this->widget_model->get_contentdetails_from_database($content['Content_ID'], 1,'y','live');
		$link =  $baseUrl.html_entity_decode($content_details[0]['url'],null,"UTF-8");
	}
	$updatedDate = new DateTime(@$content['Modifiedon']);
	$bid = 'B'.$updatedDate->format('Y').'-'.$content['breakingnews_id'];
?>
<item>
<Articleid><?php echo $bid; ?></Articleid>
<title><![CDATA[<?php echo $title; ?>]]></title>
<link><?php echo $link; ?></link>
<thumbimage></thumbimage>
<fullimage></fullimage>
<description><![CDATA[]]></description>
<updatedDate><?php echo $updatedDate->format('D, d M Y H:i:s +0530') ?></updatedDate>
<pubDate><?php echo $updatedDate->format('D, d M Y H:i:s +0530') ?></pubDate>
</item>		
<?php } ?>
</channel>
</rss> 