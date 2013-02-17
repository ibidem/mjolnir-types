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

								'title' => 'Types',

								'introduction' => array
									(
										'type'  => 'markdown',
										'file'  => '-00-Introduction.md',
									),

								'chapters' => array
									(
										'type-traits' => array
											(
												'idx'   => 1,
												'title' => 'Type Traits',
												'file'  => '-01-Type-Traits.md',
												'type'  => 'markdown',
											),
										'generic-types' => array
											(
												'idx'   => 2,
												'title' => 'Generic Types',
												'file'  => '-02-Generic-Types.md',
												'type'  => 'markdown',
											),
										'caching-types' => array
											(
												'idx'   => 3,
												'title' => 'Caching Types',
												'type'  => 'markdown',
												'file'  => '-03-Caching-Types.md',
											),
										'html-types' => array
											(
												'idx'   => 4,
												'title' => 'HTML Types',
												'type'  => 'markdown',
												'file'  => '-04-HTML-Types.md',
											),
										'database-types' => array
											(
												'idx'   => 5,
												'title' => 'Database Types',
												'type'  => 'markdown',
												'file'  => '-05-Database-Types.md',
											),
										'application-types' => array
											(
												'idx'   => 6,
												'title' => 'Application Types',
												'type'  => 'markdown',
												'file'  => '-06-Application-Types.md',
											),
										'view-types' => array
											(
												'idx'   => 7,
												'title' => 'View Types',
												'type'  => 'markdown',
												'file'  => '-07-View-Types.md',
											),
										'misc-types' => array
											(
												'idx'   => 8,
												'title' => 'Miscellaneous Types',
												'file'  => '-08-Miscellaneous-Types.md',
												'type'  => 'markdown',
											),
									)
							),
					),
			)
	);