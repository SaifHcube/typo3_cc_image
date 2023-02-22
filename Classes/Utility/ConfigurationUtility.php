<?php
namespace CoelnConcept\CcImage\Utility;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2020
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;

/**
 * class providing configuration checks for webp support.
 */
class ConfigurationUtility {

	/**
	 * Checks the support of webp by providing a webp-image.
	 *
	 * @param array $params Field information to be rendered
	 * @param mixed $pObj The calling parent object.
	 * @return array|string array with errorType and HTML or only the HTML as string
	 */
	public function checkWebp(array $params, $pObj) {
		
		include_once(GeneralUtility::getFileAbsFileName('EXT:cc_image/ext_tables.php'));
		
		/** @var \TYPO3\CMS\Core\Resource\ResourceFactory $resourceFactory **/
		$resourceFactory = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Resource\ResourceFactory::class);
		$testfile = $resourceFactory->retrieveFileOrFolderObject('EXT:cc_image/Resources/Public/Images/logo_coelnconcept.png');
		
		if ($testfile) {
			/** @var \TYPO3\CMS\Core\Resource\ProcessedFileRepository $processedFileRepository **/
			$processedFileRepository = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Resource\ProcessedFileRepository::class);
			$processedFiles = $processedFileRepository->findAllByOriginalFile($testfile);
			foreach ($processedFiles as $processedFile) {
				$processedFile->delete();
			}
		}
		
		$viewRootPath = GeneralUtility::getFileAbsFileName('EXT:cc_image/Resources/Private/Backend/');
		/** @var StandaloneView::class $view **/
		$view = GeneralUtility::makeInstance(StandaloneView::class);
		$view->setTemplatePathAndFilename($viewRootPath . 'Templates/CheckWebp.html');
		$view->setLayoutRootPaths([$viewRootPath . 'Layouts/']);
		$view->setPartialRootPaths([$viewRootPath . 'Partials/']);
		
		return $view->render();
	}
}
