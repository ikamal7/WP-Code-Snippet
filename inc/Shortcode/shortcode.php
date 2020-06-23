<?php

namespace Kamal\CodeSnippet\Shortcode;

class Shortcode {
    public function __construct() {
        add_shortcode( 'cs', [$this, 'cs_shortcode_tags'] );
    }

    
    

    public function cs_shortcode_tags( $atts, $content = null ) {
            extract(
                shortcode_atts([
                    'lang' => 'html'
                ], $atts)
            );
            ob_start();
        ?>
            <pre>
                <code class="language-<?php echo esc_attr($lang); ?>"><?php echo $content; ?></code>
            </pre>

        <?php

       
        return ob_get_clean();
    }
}