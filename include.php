<?
global $DB, $MESS, $APPLICATION;
IncludeModuleLangFile(__FILE__);

CModule::AddAutoloadClasses(
	"kit.loginbyemail",
	array(
		"CKITLoginByEmail" => "classes/general/authbyemail.php",
		"CKITLoginByLink" => "classes/general/authbylink.php",
	)
);
?>