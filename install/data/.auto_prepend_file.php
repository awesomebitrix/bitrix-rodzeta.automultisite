<?php

// example rewrite by php
// 	rewrite subdomain url to section url

// NOTE add to .htaccess
//	php_value auto_prepend_file /your-site-public_html/bitrix/modules/rodzeta.automultisite/install/data/.auto_prepend_file.php
// or add to php.ini
//	auto_prepend_file = "/your-site-public_html/bitrix/modules/rodzeta.automultisite/install/data/.auto_prepend_file.php"

if (parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) == "/") {

	$tmpSectionCode = rtrim(str_replace("villa-mia.ru", "", $_SERVER["SERVER_NAME"]), ".");
	if ($tmpSectionCode) {
		// dest url
		//	renessans-park.villa-mia.ru/ -> villa-mia.ru/poselki/renessans-park/
		$_SERVER["REDIRECT_URL"] = $_SERVER["REQUEST_URI"] = "/poselki/" . $tmpSectionCode . "/";
		unset($tmpSectionCode);

		// bitrix entry point
		$_SERVER["PHP_SELF"] = $_SERVER["SCRIPT_NAME"] = "/bitrix/urlrewrite.php";
		$_SERVER["SCRIPT_FILENAME"] = $_SERVER["DOCUMENT_ROOT"] . "/bitrix/urlrewrite.php";
		$_SERVER["REDIRECT_STATUS"] = "200";
		require $_SERVER["SCRIPT_FILENAME"];
		die;
	}
}
