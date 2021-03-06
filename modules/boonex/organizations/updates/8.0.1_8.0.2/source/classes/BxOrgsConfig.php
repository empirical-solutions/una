<?php defined('BX_DOL') or die('hack attempt');
/**
 * Copyright (c) BoonEx Pty Limited - http://www.boonex.com/
 * CC-BY License - http://creativecommons.org/licenses/by/3.0/
 *
 * @defgroup    Organizations Organizations
 * @ingroup     DolphinModules
 *
 * @{
 */

bx_import('BxBaseModProfileConfig');

class BxOrgsConfig extends BxBaseModProfileConfig
{
    function __construct($aModule)
    {
        parent::__construct($aModule);

        $aMenuItems2Methods = array (
            'view-organization-profile' => 'checkAllowedView',
            'edit-organization-profile' => 'checkAllowedEdit',
            'delete-organization-profile' => 'checkAllowedDelete',
            'profile-friend-add' => 'checkAllowedFriendAdd',
            'profile-friend-remove' => 'checkAllowedFriendRemove',
            'profile-subscribe-add' => 'checkAllowedSubscribeAdd',
            'profile-subscribe-remove' => 'checkAllowedSubscribeRemove',
            'profile-actions-more' => 'checkAllowedViewMoreMenu',
            'profile-set-acl-level' => 'checkAllowedSetMembership',
        );

        $this->CNF = array (

            // database tables
            'TABLE_ENTRIES' => $aModule['db_prefix'] . 'data',

            // database fields
            'FIELD_ID' => 'id',
            'FIELD_AUTHOR' => 'author',
            'FIELD_ADDED' => 'added',
            'FIELD_CHANGED' => 'changed',
            'FIELD_NAME' => 'org_name',
            'FIELD_PICTURE' => 'picture',
            'FIELD_PICTURE_PREVIEW' => 'picture_preview',
            'FIELD_COVER' => 'cover',
            'FIELD_COVER_PREVIEW' => 'cover_preview',
            'FIELDS_QUICK_SEARCH' => array('org_name'),

            // page URIs
            'URI_VIEW_ENTRY' => 'view-organization-profile',
            'URI_EDIT_ENTRY' => 'edit-organization-profile',
            'URI_EDIT_COVER' => 'edit-organization-cover',
        	'URI_MANAGE_COMMON' => 'organizations-manage',

            'URL_HOME' => 'page.php?i=organizations-home',
        	'URL_MANAGE_COMMON' => 'page.php?i=organizations-manage',
        	'URL_MANAGE_MODERATION' => 'page.php?i=organizations-moderation',
        	'URL_MANAGE_ADMINISTRATION' => 'page.php?i=organizations-administration',

            // some params
            'PARAM_AUTOAPPROVAL' => 'bx_organizations_autoapproval',
            'PARAM_DEFAULT_ACL_LEVEL' => 'bx_organizations_default_acl_level',
            'PARAM_NUM_RSS' => 'bx_organizations_num_rss',
            'PARAM_NUM_CONNECTIONS_QUICK' => 'bx_organizations_num_connections_quick',

            // objects
            'OBJECT_STORAGE' => 'bx_organizations_pics',
            'OBJECT_STORAGE_COVER' => 'bx_organizations_pics',
            'OBJECT_IMAGES_TRANSCODER_THUMB' => 'bx_organizations_thumb',
            'OBJECT_IMAGES_TRANSCODER_ICON' => 'bx_organizations_icon',
            'OBJECT_IMAGES_TRANSCODER_AVATAR' => 'bx_organizations_avatar',
            'OBJECT_IMAGES_TRANSCODER_PICTURE' => 'bx_organizations_picture',
            'OBJECT_IMAGES_TRANSCODER_COVER' => 'bx_organizations_cover',
            'OBJECT_IMAGES_TRANSCODER_COVER_THUMB' => 'bx_organizations_cover_thumb',
            'OBJECT_VIEWS' => 'bx_organizations',
            'OBJECT_FORM_ENTRY' => 'bx_organization',
            'OBJECT_FORM_ENTRY_DISPLAY_VIEW' => 'bx_organization_view',
            'OBJECT_FORM_ENTRY_DISPLAY_ADD' => 'bx_organization_add',
            'OBJECT_FORM_ENTRY_DISPLAY_EDIT' => 'bx_organization_edit',
            'OBJECT_FORM_ENTRY_DISPLAY_EDIT_COVER' => 'bx_organization_edit_cover',
            'OBJECT_FORM_ENTRY_DISPLAY_DELETE' => 'bx_organization_delete',
            'OBJECT_MENU_ACTIONS_VIEW_ENTRY' => 'bx_organizations_view_actions', // actions menu on view entry page
            'OBJECT_MENU_ACTIONS_VIEW_ENTRY_MORE' => 'bx_organizations_view_actions_more', // actions menu on view entry page for "more" popup
            'OBJECT_MENU_SUBMENU' => 'bx_organizations_submenu', // main module submenu
            'OBJECT_MENU_SUBMENU_VIEW_ENTRY' => 'bx_organizations_view_submenu',  // view entry submenu
            'OBJECT_MENU_SUBMENU_VIEW_ENTRY_MAIN_SELECTION' => 'organizations-home', // first item in view entry submenu from main module submenu
            'OBJECT_MENU_MANAGE_TOOLS' => 'bx_organizations_menu_manage_tools', //manage menu in content administration tools
            'OBJECT_GRID_ADMINISTRATION' => 'bx_organizations_administration',
        	'OBJECT_GRID_MODERATION' => 'bx_organizations_moderation',
        	'OBJECT_GRID_COMMON' => 'bx_organizations_common',

            // menu items which visibility depends on custom visibility checking
            'MENU_ITEM_TO_METHOD' => array (
                'bx_organizations_view_actions' => $aMenuItems2Methods,
                'bx_organizations_view_actions_more' => $aMenuItems2Methods,
            ),

            // informer messages
            'INFORMERS' => array (
                'status' => array (
                    'name' => 'bx-organizations-status-not-active',
                    'map' => array (
                        BX_PROFILE_STATUS_PENDING => '_bx_orgs_txt_account_pending',
                        BX_PROFILE_STATUS_SUSPENDED => '_bx_orgs_txt_account_suspended',
                    ),
                ),
            ),

            // some language keys
            'T' => array (
                'txt_sample_single' => '_bx_orgs_txt_sample_single',
                'menu_item_title_befriend_sent' => '_bx_orgs_menu_item_title_befriend_sent',
                'menu_item_title_unfriend_cancel_request' => '_bx_orgs_menu_item_title_unfriend_cancel_request',
                'menu_item_title_befriend_confirm' => '_bx_orgs_menu_item_title_befriend_confirm',
                'menu_item_title_unfriend_reject_request' => '_bx_orgs_menu_item_title_unfriend_reject_request',
                'menu_item_title_befriend' => '_bx_orgs_menu_item_title_befriend',
                'menu_item_title_unfriend' => '_bx_orgs_menu_item_title_unfriend',
            	'grid_action_err_delete' => '_bx_orgs_grid_action_err_delete',
				'filter_item_active' => '_bx_orgs_grid_filter_item_title_adm_active',
            	'filter_item_pending' => '_bx_orgs_grid_filter_item_title_adm_pending',
            	'filter_item_suspended' => '_bx_orgs_grid_filter_item_title_adm_suspended',
            	'filter_item_select_one_filter1' => '_bx_orgs_grid_filter_item_title_adm_select_one_filter1',
            	'menu_item_manage_my' => '_bx_orgs_menu_item_title_manage_my',
            	'menu_item_manage_all' => '_bx_orgs_menu_item_title_manage_all',
            ),

        );

        $this->_aJsClass = array(
        	'manage_tools' => 'BxOrgsManageTools'
        );

        $this->_aJsObjects = array(
        	'manage_tools' => 'oBxOrgsManageTools'
        );

        $this->_aGridObjects = array(
        	'common' => $this->CNF['OBJECT_GRID_COMMON'],
        	'moderation' => $this->CNF['OBJECT_GRID_MODERATION'],
        	'administration' => $this->CNF['OBJECT_GRID_ADMINISTRATION'],
        	
        );
    }

}

/** @} */
