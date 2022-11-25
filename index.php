<?php
    session_start();
    include('config.php');
    
    if(empty($_COOKIE['__lingoser'])) {
        echo "
            <style type='text/css'>
                #noconnect{
                    display: none;
                    opacity: 0;
                    visibility: hidden;
                 }
                #user{
                    display: inline-block;
                    opacity: 1;
                    visibility: visible;
                 }
            </style>
        ";
        $leNum = intval($_COOKIE['__lingoser']);
        $requeteUser = $pdo->prepare("SELECT * FROM `utilisateurs` WHERE id_user = ?");
        $requeteUser->execute(array($leNum));
        $userInfo = $requeteUser->fetch();
       

    }elseif(isset($_COOKIE['__lingoser'])) {
        echo "
            <style type='text/css'>
                #noconnect{
                    display: none;
                    opacity: 0;
                    visibility: hidden;
                 }
                #user{
                    display: inline-block;
                    opacity: 1;
                    visibility: visible;
                 }
            </style>
        ";
        $leNum = intval($_COOKIE['__lingoser']);
        $requeteUser = $pdo->prepare("SELECT * FROM `utilisateurs` WHERE id_user = ?");
        $requeteUser->execute(array($leNum));
        $userInfo = $requeteUser->fetch();
        $numero= $userInfo['id_user'];
        $nom =  $userInfo['nom_user'];
        $prenoms = $userInfo['prenoms_user'];
        $numero = $userInfo['num_tel'];
        $adresse = $userInfo['adr_mail'];

    }else{
        echo "
            <style type='text/css'>
                #user{
                    display: none;
                    opacity: 0;
                    visibility: hidden;
                 }
            </style>
        ";
    }
        
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Bamsachine Tech - Accueil</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="css/styl.css"/>

          <link rel="stylesheet" type="text/css" href="./Public/pnx_core.css" class="pnxadd-css">
    <link rel="stylesheet" type="text/css" href="./Public/pnxssr_0_ee33d73651a92f77964c66549c27b91c.css" class="pnxadd-css">
    <link rel="stylesheet" type="text/css" href="./Public/pnxssr_0_151db455c5c70ba168e72cb446779555.css" class="pnxadd-css">
    <link rel="stylesheet" type="text/css" href="./Public/pnxssr_0_1bb8f06b0acfd269bed04da4470c6c7f.css" class="pnxadd-css">
    <link rel="stylesheet" type="text/css" href="./Public/components.css" class="pnxadd-css">
    <link rel="stylesheet" type="text/css" href="./Public/pnxssr_0_b5b5fe1311560d106a94ad84d2138935.css" class="pnxadd-css">
    <link rel="stylesheet" type="text/css" href="./Public/components(1).css" class="pnxadd-css">
    <link rel="stylesheet" type="text/css" href="./Public/pnxssr_0_54e739a1f42357c8f50a374d45e79b13.css" class="pnxadd-css">
    <link rel="stylesheet" type="text/css" href="./Public/pnxssr_0_2a29fbef066b4623b0793df24b4bb06a.css" class="pnxadd-css">
    <link rel="stylesheet" type="text/css" href="./Public/pnxssr_0_30a588599dbac1aa3755884ee6252f85.css" class="pnxadd-css">
    <link rel="stylesheet" type="text/css" href="./Public/pnxssr_0_dc4ac21eed2d02749cbffb6ee7b64176.css" class="pnxadd-css">
    <link rel="stylesheet" type="text/css" href="./Public/pnxssr_0_9a73d2e5b726b07a6b90308a0da61e93.css" class="pnxadd-css">

    <script charset="utf-8" src="./Public/7.94c8b24eee6036ad4a42.js"></script>
   
    </head>
    <body>
        <!-- I N C L U S I O N -->
        <?php
            include("header.php");
        ?>
      </cx-page-slot>
                    <cx-page-slot position="Section2A" class="Section2A has-components" style="margin-top: auto !important">
                        <app-razer-dream _nghost-spartacus-app-c410="" data-gtm-promotion-index="2">
                            <app-v3-comp>
                                <section style="margin-bottom:-75vh;">
                                    <app-razer-dream _nghost-sc-usp="" id="pnxssr_40a64ddbece50f651ca24a98336f915e" data-gtm-promotion-index="3">
                                        <app-usp pnxssr_0="">
                                            <section class="usp-container" pnxssr_1="">
                                                <div class="usp dark-bg right pnx_mobile" data-pnx="-1" style="background: url(Public/img/a1.jpg); background-size:cover; height:70vh; margin-bottom:-50vh;" id="hero" pnxssr_2=""><img class="usp-bg" role="img" src="./Public/holiday-gift-guide-banner-mobile_768x500.jpg " alt="" pnxssr_3="">
                                                    <div class="content grid" data-pnx="0" pnxssr_4="">
                                                        <div class="main-content c1" pnxssr_5="">
                                                            <h2 data-pnx-f="text1" markdown="" pnxssr_6="" style="width:72vh; position:relative; right:2vh; bottom:9vh; font-size:6vh;"> BAMSACHINE TECH</h2>
                                                            <p class="p-container lt1" data-pnx-f="longText1" markdown="" pnxssr_7="">
                                                                <strong pnxssr_8=""></strong> .</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </app-usp>
                                    </app-razer-dream>
                                </section>
                                <!---->
                                <section>
                                    <app-razer-dream _nghost-sc-multi-panels="" id="pnxssr_09f283d5e569cb5dbfdbc4c9dc005ce4" data-gtm-promotion-index="4">
                                        <app-multipanels pnxssr_0="">
                                            <section pnxssr_1="">
                                                <div class="multipanels-component col-3" id="buttons-navigation" pnxssr_2="">
                                                    <div class="container" pnxssr_3="">
                                                        <div class="panel-container col-3" role="list" pnxssr_4="">
                                                            <div role="listitem" class="item-box item-1" pnxssr_5="">
                                                                <span pnxssr_6=""><span pnxssr_7=""></span></span>
                                                                <a class="button-cta text-align-center" href="#" target="_self" pnxssr_8="" data-gtm-promotion-viewed="true">
                                                                    <button aria-hidden="true" class="button-primary" tabindex="-1" pnxssr_9="">FAN FAVOURITES</button>
                                                                </a>
                                                            </div>
                                                            <div role="listitem" class="item-box item-2" pnxssr_10="">
                                                                <span pnxssr_11=""><span pnxssr_12=""></span></span>
                                                                <a class="button-cta text-align-center" href="#" target="_self" pnxssr_13="" data-gtm-promotion-viewed="true">
                                                                    <button aria-hidden="true" class="button-primary" tabindex="-1" pnxssr_14="">SHOP BY CATEGORY</button>
                                                                </a>
                                                            </div>
                                                            <div role="listitem" class="item-box item-3" pnxssr_15="">
                                                                <span pnxssr_16=""><span pnxssr_17=""></span></span>
                                                                <a class="button-cta text-align-center" href="#" target="_self" pnxssr_18="" data-gtm-promotion-viewed="true">
                                                                    <button aria-hidden="true" class="button-primary" tabindex="-1" pnxssr_19="">SHOP BY BUDGET</button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </app-multipanels>
                                    </app-razer-dream>
                                </section>
                                <!---->
                                <section>
                                    <app-razer-dream _nghost-sc-template-content="" id="pnxssr_c7d32d838a97ea521c1f23b4b0b9b394" data-gtm-promotion-index="5">
                                        <app-template-content pnxssr_0="">
                                            <section data-pnx-f="TemplateURL" data-cms-item-id="under50" data-pnx="-1" id="header-under50" class="keyvisual" pnxssr_1="">
                                                <section class=" bo-temp" pnxssr_2="">
                                                    <div class="content" pnxssr_3="">
                                                        <h3 class="header" pnxssr_4="" style="font-family:cursive; ">Bamsachine Tech <h1 style="font-family: Verdana, Geneva, Tahoma, sans-seri; text-transform: none;">Est une plate-forme internet qui sert de vitrine aux particuliers et aussi aux entreprises de <br><br> faire passer leurs annonces sur internet à des prix défiants toute concurrence.</h1></h3>
                                                    </div>
                                                </section>
                                            </section>
                                        </app-template-content>
                                    </app-razer-dream>
                                </section>
                                <!---->
                                <section>
                                    <app-razer-dream _nghost-sc-template-content="" id="pnxssr_10db023ae6ad87153aada3e1aacf4513" data-gtm-promotion-index="6">
                                        <app-template-content pnxssr_0="">
                                            <section data-pnx-f="TemplateURL" data-cms-item-id="" data-pnx="-1" id="street-battle" class="pnx-template-618c85ada9cc4c00c5d6e38f" pnxssr_1="">
                                                <section class="store-effect store-cards-dynamic show-summaries discount-badge show-badge collapsible products-api bo-temp cards-scroll" id="street-battle" pnxssr_2="">
                                                    <div role="region" aria-label="carousel" class="multi-panels " data-backendurl="https://api-p1.phoenix.razer.com/rest/v2/**_**/products/" data-skus="RZ09-0427EE23-R3U1,
