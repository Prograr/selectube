<?php

/**
 * Dailymotion Helper
 * 
 * @author Maxslayer44
 * @package cake
 * @subpackage cake.app.views.helpers
 */
App::import('Helper', 'Html');

class DailymotionHelper extends Helper {

    /**
     * Options par défauts
     * 
     * @var array
     * @access public
     */
    var $defaultOptions = array(
        'width' => 624,
        'height' => 369,
        'allowFullScreen' => true,
        'allowScriptAccess' => 'always'
    );

    /**
     * Renvoie le code pour afficher la vidéo
     * 
     * @param $id
     * @return unknown_type
     */
    function embed($id, $options = null) {
// Fusionne les options
        $options = (!empty($options)) ? array_merge($this->defaultOptions, $options) : $options = $this->defaultOptions;

// Transforme la boolean en string
        $options['allowFullScreen'] = ($options['allowFullScreen']) ? 'true' : 'false';

        return $this->output('
<div>
<object type="application/x-shockwave-flash" width="' . $options['width'] . '" height="' . $options['height'] . '" data="http://www.dailymotion.com/swf/video/' . $id . '&v3=1&related=1">
<param name="movie" value="http://www.dailymotion.com/swf/video/' . $id . '&v3=1&related=1" />
<param name="allowFullScreen" value="' . $options['allowFullScreen'] . '" />
<param name="allowScriptAccess" value="' . $options['allowScriptAccess'] . '" />
<param name="wmode" value="transparent" />
</object>
<!--[if lte IE 6 ]>
<embed src="http://www.dailymotion.com/swf/video/' . $id . '&v3=1&related=1" type="application/x-shockwave-flash" width="' . $options['width'] . '" height="' . $options['height'] . '" allowFullScreen="' . $options['allowFullScreen'] . '" allowScriptAccess="' . $options['allowScriptAccess'] . '" wmode="transparent"></embed>
<![endif]-->
</div>');
    }

}

?>