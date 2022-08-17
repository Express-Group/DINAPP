<?php header ("Content-Type:text/xml");?>
<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Dinamani</title>
		<link><?php print BASEURL.@$sectionDetails['URLSectionStructure']; ?></link>
		<description>Dinamani brings latest breaking news on India, World, Politics, Finance, Cricket, Cinema, Technology, Automobile, Lifestyle and leading columnists.</description>
		<language>en</language>
	    <?php print $data; ?>
	</channel>
</rss>