<?php
/**
 * Created by PhpStorm.
 * User: Shramee Srivastav <shramee.srivastav@gmail.com>
 * Date: 27/4/15
 * Time: 5:36 PM
 */


/**
 * Storefront_Lines_And_Circles_Public Class
 *
 * @class Storefront_Lines_And_Circles_Public
 * @version	1.0.0
 * @since 1.0.0
 * @package	Storefront_Lines_And_Circles
 */
final class Storefront_Lines_And_Circles_Public extends Storefront_Lines_And_Circles_Abstract {

	private $phone_menu_items = array();

	/**
	 * Called by parent::__construct
	 * Do initialization here
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function init(){

		//Add plugin classes to body
		add_filter( 'body_class', array( $this, 'body_class' ) );

		//Sample : Adjusts the layout
		add_action( 'wp', array( $this, 'init_plugin' ), 999 );

	}

	/**
	 * Enqueue CSS and custom styles.
	 * @since   1.0.0
	 * @return  void
	 */
	public function styles() {
		wp_enqueue_script( 'sflnc-js', $this->plugin_url . '/assets/js/front-end.js', array( 'jquery' ) );
		wp_enqueue_style( 'sflnc-styles', $this->plugin_url . '/assets/css/style.css' );

		//Add custom css here
		$css = '';

		wp_add_inline_style( 'sflnc-styles', $css );
	}

	/**
	 * Storefront Lines And Circles Body Class
	 * Adds a class based on the extension name and any relevant settings.
	 */
	public function body_class( $classes ) {
		$classes[] = 'storefront-lines-and-circles-active';

		return $classes;
	}

	/**
	 * Sample
	 * Adjusts the default Storefront layout when the plugin is active
	 */
	public function init_plugin() {
		//Enqueue scripts and styles
		add_action( 'wp_enqueue_scripts', array( $this, 'styles' ), 999 );

		$show_on_home	= $this->get( 'home' );

		if ( $show_on_home && is_front_page() ) {
			add_action( 'storefront_before_content', array( $this, 'makesite_home_animation' ) );
		}
	}

	function makesite_home_animation() {
		$data = $this->makesite_home_animation_data();
		?>
		<div class="dnl-anm-screen bg-down">
			<div class='dnl-anm-wrap'>
				<?php
				$data = array_reverse( $data );
				$html = '';
				$total = count( $data );
				foreach ( $data as $id => $point ) {
					$html = $this->makesite_home_animation_slide( $id, $point, $html, $total );
				}
				echo "<div class='dnl-anm-iwrap'>$html<div class='line-reference' style='visibility: hidden;'></div></div>";
				?>
			</div>
		</div>
		<?php
	}

	function makesite_home_animation_data() {

		$data = array();
		for ( $i = 1; $i < 5; $i++ ) {
			$img = $this->get( "data-$i-img" );
			if ( ! empty( $img ) ) {
				$head = $this->get( "data-$i-head" );
				$desc = $this->get( "data-$i-desc" );
				$data[] = array(
					'img'  => $img,
					'head' => $head,
					'desc' => $desc,
				);
			}
		}

		$data[] = array(
			'content' => '<a class="lovely-scroll-down x2 flashing" href="javascript:void(0)">Scroll</a>',
			'desc'	=> 'Scroll Down',
			'head'	=> '',
			'class'	=> 'scroll-down',
		);

		return $data;
	}

	function makesite_home_animation_slide( $id, $point, $html, $total ) {
		$id    = $total - $id;

		$point = array_merge( array( 'img'   => '', 'head'  => '', 'desc'  => '', 'class' => '', ), $point );

		if ( empty( $point['content'] ) ) {
			if ( $point['img'] ) {
				$point['content'] = "<img src='$point[img]'>";
			} else {
				return $html;
			}
		}
		return "<div class='$point[class] line line$id'><div class='point_wrap point_wrap$id'><div class='point point$id'>$point[content]</div><div class='info'><h4>$point[head]</h4><p>$point[desc]</p></div></div>$html</div>";
	}
} // End class