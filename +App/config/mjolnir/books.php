<?php return array
	(
		'mjolnir' => array
			(
				'sections' => array
					(
						'mjolnir-types' => array
							(
								'idx' => 999,

								// default namespace for following files; may
								// be overwritten on a per file basis
								'namespace' => 'mjolnir\types',

								'title' => 'Common Language Interface',

								'introduction' => array
									(
										'type'  => 'markdown',
										'file'  => '-00-Introduction.md',
									),

								'chapters' => array
									(
										'caching-types' => array
											(
												'idx'   => 1,
												'title' => 'Caching Types',
												'type'  => 'markdown',
												'file'  => '-01-Caching-Types.md',
											),
										'generic-types' => array
											(
												'idx'   => 2,
												'title' => 'Generic Types',
												'file'  => '-02-Generics-Types.md',
												'type'  => 'markdown',
											),
										'document-types' => array
											(
												'idx'   => 3,
												'title' => 'Document Types',
												'file'  => '-03-Document-Types.md',
												'type'  => 'markdown',
											),
										'misc-types' => array
											(
												'idx'   => 4,
												'title' => 'Miscellaneous Types',
												'file'  => '-04-Miscellaneous-Types.md',
												'type'  => 'markdown',
											),
									)
							),
					),
			)
	);