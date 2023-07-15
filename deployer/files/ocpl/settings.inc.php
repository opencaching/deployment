<?php
use src\Models\GeoCache\GeoCacheCommons;

require __DIR__.'/settingsDefault.inc.php';

//Replace localhost to you own domain site
//relative path to the root directory
if (!isset($rootpath))
    $rootpath = './';

//default used language
if (!isset($lang))
    $lang = 'pl';

//default used style
if (!isset($style))
    $style = 'stdstyle';

//pagetitle
if (!isset($pagetitle))
    $pagetitle = 'OpenCaching DEVEL';

// Used OC number nodes and name of waypoints :
// 1 Opencaching Germany http://www.opencaching.de OC
// 2 Opencaching Poland http://www.opencaching.pl OP
// 3 Opencaching Czech http://www.opencaching.cz OZ
// 4 Local Development AA
// 5 free
// 6 Opencaching Great Britain http://www.opencaching.org.uk OK
// 7 Opencaching Sweden http://www.opencaching.se OS =>OC Scandinavia
// 8 free
// 9 free
// 10 Opencaching United States http://www.opencaching.us OU
// 11 free
// 12 Opencaching Russia http://www.opencaching.org.ru  (I don't know current status???)
// 14 Opencaching Nederland http://www.opencaching.nl OB => OC Benelux
// 16 Opencaching Romania http://www.opencaching.ro OR
//
//id of the node 4 for local development
$oc_nodeid = 4;

//OC Waypoint for your site for example OX
$GLOBALS['oc_waypoint'] = 'OP';

//name of the cookie
$opt['cookie']['name'] = 'ocpl';
$opt['cookie']['path'] = '/';
$opt['cookie']['domain'] = '.local.opencaching.pl';

//name of the cookie
if (!isset($cookiename))
    $cookiename = 'ocpl';
if (!isset($cookiepath))
    $cookiepath = '/';
if (!isset($cookiedomain))
    $cookiedomain = '.local.opencaching.pl';

// Coordinates hidden for not-logged-ins?
global $hide_coords;
$hide_coords = true;

// scores range
$MIN_SCORE = 0;
$MAX_SCORE = 4;

// display online users on footer pages off=0 on=1
$onlineusers = 1;

//block register new cache before first find xx nuber caches value -1 off this feature
$NEED_FIND_LIMIT = 10;

$NEED_APPROVE_LIMIT = 3;

//Debug?
$debug_page = true;
if (!isset($debug_page))
    $debug_page = false;
$develwarning = '';

//site in service? Set to false when doing bigger work on the database to prevent error's
if (!isset($site_in_service))
    $site_in_service = true;

//if you are running this site on a other domain than staging.opencaching.de, you can set
//this in private_db.inc.php, but don't forget the ending /
$absolute_server_URI = 'http://local.opencaching.pl/';

// EMail address of the sender
if (!isset($emailaddr))
    $emailaddr = 'noreply@ocpl-devel';

// location for dynamically generated files
$dynbasepath = '/srv/ocpl-dynamic-files/';
$dynstylepath = $dynbasepath . 'tpl/stdstyle/html/';

// location of cache images
if (!isset($picdir))
    $picdir = $dynbasepath . 'images/uploads';
if (!isset($picurl))
    $picurl = 'http://local.opencaching.pl/images/uploads';

// Thumbsize
$thumb_max_width = 175;
$thumb_max_height = 175;
// Small thumbsize
$thumb2_max_width = 64;
$thumb2_max_height = 64;

// location of cache mp3 files
if (!isset($mp3dir))
    $mp3dir = $dynbasepath . 'mp3';
if (!isset($mp3url))
    $mp3url = 'http://local.opencaching.pl/mp3';

// maximal size of mp3 for PodCache 5 Mb ?
if (!isset($maxmp3size))
    $maxmp3size = 5000000;

// allowed extensions of images
if (!isset($mp3extensions))
    $mp3extensions = ';mp3;';

