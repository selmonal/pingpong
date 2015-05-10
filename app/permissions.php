<?php

if (Auth::check())
{
    try
    {
        Trusty::registerPermissions();
    }
    catch (PDOException $e)
    {
        //
    }

    Trusty::when(['admin/tours', 'admin/tours/*'], 'manage_tours');
    Trusty::when(['admin/tour_categories', 'admin/tour_categories/*'], 'manage_tour_categories');
    Trusty::when(['admin/settings/file_editor', 'admin/file_editor/*'], 'manage_setting_files');
    
}