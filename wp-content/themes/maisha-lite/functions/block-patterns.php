<?php
/**
 * Maisha: Block Patterns
 *
 * @since Maisha 1.8.6
 */

/**
 * Registers block patterns and categories.
 *
 * @since Maisha 1..8.6
 */
function maisha_register_block_patterns() {
	$block_pattern_categories = array(
		'maisha-blocks'		=> array( 'label' => __( 'Maisha Blocks', 'maisha' ) ),
		'maisha-query'		=> array( 'label' => __( 'Blog Layouts', 'maisha' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since Maisha 1.8.6
	 *
	 * @param array[] $block_pattern_categories {
	 *	 An associative array of block pattern categories, keyed by category name.
	 *
	 *	 @type array[] $properties {
	 *		 An array of block category properties.
	 *
	 *		 @type string $label A human-readable label for the pattern category.
	 *	 }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'maisha_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		register_block_pattern_category( $name, $properties );
	}

	$block_patterns = array(
		'cover-with-call-to-action',
		'cover-page-title',
		'three-column-causes',
		'recent-post-bg-image',
	);

	/**
	 * Filters the theme block patterns.
	 *
	 * @since Maisha 1.8.6
	 *
	 * @param $block_patterns array List of block patterns by name.
	 */
	$block_patterns = apply_filters( 'maisha_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		register_block_pattern(
			'maisha/' . $block_pattern,
			require __DIR__ . '/patterns/' . $block_pattern . '.php'
		);
	}
}
add_action( 'init', 'maisha_register_block_patterns', 9 );
