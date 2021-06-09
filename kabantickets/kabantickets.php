<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
Module Name: Kanban Tickets
Description: Kanban view for tickets
Version: 1.0
Requires at least: 2.3.*
*/

hooks()->add_action('admin_init', 'kabantickets_init_menu_items');

function kabantickets_init_menu_items(){
    if (has_permission('settings','','edit')){
        $CI = &get_instance();

        if (is_admin()){
        $CI->app_menu->add_sidebar_menu_item('kabantickets-menu', [
            'name'     => 'Tickets Kanban', // The name if the item
            'href'     => '/admin/kabantickets/kanban', // URL of the item
            'position' => 2, // The menu position, see below for default positions.
            'icon'     => 'fa fa-columns', // Font awesome icon
        ]);
        }
    }
}



register_activation_hook('kabantickets', 'kabantickets_install');

function kabantickets_install(){
    return false;
}


register_uninstall_hook('kabantickets', 'kabantickets_uninstall');

function kabantickets_uninstall(){
    return false;
}