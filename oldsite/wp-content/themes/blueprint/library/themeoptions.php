<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
class BlueprintSettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'blueprint_theme_menu' ) );
        add_action( 'admin_init', array( $this, 'blueprint_settings_init' ) );
    }

    /**
     * Add options page
     */
    public function blueprint_theme_menu()
    {
        // This page will be under "Settings"
        add_submenu_page(
			'options.php',
            'Blueprint Theme Options', 
            'Blueprint Options', 
            'manage_options', 
            'bp_admin_options', 
            array( $this, 'blueprint_settings_page' )
        );
    }

    /**
     * Options page callback
     */
    public function blueprint_settings_page()
    {
        // Set class property
        $this->options = get_theme_mods();
        ?>
		<style>
		
			.mt-pi-contain h1 {
				background: #00bfb3;
				padding: 20px;
				font-weight: 900;
				color: #fff;
				letter-spacing: 1px;
			}
			.mt-pi-contain h2 {
				font-weight: 900;
			}
			div#wpfooter,div#wpfooter a {
				color: #fff;
			}
			.mt-pi-contain {
				border: 1px solid #ccc;
				border-radius: 12px;
				background: #ffffff;
				box-shadow: 11px 11px 17px #b8b8b8, -11px -11px 17px #ffffff;
				margin-bottom: 3em;
			}
			.mt-pi-contain:before, .mt-pi-contain:after,
			.usage:before, .usage:after {
				display:table;
				content:'';
				clear:both;
			}
			.usage {
				margin: 1.5em;
				box-shadow: 11px 11px 17px #b8b8b8, -11px -11px 17px #fbfbfb;
				border-radius: 7px;
				padding: 0em 1em;
				background: #fbfbfb;
			}
			.mt-pi-contain select,
			.mt-pi-contain input[type=text],
			.mt-pi-contain input[type=number] {
				height: 45px;
				margin:5px 0;
			}
			form {
				padding: 15px;
			}
			select#post_type {
				text-transform: capitalize;
			}
			.theme_mods_output p {
				margin: 0 0 2px;
			}

		</style>
        <div class="wrap">
		
			<div class="mt-pi-contain" >
				<h1 class="">Blueprint Options</h1>

				<form method="post" action="options.php">
				<?php
					// This prints out all hidden setting fields
					settings_fields( 'blueprint_options_group' );
					do_settings_sections( 'blueprint_options' );;
					submit_button();
				?>
			
				</form>
				<div class="theme_mods_output" style="padding:15px;">
				<?php 
					
					echo '<h2>Theme Data</h2>';
						foreach($this->options as $key => $value){
							if (  is_array($value) ) {
								echo '<p>' . $key . ': ';
								foreach ($value as $innerkey => $innervalue) {
									
									echo '<p>&emsp;&emsp;[' . $innerkey . '] => ' . htmlspecialchars($innervalue) . '</p>';
								}
								
							} else {
								echo '<p>[' . $key . '] => ' . htmlspecialchars($value) . '</p>';
							}
							
							
						}

				?>
				</div>
			</div>
		</div>

        <?php
    }

    /**
     * Register and add settings
     */
    public function blueprint_settings_init()
    {
        register_setting(
            'blueprint_options_group', // Option group
            'theme_mods_blueprint', // Option name
			array($this, 'sanitize_theme_data'), // Sanitize
        );

        add_settings_section(
            'options_section_id', // ID
            'Options', // Title
            array( $this, 'print_section_info' ), // Callback
            'blueprint_options' // Page
        );
		add_settings_field(
            'blueprint_type', // ID
            'Blueprint Type', // Title 
            array( $this, 'bp_type_callback' ), // Callback
            'blueprint_options', // Page
            'options_section_id', // Section
			array( 'class' => 'blueprint_type' ) // Args
        );
		add_settings_field(
            'videobanner', // ID
            'Banner Options', // Title
            array( $this, 'blueprint_banner_callback' ), // Callback
            'blueprint_options', // Page
            'options_section_id', // Section
			array( 'class' => 'videobanner' ) // Args
        );
		add_settings_field(
            'thememaxwidth', // ID
            'Theme Max-Width', // Title
            array( $this, 'blueprint_width_callback' ), // Callback
            'blueprint_options', // Page
            'options_section_id', // Section
			array( 'class' => 'thememaxwidth' ) // Args
        );
        add_settings_field(
            'blueprint_analytics', // ID
            'Google Analytics', // Title
            array( $this, 'blueprint_analytics_callback' ), // Callback
            'blueprint_options', // Page
            'options_section_id', // Section
			array( 'class' => 'blueprint_analytics' ) // Args
        );
		add_settings_field(
            'blueprint_header_scripts', // ID
            'Additional Header Scripts', // Title
            array( $this, 'blueprint_header_scripts_callback' ), // Callback
            'blueprint_options', // Page
            'options_section_id', // Section
			array( 'class' => 'blueprint_header_scripts' ) // Args
        );
		add_settings_field(
            'blueprint_footer_scripts', // ID
            'Additional Footer Scripts', // Title
            array( $this, 'blueprint_footer_scripts_callback' ), // Callback
            'blueprint_options', // Page
            'options_section_id', // Section
			array( 'class' => 'blueprint_footer_scripts' ) // Args
        );
		add_settings_field(
            'blueprint_cpt', // ID
            'Custom Post Type', // Title
            array( $this, 'blueprint_cpt_callback' ), // Callback
            'blueprint_options', // Page
            'options_section_id', // Section
			array( 'class' => 'blueprint_cpt' ) // Args
        );

    }

    /**
     * Sanitize each setting field as needed
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize_theme_data( $input ) {

        $new_input = get_theme_mods();
		
        $new_input['basic-or-advanced'] = $input['basic-or-advanced'];
	
        $new_input['enable_video_banner'] = $input['enable_video_banner'] ?? 0;
		
		$new_input['enable_slider'] = $input['enable_slider'] ?? 0;
		
		$new_input['blueprint-max-width'] = $input['blueprint-max-width'] ?? 1140;
		
        if( isset( $input['google-analytics-code'] ) )
            $new_input['google-analytics-code'] = $input['google-analytics-code'] ;
		
		if( isset( $input['additional-header-scripts'] ) )
            $new_input['additional-header-scripts'] = $input['additional-header-scripts'] ;
		
		if( isset( $input['additional-footer-scripts'] ) )
            $new_input['additional-footer-scripts'] = $input['additional-footer-scripts'] ;
		
		$new_input['add_cpt'] = $input['add_cpt'] ?? 0;
		
		if( isset( $input['post-type-name'] ) )
            $new_input['post-type-name'] = sanitize_text_field( $input['post-type-name'] );
		
		if( isset( $input['post-type-name-single'] ) )
            $new_input['post-type-name-single'] = sanitize_text_field( $input['post-type-name-single'] );
		
		if( isset( $input['post-type-slug'] ) )
            $new_input['post-type-slug'] = sanitize_text_field( $input['post-type-slug'] );
	
        return $new_input;
    }

    public function print_section_info() {
        print 'Warning: Only change settings on this page if you know what you are doing!';
    }

	public function bp_type_callback() {
	
		$items = array(
			array('basic', 'Basic'),
			array('advanced', 'Advanced'),
			array('realestate', 'Real Estate')
		);
		
		echo '<select id="blueprint_type" name="theme_mods_blueprint[basic-or-advanced]">';

		foreach($items as $item) {
			$type = $this->options['basic-or-advanced'] ?? array('basic','Basic');
			
			$selected = ( $type == $item[0]) ? 'selected="selected"' : '';
			
			echo '<option value="'.$item[0].'" '.$selected.'>'.$item[1].'</option>';
		}

		echo '</select>';
	}
	
	public function blueprint_banner_callback() {

		if(!empty($this->options['enable_video_banner'])) { $checked = ' checked="checked" '; } else {$checked = '';}
		echo '<input type="checkbox" id="enable_video_banner" name="theme_mods_blueprint[enable_video_banner]" value="1" '.$checked.'> <span style="font-size: 0.85em;">Check this box to enable the video banner for the Basic Blueprint</span><br/>';
		
		if(!empty($this->options['enable_slider'])) { $checked = ' checked="checked" '; } else {$checked = '';}
		echo '<input type="checkbox" id="enable_slider" name="theme_mods_blueprint[enable_slider]" value="1" '.$checked.'> <span style="font-size: 0.85em;">Check this box to enable the slider banner for the Basic Blueprint</span>';
		
    }
	public function blueprint_width_callback() {
		printf(
		 '<input type="number" id="blueprint-max-width" name="theme_mods_blueprint[blueprint-max-width]" value="%s" /><span style="font-size: 0.85em;"> px</span>',
            isset( $this->options['blueprint-max-width'] ) ? esc_attr( $this->options['blueprint-max-width']) : '1140'
		);
	}
    public function blueprint_analytics_callback() {
        printf(
            '<textarea id="blueprint_analytics" name="theme_mods_blueprint[google-analytics-code]" value="" rows="3" cols="100" placeholder="">%s</textarea>',
            isset( $this->options['google-analytics-code'] ) ? esc_attr( $this->options['google-analytics-code']) : ''
        );
    }
	
	public function blueprint_header_scripts_callback() {
        printf(
            '<textarea id="additional-header-scripts" name="theme_mods_blueprint[additional-header-scripts]" value="" rows="3" cols="100" placeholder="">%s</textarea>',
            isset( $this->options['additional-header-scripts'] ) ? esc_attr( $this->options['additional-header-scripts']) : ''
        );
    }
	
	public function blueprint_footer_scripts_callback() {
        printf(
            '<textarea id="additional-footer-scripts" name="theme_mods_blueprint[additional-footer-scripts]" value="" rows="3" cols="100" placeholder="">%s</textarea>',
            isset( $this->options['additional-footer-scripts'] ) ? esc_attr( $this->options['additional-footer-scripts']) : ''
        );
    }
	public function blueprint_cpt_callback() {
		if(!empty($this->options['add_cpt'])) { $checked = ' checked="checked" '; } else {$checked = '';}
		echo '<input type="checkbox" id="add_cpt" name="theme_mods_blueprint[add_cpt]" value="1" '.$checked.'> <span style="font-size: 0.85em;">Enable theme custom post type</span><br/>';

		printf(
		 '<label style="font-size: 0.85em;"><input type="text" id="post-type-name" name="theme_mods_blueprint[post-type-name]" value="%s" /> Post Type Name (Plural)</label><br/>',
            isset( $this->options['post-type-name'] ) ? esc_attr( $this->options['post-type-name']) : ''
		);

		printf(
		 '<label style="font-size: 0.85em;"><input type="text" id="post-type-name-single" name="theme_mods_blueprint[post-type-name-single]" value="%s" /> Post Type Name (Singular)</label><br/>',
            isset( $this->options['post-type-name-single'] ) ? esc_attr( $this->options['post-type-name-single']) : ''
		);

		printf(
		 '<label style="font-size: 0.85em;"><input type="text" id="post-type-slug" name="theme_mods_blueprint[post-type-slug]" value="%s" /> Post Type Slug</label>',
            isset( $this->options['post-type-slug'] ) ? esc_attr( $this->options['post-type-slug']) : ''
		);
	}
}
global $pagenow;
if( is_admin() && ($pagenow != 'nav-menus.php' ) && ( !is_customize_preview() ) ) {
   $theme_bp_settings_page = new BlueprintSettingsPage();
}