<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://github.com/dblosser0556
 * @since      1.0.0
 *
 * @package    Wp_Mbp
 * @subpackage Wp_Mbp/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Wp_Mbp
 * @subpackage Wp_Mbp/includes
 * @author     David L Blosser <blosserdl@gmail.com>
 */
class Wp_Mbp_Deactivator
{

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function deactivate()
    {

        global $wpdb;
        // dependents table
        $table_name = $wpdb->prefix . 'wp-mbp_member_dependents';
        $sql = "DROP TABLE IF EXISTS $table_name";
        $wpdb->query($sql);

        // memberlist table
        $table_name = $wpdb->prefix . 'wp-mbp_memberlist';
        $sql = "DROP TABLE IF EXISTS $table_name";
        $wpdb->query($sql);

        // dependents table
        $table_name = $wpdb->prefix . 'wp-mbp_membership_types';
        $sql = "DROP TABLE IF EXISTS $table_name";
        $wpdb->query($sql);

    }

}
