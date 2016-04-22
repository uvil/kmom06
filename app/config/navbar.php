<?php
/**
 * Config-file for navigation bar.
 *
 */
return [

    // Use for styling the menu
    'class' => 'uvnavbar',
 
    // Here comes the menu strcture
    'items' => [

        // This is a menu item
        'home'  => [
            'text'  => 'Home',
            'url'   => $this->di->get('url')->create(''),
            'title' => 'Home route of current frontcontroller'
        ],
        
        

        // This is a menu item
        'code' => [
            'text'  =>'Scource',
            'url'   => $this->di->get('url')->create('source'),
            'title' => 'Internal route within this frontcontroller'
        ],
        
        // This is a menu item
        'user_info' => [
            'text'  =>'User info',
            'url'   => $this->di->get('url')->create('user_info'),
            'title' => 'Internal route within this frontcontroller'
        ],
        
        // This is a menu item
        'login' => [
            'text'  =>'Login',
            'url'   => $this->di->get('url')->create('loginform'),
            'title' => 'Internal route within this frontcontroller'
        ],
        
        // This is a menu item
        'logout' => [
            'text'  =>'Logout',
            'url'   => $this->di->get('url')->create('logout'),
            'title' => 'Internal route within this frontcontroller'
        ],
        
        
        // This is a menu item
        'reports' => [
            'text'  =>'Reports',
            'url'   => $this->di->get('url')->create('redovisning'),
            'title' => 'Internal route within this frontcontroller'
        ],
        
       
    ],
 


    /**
     * Callback tracing the current selected menu item base on scriptname
     *
     */
    'callback' => function ($url) {
        if ($url == $this->di->get('request')->getCurrentUrl(false)) {
            return true;
        }
    },



    /**
     * Callback to check if current page is a decendant of the menuitem, this check applies for those
     * menuitems that has the setting 'mark-if-parent' set to true.
     *
     */
    'is_parent' => function ($parent) {
        $route = $this->di->get('request')->getRoute();
        return !substr_compare($parent, $route, 0, strlen($parent));
    },



   /**
     * Callback to create the url, if needed, else comment out.
     *
     */
   /*
    'create_url' => function ($url) {
        return $this->di->get('url')->create($url);
    },
    */
];
