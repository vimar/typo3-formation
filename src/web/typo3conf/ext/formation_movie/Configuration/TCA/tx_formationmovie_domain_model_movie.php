<?php
return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:formation_movie/Resources/Private/Language/locallang_db.xlf:tx_formationmovie_domain_model_movie',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,release_date,story_line,poster,genres,actors,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('formation_movie') . 'Resources/Public/Icons/tx_formationmovie_domain_model_movie.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, release_date, story_line, poster, genres, actors',
	),
	'types' => array(
		'1' => array('showitem' => 'mount_pid_ol,sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, title;mon titre, release_date, story_line, poster, --div--;Relations, genres, actors, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, --palette--;palette;1, hidden'),
	),
	'palettes' => array(
		'1' => array('showitem' => 'starttime, endtime'),
	),
	'columns' => array(
		'mount_pid_ol' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.mount_pid_ol',
			'config' => array(
				'type' => 'radio',
				'items' => array(
					array(
						'LLL:EXT:cms/locallang_tca.xlf:pages.mount_pid_ol.I.0',
						0
					),
					array(
						'LLL:EXT:cms/locallang_tca.xlf:pages.mount_pid_ol.I.1',
						1
					)
				)
			)
		),
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_formationmovie_domain_model_movie',
				'foreign_table_where' => 'AND tx_formationmovie_domain_model_movie.pid=###CURRENT_PID### AND tx_formationmovie_domain_model_movie.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:formation_movie/Resources/Private/Language/locallang_db.xlf:tx_formationmovie_domain_model_movie.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'release_date' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:formation_movie/Resources/Private/Language/locallang_db.xlf:tx_formationmovie_domain_model_movie.release_date',
			'config' => array(
				'type' => 'input',
				'size' => 7,
				'eval' => 'date',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'story_line' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:formation_movie/Resources/Private/Language/locallang_db.xlf:tx_formationmovie_domain_model_movie.story_line',
			'config' => array(
				'type' => 'text',
				'rows' => 10,
				'eval' => 'trim'
			),
		),
		'poster' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:formation_movie/Resources/Private/Language/locallang_db.xlf:tx_formationmovie_domain_model_movie.poster',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'poster',
				array(
					'appearance' => array(
						'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
					),
					'foreign_types' => array(
						'0' => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						)
					),
					'maxitems' => 1
				),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'genres' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:formation_movie/Resources/Private/Language/locallang_db.xlf:tx_formationmovie_domain_model_movie.genres',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_formationmovie_domain_model_genre',
				'foreign_field' => 'movie',
				'maxitems' => 9999,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),

		),
		'actors' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:formation_movie/Resources/Private/Language/locallang_db.xlf:tx_formationmovie_domain_model_movie.actors',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectCheckBox',
				'foreign_table' => 'tx_formationmovie_domain_model_actor',
				'MM' => 'tx_formationmovie_movie_actor_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 1,
				'multiple' => 0,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => array(
						'module' => array(
							'name' => 'wizard_edit',
						),
						'type' => 'popup',
						'title' => 'Edit',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
						),
					/*'add' => Array(
						'module' => array(
							'name' => 'wizard_add',
						),
						'type' => 'script',
						'title' => 'Create new',
						'icon' => 'add.gif',
						'params' => array(
							'table' => 'tx_formationmovie_domain_model_actor',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						),
					),*/
				),
			),
		),
		
	),
);