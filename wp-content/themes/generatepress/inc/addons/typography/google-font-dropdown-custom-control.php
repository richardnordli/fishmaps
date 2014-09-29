<?php

if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

/**
 * A class to create a dropdown for all google fonts
 */
if ( ! class_exists( 'Generate_Google_Font_Dropdown_Custom_Control' ) ) :
class Generate_Google_Font_Dropdown_Custom_Control extends WP_Customize_Control
{
    private $fonts = false;

    public function __construct($manager, $id, $args = array(), $options = array())
    {
        parent::__construct( $manager, $id, $args );
    }

    /**
     * Render the content of the category dropdown
     *
     * @return HTML
     */
    public function render_content()
    {
		$fonts = ( get_transient('generate_get_fonts') ? get_transient('generate_get_fonts') : '' );
		
        if(!empty($fonts))
        {
            ?>
                <label>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <select <?php $this->link(); ?>>
						<?php 
						printf('<option value="%s" %s>%s</option>', 'inherit', selected($this->value(), 'inherit', false), 'inherit');
						printf('<option value="%s" %s>%s</option>', 'Arial, Helvetica, sans-serif', selected($this->value(), 'Arial, Helvetica, sans-serif', false), 'Arial, Helvetica, sans-serif');
						printf('<option value="%s" %s>%s</option>', 'Verdana, Geneva, sans-serif', selected($this->value(), 'Verdana, Geneva, sans-serif', false), 'Verdana, Geneva, sans-serif');
						printf('<option value="%s" %s>%s</option>', 'Tahoma, Geneva, sans-serif', selected($this->value(), 'Tahoma, Geneva, sans-serif', false), 'Tahoma, Geneva, sans-serif');
						printf('<option value="%s" %s>%s</option>', 'Georgia, Times New Roman, Times, serif', selected($this->value(), 'Georgia, Times New Roman, Times, serif', false), 'Georgia, Times New Roman, Times, serif');
						printf('<option value="%s" %s>%s</option>', 'Trebuchet MS, Helvetica, sans-serif', selected($this->value(), 'Trebuchet MS, Helvetica, sans-serif', false), 'Trebuchet MS, Helvetica, sans-serif');
						
                        foreach ( $fonts as $k => $fam )
                        {
							$var = join(',', $fam->variants);
							printf('<option value="%s" %s>%s</option>', $fam->family . ':' . $var, selected($this->value(), $fam->family . ':' . $var, false), $fam->family);
                        }
                        ?>
                    </select>
					<p class="description"><?php _e('Font family','generate'); ?></p>
                </label>
            <?php
        }
    }
    
}
endif;

if ( ! class_exists( 'Generate_Font_Weight_Custom_Control' ) ) :
/**
 * A class to create a dropdown for font weight
 */
class Generate_Font_Weight_Custom_Control extends WP_Customize_Control
{

    public function __construct($manager, $id, $args = array(), $options = array())
    {
        parent::__construct( $manager, $id, $args );
    }

    /**
     * Render the content of the category dropdown
     *
     * @return HTML
     */
    public function render_content()
    {
        ?>
        <label>
			<select <?php $this->link(); ?>>
				<?php 
				printf('<option value="%s" %s>%s</option>', 'normal', selected($this->value(), 'normal', false), 'normal');
				printf('<option value="%s" %s>%s</option>', 'bold', selected($this->value(), 'bold', false), 'bold');
				printf('<option value="%s" %s>%s</option>', '100', selected($this->value(), '100', false), '100');
				printf('<option value="%s" %s>%s</option>', '200', selected($this->value(), '200', false), '200');
				printf('<option value="%s" %s>%s</option>', '300', selected($this->value(), '300', false), '300');
				printf('<option value="%s" %s>%s</option>', '400', selected($this->value(), '400', false), '400');
				printf('<option value="%s" %s>%s</option>', '500', selected($this->value(), '500', false), '500');
				printf('<option value="%s" %s>%s</option>', '600', selected($this->value(), '600', false), '600');
				printf('<option value="%s" %s>%s</option>', '700', selected($this->value(), '700', false), '700');
				printf('<option value="%s" %s>%s</option>', '800', selected($this->value(), '800', false), '800');
				printf('<option value="%s" %s>%s</option>', '900', selected($this->value(), '900', false), '900');	
				?>
            </select>
			<p class="description"><?php echo esc_html( $this->label ); ?></p>
        </label>
        <?php
    }
}
endif;

if ( ! class_exists( 'Generate_Text_Transform_Custom_Control' ) ) :
/**
 * A class to create a dropdown for text-transform
 */
class Generate_Text_Transform_Custom_Control extends WP_Customize_Control
{

    public function __construct($manager, $id, $args = array(), $options = array())
    {
        parent::__construct( $manager, $id, $args );
    }

    /**
     * Render the content of the category dropdown
     *
     * @return HTML
     */
    public function render_content()
    {
        ?>
        <label>
			<select <?php $this->link(); ?>>
				<?php 
				printf('<option value="%s" %s>%s</option>', 'none', selected($this->value(), 'none', false), 'none');
				printf('<option value="%s" %s>%s</option>', 'capitalize', selected($this->value(), 'capitalize', false), 'capitalize');
				printf('<option value="%s" %s>%s</option>', 'uppercase', selected($this->value(), 'uppercase', false), 'uppercase');
				printf('<option value="%s" %s>%s</option>', 'lowercase', selected($this->value(), 'lowercase', false), 'lowercase');
				?>
            </select>
			<p class="description"><?php echo esc_html( $this->label ); ?></p>
        </label>
        <?php
    }
}
endif;

/***********************
/*
/*	Generate_Customize_Slider_Control
/* 
/***********************/
if ( !class_exists('Generate_Customize_Slider_Control') ) :
	class Generate_Customize_Slider_Control extends WP_Customize_Control
	{
		// Setup control type
		public $type = 'slider';
		
		public function __construct($manager, $id, $args = array(), $options = array())
		{
			parent::__construct( $manager, $id, $args );
		}

		// Override content render function to output slider HTML
		public function render_content()
		{ ?>
			<input name="<?php echo $this->id; ?>" type="text" <?php $this->link(); ?> value="<?php echo $this->value(); ?>" style="display:none" />
			<div class="slider"></div>
			<p class="description"><?php echo esc_html( $this->label ); ?> - <strong class="value"><?php echo $this->value(); ?></strong>px</p>
		<?php
		}
		
	}
endif;