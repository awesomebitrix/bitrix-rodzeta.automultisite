<?php
/*******************************************************************************
 * rodzeta.automultisite - Auto multisiting module
 * Copyright 2016 Semenov Roman
 * MIT License
 ******************************************************************************/

use Bitrix\Main\{EventManager, Event, EventResult};

EventManager::getInstance()->addEventHandler("main", "OnGetCurrentSiteTemplate", function (Event $e) {
	$template = $e->getParameter("template");
	if ($template === ".default") {
		$template = $_SERVER["SERVER_NAME"];
		return new EventResult(EventResult::SUCCESS, $template);
	}
});
