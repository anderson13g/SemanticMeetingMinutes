<?php
/** 
 * The MeetingMinutes extension provides JS and CSS to enable recording meeting
 * minutes in SMW. See README.md.
 * 
 * Documentation: https://github.com/enterprisemediawiki/SemanticMeetingMinutes
 * Support:       https://github.com/enterprisemediawiki/SemanticMeetingMinutes
 * Source code:   https://github.com/enterprisemediawiki/SemanticMeetingMinutes
 *
 * @file MeetingMinutes.php
 * @addtogroup Extensions
 * @author James Montalvo
 * @copyright © 2014 by James Montalvo
 * @licence GNU GPL v3+
 */

# Not a valid entry point, skip unless MEDIAWIKI is defined
if ( ! defined( 'MEDIAWIKI' ) ) {
	die( 'MeetingMinutes extension' );
}

$GLOBALS['wgExtensionCredits']['semantic'][] = array(
	'path'           => __FILE__,
	'name'           => 'Semantic Meeting Minutes',
	'url'            => 'http://github.com/enterprisemediawiki/SemanticMeetingMinutes',
	'author'         => 'James Montalvo',
	'descriptionmsg' => 'meetingminutes-desc',
	'version'        => '0.1.1'
);

$GLOBALS['wgMessagesDirs']['MeetingMinutes'] = __DIR__ . '/i18n';
$GLOBALS['wgExtensionMessagesFiles']['MeetingMinutesMagic'] = __DIR__ . '/Magic.php';

// Autoload setup class (location of parser function definitions)
$GLOBALS['wgAutoloadClasses']['MeetingMinutes\Setup'] = __DIR__ . '/Setup.php';

// Setup parser functions
$GLOBALS['wgHooks']['ParserFirstCallInit'][] = 'MeetingMinutes\Setup::setupParserFunctions';
// $GLOBALS['wgHooks']['BeforePageDisplay'][] = 'MeetingMinutes\Setup::onBeforePageDisplay';


$ExtensionMeetingMinutesResourceTemplate = array(
	'localBasePath' => __DIR__ . '/modules',
	'remoteExtPath' => 'MeetingMinutes/modules',
);

$GLOBALS['wgResourceModules'] += array(

	'ext.meetingminutes.form' => $ExtensionMeetingMinutesResourceTemplate + array(
		'styles' => 'form/meeting-minutes.css',
		'scripts' => array( 'form/SF_MultipleInstanceRefire.js', 'form/meeting-minutes.js' ),
		// 'dependencies' => array( 'mediawiki.Uri' ),
	),

	'ext.meetingminutes.template' => $ExtensionMeetingMinutesResourceTemplate + array(
		'styles' => 'template/template.css',
	),

);
