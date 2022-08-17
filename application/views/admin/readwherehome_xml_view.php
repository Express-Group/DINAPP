<?php header ("Content-Type:text/xml");?>
<rss version="2.0" xml:base="<?php echo $baseUrl.$sectionDetails['URLSectionStructure']; ?>">
<channel>
<title><?php echo $sectionDetails['MetaTitle']; ?></title>
<link><?php echo $baseUrl.$sectionDetails['URLSectionStructure']; ?></link>
<description><?php echo str_replace('&' ,'&amp;' , $sectionDetails['MetaDescription']); ?></description>
<language>ta</language>
<?php
foreach($article as $articles){
$title = strip_tags(html_entity_decode($articles['title'],ENT_QUOTES,"UTF-8"));
$updatedDate = new DateTime(@$articles['last_updated_on']);
$publishDate = new DateTime(@$articles['publish_start_date']);
$thumbimage = image_url.imagelibrary_image_path.'logo/dinamani_logo_150X150.jpg';
$fullimage = image_url.imagelibrary_image_path.'logo/dinamani_logo_600X400.jpg';
if($articles['contentType']==1){
	$contentID = 'A'.$updatedDate->format('Y').'-'.$articles['contentId'];
}else if($articles['contentType']==3){
	$contentID = 'G'.$updatedDate->format('Y').'-'.$articles['contentId'];
}else{
	$contentID = 'V'.$updatedDate->format('Y').'-'.$articles['contentId'];
}
if($articles['image']!=''){
	$thumbimage = image_url.imagelibrary_image_path.str_replace('original/','w150X150/',$articles['image']);
	$fullimage = image_url.imagelibrary_image_path.$articles['image'];
}
?>
<item>
<Articleid><?php echo $contentID; ?></Articleid>
<title><![CDATA[<?php echo $title; ?>]]></title>
<thumbimage><?php echo $thumbimage; ?></thumbimage>
<fullimage><?php echo $fullimage; ?></fullimage>
<description><![CDATA[]]></description>
<link><?php echo $baseUrl.html_entity_decode($articles['url'],null,"UTF-8"); ?></link>
<pubDate><?php echo $publishDate->format('D, d M Y H:i:s +0530') ?></pubDate>
<updatedDate><?php echo $updatedDate->format('D, d M Y H:i:s +0530') ?></updatedDate>

</item>
<?php	
}
?>
</channel>
</rss>