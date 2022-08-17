<?php header ("Content-Type:text/xml");?>
<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>dinamani.com Instant Articles</title>
		<link><?php print BASEURL; ?></link>
		<description>Stay updated with our latest news in Tamil from all over the world. Dinamani bring you latest news update on politics, current affairs, business, sports, cinema.</description>
		<language>ta</language>
		<?php
		foreach($data as $datavalue):
			if($datavalue['article_page_image_path']==''){
				$imagePath = image_url.imagelibrary_image_path.'logo/dinamani_logo_600X300.jpg';
			}else{
				$imagePath = image_url.imagelibrary_image_path.$datavalue['article_page_image_path'];
			}
			$title         = html_entity_decode($datavalue['title'],null,"UTF-8");
			$search        = array('&', '&#39;');
			$replace       = array('&amp;', "'");
			$title         = strip_tags(str_replace($search, $replace , $title)); 
			$title			= preg_replace("|&([^;]+?)[\s<&]|","&amp;$1 ",$title);
			$publish_date_custom = new DateTime(@$datavalue['publish_start_date']);
			$publish_updated_date_custom = new DateTime(@$datavalue['last_updated_on']);
			$search1        = array('&', '&#39;','&amp;','&nbsp;','nbsp;','<br>','</br>','<br />');
			$replace1       = array('&amp;', "'",' ',' ',' ','','','');
			$content         	= str_replace($search1, $replace1 , $datavalue['article_page_content_html']); 
			$content = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $content);
			$EncodedContent 	='<![CDATA[<!doctype html><html><head><link rel="canonical" href="'.BASEURL. html_entity_decode($datavalue['url'],null,"UTF-8").'"/><meta charset="utf-8"/><meta property="op:markup_version" content="v1.0"/><meta property="fb:op-recirculation-ads" content="placement_id=593579497518236_687646294778222"/><meta property="fb:use_automatic_ad_placement" content="enable=true ad_density=default"/><meta property="fb:article_style" content="default"/><meta property="fb:likes_and_comments" content="enable"/></head><body><article><header><figure><img src="'.$imagePath.'"/></figure><h1>'.$title.'</h1><time class="op-published" datetime="'.$publish_date_custom->format('Y-m-d\TH:i:s+05:30').'">'.$publish_date_custom->format('Y-m-d\TH:i:s+05:30').'</time><time class="op-modified" datetime="'.$publish_updated_date_custom->format('Y-m-d\TH:i:s+05:30').'">'.$publish_updated_date_custom->format('Y-m-d\TH:i:s+05:30').'</time><address><a href="'.BASEURL. html_entity_decode($datavalue['url'],null,"UTF-8").'">dinamani.com</a></address><figure class="op-ad"><iframe width="300" height="250" style="border:0; margin:0;" src="https://www.facebook.com/adnw_request?placement=253981245112736_253981258446068&adtype=banner300x250"></iframe></figure></header>'.$content.'<figure class="op-tracker"><iframe><script>(function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,"script","//www.google-analytics.com/analytics.js","ga");ga("create", "UA-2311935-31", "auto");ga("require", "displayfeatures");ga("set", "campaignSource", "Facebook");ga("set", "campaignMedium", "Social Instant Article");ga("set", "referrer", referrer);ga("send", "pageview");</script></iframe></figure><footer><small>Copyright - '.date("Y").' dinamani.com. All rights reserved.</footer></small></article></body></html>]]>';
			
			$Description         	= strip_tags(str_replace($search1, $replace1 , $datavalue['summary_html']));
		?>
			<item>
			<title><?php print $title; ?></title>
			 <link><?php echo BASEURL. html_entity_decode($datavalue['url'],null,"UTF-8"); ?></link>
			 <content:encoded><?php echo $EncodedContent; ?></content:encoded>
			 <guid isPermaLink="false"><?php echo BASEURL. html_entity_decode($datavalue['url'],null,"UTF-8"); ?></guid>
			 <description><?php echo $Description; ?></description>
			 <pubDate><?php echo $publish_date_custom->format('Y-m-d\TH:i:s+05:30'); ?></pubDate>
			<modDate><?php echo $publish_updated_date_custom->format('Y-m-d\TH:i:s+05:30'); ?></modDate>
			</item>
		<?php
		endforeach;
		?>
	</channel>
</rss>