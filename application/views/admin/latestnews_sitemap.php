<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>dinamani.com Instant Articles</title>
		<link><?php print BASEURL; ?></link>
		<description>Stay updated with our latest news in Tamil from all over the world. Dinamani bring you latest news update on politics, current affairs, business, sports, cinema.</description>
		<language>ta</language>
		<lastBuildDate><?php echo date('Y-m-d\TH:i:s+05:30') ?></lastBuildDate>
	    <?php print $data; ?>
	</channel>
</rss>