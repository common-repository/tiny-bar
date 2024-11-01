<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
  
/**
* Trait for common data
*/
trait Hmtb_Common {

    protected function load_admin_sidebar() {
		?>
		<div class="hmtb-admin-sidebar" style="width: 277px; float: left;">
			<div class="postbox pro-features">
				<h3 class="hndle"><span>Pro Features</span></h3>
				<div class="inside centered">
					<ul>
						<li>&#10003; Countdown Timer Feature</li>
						<li>&#10003; Button Width Option</li>
						<li>&#10003; Gradient, Image Background Feature</li>
						<li>&#10003; Display Close Icon on Desktop, Mobile etc.</li>
						<li>&#10003; Close Icon Styling Options</li>
						<li>&#10003; Option to Hide Tiny bar on Mobile</li>
						<li>&#10003; Option to Show/Hide Button</li>
						<li>&#10003; Message Alignment Option</li>
						<li>&#10003; Button Border Radius Option</li>
					</ul>
					<p style="margin-bottom: 1px! important;"><a href="https://tinybarwp.com/" target="_blank" class="button button-primary hmtb-button" style="background: #F5653E;">Upgrade Now!</a></p>
				</div>
			</div>
			<div class="postbox">
				<h3 class="hndle"><span>Support / Bug / Customization</span></h3>
				<div class="inside centered">
					<p>Please feel free to let us know if you have any bugs to report. Your report / suggestion can make the plugin awesome!</p>
					<p style="margin-bottom: 1px! important;"><a href="https://tinybarwp.com/" target="_blank" class="button button-primary hmtb-button">Get Support</a></p>
				</div>
			</div>
			<div class="postbox">
				<h3 class="hndle"><span>Follow - Join HM Plugin</span></h3>
				<div class="inside centered">
					<p style="margin-bottom: 1px! important;"><a href='https://wwww.facebook.com/hmplugin' class="button button-info" target="_blank">Join HM Plugin<span class="dashicons dashicons-facebook" style="position: relative; top: 3px; margin-left: 3px; color: #0fb9da;"></span></a></p>
				</div>
				<div class="inside centered">
					<a href="https://twitter.com/hmplugin" target="_blank" class="button button-secondary">Follow @hmplugin<span class="dashicons dashicons-twitter" style="position: relative; top: 3px; margin-left: 3px; color: #0fb9da;"></span></a>
				</div>
				<div class="inside centered">
					<a href="https://www.youtube.com/@hmplugin" target="_blank" class="button button-secondary">Subscribe HM Plugin<span class="dashicons dashicons-youtube" style="position: relative; top: 3px; margin-left: 3px; color: #CC0000;"></span></a>
				</div>
			</div>
		</div> 
		<?php
	}

	protected function build_set_settings_options( $fields, $post ) {

		$this->data = [];

		$i=0;
        foreach ( $fields as $field => $value ) {

            if ( 'string' === $fields[$i]['type'] ) {

                $this->data[$fields[$i]['name']] = isset( $post[$fields[$i]['name']] ) && filter_var( $post[$fields[$i]['name']], FILTER_SANITIZE_STRING ) ? $post[$fields[$i]['name']] : $fields[$i]['default'];

            }
            if ( 'number' === $fields[$i]['type'] ) {

                $this->data[$fields[$i]['name']] = isset( $post[$fields[$i]['name']] ) && filter_var( $post[$fields[$i]['name']], FILTER_SANITIZE_NUMBER_INT ) ? $post[$fields[$i]['name']] : $fields[$i]['default'];

            }
            if ( 'boolean' === $fields[$i]['type'] ) {

                $this->data[$fields[$i]['name']] = isset( $post[$fields[$i]['name']] ) ? $post[$fields[$i]['name']] : $fields[$i]['default'];

            }
            if ( 'text' === $this->fields[$i]['type'] ) {

                $this->data[$this->fields[$i]['name']] = isset( $post[$this->fields[$i]['name']] ) ? sanitize_text_field( $post[$this->fields[$i]['name']] ) : $this->fields[$i]['default'];

            }
			if ( 'textarea' === $this->fields[$i]['type'] ) {
	
				$this->data[$this->fields[$i]['name']] = isset( $post[$this->fields[$i]['name']] ) ? sanitize_textarea_field( $post[$this->fields[$i]['name']] ) : $this->fields[$i]['default'];
	
			}
			if ( 'editor' === $this->fields[$i]['type'] ) {
	
				$this->data[$this->fields[$i]['name']] = isset( $post[$this->fields[$i]['name']] ) ? wp_kses_post( $post[$this->fields[$i]['name']] ) : $this->fields[$i]['default'];
	
			}
			if ( 'multipe_checkbox' === $this->fields[$i]['type'] ) {
	
				$this->data[$this->fields[$i]['name']] = isset( $post[$this->fields[$i]['name']] ) && is_array( $post[$this->fields[$i]['name']] ) ? $this->sanitize( $post[$this->fields[$i]['name']] ) : $this->fields[$i]['default'];
	
			}
            $i++;
        }

		return $this->data;
	}

	protected function build_get_settings_options( $fields, $settings ) {
		
		$this->data = [];
        $i=0;

        foreach ( $fields as $option => $value ) {
            $this->data[$fields[$i]['name']]  = isset( $settings[$fields[$i]['name']] ) ? $settings[$fields[$i]['name']] : $fields[$i]['default'];
            $i++;
        }

		return $this->data;

	}

	public function sanitize( $input ) {

		$new_input = array();
	
		foreach ( $input as $key => $val ) {
			
			$new_input[ $key ] = ( isset( $input[ $key ] ) ) ? sanitize_text_field( $val ) : '';
	
		}
	
		return $new_input;
	
	}
}