

<?php
$url = "http://soundcloud.com/heshzad/sets/playlist";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "$url");
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	$result = curl_exec($ch);
	curl_close($ch);

$dom_doc = new DOMDocument();
$html_file = file_get_contents($result);
// The next line will likely generate lots of warnings if your html isn't perfect
// Put an @ in front to suppress the warnings once you review them
$dom_doc->loadHTML( $html_file );
// Get all references to <b> tag
$tags_b = $dom_doc->getElementsByTagName('b');
// Extract text value and replace with something else
foreach($tags_b as $tag) {
    $tag_value = $tag->nodeValue;
    // get translation of tag_value
    $translated_val = get_translation_from_google();
    $tag->nodeValue = $translated_val;
}
// save page with translated text
$translated_page = $dom_doc->saveHTML();


?>