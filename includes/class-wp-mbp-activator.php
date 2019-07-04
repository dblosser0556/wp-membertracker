<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/dblosser0556
 * @since      1.0.0
 *
 * @package    Wp_Mbp
 * @subpackage Wp_Mbp/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wp_Mbp
 * @subpackage Wp_Mbp/includes
 * @author     David L Blosser <blosserdl@gmail.com>
 */
class Wp_Mbp_Activator
{

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function activate()
    {

        // create tables
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();

        if (!function_exists('dbDelta')) {
            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        }

        // family table
        $table_membership_types = $wpdb->prefix . 'wp-mbp_member_types';
        $sql = "CREATE TABLE $table_membership_types (
						id mediumint(9) NOT NULL AUTO_INCREMENT,
						name varchar(255) NULL,
						UNIQUE KEY id (id)
					) $charset_collate;";
        dbDelta($sql);

        // memberlist table
        $table_memberlist = $wpdb->prefix . 'wp-mbp_memberlist';
        $sql = "CREATE TABLE $table_memberlist (
					id mediumint(9) NOT NULL AUTO_INCREMENT,
					familyname varchar(255) NOT NULL,
					membername varchar(255) NOT NULL,
					address1 varchar(255) NOT NULL,
					address2 varchar(255) NOT NULL,
					city varchar(255) NOT NULL,
					state varchar(255) NOT NULL,
					zipcode varchar(11) NOT NULL,
					homephone varchar(10),
					cellphone varchar(10),
					employer varchar(255),
					email varchar(255),
					membername2 varchar(255) NOT NULL,
					address3 varchar(255) NOT NULL,
					address4 varchar(255) NOT NULL,
					city2 varchar(255) NOT NULL,
					state2 varchar(255) NOT NULL,
					zipcode2 varchar(11) NOT NULL,
					homephone2 varchar(10),
					cellphone2 varchar(10),
					employer2 varchar(255),
					email2 varchar(255),
					joindate datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
					membershipTypeId mediumint(9),
					status tinyint(1) DEFAULT 0 NOT NULL,
					FOREIGN KEY (membershipTypeId) REFERENCES {$table_membership_types}(id) ON DELETE CASCADE,
					UNIQUE KEY id (id)
				) $charset_collate;";
        dbDelta($sql);

        // family table
        $table_dependents = $wpdb->prefix . 'wp-mbp_member_dependents';
        $sql = "CREATE TABLE $table_dependents (
					id mediumint(9) NOT NULL AUTO_INCREMENT,
					memberid mediumint(9) NOT NULL,
					name varchar(255) NULL,
					relationship varchar(255) NOT NULL,
					age varchar(255) NOT NULL,
					sex varchar(1) NOT NULL
					FOREIGN KEY (memberid) REFERENCES {$table_memberlist}(id) ON DELETE CASCADE,
					UNIQUE KEY id (id)
				) $charset_collate;";
        dbDelta($sql);

    }

}