// default coordinates for cachemap, set to your country's center of gravity
$country_coordinates = "52.5,19.2";
// zoom at which your whole country/region is visible
$default_country_zoom = 6;

// Main page map parameters (customize as needed)
$main_page_map_center_lat = 52.13;
$main_page_map_center_lon = 19.20;
$main_page_map_zoom = 5;
$main_page_map_width = 250;
$main_page_map_height = 260;

// maximal size of images
if (!isset($maxpicsize))
    $maxpicsize = 152400;

// allowed extensions of images
if (!isset($picextensions))
    $picextensions = ';jpg;jpeg;gif;png;';

//local database settings
$dbpconnect = false;
$dbserver = 'localhost';
$dbname = 'ocpl';
$dbusername = 'root';
$dbpasswd = 'toor';
$opt['db']['server'] = $dbserver;
$opt['db']['name'] = $dbname;
$opt['db']['username'] = $dbusername;
$opt['db']['password'] = $dbpasswd;

$tmpdbname = 'test';

// warnlevel for sql-execution
$sql_errormail = 'user@ocpl-devel';
$sql_warntime = 1;

// replacements for sql()
$sql_replacements['db'] = $dbname;
$sql_replacements['tmpdb'] = 'test';

// safemode_zip-binary
$safemode_zip = '/srv/ocpl/bin/phpzip.php';
$zip_basedir = $dynbasepath . 'download/zip/';
$zip_wwwdir = '/download/zip/';

// Your own Google map API key
$googlemap_key = "xxxxxxxxx"; # TODO(changeme if you need me)
$googlemap_type = "G_MAP_TYPE"; // alternativ: _HYBRID_TYPE

$dberrormail = 'user@ocpl-devel';

$cachemap_mapper = "lib/mapper_okapi.php";

//Links to blog page on oc site
$blogsite_url = 'https://blog.opencaching.pl';

//links to forum page on oc site
$forum_url = 'http://forum.opencaching.pl';

// cache_maps-settings
$cachemap_size_lat = 0.4;
$cachemap_size_lon = 0.4;
$cachemap_pixel_x = 200;
$cachemap_pixel_y = 200;
$cachemap_url = 'images/cachemaps/';
$cachemap_dir = $rootpath . $cachemap_url;


//links to wiki page on oc site
// they are available in tpl files under {wiki_link_<name>}, i.e. {wiki_link_forBeginers}
// protocol agnostic links - just for fun
$wiki_url  = 'https://wiki.opencaching.pl';
$wikiLinks = array(
    'main'  => $wiki_url,
    'rules' => $wiki_url.'/index.php/Regulamin_użytkownika_OC_PL',
    'cacheParams' => $wiki_url.'/index.php/Parametry_skrzynki_OC_PL',
    'ratingDesc' => $wiki_url.'/index.php/Oceny_skrzynek',
    'forBeginers' => $wiki_url.'/index.php/Dla_początkujących',
    'placingCache' => $wiki_url.'/index.php/Zakładanie_skrzynki',
    'makingCaches' => $wiki_url.'/index.php/Jakość_skrzynki',
    'makingRoutes' => $wiki_url.'/index.php/Moje_trasy',
    'cacheQuality' => $wiki_url.'/index.php/Jakość_skrzynki',
    'myRoutes' => $wiki_url.'/index.php/Moje_trasy',
    'cacheNotes' => $wiki_url.'/index.php/Notatki_skrzynki',
    'additionalWaypoints' => $wiki_url.'/index.php/Dodatkowe_waypointy_w_skrzynce',
    'cachingCode' => $wiki_url.'/index.php/Kodeks_geocachera',
    'usefulFiles' => $wiki_url.'/index.php/Użyteczne_pliki_związane_z_OC_PL',
    'ocSiteRules' => $wiki_url.'/index.php/Zasady_funkcjonowania_Serwisu_OC_PL',
    'cacheTypes' => $wiki_url.'/index.php/Typ_skrzynki',
    'cacheAttrib' => $wiki_url.'/index.php/Parametry_skrzynki_OC_PL#Atrybuty_skrzynki',
    'cacheLogPass' => $wiki_url.'/index.php/Parametry_skrzynki_OC_PL#Has.C5.82o_do_wpisu_do_logu',
    // optional item
    'downloads' => $wiki_url.'/index.php/Użyteczne_pliki_związane_z_OC_PL',
    'history' => $wiki_url.'/index.php/Historia_serwisu_Opencaching.pl',
    'impressum' => $wiki_url.'/index.php/Opencaching_PL',
);

