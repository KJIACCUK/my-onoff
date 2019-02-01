<?php
/**
 * Created by PhpStorm.
 * User: uit06
 * Date: 21.08.2018
 * Time: 15:06
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Salted | A Responsive Email Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <style type="text/css">
        /* CLIENT-SPECIFIC STYLES */
        #outlook a{padding:0;} /* Force Outlook to provide a "view in browser" message */
        .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing */
        body, table, td, a{-webkit-text-size-adjust:100%; -ms-text-size-adjust:100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
        table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;} /* Remove spacing between tables in Outlook 2007 and up */
        img{-ms-interpolation-mode:bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

        /* RESET STYLES */
        body{margin:0; padding:0;}
        img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}
        table{border-collapse:collapse !important;}
        body{height:100% !important; margin:0; padding:0; width:100% !important;}

        /* iOS BLUE LINKS */
        .appleBody a {color:#68440a; text-decoration: none;}
        .appleFooter a {color:#999999; text-decoration: none;}

        /* MOBILE STYLES */
        @media screen and (max-width: 525px) {

            /* ALLOWS FOR FLUID TABLES */
            table[class="wrapper"]{
                width:100% !important;
            }

            /* ADJUSTS LAYOUT OF LOGO IMAGE */
            td[class="logo"]{
                text-align: left;
                padding: 20px 0 20px 0 !important;
            }

            td[class="logo"] img{
                margin:0 auto!important;
            }

            /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
            td[class="mobile-hide"]{
                display:none;}

            img[class="mobile-hide"]{
                display: none !important;
            }

            /* FULL-WIDTH TABLES */
            table[class="responsive-table"]{
                width:100%!important;
            }

            td[class="padding-copy"]{
                padding: 10px 5% 10px 5% !important;
                text-align: center !important;
            }

            td[class="section-padding"]{
                padding: 50px 15px 50px 15px !important;
            }
        }
    </style>
</head>
<body style="margin: 0; padding: 0;">

<!-- HEADER -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#ffffff">
            <div align="center" style="padding: 0px 15px 0px 15px;">
                <table border="0" cellpadding="0" cellspacing="0" width="500" class="wrapper">
                    <!-- LOGO/PREHEADER TEXT -->
                    <tr>
                        <td style="padding: 20px 0px 20px 0px;" class="logo">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td bgcolor="#ffffff" width="400" align="left"><a href="http://alistapart.com/article/can-email-be-responsive/" target="_blank"><img alt="Logo" src="<?=Yii::getAlias('images/onoff.jpg')?>" width="350" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #666666; font-size: 16px;" border="0"></a></td>
                                    <td bgcolor="#ffffff" width="400" align="right" class="mobile-hide">
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td align="left" style="padding: 0 0 5px 0; font-size: 14px; font-family: Arial, sans-serif; color: #666666; text-decoration: none;"><span style="color: #666666; text-decoration: none;"><b>При получении товара ОБЯЗАТЕЛЬНО при себе иметь:</b> <br> 1.Доверенность и паспорт. <br> 2.Договор и протокол, заверенные подписями и печатью.</span></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table>

<!-- ONE COLUMN SECTION -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 50px 15px 20px 15px;" class="section-padding">
            <table border="0" cellpadding="0" cellspacing="0" width="500" class="responsive-table">
                <tr>
                    <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <!-- COPY -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="center" style="font-size: 23px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 10px;" class="padding-copy">Счет № <?=$model->id?> от <?=date('d.m.Y')?></td>
                                        </tr>
                                        <tr>
                                            <td align="center" style="padding: 5px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">Счет действителен в течении 3-х банковских дней.</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

    <table border="1" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <th width="30%" style="font-size: 11px">Наименование товара</th>
            <th width="10%" style="font-size: 11px">Кол-во</th>
            <th width="10%" style="font-size: 11px">Стоимость за ед. EUR</th>
            <th width="10%" style="font-size: 11px">Стоимость за ед. BYN</th>
            <th width="10%" style="font-size: 11px">Стоимость за ед. RUB</th>

            <th width="10%" style="font-size: 11px">Стоимость, EUR</th>
            <th width="10%" style="font-size: 11px">Стоимость, BYN</th>
            <th width="10%" style="font-size: 11px">Стоимость, RUB</th>
        </tr>
        <?php foreach ($order as $o):?>
        <tr>
            <td align="center" style="font-size: 11px"><?=$o->name?></td>
            <td align="center" style="font-size: 11px"><?=$o->qty_item?></td>
            <td align="center" style="font-size: 11px"><?=$o->eur?></td>
            <td align="center" style="font-size: 11px"><?=$o->byn?></td>
            <td align="center" style="font-size: 11px"><?=$o->rub?></td>

            <td align="center" style="font-size: 11px"><?=$o->sum_item_eur?></td>
            <td align="center" style="font-size: 11px"><?=$o->sum_item_byn?></td>
            <td align="center" style="font-size: 11px"><?=$o->sum_item_rub?></td>
        </tr>
        <?php endforeach;?>
        <tr>
            <td colspan="5" style="text-align:right; font-size: 12px">ИТОГО:</td><td colspan="3" align="center" style="font-size: 12px"><?=$model->sum_eur?>EUR | <?=$model->sum_byn?>BYN | <?=$model->sum_rub?>RUB</td><!-- Задаем количество ячеек по горизонтали для объединения-->
        </tr>
    </table>

<table width="100%" style="margin: 20px 0 20px 0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="100%" align="left" valign="top">Срок поставки: 5 рабочих дней.</td>
    </tr>
    <tr>
        <td width="100%" align="left" valign="top">Весь товар имеется на складе в Минске.</td>
    </tr>
</table>

<div style="position: fixed; bottom: 15px">
    <hr>
<table width="100%" cellpadding="10">
    <tr>
        <td width="50%" align="left" valign="top" style="font-size: 12px"><b>Поставщик:</b> ООО"ОНОФФ СТОР" <br> 220033, г. Минск, ул. Фабричная, д. 22, офис 316, УНП192569921 р/с BY74BLBB30120192569921001001 в ОАО "Белинвестбанк" SWIFT BLBBBY2X,<br>Адрес банка: г. Минск, Партизанский пр-кт 6а.<br>Телефон:8(029)557-77-62 | 8(029)509-92-26</td>
        <td width="50%" align="left" valign="top">
            <table>
                <tr>
                    <td width="100%" valign="top" style="font-size: 12px"><b>Плательщик:</b> <?php if(!empty($model->type_ownership) && !empty($model->name_ur)):?><?=$model->type_ownership?>"<?=$model->name_ur?>"<?php endif;?></td>
                </tr>
                <tr>
                    <td width="100%" style="font-size: 12px">УНН | УНП <?=$model->unn_unp?><br>Телефон: <?=$model->phone?></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</div>

<!-- NEW PAGE -->
    <div style="page-break-before: always"></div>
    <table width="100%">
        <tr>
            <td align="center" style="font-size: 14px" class="padding-copy">Договор № <?=$model->id?></td>
        </tr>
        <table width="100%">
        <tr>
            <td width="50%" align="left" valign="top" style="font-size: 12px">Минск</td>
            <td width="50%" align="right" valign="top" style="font-size: 12px"><?=date('d.m.Y')?></td>
        </tr>
        </table>
        <tr>
            <td width="100%" align="left" style="font-size: 12px; padding: 10px 0 0 0">ООО"ОНОФФ СТОР" с одной стороны (далее "Продавец"), в лице управляющего Кисель Владислава Михайловича, действующего на основании договора №2/18 от 05.02.2018 г. и <?=$model->user->type_ownership?>"<?=$model->user->name_ur?>", с другой стороны (далее "Покупатель"), в лице управляющего <?=$model->name?>, действующего на основании устава заключили настоящий Договор купли-продажи.</td>
        </tr>

        <tr>
            <td width="100%" style="font-size: 12px; padding: 10px 0 0 0"><b>1. Предмет договора</b></td>
        </tr>
            <tr>
                <td width="100%" style="font-size: 12px">1.1. Покупатель обязуется оплатить и принять, а Продавец передать в собственность Покупателя товар согласно Счёта №.. от .., являющейся неотъемлемой частью настоящего Договора.</td>
            </tr>
            <tr>
                <td width="100%" style="font-size: 12px">1.2. Цель приобретения товара покупателем: для собственных нужд.</td>
            </tr>

        <tr>
            <td width="100%" style="font-size: 12px; padding: 10px 0 0 0"><b>2. Порядок расчетов</b></td>
        </tr>
            <tr>
                <td width="100%" style="font-size: 12px">2.1. Условные оплаты - по факту поставки в течении 10 банковских дней. Валюта платежа - белорусские рубли.</td>
            </tr>
            <tr>
                <td width="100%" style="font-size: 12px">2.2. Сроки оплаты - в течении 10-ти банковских дней с момента поставки товара.</td>
            </tr>
            <tr>
                <td width="100%" style="font-size: 12px">2.3. В случае не выполнения п.2.2. настоящего договора, стороны признают право Продавца изменить отпускную цену товара.</td>
            </tr>
            <tr>
                <td width="100%" style="font-size: 12px">2.4. Продавец обязуется передать товар Покупателю не позднее чем через 5(пять) банковских дней с момента поступления денежных средств на расчетный счет Продавца.</td>
            </tr>

        <tr>
            <td width="100%" style="font-size: 12px; padding: 10px 0 0 0"><b>3. Передача товара</b></td>
        </tr>
            <tr>
                <td width="100%" style="font-size: 12px">3.1. Прием товара по количеству и качеству осуществляется Покупателем в соответствии с Положением "О приемке товаров по количеству и качеству" утвержденным постановлением от 03.09.2008г №1290.</td>
            </tr>
            <tr>
                <td width="100%" style="font-size: 12px">3.2. Продавец обязуется поставить товары в течении не более чем 5(пяти) банковских дней со дня оплаты по настоящему Договору.</td>
            </tr>
            <tr>
                <td width="100%" style="font-size: 12px">3.3. Поставка осуществляется транспортом Продавца.</td>
            </tr>

        <tr>
            <td width="100%" style="font-size: 12px; padding: 10px 0 0 0"><b>4. Качество товара</b></td>
        </tr>
            <tr>
                <td width="100%" style="font-size: 12px">4.1. Качество поставляемых товаров должно соответствовать техническим условиям предприятия-изготовителя.</td>
            </tr>

        <tr>
            <td width="100%" style="font-size: 12px; padding: 10px 0 0 0"><b>5. Ответственность сторон</b></td>
        </tr>
            <tr>
                <td width="100%" style="font-size: 12px">5.1. Стороны несут ответственность согласно действующему законодательству РБ.</td>
            </tr>

        <tr>
            <td width="100%" style="font-size: 12px; padding: 10px 0 0 0"><b>6. Форс - мажор</b></td>
        </tr>
            <tr>
                <td width="100%" style="font-size: 12px">6.1. Стороны освобождаются от ответственности за частичное или полное неисполнение своих обязанностей по настоящему Договору, если их исполнению препятствует чрезвычайное и непреодолимое при данных условиях обстоятельств(непреодолимая сила).</td>
            </tr>

        <tr>
            <td width="100%" style="font-size: 12px; padding: 10px 0 0 0"><b>7. Срок действия договора</b></td>
        </tr>
            <tr>
                <td width="100%" style="font-size: 12px">7.1. Настоящий Договор вступает в силу после подписания его сторонами и действует до полного выполнения ими своих обязательств по настоящему Договору.</td>
            </tr>
        <tr>
            <td width="100%" style="font-size: 12px; padding: 10px 0 0 0">Настоящий Договор в двух экземплярах, имеющих одинаковую юридическую силу, один из которых находится у Продавца, а второй у Покупателя.</td>
        </tr>


    </table>

<div style="position: fixed; bottom: 15px">
    <table width="100%">
        <tr>
            <td width="100%" style="font-size: 12px; padding: 0 0 20px 0"><b>Юридические адреса и банковские реквизиты сторон:</b></td>
        </tr>
    </table>
    <table width="100%" cellpadding="10">
        <tr>
            <td width="50%" align="left" valign="top" style="font-size: 12px"><b>Продавец:</b> ООО"ОНОФФ СТОР" <br> 220033, г. Минск, ул. Фабричная, д. 22, офис 316, УНП192569921 р/с BY74BLBB30120192569921001001 в ОАО "Белинвестбанк" SWIFT BLBBBY2X,<br>Адрес банка: г. Минск, Партизанский пр-кт 6а.<br>Телефон:8(029)557-77-62 | 8(029)509-92-26</td>
            <td width="50%" align="left" valign="top">
                <table>
                    <tr>
                        <td width="100%" valign="top" style="font-size: 12px"><b>Покупатель:</b> <?php if(!empty($model->type_ownership) && !empty($model->name_ur)):?><?=$model->type_ownership?>"<?=$model->name_ur?>"<?php endif;?></td>
                    </tr>
                    <tr>
                        <td width="100%" style="font-size: 12px">УНН | УНП <?=$model->unn_unp?><br>Телефон:<?=$model->phone?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table width="100%">
        <tr>
            <td width="50%" align="left" valign="top" style="padding: 30px 0 0 10px; font-size: 14px">Продавец __________________________</td>
            <td width="50%" align="left" valign="top" style="padding: 30px 0 0 10px; font-size: 14px">
                <table>
                    <tr>
                        <td valign="top">Покупатель __________________________</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>

</body>
</html>
