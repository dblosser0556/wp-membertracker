<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/dblosser0556
 * @since      1.0.0
 *
 * @package    Wp_Mbp
 * @subpackage Wp_Mbp/admin/partials
 */
?>

<?php

if (!current_user_can('manage_options')) {
    wp_die();
}

# $this->cleanUpReservations();

if (isset($_POST['id']) && isset($_POST['delete'])) {
    $this->deleteMemberByID($_POST['id']);
    $message = "Deleted Member";
}

$members = $this->getMemberList();

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">
    <h1 class="wp-heading-inline"><?=__('Member List', 'wp-mbp');?></h1>
    <hr class="wp-header-end">
    <?php if (isset($message)) {?>
    <div id="message" class="updated notice is-dismissible">
        <p><?=$message?></p>
        <button type="button" class="notice-dismiss"></button>
    </div>
    <?php
}?>
    <table class="wp-list-table widefat fixed striped posts">
        <thead>
            <tr>
                <th class="manage-column column-title column-primary"><?=__('Family Name', 'wp-mbp');?></th>
                <th class="manage-column column-title column-primary"><?=__('Primary Member', 'wp-mbp');?></th>
                <th class="manage-column column-title column-primary"><?=__('Type', 'wp-mbp');?></th>
                <th class="manage-column column-title column-primary"><?=__('Join Date', 'wp-mbp');?></th>
                <th class="manage-column column-title column-primary"><?=__('Status', 'wp-mbp');?></th>
                <th class="manage-column column-title"><?=__('Update', 'wp-mbp');?></th>
                <th class="manage-column column-title"><?=__('Delete', 'wp-mbp');?></th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < sizeof($members); $i++) {
    $item = $members[$i];?>
            <tr>
                <td><?=$item->familyname?></td>
                <td><?=$item->membername?></td>
                <td><?=$item->type?></td>
                <td>
                    <?=date_i18n(get_option('date_format'), strtotime($item->joindate))?>
                </td>
                <td>
                    <?=$item->status?>
                </td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?=$item->id?>" />
                        <input class="button" type="submit" name="update" value=<?=__('Update', 'wp-mbp');?> />
                    </form>
                </td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?=$item->id?>" />
                        <input class="button" type="submit" name="delete" value=<?=__('Delete', 'wp-mbp');?> />
                    </form>
                </td>
            </tr>
            <?php
}?>
        </tbody>
    </table>
    <p></p>
</div>