RZ09-0421EED3-R3U1,
RZ09-0423EED3-R3U1,
RZ38-03720100-R3U1,
RZ38-02770100-R3U1,
RZ01-04390100-R3U1,
RZ01-04630200-R3U1,
RZ01-04620200-R3U1,
RZ03-04360200-R3U1,
RZ04-03460100-R3U1,
RZ04-02980100-R3M1,
RZ19-03640100-R3U1" data-images="[{&quot;image&quot;:{&quot;SKU&quot;:&quot;RZ02-03330200-R3U1&quot;,&quot;url&quot;:&quot;//assets2.razerzone.com/images/pnx.assets/4ee1aea20baf5e6bd985556f775e7ae0/9415015071774.png&quot;,&quot;altText&quot;:&quot;&quot;,&quot;title&quot;:&quot;&quot;}}]"
                                                        data-collapse="[{&quot;SKU&quot;:&quot;RZ09-0427EE23-R3U1&quot;,&quot;parentCategoryName&quot;:&quot;&quot;,&quot;from&quot;:&quot;true&quot;},{&quot;SKU&quot;:&quot;RZ09-0421EED3-R3U1&quot;,&quot;parentCategoryName&quot;:&quot;&quot;,&quot;from&quot;:&quot;true&quot;},{&quot;SKU&quot;:&quot;RZ09-0423EED3-R3U1&quot;,&quot;parentCategoryName&quot;:&quot;&quot;,&quot;from&quot;:&quot;true&quot;},{&quot;SKU&quot;:&quot;RZ01-04390100-R3U1&quot;,&quot;parentCategoryName&quot;:&quot;Color / Design&quot;},{&quot;SKU&quot;:&quot;RZ01-04630200-R3U1&quot;,&quot;parentCategoryName&quot;:&quot;Color / Design&quot;},{&quot;SKU&quot;:&quot;RZ01-04620200-R3U1&quot;,&quot;parentCategoryName&quot;:&quot;Color / Design&quot;},{&quot;SKU&quot;:&quot;RZ04-02980100-R3M1&quot;,&quot;parentCategoryName&quot;:&quot;Color / Design&quot;}]"
                                                        data-overridelinks="[{&quot;SKU&quot;:&quot;RZ09-0427EE23-R3U1&quot;,&quot;url&quot;:&quot;/shop/pc/gaming-laptops?query=:newest:category:system-laptops:system-display:14%2Binch&quot;},{&quot;SKU&quot;:&quot;RZ09-0421EED3-R3U1&quot;,&quot;url&quot;:&quot;/shop/pc/gaming-laptops?query=:newest:category:system-laptops:system-display:15%2Binch&quot;},{&quot;SKU&quot;:&quot;RZ09-0423EED3-R3U1&quot;,&quot;url&quot;:&quot;/shop/pc/gaming-laptops?query=:newest:category:system-laptops:system-display:17%2Binch&quot;}]"
                                                        data-promoliner="[{&quot;SKU&quot;:&quot;RZ38-03720100-R3U1&quot;,&quot;promoliner&quot;:&quot;Get a Razer Deathadder V2 Pro when you purchase the Razer Enki.&quot;},{&quot;SKU&quot;:&quot;RZ38-02770100-R3U1&quot;,&quot;promoliner&quot;:&quot;Get a Razer Deathadder V2 Pro when you purchase the Razer Iskur (XL included).&quot;}]"
                                                        data-baseurl="" data-parentid="street-battle" data-overrideribbons="[]" pnxssr_3="">
                                                        <ul class="" pnxssr_4="">
                                                            <li data-order="0" data-sku="RZ09-0427EE23-R3U1" id="panel-RZ09-0427EE23-R3U1-street-battle" pnxssr_5="" class="loaded">
                                                                <a href="#" aria-hidden="true" tabindex="-1" class="thumbnail-holder" pnxssr_15="" data-gtm-promotion-viewed="true"><img src="./Public/https___hybrismediaprod.blob.core.windows.net_sys-master-phoenix-images-container_h2d_he5_9392073998366_blade15-ch8-fhd-2-500x500.png" alt="Razer Blade 15"></a>
                                                                <div class="container-content" pnxssr_7="">
                                                                    <div class="body-copy" pnxssr_8="">
                                                                        <h3 pnxssr_9="">Razer Blade 14</h3>
                                                                        <p class="summary">14-inch Gaming Laptop with AMD Ryzen™ 6900HX&nbsp;</p>
                                                                    </div>
                                                                    <div class="cta-container" pnxssr_10="">
                                                                        <div class="price" pnxssr_11="">
                                                                            <p pnxssr_12="">From <br> 450 000 CFA</p>
                                                                        </div>
                                                                        <a href="" pnxssr_13="#" aria-label="BUY - Razer Blade 14, For US$1,999.99" data-gtm-promotion-viewed="true">Buy</a>
                                                                    </div>
                                                                </div>
                                                                <div class="genpnx product-badge badge-yellow">GIFT WITH PURCHASE</div>
                                                            </li>
                                                            <li data-order="1" data-sku="RZ09-0421EED3-R3U1" id="panel-RZ09-0421EED3-R3U1-street-battle" pnxssr_14="" class="loaded">
                                                                <a href="#" aria-hidden="true" tabindex="-1" class="thumbnail-holder" pnxssr_15="" data-gtm-promotion-viewed="true"><img src="./Public/https___hybrismediaprod.blob.core.windows.net_sys-master-phoenix-images-container_h2d_he5_9392073998366_blade15-ch8-fhd-2-500x500.png" alt="Razer Blade 15"></a>
                                                                <div class="container-content" pnxssr_16="">
                                                                    <div class="body-copy" pnxssr_17="">
                                                                        <h3 pnxssr_18="">Razer Blade 15</h3>
                                                                        <p class="summary">Flagship 15-inch Laptop for Power and Portability</p>
                                                                    </div>
                                                                    <div class="cta-container" pnxssr_19="">
                                                                        <div class="price" pnxssr_20="">
                                                                            <p pnxssr_21="">From <br> 300 000 CFA</p>
                                                                        </div>
                                                                        <a href="#" pnxssr_22="" aria-label="BUY - Razer Blade 15, For US$2,499.99" data-gtm-promotion-viewed="true">Buy</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li data-order="2" data-sku="RZ09-0423EED3-R3U1" id="panel-RZ09-0423EED3-R3U1-street-battle" pnxssr_23="" class="loaded">
                                                                <a href="#" aria-hidden="true" tabindex="-1" class="thumbnail-holder" pnxssr_24="" data-gtm-promotion-viewed="true"><img src="./Public/https___hybrismediaprod.blob.core.windows.net_sys-master-phoenix-images-container_h71_h9a_9392074063902_blade17-d8-fhd-2-500x500.png" alt="Razer Blade 17"></a>
                                                                <div class="container-content" pnxssr_25="">
                                                                    <div class="body-copy" pnxssr_26="">
                                                                        <h3 pnxssr_27="">Razer Blade 17</h3>
                                                                        <p class="summary">Desktop Replacement Laptop with 12th Gen Processors</p>
                                                                    </div>
                                                                    <div class="cta-container" pnxssr_28="">
                                                                        <div class="price" pnxssr_29="">
                                                                            <p pnxssr_30="">From <br> 250 000 CFA</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                        <a href="#" pnxssr_31="" aria-label="BUY - Razer Blade 17, For US$2,799.99" data-gtm-promotion-viewed="true">Buy</a>
                                                            </li>
                                                            <li data-order="3" data-sku="RZ38-03720100-R3U1" id="panel-RZ38-03720100-R3U1-street-battle" pnxssr_32="" class="loaded">
                                                                <a href="#" aria-hidden="true" tabindex="-1" class="thumbnail-holder" pnxssr_33="" data-gtm-promotion-viewed="true"><img src="./Public/https___hybrismediaprod.blob.core.windows.net_sys-master-phoenix-images-container_h71_ha6_9250062991390_enki-green-500x500.png" alt="Razer Enki - Green"></a>
                                                                <div class="container-content" pnxssr_34="">
                                                                    <div class="body-copy" pnxssr_35="">
                                                                        <h3 pnxssr_36="">Razer Enki - Green</h3>
                                                                        <p class="summary">Gaming Chair for All-Day Comfort</p>
                                                                        <p class="promoliner">Get a Razer Deathadder V2 Pro when you purchase the Razer Enki.</p>
                                                                    </div>
                                                                    <div class="cta-container" pnxssr_37="">
                                                                        <div class="price" pnxssr_38="">
                                                                            <p pnxssr_39="">80 000 CFA</p>
                                                                        </div>
                                                                        <a href="https://www.razer.com/gaming-chairs/Razer-Enki/RZ38-03720100-R3U1" pnxssr_40="" aria-label="BUY - Razer Enki - Green, For US$399.00" data-gtm-promotion-viewed="true">Buy</a>
                                                                    </div>
                                                                </div>
                                                                <div class="genpnx product-badge badge-yellow">GIFT WITH PURCHASE</div>
                                                            </li>
                                                            <li data-order="4" data-sku="RZ38-02770100-R3U1" id="panel-RZ38-02770100-R3U1-street-battle" pnxssr_41="" class="loaded">
                                                                <a href="#" aria-hidden="true" tabindex="-1" class="thumbnail-holder" pnxssr_42=""><img src="./Public/https___hybrismediaprod.blob.core.windows.net_sys-master-phoenix-images-container_h8a_hb0_9090587590686_500x500-iskur.png" alt="Razer Iskur - Black / Green"></a>
                                                                <div class="container-content" pnxssr_43="">
                                                                    <div class="body-copy" pnxssr_44="">
                                                                        <h3 pnxssr_45="">Razer Iskur - Black / Green</h3>
                                                                        <p class="summary">Gaming Chair with Built-in Lumbar Support</p>
                                                                        <p class="promoliner">Get a Razer Deathadder V2 Pro when you purchase the Razer Iskur (XL included).</p>
                                                                    </div>
                                                                    <div class="cta-container" pnxssr_46="">
                                                                        <div class="price" pnxssr_47="">
                                                                            <p pnxssr_48="">25 000 CFA</p>
                                                                        </div>
                                                                        <a href="" pnxssr_49="" aria-label="BUY - Razer Iskur - Black / Green, For US$499.00" data-gtm-promotion-viewed="true">Buy</a>
                                                                    </div>
                                                                </div>
                                                                <div class="genpnx product-badge badge-yellow">GIFT WITH PURCHASE</div>
                                                            </li>
                                                            <li data-order="5" data-sku="RZ01-04390100-R3U1" id="panel-RZ01-04390100-R3U1-street-battle" pnxssr_50="" class="loaded">
                                                                <a href="#" aria-hidden="true" tabindex="-1" class="thumbnail-holder" pnxssr_51=""><img src="./Public/https___hybrismediaprod.blob.core.windows.net_sys-master-phoenix-images-container_h09_h7d_9398870278174_viper-v2-pro-black-500x500.png" alt="Razer Viper V2 Pro"></a>
                                                                <div class="container-content" pnxssr_52="">
                                                                    <div class="body-copy" pnxssr_53="">
                                                                        <h3 pnxssr_54="">Razer Viper V2 Pro</h3>
                                                                        <p class="summary">Ultra-lightweight, Ultra-fast Wireless Esports Mouse</p>
                                                                        <ul class="options-colordesign options">
                                                                            <li class="black"><span></span></li>
                                                                            <li class="white"><span></span></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="cta-container" pnxssr_55="">
                                                                        <div class="price" pnxssr_56="">
                                                                            <p pnxssr_57="">8 000 CFA</p>
                                                                        </div>
                                                                        <a href="#" pnxssr_58="" aria-label="BUY - Razer Viper V2 Pro, For US$149.99" data-gtm-promotion-viewed="true">Buy</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li data-order="6" data-sku="RZ01-04630200-R3U1" id="panel-RZ01-04630200-R3U1-street-battle" pnxssr_59="" class="loaded">
                                                                <a href="#" aria-hidden="true" tabindex="-1" class="thumbnail-holder" pnxssr_60=""><img src="./Public/https___hybrismediaprod.blob.core.windows.net_sys-master-phoenix-images-container_h72_h51_9449963913246_deathadder-v3-pro-white-v2-500x500.png" alt="Razer DeathAdder V3 Pro"></a>
                                                                <div class="container-content" pnxssr_61="">
                                                                    <div class="body-copy" pnxssr_62="">
                                                                        <h3 pnxssr_63="">Razer DeathAdder V3 Pro</h3>
                                                                        <p class="summary">Ultra-lightweight Wireless Ergonomic Esports Mouse</p>
                                                                        <ul class="options-colordesign options">
                                                                            <li class="black"><span></span></li>
                                                                            <li class="white"><span></span></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="cta-container" pnxssr_64="">
                                                                        <div class="price" pnxssr_65="">
                                                                            <p pnxssr_66="">5 000 CFA</p>
                                                                        </div>
                                                                        <a href="#" pnxssr_67="" aria-label="BUY - Razer DeathAdder V3 Pro, For US$149.99" data-gtm-promotion-viewed="true">Buy</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li data-order="7" data-sku="RZ01-04620200-R3U1" id="panel-RZ01-04620200-R3U1-street-battle" pnxssr_68="" class="loaded">
                                                                <a href="#" aria-hidden="true" tabindex="-1" class="thumbnail-holder" pnxssr_69=""><img src="./Public/https___hybrismediaprod.blob.core.windows.net_sys-master-phoenix-images-container_h22_h08_9447199080478_basilisk-v3-pro-white-500x500.png" alt="Razer Basilisk V3 Pro"></a>
                                                                <div class="container-content" pnxssr_70="">
                                                                    <div class="body-copy" pnxssr_71="">
                                                                        <h3 pnxssr_72="">Razer Basilisk V3 Pro</h3>
                                                                        <p class="summary">Customizable Wireless Gaming Mouse with Razer HyperScroll Tilt Wheel</p>
                                                                        <ul class="options-colordesign options">
                                                                            <li class="black"><span></span></li>
                                                                            <li class="white"><span></span></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="cta-container" pnxssr_73="">
                                                                        <div class="price" pnxssr_74="">
                                                                            <p pnxssr_75="">15 000 CFA</p>
                                                                        </div>
                                                                        <a href="#" pnxssr_76="" aria-label="BUY - Razer Basilisk V3 Pro, For US$159.99" data-gtm-promotion-viewed="true">Buy</a>
                                                                    </div>
                                                                </div>
                                                                <div class="genpnx product-badge badge-orange">EXCLUSIVE</div>
                                                            </li>
                                                            <li data-order="8" data-sku="RZ03-04360200-R3U1" id="panel-RZ03-04360200-R3U1-street-battle" pnxssr_77="" class="loaded">
                                                                <a href="#" aria-hidden="true" tabindex="-1" class="thumbnail-holder" pnxssr_78="" data-gtm-promotion-viewed="true"><img src="./Public/https___hybrismediaprod.blob.core.windows.net_sys-master-phoenix-images-container_hee_h89_9422803435550_deathstalker-v2-pro-2-500x500.png" alt="Razer DeathStalker V2 Pro - Linear Optical Switch - US - Black"></a>
                                                                <div class="container-content" pnxssr_79="">
                                                                    <div class="body-copy" pnxssr_80="">
                                                                        <h3 pnxssr_81="">Razer DeathStalker V2 Pro - Linear Optical Switch - US - Black</h3>
                                                                        <p class="summary">Wireless Low-Profile RGB Optical Gaming Keyboard</p>
                                                                    </div>
                                                                    <div class="cta-container" pnxssr_82="">
                                                                        <div class="price" pnxssr_83="">
                                                                            <p pnxssr_84="">12 000 CFA</p>
                                                                        </div>
                                                                        <a href="#" pnxssr_85="" aria-label="BUY - Razer DeathStalker V2 Pro - Linear Optical Switch - US - Black, For US$249.00" data-gtm-promotion-viewed="true">Buy</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li data-order="9" data-sku="RZ04-03460100-R3U1" id="panel-RZ04-03460100-R3U1-street-battle" pnxssr_86="" class="loaded">
                                                                <a href="#" aria-hidden="true" tabindex="-1" class="thumbnail-holder" pnxssr_87="" data-gtm-promotion-viewed="true"><img src="./Public/https___hybrismediaprod.blob.core.windows.net_sys-master-phoenix-images-container_h6a_hff_9397630140446_kraken-v3-pro-3-500x500.png" alt="Razer Kraken V3 Pro"></a>
                                                                <div class="container-content" pnxssr_88="">
                                                                    <div class="body-copy" pnxssr_89="">
                                                                        <h3 pnxssr_90="">Razer Kraken V3 Pro</h3>
                                                                        <p class="summary">Wireless Gaming Headset with Haptic Technology</p>
                                                                    </div>
                                                                    <div class="cta-container" pnxssr_91="">
                                                                        <div class="price" pnxssr_92="">
                                                                            <p pnxssr_93="">23 000 CFA</p>
                                                                        </div>
                                                                        <a href="#" pnxssr_94="" aria-label="BUY - Razer Kraken V3 Pro, For US$199.99" data-gtm-promotion-viewed="true">Buy</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li data-order="10" data-sku="RZ04-02980100-R3M1" id="panel-RZ04-02980100-R3M1-street-battle" pnxssr_95="" class="loaded">
                                                                <a href="#" aria-hidden="true" tabindex="-1" class="thumbnail-holder" pnxssr_96="" data-gtm-promotion-viewed="true"><img src="./Public/https___hybrismediaprod.blob.core.windows.net_sys-master-phoenix-images-container_h64_h23_9081099288606_Kraken-Kitty-Black-500x500.png" alt="Razer Kraken Kitty"></a>
                                                                <div class="container-content" pnxssr_97="">
                                                                    <div class="body-copy" pnxssr_98="">
                                                                        <h3 pnxssr_99="">Razer Kraken Kitty</h3>
                                                                        <p class="summary">Razer Kitty Ear USB Headset with Chroma</p>
                                                                        <ul class="options-colordesign options">
                                                                            <li class="black"><span></span></li>
                                                                            <li class="color-quartz"><span></span></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="cta-container" pnxssr_100="">
                                                                        <div class="price" pnxssr_101="">
                                                                            <p pnxssr_102="">30 000 CFA</p>
                                                                        </div>
                                                                        <a href="#" pnxssr_103="" aria-label="BUY - Razer Kraken Kitty, For US$149.99" data-gtm-promotion-viewed="true">Buy</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li data-order="11" data-sku="RZ19-03640100-R3U1" id="panel-RZ19-03640100-R3U1-street-battle" pnxssr_104="" class="loaded">
                                                                <a href="#" aria-hidden="true" tabindex="-1" class="thumbnail-holder" pnxssr_105="" data-gtm-promotion-viewed="true"><img src="./Public/https___hybrismediaprod.blob.core.windows.net_sys-master-phoenix-images-container_hf0_h19_9147860779038_kiyo-pro-500x500.png" alt="Razer Kiyo Pro"></a>
                                                                <div class="container-content" pnxssr_106="">
                                                                    <div class="body-copy" pnxssr_107="">
                                                                        <h3 pnxssr_108="">Razer Kiyo Pro</h3>
                                                                        <p class="summary">USB Camera with High-Performance Adaptive Light Sensor</p>
                                                                    </div>
                                                                    <div class="cta-container" pnxssr_109="">
                                                                        <div class="price" pnxssr_110="">
                                                                            <p pnxssr_111=""><span>15 000 CFA</span><br><span class="savings"><del>19 00 CFA</del></span></p>
                                                                        </div>
                                                                        <a href="#" pnxssr_112="" aria-label="BUY - Razer Kiyo Pro, For US$199.99" data-gtm-promotion-viewed="true">Buy</a>
                                                                    </div>
                                                                </div>
                                                                <div class="genpnx product-badge badge-blue">50% off</div>
                                                            </li>
                                                            <li data-order="8" class="spacer" pnxssr_113="" style="min-width: calc(min(100vw, 1920px) - 1350px);"></li>
                                                        </ul>
                                                    </div>
                                                </section>
                                            </section>
                                        </app-template-content>
                                    </app-razer-dream>
                                </section>
         <!-- I N C L U S I O N -->
        <?php
            include("footer.php");
        ?>
    </body>
</html>