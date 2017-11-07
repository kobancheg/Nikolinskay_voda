<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Как купить Качели Яловицына, цена Качелей");
$APPLICATION->SetPageProperty("keywords", "купить качели яловицына, качели яловицына цена, заказ качелей яловицына, качели яловицкого, доставка качелей яловицына");
$APPLICATION->SetPageProperty("description", "Как купить Качели Яловицына, цена Качелей");
$APPLICATION->SetTitle("Как купить Качели Яловицына");
?> 
<h2>Акция «Осенний скидкопад!»</h2>
 
<p style="font-size: 16px;"><b>Получите скидку <span class="mg">до 32%</span> при заказе Качелей Яловицына <span class="mg">до 30 сентября 2017 года!</span></b></p>
 
<ul> <?CModule::IncludeModule("catalog");
CModule::IncludeModule("sale");
$arSelect = array("ID", "CODE", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE", "DETAIL_PICTURE", "PREVIEW_TEXT", "PREVIEW_TEXT_TYPE", "PROPERTY_FULLNAME1", "PROPERTY_PREFERABLE", "PROPERTY_CHARACTERISTICS", "CATALOG_QUANTITY");
$arResultPrices = CIBlockPriceTools::GetCatalogPrices(21, Array("Розничная"));
foreach($arResultPrices as $key => $value) {
	$arSelect[] = $value["SELECT"];
	//$arFilter["CATALOG_SHOP_QUANTITY_".$value["ID"]] = $arParams["SHOW_PRICE_COUNT"];
}
$res = CIBlockElement::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => 21, "ID" => array(2650,876,877,971,1042), "ACTIVE" => "Y"), false, false, $arSelect);
while($ar_res = $res->Fetch()):
$ar_res["PRICES"] = CIBlockPriceTools::GetItemPrices($ar_res["IBLOCK_ID"], $arResultPrices, $ar_res, true);
?> 
  <li><a href="http://www.kachelya.ru/modifications/<?=$ar_res["CODE"]?>.html" ><?=$ar_res["NAME"]?></a>: <b><?=($ar_res["PRICES"]["Розничная"]["VALUE"] == $ar_res["PRICES"]["Розничная"]["DISCOUNT_VALUE"] ? $ar_res["PRICES"]["Розничная"]["VALUE"] : '<s style="color:#f00">'.$ar_res["PRICES"]["Розничная"]["VALUE"].'</s> '.$ar_res["PRICES"]["Розничная"]["DISCOUNT_VALUE"])?></b> рублей (при покупке 2-х и более тренажёров <b><?
$ar_res["PRICES"] = CIBlockPriceTools::GetItemPrices($ar_res["IBLOCK_ID"], $arResultPrices, $ar_res, true);
echo $ar_res["PRICES"]["Розничная"]["DISCOUNT_VALUE"];
?></b> рублей).</li>
 <?endwhile?> </ul>
 <hr/> 
<p>Купить Качели Яловицына в нашем интернет-магазине очень просто! Если Вы находитесь в Москве, то можете подъехать за товаром к нам на склад (предварительно оформив заказ по телефону или на сайте), либо заказать доставку по Москве. Если Вы находитесь в любой другой точке России, то мы можем отправить Вам посылку с Качелями по почте, либо транспортной компанией. Более подробно смотрите в разделе «<a href="/about/delivery/" class="mg" >Способы&nbsp;доставки</a>».</p>
 
<p>Что касается способов оплаты, то для Москвы это оплата наличными при получении заказа, а для регионов доступен наложенный платёж при получении заказа на почте, либо предоплата через множество популярных платежных систем (кредитные карты, Webmoney, Яндекс.Деньги, QIWI, любые платежные терминалы, оплата в салонах «Евросеть», «Связной», и другие). Подробнее в разделе «<a href="/about/payment/" class="mg" >Способы&nbsp;оплаты</a>». </p>
 
<!--<p><a id="bxid_807961" class="btn-slide" href="javascript:void(0)" >Хочу скидку!</a></p>
 
<div class="slide-block"> Чтобы получить скидку, позвоните по телефону +7 (499) 755-70-79 либо напишите на электронный ящик <a id="bxid_23076" href="mailto:info@kachelya.ru" >info@kachelya.ru</a> и сообщите нашему менеджеру, что Вы видели на сайте предложение со скидкой. <b>Скидка 1000 рублей!</b> </div>-->
 
<p>Само оформление заказа происходит очень просто. Перейдите в раздел «<a href="/order/" class="mg" >Оформить заказ</a>» и заполните там форму заказа. Форма очень проста и интуитивно понятна. В случае, если потребуется уточнение заказа, наш менеджер свяжется с Вами по телефону. Если же Вы испытываете затруднения с заполнением формы, то позвоните по телефону 8 800 333-75-79 (с 9-00 до 21-00 по московскому времени, звонок по России бесплатный) и менеджер примет Ваш заказ. Либо закажите обратный звонок, нажав ссылку в шапке сайта, чтобы наш менеджер Вам перезвонил.</p>
 
<p> Если Вы хотите получить и оплатить заказ на почте, выбирайте в форме заказа способ оплаты - <span style="font-style: italic;">наложенный платёж</span>, способ доставки - <span style="font-style: italic;">почта России, либо EMS</span>. Посылка отправляется без дополнительных уточнений, поэтому просим Вас вводить данные без ошибок.</p>
 
<p> Если Вы готовы сделать предоплату, то можно в форме заказа выбрать для этого любой другой способ оплаты (любой кроме наложенного платежа). Предоплата позволит снизить расходы на доставку. </p>
 
<div class="inner-center"><a class="to-order" href="/modifications/" >Оформить заказ →</a></div>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>