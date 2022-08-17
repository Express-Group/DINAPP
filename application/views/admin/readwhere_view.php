<?php header ("Content-Type:text/xml");?>
<rss version="2.0" xml:base="<?php echo $baseUrl.$sectionDetails['URLSectionStructure']; ?>">
<channel>
<title><?php echo $sectionDetails['MetaTitle']; ?></title>
<link><?php echo $baseUrl.$sectionDetails['URLSectionStructure']; ?></link>
<description><?php echo str_replace('&' ,'&amp;' , $sectionDetails['MetaDescription']); ?></description>
<language>ta</language>
<?php
foreach($content as $articles){
$title = strip_tags(html_entity_decode($articles['title'],ENT_QUOTES,"UTF-8"));
$meta_title = strip_tags(html_entity_decode($articles['meta_Title'],ENT_QUOTES,"UTF-8"));

$summary = strip_tags(html_entity_decode($articles['summary_html'],ENT_QUOTES,"UTF-8"));
$thumbimage = image_url.imagelibrary_image_path.'logo/dinamani_logo_150X150.jpg';
//$fullimage = image_url.imagelibrary_image_path.'logo/dinamani_logo_600X300.jpg';
$fullimage = image_url.imagelibrary_image_path.'logo/dinamani_logo_600X400.jpg';

$publishDate = new DateTime(@$articles['publish_start_date']);
$updatedDate = new DateTime(@$articles['last_updated_on']);
$authorNname = strip_tags(str_replace(['&', '&#39;'], ['&amp;', "'"] , $articles['author_name']));
$tags = strip_tags(str_replace(['&', '&#39;'], ['&amp;', "'"] , $articles['tags']));
if($contentType==1){
	$content = html_entity_decode($articles['article_page_content_html'],ENT_QUOTES,"UTF-8");
	$tags = strip_tags(str_replace(['&', '&#39;'], ['&amp;', "'"] , $controller->seotags($articles['content_id'])));
	if($articles['article_page_image_path']!=''){
		$thumbimage = image_url.imagelibrary_image_path.str_replace('original/','w150X150/',$articles['article_page_image_path']);
		$fullimage = image_url.imagelibrary_image_path.$articles['article_page_image_path'];
	}
}else if($contentType==3){
	$content = html_entity_decode($articles['summary_html'],ENT_QUOTES,"UTF-8");
	if($articles['first_image_path']!=''){
		$thumbimage = image_url.imagelibrary_image_path.str_replace('original/','w150X150/',$articles['first_image_path']);
		$fullimage = image_url.imagelibrary_image_path.$articles['first_image_path'];
	}
}else if($contentType==4){
	$content = html_entity_decode($articles['video_script'],ENT_QUOTES,"UTF-8");
	if($articles['video_image_path']!=''){
		$thumbimage = image_url.imagelibrary_image_path.str_replace('original/','w150X150/',$articles['video_image_path']);
		$fullimage = image_url.imagelibrary_image_path.$articles['video_image_path'];
	}
}

?>
<item>
<?php if($contentType==1): ?>
<Articleid><?php echo 'A'.$updatedDate->format('Y').'-'.$articles['content_id']; ?></Articleid>
<?php elseif($contentType==3): ?>
<Articleid><?php echo 'G'.$updatedDate->format('Y').'-'.$articles['content_id']; ?></Articleid>
<?php else: ?>
<Articleid><?php echo 'V'.$updatedDate->format('Y').'-'.$articles['content_id']; ?></Articleid>
<?php endif; ?>
<title><![CDATA[<?php echo $title; ?>]]></title>
<meta_title><![CDATA[<?php echo $meta_title; ?>]]></meta_title>

<excerpt><![CDATA[<?php echo $summary; ?>]]></excerpt>
<description><![CDATA[<?php echo $content; ?>]]></description>
<thumbimage><?php echo $thumbimage; ?></thumbimage>
<?php if($contentType!=3): ?>
<fullimage><?php echo $fullimage; ?></fullimage>
<?php endif; ?>
<?php 
if($contentType==3): 
$galleryImages = $this->widget_model->widget_article_content_by_id($articles['content_id'], $contentType, $articles['url']);
foreach($galleryImages as $images):
$galleryCaption = html_entity_decode($images['gallery_image_title'],ENT_QUOTES,"UTF-8");
$galleryImage= str_replace(' ', "%20",$images['gallery_image_path']);
?>
<gallery>
<gallery_url><?php echo image_url.imagelibrary_image_path.$galleryImage; ?></gallery_url>
<gallery_caption><![CDATA[<?php echo $galleryCaption; ?>]]></gallery_caption>
</gallery>
<?php endforeach; endif; ?>
<?php if($contentType==4): ?>
<video_url></video_url>
<?php endif; ?>
<pubDate><?php echo $publishDate->format('D, d M Y H:i:s +0530') ?></pubDate>
<authorname><?php echo $authorNname; ?></authorname>
<link><?php echo $baseUrl.html_entity_decode($articles['url'],null,"UTF-8"); ?></link>
<?php if($contentType==1): ?>
<tags><?php echo $tags; ?></tags>
<?php else: ?>
<tags><?php echo $tags; ?></tags>
<?php endif; ?>
<updatedDate><?php echo $updatedDate->format('D, d M Y H:i:s +0530') ?></updatedDate>
</item>		
<?php } ?>
</channel>
</rss>