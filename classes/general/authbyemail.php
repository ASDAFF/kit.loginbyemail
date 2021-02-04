<?
class CKITLoginByEmail
{
	function On()
	{
		COption::SetOptionString("kit.loginbyemail", "auth_by_email", "Y" );
		RegisterModuleDependences("main", "OnBeforeUserLogin", "kit.loginbyemail", "CKITLoginByEmail", "OnBeforeUserLoginHandler");
	}
	function Off()
	{
		COption::SetOptionString("kit.loginbyemail", "auth_by_email", "N" );
		UnRegisterModuleDependences("main", "OnBeforeUserLogin", "kit.loginbyemail", "CKITLoginByEmail", "OnBeforeUserLoginHandler");
	}
	function OnBeforeUserLoginHandler( &$arFields )
	{
		$userLogin = $_POST["USER_LOGIN"];
		if (isset($userLogin))
		{
			$isEmail = strpos($userLogin,"@");
			if ($isEmail>0)
			{
				$arFilter = Array("EMAIL"=>$userLogin);
				$rsUsers = CUser::GetList(($by="id"), ($order="desc"), $arFilter);
				if($res = $rsUsers->Fetch())
				{
					if($res["EMAIL"]==$arFields["LOGIN"])
						$arFields["LOGIN"] = $res["LOGIN"];
				}
			}
		}
	}
}
?>