$contact_mail = 'user@ocpl-devel';
// E-mail address group of people from OC Team who solve problems, verify cache
$octeam_email = 'user@ocpl-devel';

// name of the sender for user-to-user notofications
$mailfrom = 'opencaching.pl';

// signature of e-mails send by system
$octeamEmailsSignature = "Pozdrawiamy, Zespół www.opencaching.pl";

// watchlist config:
$watchlistMailfrom =  'watch@local.opencaching.pl';

// email of GeoKrety developer (used in GeoKretyApi.php for error notifications)
$geoKretyDeveloperEmailAddress = 'user@ocpl-devel';

// OC specific email addresses for international use.
$mail_cog = 'user@ocpl-devel';
$mail_rt = 'user@ocpl-devel';
$mail_rr = 'user@ocpl-devel';
$mail_oc = 'user@ocpl-devel';

// name of the sender for user-to-user notofications
$mailfrom = 'opencaching.pl';

//Short sitename for international use.
$short_sitename = 'OC PL';

$SiteOutsideCountryString = 'poland_outside';
$countryParamNewcacherestPhp = " 'PL' ";

/* power Trail module switch and settings */

// true - swithed on; false - swithed off
$powerTrailModuleSwitchOn = true;

// minimum cache count for power trail to be public displayed
// (PT having less than $powerTrailMinimumCacheCount ) are visible only to owners.
$powerTrailMinimumCacheCount = array(
    'current' => 5,
    'old' => array(
        1 => array(
            'dateFrom' => '1970-01-01 01:00',
            'dateTo' => '2013-11-29 23:59:59',
            'limit' => 5,
        ),
// if limit change in future, just uncomment and place here current limit and period of time, (or create nexts key)
//              2 => array (
//                  'dateFrom' => '2013-11-30 00:00:00',
//                  'dateTo' => '20??-??-?? 23:59:59',
//                  'limit' => 25,
//              ),
    ),
);

// minimum cahes Found count of user, to alow user set new Power Trail
// user who found less than $powerTrailUserMinimumCacheFoundToSetNewPowerTrail can't create new PT
$powerTrailUserMinimumCacheFoundToSetNewPowerTrail = 100;

// link to FAQ/info of power trail module
$powerTrailFaqLink = 'https://wiki.opencaching.pl/index.php/Geościeżka';

/* end of power Trail module switch and settings */

// enable detailed cache access logging
$enable_cache_access_logs = true;

// Contact data definition START
/*
  Possible array entries are listed below. All the entries are optional.
  + groupName
  HTML header with a group name. Group name can be either raw, html code;
  or a reference to the translation file.
  + emailAddress
  E-mail address, which will be printed just below the groupName.
  + groupDescription
  Group description is an actual text of the group, which is placed under the groupName
  and e-mail. This entry can be in one of the following types/formats:
  - an array - if so, each array entry is processed as one of those two types below;
  - raw, html code;
  - reference to the translation file.
  + subgroup
  A nested array of the same structure. HTML headers for nested groups
  are one level lower.
  + other_keys
  They are used to substitute {other_keys} references in both groupName and
  groupDescription. Those keys do not propagate to subgroups.

 */

