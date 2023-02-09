<?php 

spl_autoload_register(function ($class_name) {

    //prefix for plugin namespace 
    $prefix = 'BdevsElement\\';
    $widget_prefix = 'BdevsElement\Widget\\';
    //$filepath = '';

    //get length from namespace
    $len = strlen($prefix);

    //compare namespace exists in class name
    if (strncmp($prefix, $class_name, $len) !== 0) {
        // exist from next registered autoloader
        return;
    }

    //get the relative class name
    $relative_class = substr($class_name, $len);
    $widget_class = explode("\\", $relative_class);


    //replace the namespace prefix with the base directory, replace namespace
    //separators with directory separators in the relative class name
    if( 'Helper' === $relative_class ) {
        $file     = strtolower($relative_class);
        $path     = BDEVSEL_DIR_PATH . 'includes/';
        $filepath = $path . $file . '.php';
    }
    elseif ( 'BDevs_El' === substr( end($widget_class), 0, 8 ) ) {
        $class_name = end( $widget_class );
        $file     = str_replace( '_', '-', strtolower( $class_name ) );
        $path     = BDEVSEL_DIR_PATH . 'classes/';
        $filepath = $path . $file . '.php';
    }
    elseif( in_array( 'Widget', $widget_class ) ) {
        $class_name = end( $widget_class );
        $file     = str_replace( '_', '-', strtolower( $class_name ) );
        $path     = BDEVSEL_DIR_PATH . 'widgets/';
        $filepath = $path . $file .'/'. $file .'-widget.php';
    }

    // if the file exists, require it
    if (file_exists($filepath)) {
        require_once $filepath;
    }

});