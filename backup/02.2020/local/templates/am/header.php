
<!DOCTYPE html>
<html lang="ru">


    <head>
        <meta charset="utf-8" />
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
	<?$APPLICATION->ShowHead();?>
	<title><?$APPLICATION->ShowTitle();?></title>

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#8c8c8c">
        <meta name="msapplication-TileColor" content="#00aba9">
        <meta name="theme-color" content="#ffffff">
        
        <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
        <link href="/css/main.min.css" rel="stylesheet"/>
        <link href="/css/custom.css" rel="stylesheet"/>

        <link href="https://fonts.googleapis.com/css?family=Arimo:400,700&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        
    </head>

    <body  class="<?=(CSite::InDir('/index.php'))?"":"inner-page"?>">
		<div id="panel">
			<?$APPLICATION->ShowPanel();?>
		</div>

        <div class="wrapper">
            
            <div class="top-bar">
                <div class="container">
                    <nav class="top-bar-nav">
								<?$APPLICATION->IncludeComponent("bitrix:menu", "menutop", Array(
									"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
										"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
										"DELAY" => "N",	// Откладывать выполнение шаблона меню
										"MAX_LEVEL" => "1",	// Уровень вложенности меню
										"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
											0 => "",
										),
										"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
										"MENU_CACHE_TYPE" => "N",	// Тип кеширования
										"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
										"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
										"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
									),
									false
								);?>
                    </nav>
                    <a href="tel:88000000000" class="icon-link theme-link">
                        <svg width="16" height="16" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.6861 11.0644L11.5241 8.90207C11.0934 8.47316 10.3802 8.48619 9.9346 8.932L8.84533 10.021C8.77652 9.98309 8.70529 9.94347 8.63039 9.90144C7.94253 9.52031 7.00108 8.99792 6.0104 8.00651C5.01678 7.01301 4.49391 6.07011 4.1116 5.38181C4.07126 5.30889 4.03261 5.23858 3.99444 5.17182L4.7255 4.44185L5.08491 4.08199C5.53125 3.63554 5.54355 2.92258 5.11391 2.49241L2.95183 0.329853C2.52219 -0.0997067 1.80871 -0.0866751 1.36238 0.359778L0.753031 0.972625L0.769683 0.989156C0.56536 1.24987 0.394622 1.55056 0.267564 1.87482C0.15044 2.18348 0.0775198 2.47802 0.0441766 2.77316C-0.241312 5.13992 0.840231 7.30297 3.7754 10.2382C7.83269 14.2952 11.1023 13.9887 11.2434 13.9737C11.5506 13.937 11.845 13.8636 12.1442 13.7474C12.4657 13.6218 12.7662 13.4513 13.0267 13.2475L13.04 13.2593L13.6573 12.6548C14.1027 12.2084 14.1156 11.4952 13.6861 11.0644Z" fill="#0E8EEB"/>
                        </svg>
                        <b>+7 (3852) 500-205</b>
                    </a>
                </div>
            </div>

            <header class="header mb-4">
                <div class="container">
                    <a href="/" class="header-logo"></a>
                    <div class="header-content">
                        <div class="header-top">
                            <a href="/info/delivery/" class="delivery-badge">
                                <svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.26645 21.6325H0.46645V16.4753L4.66645 9.91158H9.7998V21.6325H7.93315" fill="#0E8EEB"/>
                                    <path d="M23.7999 21.6324H27.5332V6.62975H9.79985V21.6324H19.1332" fill="#0E8EEB"/>
                                    <path d="M24.7332 19.2882H27.5332V20.2263H24.7332V19.2882Z" fill="#F46B27"/>
                                    <path d="M9.80017 19.2882H18.2002V20.2263H9.80017V19.2882Z" fill="#F46B27"/>
                                    <path d="M0.46636 19.2882H2.33301V20.2263H0.46636V19.2882Z" fill="#DBDBDB"/>
                                    <path d="M9.80044 8.03625H26.1338V8.97432H9.80044V8.03625Z" fill="#F46B27"/>
                                    <path d="M21.4665 23.9766C20.1778 23.9766 19.1331 22.9271 19.1331 21.6324C19.1331 20.3378 20.1778 19.2882 21.4665 19.2882C22.7551 19.2882 23.7998 20.3378 23.7998 21.6324C23.7998 22.9271 22.7551 23.9766 21.4665 23.9766Z" fill="#0E8EEB"/>
                                    <path d="M5.60024 23.9766C4.31157 23.9766 3.26689 22.9271 3.26689 21.6324C3.26689 20.3378 4.31157 19.2882 5.60024 19.2882C6.88892 19.2882 7.93359 20.3378 7.93359 21.6324C7.93359 22.9271 6.88892 23.9766 5.60024 23.9766Z" fill="#0E8EEB"/>
                                    <path d="M3.4676 11.7869H7.93359V16.0064H0.765594L3.4676 11.7869Z" fill="#87CED9"/>
                                    <path d="M4.27465 9.65842C4.36051 9.5243 4.508 9.44321 4.66665 9.44277H9.3333V6.62977C9.3333 6.371 9.54237 6.16096 9.79995 6.16096H27.5334C27.7909 6.16096 28 6.371 28 6.62977V21.6325C28 21.8912 27.7909 22.1013 27.5334 22.1013H24.2247C23.9578 23.6316 22.5069 24.6546 20.9837 24.3868C19.8222 24.1824 18.9122 23.2687 18.7087 22.1013H8.35806C8.09113 23.6316 6.64027 24.6546 5.11706 24.3868C3.95555 24.1824 3.04555 23.2687 2.84206 22.1013H0.466705C0.209127 22.1013 5.72205e-05 21.8912 5.72205e-05 21.6325V16.4753C5.72205e-05 16.3853 0.0261974 16.2976 0.0747051 16.2221L4.27465 9.65842ZM3.73335 12.2558L1.61935 15.5376H7.46665V12.2558H3.73335ZM21.4666 23.5078C22.4975 23.5078 23.3333 22.6681 23.3333 21.6325C23.3333 20.5968 22.4975 19.7571 21.4666 19.7571C20.4358 19.7571 19.6 20.5968 19.6 21.6325C19.6 22.6681 20.4358 23.5078 21.4666 23.5078ZM21.4666 18.8195C22.8321 18.8209 23.9969 19.811 24.2246 21.1636H27.0666V20.226H24.7333V19.2883H27.0666V7.09859H10.2666V8.03627H26.1334V8.97396H10.2667V19.2883H18.2V20.226H10.2666V21.1636H18.7086C18.9364 19.8115 20.1012 18.8208 21.4666 18.8195ZM5.6 23.5078C6.63086 23.5078 7.46665 22.6681 7.46665 21.6325C7.46665 20.5968 6.63086 19.7571 5.6 19.7571C4.56914 19.7571 3.73335 20.5968 3.73335 21.6325C3.73335 22.6681 4.56914 23.5078 5.6 23.5078ZM2.842 21.1636C3.10893 19.6333 4.55979 18.6103 6.083 18.878C7.24451 19.0825 8.15451 19.9962 8.358 21.1636H9.33335V10.3805H4.92335L4.32135 11.3181H7.93335C8.19093 11.3181 8.4 11.5282 8.4 11.787V16.0065C8.4 16.2652 8.19093 16.4753 7.93335 16.4753H1.022L0.933353 16.6113V19.2883H2.33335V20.226H0.933353V21.1636H2.842V21.1636Z" fill="black"/>
                                </svg>
                                <span><b>Доставка по Барнаулу!</b></span>
                            </a>
                            <div class="header-search" id="title-search">

                    <?
                        $APPLICATION->IncludeComponent(
				"bitrix:search.title", 
				"smart_search", 
				array(
					"CATEGORY_0" => array(
						0 => "iblock_1c_catalog",
					),
					"CATEGORY_0_TITLE" => "",
					"CATEGORY_0_iblock_1c_catalog" => array(
						0 => CATALOG_IBLOCK,
					),
					"CHECK_DATES" => "N",
					"CONTAINER_ID" => "title-search",
					"INPUT_ID" => "title-search-input",
					"NUM_CATEGORIES" => "1",
					"ORDER" => "rank",
					"PAGE" => "/catalog/search/",
					"SHOW_INPUT" => "Y",
					"SHOW_OTHERS" => "N",
					"TOP_COUNT" => "10",
					"USE_LANGUAGE_GUESS" => "N",
					"COMPONENT_TEMPLATE" => "smart_search"
				),
				false
			);
                     ?>

                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.8901 16.8296L12.6613 11.6007C13.653 10.3764 14.25 8.81977 14.25 7.12503C14.25 3.19631 11.0537 0 7.12499 0C3.19627 0 0 3.19631 0 7.12503C0 11.0537 3.19631 14.2501 7.12503 14.2501C8.81977 14.2501 10.3764 13.653 11.6007 12.6613L16.8296 17.8902C16.9761 18.0366 17.2135 18.0366 17.36 17.8902L17.8902 17.3599C18.0366 17.2135 18.0366 16.976 17.8901 16.8296ZM7.12503 12.75C4.02322 12.75 1.50001 10.2268 1.50001 7.12503C1.50001 4.02322 4.02322 1.50001 7.12503 1.50001C10.2268 1.50001 12.75 4.02322 12.75 7.12503C12.75 10.2268 10.2268 12.75 7.12503 12.75Z" fill="#0E8EEB"/>
                                </svg>
                            </div>
                            <a href="/cart/" class="btn-basket">
                                <span class="btn-basket-icon">
                                    <i class="btn-basket-num">3</i>
                                    <svg width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18.6302 6.22142H17.3413C17.4927 7.07131 17.1293 7.96721 16.3521 8.44826C16.0087 8.66064 15.6147 8.77302 15.2121 8.77302C14.4548 8.77302 13.7649 8.38871 13.3669 7.74488C13.0855 7.28955 12.9943 6.74424 13.0885 6.22138H7.16166C7.25543 6.74424 7.16426 7.28951 6.88288 7.74517C6.48524 8.38866 5.79537 8.77298 5.03801 8.77298C4.63517 8.77298 4.24117 8.6606 3.89753 8.44822C3.12053 7.96717 2.75705 7.07127 2.90853 6.22138H1.61971C0.725019 6.22138 0 6.94671 0 7.84179C0 8.73637 0.725019 9.46166 1.61971 9.46166H1.79838L2.98617 16.6888C3.11071 17.4448 3.76366 18 4.52998 18H15.72C16.4863 18 17.1392 17.4448 17.2637 16.6888L18.4511 9.46174H18.6302C19.5249 9.46174 20.25 8.73637 20.25 7.84183C20.25 6.94675 19.5248 6.22142 18.6302 6.22142ZM6.90651 16.1252C6.85759 16.1324 6.80916 16.1362 6.76118 16.1362C6.28846 16.1362 5.87412 15.7899 5.80127 15.3079L5.1286 10.8226C5.04894 10.2914 5.41452 9.79653 5.94545 9.71683C6.47703 9.63945 6.9707 10.0029 7.05069 10.5337L7.72353 15.0195C7.80319 15.5505 7.43744 16.0455 6.90651 16.1252ZM11.0969 15.1636C11.0969 15.7008 10.6621 16.1361 10.1253 16.1361C9.58836 16.1361 9.15372 15.7007 9.15372 15.1636V10.6779C9.15372 10.1412 9.5884 9.70586 10.1253 9.70586C10.6621 9.70586 11.0969 10.1412 11.0969 10.6779V15.1636ZM15.1217 10.8225L14.4486 15.3078C14.3762 15.7899 13.9619 16.1361 13.4892 16.1361C13.441 16.1361 13.3927 16.1323 13.3437 16.1251C12.8128 16.0454 12.4472 15.5504 12.5268 15.0194L13.1996 10.5336C13.2795 10.0025 13.7712 9.63673 14.3048 9.71671C14.8356 9.7964 15.2013 10.2914 15.1217 10.8225Z" fill="#0E8EEB"/>
                                        <path class="basket-handler-left" d="M4.23811 7.8971C4.48715 8.05145 4.764 8.12495 5.03755 8.12495C5.54665 8.12495 6.04441 7.86912 6.33132 7.4042C6.59596 6.97602 6.61873 6.46959 6.44431 6.03604L9.32983 1.37049C9.59059 0.948619 9.46019 0.396048 9.0385 0.134681C8.89139 0.0437621 8.7282 1.52588e-05 8.56727 1.52588e-05C8.2667 1.52588e-05 7.97315 0.151107 7.80294 0.426093L4.91837 5.09165C4.45295 5.12904 4.00998 5.37476 3.74534 5.80282C3.30324 6.51742 3.52447 7.45509 4.23811 7.8971Z" fill="#0E8EEB"/>
                                        <path class="basket-handler-right" d="M13.8049 6.03604C13.6305 6.46959 13.6528 6.97602 13.9175 7.4042C14.2049 7.86916 14.7022 8.12495 15.2117 8.12495C15.4852 8.12495 15.7617 8.05145 16.0112 7.8971C16.7248 7.45509 16.9456 6.51738 16.5036 5.80282C16.2397 5.37476 15.7963 5.12904 15.3313 5.09165L12.4456 0.426093C12.2758 0.151066 11.9822 1.52588e-05 11.6816 1.52588e-05C11.5208 1.52588e-05 11.3576 0.0437621 11.2102 0.134681C10.7887 0.396048 10.6593 0.948619 10.919 1.37049L13.8049 6.03604Z" fill="#0E8EEB"/>
                                    </svg>
                                </span>
                                <span class="btn-basket-text rub">123 000</span>
                            </a>
                            <a href="/catalog/compare/" class="btn-compare">
                                <span class="btn-compare-icon">
                                    <i class="btn-compare-num">3</i>
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 18V8M9 18V0M16 18V3" stroke="#0E8EEB" stroke-width="3"/>
                                    </svg>
                                </span>
                                <span class='btn-compare-text'>Сравнение</span>
                            </a>
                        </div>

                        <div class="header-bottom">

                            <button class="hamburger hamburger--elastic js-toggle-hamburger js-opener js-category-menu-animation"        
                                data-target-id="catalog-menu"
                                type="button">
                              <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                              </span>
                            </button>

                            <nav class="header-nav">
                                <a class="theme-link text-uppercase" href="/catalog/">Каталог</a>
								<?$APPLICATION->IncludeComponent("bitrix:menu", "menuhot", Array(
									"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
										"DELAY" => "N",	// Откладывать выполнение шаблона меню
										"MAX_LEVEL" => "1",	// Уровень вложенности меню
										"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
											0 => "",
										),
										"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
										"MENU_CACHE_TYPE" => "N",	// Тип кеширования
										"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
										"ROOT_MENU_TYPE" => "hotlinks",	// Тип меню для первого уровня
										"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
									),
									false
								);?>
                            </nav>

                        </div>

                    </div>
                </div>
            </header>

            <div class="catalog-menu-holder">
                <div class="catalog-menu hidden" id="catalog-menu"> <!-- закрытие меню привязано к id -->
                    <div class="container">
                        <nav class="catalog-menu-list border-radius">
                            <?$APPLICATION->IncludeComponent(
                            	"bitrix:catalog.section.list", 
                            	"dropdown", 
                            	array(
                            		"ADD_SECTIONS_CHAIN" => "N",
                            		"CACHE_GROUPS" => "Y",
                            		"CACHE_TIME" => "36000000",
                            		"CACHE_TYPE" => "A",
                            		"COUNT_ELEMENTS" => "Y",
                            		"IBLOCK_ID" => CATALOG_IBLOCK,
                            		"IBLOCK_TYPE" => "1c_catalog",
                            		"SECTION_CODE" => "",
                            		"SECTION_FIELDS" => array(
                            			0 => "",
                            			1 => "",
                            		),
                            		"SECTION_URL" => "/catalog/#ID#/",
                            		"SECTION_USER_FIELDS" => array(
                            			0 => "",
                            			1 => "",
                            		),
                            		"SHOW_PARENT_NAME" => "Y",
                            		"TOP_DEPTH" => "1",
                            		"VIEW_MODE" => "LINE",
                            		"COMPONENT_TEMPLATE" => "homesections1",
                            		"SECTION_ID" => "0",
                            		"FILTER_NAME" => "sectionsFilter",
                            		"CACHE_FILTER" => "N"
                            	),
                            	false
                            );?>
                        </nav>
                        <button class="btn-close js-closer js-changer" 
                            data-target-id="catalog-menu"
                            data-changer-target="hamburger" 
                            data-changer-class="is-active"
                            data-changer-action="remove">
                        </button>
                    </div>
                </div>
            </div>
<?
	if(CSite::InDir('/index.php')) {} else {
?>
<?$APPLICATION->IncludeComponent("bitrix:breadcrumb",".default",Array(
        "START_FROM" => "0", 
        "PATH" => "", 
        "SITE_ID" => "s1" 
    )
);?>
<?
	}
?>
            <main>
                