// Configuration for OC.PL contact page
        // Translated to Polish and English only :/
        $contactData = array(
                array (
        'groupName' => 'contact_pl_about_title',
        'groupDescription' => array(
            'contact_pl_about_description_1',
            'contact_pl_about_description_2'
        )
    ),
    array(
        'groupName' => 'OpenCaching PL Team',
        'subgroup' => array(
            array(
                'groupName' => 'Rada Rejsu',
                'groupDescription' => 'contact_pl_rr_description',
                'emailAddress' => 'rr at opencaching.pl',
                'link' => 'http://forum.opencaching.pl/viewtopic.php?f=19&t=6297'
            ),
            array(
                'groupName' => 'Rada Techniczna',
                'groupDescription' => 'contact_pl_rt_description',
                'emailAddress' => 'rt at opencaching.pl',
                                        'link' => 'http://opencaching.pl'
                                ),
            array(
                'groupName' => 'Centrum Obs&#322;ugi Geocachera',
                'groupDescription' => 'contact_pl_cog_description',
                'emailAddress' => 'cog at opencaching.pl',
                'link' => 'http://forum.opencaching.pl/viewtopic.php?f=19&t=6297'
            ),
        ),
    ),
    array(
        'groupName' => 'contact_pl_other_title',
        'groupDescription' => 'contact_pl_other_description'
    ),
    array(
        'groupName' => 'contact_ocpl_title',
        'groupDescription' => array(
            'contact_ocpl_description_1',
            'contact_ocpl_description_2',
            'contact_ocpl_description_3',
        )
                )


        );

// Contact data definition END

// Bottom menu
$config['bottom_menu']['impressum']['link'] = $wikiLinks['impressum'];
$config['bottom_menu']['impressum']['visible'] = true;
$config['bottom_menu']['history']['link'] = $wikiLinks['history'];
$config['bottom_menu']['history']['visible'] = true;

// Configuration of license link at footer
$config['license_html'] = '<a rel="license" href="https://creativecommons.org/licenses/by-sa/3.0/pl/"><img alt="Licencja Creative Commons" src="https://licensebuttons.net/l/by-sa/3.0/pl/88x31.png"></a>';

// Show date and date/time correct way.
$dateFormat = 'd-m-Y';
$datetimeFormat = 'd-m-Y H:i';

$config['numberFormatDecPoint']='.';
$config['numberFormatThousandsSep']=' ';

$defaultCountryList = array("AT", "BE", "BY", "BG", "HR", "CZ", "DK", "EE", "FI", "FR", "GR", "ES", "NL", "IE", "LT", "MD", "DE", "NO", "PL", "PT", "SU", "RO", "SK", "SI", "CH", "SE", "TR", "UA", "IT", "HU", "GB",);


/**
 * Configuration for map v3 maps
 *
 * Two dimensional array:
 *
 * * first dimension
 * KEYS - internal names
 *
 * * second dimension
 * KEYS:
 *  - hidden: boolean attribute to hide the map entirerly, without removing it from config
 *  - showOnlyIfMore: show this map item only in large views (like full screen)
 *  - attribution: the HTML snippet that will be shown in bottom-right part of the map
 *  - imageMapTypeJS: the complete JS expression returning instance of google.maps.ImageMapType,
 *      if set, not other properties below will work
 *  - name: the name of the map
 *  - tileUrl: URL to the tile, may contain following substitutions
 *      - {z} - zoom, may include shifts, in form of i.e. {z+1}, {z-3}
 *      - {x}, {y} - point coordinates
 *  - tileUrlJS: the complete JS expression returning function for tileUrl retrieval,
 *      if set, tileUrl property will not work
 *  - tileSize: the tile size, either in form of WIDTHxHEIGHT, i.e. 256x128, or complete
 *      JS expression returning instance of google.maps.Size
 *  - maxZoom: maximum zoom available
 *  - minZoom: minimum zoom available
 *
 * Other keys, will be passed as is, given that
 *  - numerical and boolean values are passed as is to JS
 *  - other types are passed as strings, unless they start with raw: prefix. In that case,
 *      they are passed as JS expressions
 */

