<?php if (!defined('PmWiki')) exit();

//
// For the original 'simple' skin:
//   Copyright (C) Julian I. Kamil <julian.kamil@gmail.com>
//   No warranty is provided.  Use at your own risk.

// For the original 'not2simple' skin:
//   Copyright (C) Yusdi Santoso <yusdi dot spam at hotmail dot com  -- remove dot spam>
//   No warranty is provided.  Use at your own risk.

//
// Name: skeletonjs.php
// Author: Srikanth Nori <srikanthnv dot spam at gmail dot com  -- remove dot spam>
// Created: 2013-18-02
// Description:
//     This is a modification of not2simple skin for PmWiki, which itself is a modification of notsosimple.
//
// History:
//     --SIMPLE SKIN--
//     2005-05-18  jik  Created.
//     2005-06-21  jik  Replaced GNU copyright statement
//                      with the instruction on how to set
//                      the copyright notice.
//     2005/06/27  jik  Added SkinTone feature.
//     2005/07/08  jik  Fixed the editor text area so it won't
//                      go over the browser's width in Safari.
//     2005/07/14  jik  Fixed to use FarmD in file inclusion.
//     2005/09/14  jik  Removed the realm authentication for
//                      logout action.
//
//     --NOT SO SIMPLE SKIN--
//     2005-11-02  ksc  Removed edit section - it was causing problems
//                      with PostIts and SectionEdit
//     2005-11-02  ksc  Set default header to Red
//
//     --NOT 2 SIMPLE SKIN--
//     2007-17-07  ys   Take as it is
//
//     --SKELETONJS SKIN--
//     2013-18-02  sn   The rabbithole has gone way too deep at this point.
//

global $EnableUpload, $SkinUploadLink, $ScriptUrl;

if ($EnableUpload == 1) {
    $SkinUploadLink =
        "<li><a href='$ScriptUrl/$pagename?action=upload' title='Upload a file' rel='nofollow' >Upload</a></li>";
}

global $SkinMenuBarVisible, $EnableMenuBar;

if ($EnableMenuBar == 1) { $SkinMenuBarVisible = "style=\"display: block;\""; }
else { $SkinMenuBarVisible = "style=\"display: none;\""; }

global $DefaultPage, $ScriptUrl, $SkinHomeLink, $WikiTitle;

if ($pagename == '' || $pagename == $DefaultPage) { $SkinHomeLink = "$WikiTitle"; }
else { $SkinHomeLink = "<a href='\$ScriptUrl'>$WikiTitle</a>"; }

global $ScriptUrl, $SkinGroupFmt;

$test_array = explode('.',$pagename);

if (
    $pagename == ''
    || $pagename == 'Main.HomePage'
    || $test_array['0'] == $test_array['1']
    ) {
    $SkinGroupFmt = "\$Groupspaced";
}
else {
    $SkinGroupFmt = "<a href='\$ScriptUrl/\$Group' title='\$Groupspaced \$[Home]'>\$Groupspaced</a>";
}


global $SkinTitleFmt;

if (in_array(@$_GET['action'], array('edit', 'upload', 'diff'))) { $SkinTitleFmt = "<a href='\$PageUrl'>\$Titlespaced</a>"; }
else { $SkinTitleFmt = "\$Titlespaced"; }

global $SkinHideSide, $SkinWideBody,  $SkinHideLoc;

if (in_array(@$_GET['action'], array('edit', 'diff'))) {
    $SkinHideSide = "style='display:none;'";
    $SkinWideBody = "style='width:744px;'";
}

if (@$_GET['action'] == 'edit') {
    $SkinHideLoc = "style='display:none;'";
}

global $PageEditFmt, $Author;

include_once("$FarmD/scripts/author.php");


if (@$_SERVER['REMOTE_USER']) {
    $SaveButton = "<input type='submit' name='post' class='butn' value=' Save ' />";
    $AuthorBox = '';
}
elseif (empty($Author)) {
    $SaveButton = '';
    $AuthorBox = "$[Author]: <input type='text' name='author' class='authtxt' value='\$Author' />";
}
else {
    $SaveButton = "
<input type='submit' name='post' class='butn' value=' Save ' />
<big><sup>
    <input type='checkbox' name='diffclass' value='minor' \$DiffClassMinor />Minor edit
</sup></big>
";
    $AuthorBox = "Author: <input type='text' name='author' class='authtxt' value='\$Author' />";
}



global $SkinCopyright;

if (empty($SkinCopyright)) {
    $SkinCopyright = <<< EOT
<span id='copy' title='Copyright notice'>
    Set $SkinCopyright in config.php to your own copyright notice
</span>
EOT;
}

global $SkinPoweredBy;

if (empty($SkinPoweredBy)) {
    $SkinPoweredBy = <<< EOT
<span id='sitepoweredby' title='Powered by PmWiki'>
    Powered by <a href='http://www.pmwiki.org' title='PmWiki Home'>PmWiki</a>
</span>
EOT;
}

global $SkinTone;

if (empty($SkinTone)) { $SkinTone = "Red"; }

?>
