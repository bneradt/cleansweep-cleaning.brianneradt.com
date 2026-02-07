<?php
if ( class_exists( 'WP_Customize_Panel' ) ) {
	class PE_WP_Customize_Panel extends WP_Customize_Panel {
		public $panel;
		public $type = 'pe_panel';
		public function json() {
			$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
			$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content'] = $this->get_content();
			$array['active'] = $this->active();
			$array['instanceNumber'] = $this->instance_number;
			return $array;
		}
	}
}
if ( class_exists( 'WP_Customize_Section' ) ) {
	class PE_WP_Customize_Section extends WP_Customize_Section {
	public $section;
	public $type = 'pe_section';
		public function json() {
			$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
			$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content'] = $this->get_content();
			$array['active'] = $this->active();
			$array['instanceNumber'] = $this->instance_number;
			if ( $this->panel ) {
				$array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
			} else {
				$array['customizeAction'] = 'Customizing';
			}
			return $array;
		}
	}
	
}
if ( class_exists( 'WP_Customize_Control' ) ) {
	class Customizer_Toggle_Control extends \WP_Customize_Control {
		public $type = 'toggle';

		/**
		 * Render the control's content.
		 *
		 * @author soderlind
		 * @version 1.2.0
		 */
		public function render_content() {
			?>
			
			<span class="customize-inside-control-row toggle-checkbox">
				<input id="_customize-input-<?php echo esc_html( $this->id ); ?>" type="checkbox" value="<?php echo esc_attr( $this->value() ); ?>" <?php
											$this->link();
											checked( $this->value() );
											?>>
				<label for="_customize-input-<?php echo esc_html( $this->id ); ?>"><span class="cb_toggle"></span><?php echo esc_html( $this->label ); ?></label>
			</span>
			<?php if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif; ?>
			<?php
		}
	}
}
// Enqueue our scripts and styles
function pe_customize_controls_scripts() {
	wp_enqueue_script( 'pe-customize-controls', get_theme_file_uri( '/library/customizer/panels/assets/js/pe-customize-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'pe_customize_controls_scripts' );

function pe_customize_controls_styles() {
	wp_enqueue_style( 'pe-customize-controls', get_theme_file_uri( '/library/customizer/panels/assets/css/pe-customize-controls.css' ), array(), '1.0' );
}
add_action( 'customize_controls_print_styles', 'pe_customize_controls_styles' );

function pe_customize_register( $wp_customize ) {
	$wp_customize->register_panel_type( 'PE_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'PE_WP_Customize_Section' );
}
add_action( 'customize_register', 'pe_customize_register' );