<?php
/**
 * Sanitize integers
 * @since 1.0.8
 */
function generate_sanitize_integer( $input ) {
	return absint( $input );
}

/**
 * Sanitize checkbox values
 * @since 1.0.8
 */
function generate_sanitize_checkbox( $input ) {
	if ( $input ) {
		$output = '1';
	} else {
		$output = false;
	}
	return $output;
}

/**
 * Sanitize header layout
 * @since 1.0.8
 */
function generate_sanitize_header_layout( $input ) {
    $valid = array(
        'fluid-header' => __( 'Fluid / Full Width', 'generate' ),
		'contained-header' => __( 'Contained', 'generate' )
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return 'fluid-header';
    }
}

/**
 * Sanitize navigation layout
 * @since 1.0.8
 */
function generate_sanitize_nav_layout( $input ) {
    $valid = array(
        'fluid-nav' => __( 'Fluid / Full Width', 'generate' ),
		'contained-nav' => __( 'Contained', 'generate' )
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return 'fluid-nav';
    }
}

/**
 * Sanitize navigation alignment
 * @since 1.1.1
 */
function generate_sanitize_alignment( $input ) {
    $valid = array(
        'left' => __( 'Left', 'generate' ),
		'center' => __( 'Center', 'generate' ),
		'right' => __( 'Right', 'generate' )
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return 'left';
    }
}

/**
 * Sanitize navigation alignment
 * @since 1.1.1
 */
function generate_sanitize_nav_search( $input ) {
    $valid = array(
        'enable' => __( 'Enabled', 'generate' ),
		'disable' => __( 'Disabled', 'generate' )
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return 'disable';
    }
}

/**
 * Sanitize navigation position
 * @since 1.0.8
 */
function generate_sanitize_nav_position( $input ) {
    $valid = array(
        'nav-below-header' => __( 'Below Header', 'generate' ),
		'nav-above-header' => __( 'Above Header', 'generate' ),
		'nav-float-right' => __( 'Float Right', 'generate' ),
		'nav-left-sidebar' => __( 'Left Sidebar', 'generate' ),
		'nav-right-sidebar' => __( 'Right Sidebar', 'generate' ),
		'' => __( 'No Navigation', 'generate' )
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * Sanitize content layout
 * @since 1.0.8
 */
function generate_sanitize_content_layout( $input ) {
    $valid = array(
        'separate-containers' => __( 'Separate Containers', 'generate' ),
		'one-container' => __( 'One Container', 'generate' )
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return 'separate-containers';
    }
}

/**
 * Sanitize sidebar layout
 * @since 1.0.8
 */
function generate_sanitize_sidebar_layout( $input ) {
    $valid = array(
        'left-sidebar' => __( 'Sidebar / Content', 'generate' ),
		'right-sidebar' => __( 'Content / Sidebar', 'generate' ),
		'no-sidebar' => __( 'Content (no sidebars)', 'generate' ),
		'both-sidebars' => __( 'Sidebar / Content / Sidebar', 'generate' ),
		'both-left' => __( 'Sidebar / Sidebar / Content', 'generate' ),
		'both-right' => __( 'Content / Sidebar / Sidebar', 'generate' )
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return 'right-sidebar';
    }
}

/**
 * Sanitize footer layout
 * @since 1.0.8
 */
function generate_sanitize_footer_layout( $input ) {
    $valid = array(
        'fluid-footer' => __( 'Fluid / Full Width', 'generate' ),
		'contained-footer' => __( 'Contained', 'generate' )
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return 'fluid-footer';
    }
}

/**
 * Sanitize footer widgets
 * @since 1.0.8
 */
function generate_sanitize_footer_widgets( $input ) {
    $valid = array(
        '0' => '0',
		'1' => '1',
		'2' => '2',
		'3' => '3',
		'4' => '4',
		'5' => '5'
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '3';
    }
}

/**
 * Sanitize blog excerpt
 * @since 1.0.8
 */
function generate_sanitize_blog_excerpt( $input ) {
    $valid = array(
        'full' => __( 'Show full post', 'generate' ),
		'excerpt' => __( 'Show excerpt', 'generate' )
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return 'full';
    }
}