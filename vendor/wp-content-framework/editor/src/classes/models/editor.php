<?php
/**
 * WP_Framework_Editor Classes Models Editor
 *
 * @author Technote
 * @copyright Technote All Rights Reserved
 * @license http://www.opensource.org/licenses/gpl-2.0.php GNU General Public License, version 2
 * @link https://technote.space
 */

namespace WP_Framework_Editor\Classes\Models;

use WP_Framework_Core\Traits\Hook;
use WP_Framework_Core\Traits\Singleton;
use WP_Framework_Editor\Traits\Package;
use Technote\GutenbergPackages;

if ( ! defined( 'WP_CONTENT_FRAMEWORK' ) ) {
	exit;
}

/**
 * Class Editor
 * @package WP_Framework_Editor\Classes\Models
 */
class Editor implements \WP_Framework_Core\Interfaces\Singleton, \WP_Framework_Core\Interfaces\Hook {

	use Singleton, Hook, Package;

	/** @var GutenbergPackages $package_helper */
	private $package_helper;

	/**
	 * @return bool
	 */
	protected static function is_shared_class() {
		return true;
	}

	/**
	 * @return bool
	 */
	public function is_valid_tinymce_color_picker() {
		return $this->compare_wp_version( '4.0.0', '>=' );
	}

	/**
	 * @return bool
	 */
	public function is_block_editor() {
		return $this->get_packages_helper()->is_block_editor();
	}

	/**
	 * @return array
	 */
	public function get_editor_package_versions() {
		return $this->get_packages_helper()->get_editor_package_versions();
	}

	/**
	 * @return array
	 */
	public function get_wp_core_package_versions() {
		return $this->get_packages_helper()->get_wp_core_package_versions();
	}

	/**
	 * @return array|false
	 */
	public function get_gutenberg_package_versions() {
		return $this->get_packages_helper()->get_gutenberg_package_versions();
	}

	/**
	 * @param string $package
	 *
	 * @return string|false
	 */
	public function get_editor_package_version( $package ) {
		return $this->get_packages_helper()->get_editor_package_version( $package );
	}

	/**
	 * @param string $package
	 *
	 * @return bool
	 */
	public function is_support_editor_package( $package ) {
		return $this->get_packages_helper()->is_support_editor_package( $package );
	}

	/**
	 * @param array $packages
	 * @param array $merge
	 *
	 * @return array
	 */
	public function filter_packages( array $packages, array $merge = [] ) {
		return $this->get_packages_helper()->filter_packages( $packages, $merge );
	}

	/**
	 * @param array $packages
	 *
	 * @return array
	 */
	public function fill_package_versions( array $packages ) {
		return $this->get_packages_helper()->fill_package_versions( $packages );
	}

	/**
	 * @return GutenbergPackages
	 */
	public function get_packages_helper() {
		if ( ! isset( $this->package_helper ) ) {
			$this->package_helper = new GutenbergPackages();
		}

		return $this->package_helper;
	}
}
