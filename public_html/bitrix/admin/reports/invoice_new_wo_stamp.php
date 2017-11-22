<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?><?
/*
Скопируйте этот файл в папку /bitrix/admin/reports и измените по своему усмотрению

$ORDER_ID - ID текущего заказа

$arOrder - массив атрибутов заказа (ID, доставка, стоимость, дата создания и т.д.)
Следующий PHP код:
print_r($arOrder);
выведет на экран содержимое массива $arOrder.

$arOrderProps - массив свойств заказа (вводятся покупателями при оформлении заказа) следующей структуры:
array(
	"мнемонический код (или ID если мнемонический код пуст) свойства" => "значение свойства"
	)
	
$arParams - массив из настроек Печатных форм

$arUser - массив из настроек пользователя, совершившего заказ
*/
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=<?=LANG_CHARSET?>">
<title langs="ru">Счет новый без печати</title>
<style>
<!--
 /* Style Definitions */
body {font-family: Arial;font-size:10.0pt;}
p{margin:5px;line-height:14px;}
table.black-border {font-family: Arial;font-size:10.0pt;border-collapse:collapse}
table.black-border thead {font-weight: bold;}
table.black-border tr td, table.black-border tr th {border: 1px solid #000;}
p.title {font: bold 14pt/36pt Arial; text-align: center}
p.sign {font: 10pt/60pt Arial}
div.Section1
	{width:17cm; height: 25cm;
	mso-header-margin:35.4pt;
	mso-footer-margin:35.4pt;
	mso-paper-source:0;}
input.header {font: bold 14pt/36pt Arial;border:0px none}
input.b {font: bold 10pt/14pt Arial;border:0px none;width:380px}

-->
</style>
</head>

<body style='tab-interval:35.4pt'>

<div class="Section1">
	<p align="left" style="line-height:20px"><font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px"><b>ООО &laquo;СФЕРА АШ&raquo;</b></font><br/>
	<font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px"><b>121609, г. Москва, Рублевское шоссе, д.28 к.3</b></font><br/>
	<font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px"><b>Тел.: +7 (499) 755-70-79</b></font></p>
  <p align="center"><font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px"><b>Образец заполнения платежного поручения</b></font></p>
  <table width="100%" class="black-border" cellpadding="4" cellspacing="0" bordercolor="#000000" width="100%" border="1" style="border-collapse:collapse">
		<tr>
			<td nowrap="nowrap"> 
        <font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px">ИНН 7731637542</font> 
      </td>
			<td nowrap="nowrap"> 
        <font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px">КПП 773101001</font>
      </td>
			<td valign="bottom" nowrap="nowrap" rowspan="2"> 
				<span style="line-height:26px"><font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px">Сч. №</span>
      </td>
			<td valign="bottom" nowrap="nowrap" rowspan="2"> 
        <span style="line-height:26px"><font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px">40702810670010039258</font></span>
      </td>   
    </tr>
		<tr>
			<td nowrap="nowrap" colspan="2" valign="top"> 
				<font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px">Получатель<br/><span style="line-height:26px">ООО &quot;СФЕРА АШ&quot;</span></font>
			</td>
		</tr>
    <tr>
			<td nowrap="nowrap" colspan="2" rowspan="2" valign="top"> 
        <font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px"><span style="line-height:26px">Банк получателя</span><br/><br/>МОСКОВСКИЙ ФИЛИАЛ АО КБ "МОДУЛЬБАНК"</font>
      </td>
			<td nowrap="nowrap"> 
        <font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px">БИК
      </td>
      <td rowspan="2" valign="top">
				<font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px"><span style="line-height:26px">044525092</span><br/><br/>30101810645250000092</font>
      </td>
		</tr>
    <tr>
			<td nowrap="nowrap"> 
        <font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px">Сч. №</font>
      </td>
		</tr>
	</table>
	<?//echo "<pre>", print_r($arOrder), "</pre>";?>
	<?//echo "<pre>", print_r($arOrderProps), "</pre>";
	$months = array(
		"01" => "января",
		"02" => "февраля",
		"03" => "марта",
		"04" => "апреля",
		"05" => "мая",
		"06" => "июня",
		"07" => "июля",
		"08" => "августа",
		"09" => "сентября",
		"10" => "октября",
		"11" => "ноября",
		"12" => "декабря",
	)?>
<p style="font-weight:bold">В платежном поручении указывайте: <input class="b" value="&quot;Оплата заказа № <?=$arOrder["ID"]?> от <?=date("d")?> <?=$months[date("m")]?> <?=date("Y")?> г.&quot;"/></p>
  <p class="title">Счёт на оплату № <?=$arOrder["ID"]?> от <input class="header" value="<?=date("d")?> <?=$months[date("m")]?> <?=date("Y")?> г."/></p>
  <p><font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px"><b>Покупатель:</b> <?
		echo ( $arOrderProps["F_COMPANY_NAME"] ? $arOrderProps["F_COMPANY_NAME"] : $arOrderProps["CONTACT_PERSON"]);
		echo ( strlen($arOrderProps["F_INN"])>0 ? ", ИНН ".$arOrderProps["F_INN"] : "");?><br/>
		<b>Адрес:</b> <?
	if($arOrder["PERSON_TYPE_ID"] == 2) {
		echo (strlen($arOrderProps["F_POST_INDEX"])>0 ? htmlspecialchars($arOrderProps["F_POST_INDEX"].", ") : "");
		echo ($arOrderProps["F_OBLAST"] != "- не указано -" ? htmlspecialchars($arOrderProps["F_OBLAST"].", ") : "");
		echo (strlen($arOrderProps["F_STATE"])>0 ? htmlspecialchars($arOrderProps["F_STATE"].", ") : "");
		echo htmlspecialchars("г. ".$arOrderProps["F_LOCATION_CITY"].", ");
		if(strval($arOrderProps["F_ADDRESS_FULL"]) != "-")
			echo htmlspecialchars($arOrderProps["F_ADDRESS_FULL"]);
		elseif(strlen($arOrderProps["F_ADDRESS"]) > 0) {
			echo htmlspecialchars($arOrderProps["F_ADDRESS"]);
		}
	}
	else {
		echo (strlen($arOrderProps["ZIP"])>0 ? htmlspecialchars($arOrderProps["ZIP"].", ") : "");
		echo ($arOrderProps["OBLAST"] != "- не указано -" ? htmlspecialchars($arOrderProps["OBLAST"].", ") : "");
		echo (strlen($arOrderProps["USER_STATE"])>0 ? htmlspecialchars($arOrderProps["USER_STATE"].", ") : "");
		if(empty($arOrderProps["CITY_CITY"]) && !empty($arOrderProps["CITY"]))
			$locParts=explode(" - ", $arOrderProps["CITY"]);
		echo htmlspecialchars("г. ".(!empty($arOrderProps["CITY_CITY"]) ? $arOrderProps["CITY_CITY"] : (empty($arOrderProps["F_LOCATION_CITY"]) ? $locParts[1] : $arOrderProps["F_LOCATION_CITY"])).", ");
		echo (strlen($arOrderProps["ADDRESS"])<=0 ? "ул. ".$arOrderProps["STREET"].(strval($arOrderProps["HOUSE"]) !== "-" ? ", д.".$arOrderProps["HOUSE"] : "").(strlen($arOrderProps["CORP"])<=0 ? "" : " к.".$arOrderProps["CORP"]).(strlen($arOrderProps["APPARTMENT"]) ? " - ".$arOrderProps["APPARTMENT"] : "") : $arOrderProps["ADDRESS"]);
	}?>
	<br/>
	<b>тел/факс:</b> <?
		if($arOrder["PERSON_TYPE_ID"] == 2)
			echo $arOrderProps["F_PHONE"] . (strlen($arOrderProps["F_FAX"])>0 ? " / ".$arOrderProps["F_FAX"] : "");
		else 
			echo (strlen($arOrderProps["PHONE"])>0 ? $arOrderProps["PHONE"] . (strlen($arOrderProps["PHONE_2"])>0 ? ", ".$arOrderProps["PHONE_2"] : "") : "");
		?></font></p>
  <table width="100%" class="black-border" cellpadding="4" cellspacing="1" bordercolor="#fff" border="1" style="border-collapse:collapse">	
		<tbody><tr>
				<th nowrap="nowrap"><font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px">№</font></th>
				<th><font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px">Наименование товара</font></th>
				<th><font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px">Ед. изм.</font></th>
				<th><font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px">Кол-во</font></th>
				<th><font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px">Цена, руб.</font></th>
				<th><font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px">Сумма, руб.</font></th>
			</tr>
		<?
			//состав заказа
			ClearVars("b_");
			$db_basket = CSaleBasket::GetList(($b="PRODUCT_ID"), ($o="ASC"), array("ORDER_ID"=>$ORDER_ID));
			if ($db_basket->ExtractFields("b_")):
				$n = 1;
				$sum = 0.00;
				do
				{
					if(!(isset($b_SET_PARENT_ID) && intval($b_SET_PARENT_ID) > 0 && empty($b_TYPE))) {
						if(CModule::IncludeModule('iblock')) {
							$arWare = CIBlockElement::GetList(array(), array("ID" => $b_PRODUCT_ID), false, false, array("NAME", "IBLOCK_ID", "ID", "PROPERTY_FULLNAME"))->GetNext();
							if(!$arWare) {
								$arWare = CIBlockElement::GetList(array(), array("ID" => $b_PRODUCT_ID, "IBLOCK_ID" => 21), false, false, array("NAME", "IBLOCK_ID", "ID", "PROPERTY_FULLNAME1"))->GetNext();
							}
						}?>
						<tr>
							<td nowrap="nowrap" style="width:0.8cm"> 
								<font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px"><?echo $n++ ?></font>
							</td>
							<td style="width:7.2cm"><font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px">
								<?echo ($b_PRODUCT_ID == 1107 || $b_PRODUCT_ID == 2700 || $b_PRODUCT_ID == 1105 || $b_PRODUCT_ID == 1918) ? $b_NAME : (isset($arWare["PROPERTY_FULLNAME_VALUE"]) ? htmlspecialcharsEx($arWare["PROPERTY_FULLNAME_VALUE"]) : htmlspecialcharsEx($arWare["PROPERTY_FULLNAME1_VALUE"]))?></font>
							</td>
							<td nowrap="nowrap" style="width:1.7cm"> 
								<font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px">шт.</font>
							</td>
							<td nowrap="nowrap" style="width:1.7cm"> 
								<font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px"><?echo $b_QUANTITY;?></font>
							</td>
							<td nowrap="nowrap" style="width:2.2cm"> 
								<font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px"><?echo SaleFormatCurrency(($b_PRICE), $b_CURRENCY, true) ?></font>
							</td>
							<td nowrap="nowrap" style="width:2.2cm" align="right"> 
								<font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px"><?echo SaleFormatCurrency(($b_PRICE)*$b_QUANTITY, $b_CURRENCY, true)?></font>
							</td>
						</tr>
						<?
						$sum += doubleval(($b_PRICE)*$b_QUANTITY);
					}
				}
				while ($db_basket->ExtractFields("b_"));
				?>
				<?if(($arOrder["DELIVERY_ID"] == 2 || $arOrder["DELIVERY_ID"] == 4 ||  $arOrder["DELIVERY_ID"] == 10 || $arOrder["DELIVERY_ID"] == 13 || $arOrder["DELIVERY_ID"] == 15 || $arOrder["DELIVERY_ID"] == 16 ||  $arOrder["DELIVERY_ID"] == 17) && $arOrder["PRICE_DELIVERY"] != 0):?>
					<tr>
						<td nowrap="nowrap" style="width:0.8cm"> 
							<font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px"><?echo $n++ ?></font>
						</td>
						<td style="width:7.2cm"> 
							<font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px">Доставка</font>
						</td>
						<td nowrap="nowrap" style="width:1.7cm"> 
							<font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px">-</font>
						</td>
						<td nowrap="nowrap" style="width:1.7cm"> 
							<font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px">1.00</font>
						</td>
						<td nowrap="nowrap" style="width:2.2cm"> 
							<font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px"><?echo SaleFormatCurrency(($arOrder["PRICE_DELIVERY"]), $b_CURRENCY, true) ?></font>
						</td>
						<td nowrap="nowrap" style="width:2.2cm" align="right"> 
							<font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px"><?echo SaleFormatCurrency($arOrder["PRICE_DELIVERY"], $b_CURRENCY, true) ?></font>
						</td>
					</tr>
				<?endif?>
				<?endif?>
					<tr>
						<td colspan="5" valign="bottom" nowrap="nowrap" align="right" style="border:0px none">
							<font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px"><span><b>Итого:</b></span></font>
						</td>
						<td valign="bottom" align="right" nowrap="nowrap"> 
							<font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px"><span><b>
							<?
							if(($arOrder["PAY_SYSTEM_ID"] != 5 && $arOrder["PAY_SYSTEM_ID"] != 6 && $arOrder["PAY_SYSTEM_ID"] != 9 && $arOrder["PAY_SYSTEM_ID"] != 10 && $arOrder["PAY_SYSTEM_ID"] != 11) || $arOrder["DELIVERY_ID"] == 2 || $arOrder["DELIVERY_ID"] == 4 ||  $arOrder["DELIVERY_ID"] == 10 || $arOrder["DELIVERY_ID"] == 13 || $arOrder["DELIVERY_ID"] == 15 || $arOrder["DELIVERY_ID"] == 16 ||  $arOrder["DELIVERY_ID"] == 17)
								$sum += $arOrder["PRICE_DELIVERY"];
							echo SaleFormatCurrency($sum, $arOrder["CURRENCY"], true) ?></b></span></font>
						</td>
					</tr>   
					<tr>
						<td colspan="5" valign="bottom" nowrap="nowrap" align="right" style="border:0px none">
							<font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px"><span><b>Без налога (НДС):</b></span></font>
						</td>
						<td valign="bottom" align="center" nowrap="nowrap"> 
							<span><b>---</b></span>
						</td>
					</tr>   
					<tr>
						<td colspan="5" valign="bottom" nowrap="nowrap" align="right" style="border:0px none">
							<font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px"><span><b>Всего к оплате:</b></span></font>
						</td>
						<td valign="bottom" align="right" nowrap="nowrap"> 
							<font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px"><span><b><?echo SaleFormatCurrency($sum, $arOrder["CURRENCY"]);?></b></span></font>
						</td>
					</tr>
				</tbody>
			</table>
      <p><font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px">Всего наименований <?=$n-1?> на сумму <?echo SaleFormatCurrency(round($sum), $arOrder["CURRENCY"], true) ?></font></p>
      <p><font size="2" face="Arial, Tahoma, Verdana, Helvetica, sans-serif" style="font-size:12px"><b><?echo Number2Word_Rus($sum);?></b></font></p>
			<p class="sign">Генеральный директор________________________ (Силко Н.Ю.)</p>
		</div>

	</body>

</html>