<?xml version="1.0" encoding="utf-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
<?php
foreach($new_articles as $articles){
$publish_updated_date_custom = new DateTime(@$articles['last_updated_on']);
$publish_date_custom = new DateTime(@$articles['publish_start_date']);
$title = html_entity_decode($articles['title'],null,"UTF-8"); //html_entity_decode
$search = array('&', '&#39;');
$replace = array('&amp;', "'");
$title = strip_tags(str_replace($search, $replace , $title)); 
$title = preg_replace("|&([^;]+?)[\s<&]|","&amp;$1 ",$title);
$articles['tags'] = str_replace('&','&amp;',$articles['tags']);
?>
<url>
<loc><?php echo BASEURL. html_entity_decode($articles['url'],null,"UTF-8"); ?></loc>
<lastmod><?php echo $publish_updated_date_custom->format('Y-m-d\TH:i:s+05:30'); ?></lastmod>
<news:news>
<news:publication>
<news:name>தினமணி</news:name>
<news:language>ta</news:language>
</news:publication>
<news:publication_date><?php echo $publish_date_custom->format('Y-m-d\TH:i:s+05:30'); ?></news:publication_date>
<news:title><?php echo $title; ?></news:title>
<news:keywords><?php echo preg_replace("|&([^;]+?)[\s<&]|","&amp;$1 ",$articles['tags']); ?></news:keywords>
</news:news>
<?php if($articles['article_page_image_path'] !=''){ ?>
<image:image>
<image:loc> <?php echo image_url.imagelibrary_image_path.$articles['article_page_image_path'] ;?> </image:loc>
</image:image>
<?php } ?>
</url>
<?php
}
?>
</urlset> 