$mapsConfig = array(
    'OSMapa' => array(
        'attribution' => '&copy; <a href="https://www.openstreetmap.org/" target="_blank">OpenStreetMap</a> contributors <a href="https://creativecommons.org/licenses/by-sa/2.0/" target="_blank">CC BY-SA</a> | Hosting:<a href="http://trail.pl/" target="_blank">trail.pl</a> i <a href="http://centuria.pl/" target="_blank">centuria.pl</a>',
        'name' => 'OSMapa',
        'tileUrl' => 'http://tile.openstreetmap.pl/osmapa.pl/{z}/{x}/{y}.png',
        'maxZoom' => 15,
        'tileSize' => '256x256',
    ),
    'OSM' => array(
        'name' => 'OSM',
        'attribution' => '&copy; <a href="https://www.openstreetmap.org/" target="_blank">OpenStreetMap</a> contributors <a href="https://creativecommons.org/licenses/by-sa/2.0/" target="_blank">CC BY-SA</a>',
        'tileUrl' => 'https://tile.openstreetmap.org/{z}/{x}/{y}.png',
        'maxZoom' => 18,
        'tileSize' => '256x256',
        'showOnlyIfMore' => true
    ),
    'UMP' => array(
        'name' => 'UMP',
        'attribution' => '&copy; Mapa z <a href="http://ump.waw.pl/" target="_blank">UMP-pcPL</a>',
        'tileUrl' => 'https://tiles.ump.waw.pl/ump_tiles/{z}/{x}/{y}.png',
        'maxZoom' => 18,
        'tileSize' => '256x256',
    ),
    'Topo' => array(
        'attribution' => '&copy; <a href="http://geoportal.gov.pl/" target="_blank">geoportal.gov.pl</a>',
        'showOnlyIfMore' => true,
        'imageMapTypeJS' => 'new google.maps.ImageMapType(new WMSImageMapTypeOptions(
                                        "Topo",
                                        "https://mapy.geoportal.gov.pl/wss/service/img/guest/TOPO/MapServer/WmsServer",
                                        "Raster",
                                        "",
                                        "image/jpeg"))',
    ),
    'Orto' => array(
        'attribution' => '&copy; <a href="http://geoportal.gov.pl/" target="_blank">geoportal.gov.pl</a>',
        'showOnlyIfMore' => true,
        'imageMapTypeJS' => 'new google.maps.ImageMapType(new WMSImageMapTypeOptions(
                                        "Orto",
                                        "https://mapy.geoportal.gov.pl/wss/service/img/guest/ORTO/MapServer/WmsServer",
                                        "Raster",
                                        "",
                                        "image/jpeg"))',
    ),
);
$config['mapsConfig'] = $mapsConfig;

$config['FloppSwithedOn'] = true;
$config['garmin-key'] = array('http://opencaching.pl' => '...');

$titled_cache_nr_found=12;
$titled_cache_period_prefix='week';

$config['maps']['cache_page_map']['zoom'] = 9;

// Refactoring emaili (#700)
$subject_prefix_for_site_mails = "OCPL";
$subject_prefix_for_reviewers_mails = "COG";

$config[ 'meritBadges' ] = true;

/** Languages supported by OC node -
  * for those languages translations are supported both in file and db-tables
  * IMPORTANT: use lower letters only! */
$config['supportedLanguages'] = array('pl', 'en', 'nl');

$config['qrCodeUrl'] = 'https://opencaching.pl/viewcache.php?wp=OP0001';

// Fox for issue #1006
$config['downloadMemorylimit'] = 8388608; // 1024 * 1024 * 8

$config['feed']['enabled'] = ['forum'];
$config['feed']['forum']['url'] = 'https://forum.opencaching.pl/app.php/feed/topics_active';

// Minimalny wiek do rejestracji
$config['limits']['minimum_age'] = 16;

// kojoty: display 5 latest geopatch at startPage
$config['startPage']['latestCacheSetsCount'] = 5;
?>
