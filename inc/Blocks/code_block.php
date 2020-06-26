<?php

namespace Kamal\CodeSnippet\Blocks;
use Carbon_Fields\Block;
use Carbon_Fields\Field;

class Code_block {
    public function __construct() {
        add_action( 'carbon_fields_register_fields', [$this, 'newBlock'] );
    }

    public function newBlock() {
        Block::make( __( 'Code Snippet', 'code-snippet' ) )
            ->set_category( "formatting" )
            ->set_icon( "media-code" )
            ->add_fields( [
                Field::make( 'textarea', 'code_snipprt', __( 'Code', 'code-snippet' ) ),
                Field::make( 'select', 'select_lang', __( 'Select Language', 'code-snippet' ) )
                    ->set_options( array(
                        'html'       => 'HTML',
                        'css'        => 'CSS',
                        'php'        => 'PHP',
                        'javascript' => 'Javascript',
                        'python'     => 'Python',
                    ) ),
            ] )
            ->set_render_callback( function ( $code ) {
                ?>
                    <pre>
                        <code class="rainbow-braces language-<?php echo $code['select_lang']; ?>">
                            <?php echo $code['code_snipprt']; ?>
                        </code>
                    </pre>
                <?php
} );
    }
}