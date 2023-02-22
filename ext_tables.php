<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('cc_image', 'Configuration/TypoScript', 'CC Image Fluid');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('cc_image', 'Configuration/TypoScript/News', 'CC Image News');

        $imagefile_ext = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],true);
        if (!in_array('webp', $imagefile_ext)) $imagefile_ext[] = 'webp';
        $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'] = implode(',',$imagefile_ext);

        $mediafile_ext = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $GLOBALS['TYPO3_CONF_VARS']['SYS']['mediafile_ext'],true);
        if (!in_array('webp', $mediafile_ext)) $mediafile_ext[] = 'webp';
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['mediafile_ext'] = implode(',',$mediafile_ext);
    }
);
