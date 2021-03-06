<?php

$I = new AcceptanceTester($scenario);
$I->wantTo( 'Reviewing the theme.' );

$I->canSeeWpVersion();
$I->canSeeCurrentTheme();

$pages = array(
	"/",
	"/wp-admin/",
	"/wp-admin/themes.php",
	"/wp-admin/customize.php",
	"/wp-admin/widgets.php",
	"/wp-admin/nav-menus.php",
);

foreach ( $pages as $page ) {
	echo " ---\n";
	$I->amOnPage( $page );
	$I->cantSeeJsErrors();
	$I->cantSeeImgErrors();
}

$pages = array(
	"/?name=template-sticky",
	"/?name=sample-page",
	"/?s=hello",
	"/archives/date/" . date( "Y/m" ),
	"/archives/category/aciform",
	"/dsc20050604_133440_34211",
);

foreach ( $pages as $page ) {
	echo " ---\n";
	$I->amOnPage( $page );
	$I->cantSee404();
	$I->cantSeeJsErrors();
	$I->cantSeeImgErrors();
}

echo " ---\n";

$I->amOnPage( "/this-test-is-checking-on-404" );
$I->cantSeeJsErrors();
$I->cantSeeImgErrors();

echo " ---\n";

$I->seeTags();
$I->canSeeTheThemeSupports();

$urls = array(
	"/wp-admin/",
	"/",
);

foreach ( $urls as $url ) {
	echo " ---\n";
	$I->takeScreenshot( $url );
}

echo " ---\n";

$I->cantSeeErrorInLog();
