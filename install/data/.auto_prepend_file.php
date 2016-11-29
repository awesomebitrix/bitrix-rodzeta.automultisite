<?php

// example rewrite by php
// 	rewrite subdomain url to section url

if (parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) == "/") {

	$tmpSectionCode = basename(rtrim(str_replace("villa-mia.ru", "", $_SERVER["SERVER_NAME"]), "."));
	if ($tmpSectionCode) {
		// dest url
		//		renessans-park.villa-mia.ru/ -> villa-mia.ru/poselki/renessans-park/
		$_SERVER["REDIRECT_URL"] = $_SERVER["REQUEST_URI"] = "/poselki/" . $tmpSectionCode . "/";

		// bitrix entry point
		$_SERVER["PHP_SELF"] = $_SERVER["SCRIPT_NAME"] = "/bitrix/urlrewrite.php";
		$_SERVER["SCRIPT_FILENAME"] = $_SERVER["DOCUMENT_ROOT"] . "/bitrix/urlrewrite.php";
		$_SERVER["REDIRECT_STATUS"] = "200";

		unset($tmpSectionCode);
		require $_SERVER["SCRIPT_FILENAME"];
		die;
	}
}