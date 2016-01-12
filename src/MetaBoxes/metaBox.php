<?php

/*
 * WORDSMITH META BOX CLASS
 *
 * this class is the base object for a custom meta box to be added into wordpress.
 *
 */

namespace nk2580\wordsmith\MetaBoxes;

class MetaBox {

    protected $name;
    protected $post_type;
    protected $title;
    protected $context = 'side';
    protected $priority = 'default';
    
    protected $fields = [
        ['label' => "Exmple Field", 'meta-key' => "example_meta", 'control' => "nk2580\wordsmith\Inputs\Fields\TextField" ],
    ];

    /**
     * Hook into the appropriate actions when the class is constructed.
     */
    public function __construct() {
        $this->init();
    }

    public function init() {
        add_action('add_meta_boxes', array($this, 'add_boxes'));
        add_action('save_post', array($this, 'save'));
    }

    /**
     * Adds the meta box container.
     */
    public function add_boxes() {
        foreach ($this->post_type as $screen) {
            add_meta_box($this->name, $this->title, array($this, 'load_box_content'), $screen, $this->context, $this->priority);
        }
    }

    /**
     * Save the meta when the post is saved.
     *
     * @param int $post_id The ID of the post being saved.
     */
    public function save($post_id) {

        /*
         * We need to verify this came from the our screen and with proper authorization,
         * because save_post can be triggered at other times.
         */

        // Check if our nonce is set.
        if (!isset($_POST['myplugin_inner_custom_box_nonce']))
            return $post_id;

        $nonce = $_POST['myplugin_inner_custom_box_nonce'];

        // Verify that the nonce is valid.
        if (!wp_verify_nonce($nonce, 'myplugin_inner_custom_box'))
            return $post_id;

        // If this is an autosave, our form has not been submitted,
        //     so we don't want to do anything.
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return $post_id;

        // Check the user's permissions.
        if ('page' == $_POST['post_type']) {

            if (!current_user_can('edit_page', $post_id))
                return $post_id;
        } else {

            if (!current_user_can('edit_post', $post_id))
                return $post_id;
        }

        /* OK, its safe for us to save the data now. */

        // Sanitize the user input.
        $mydata = sanitize_text_field($_POST['myplugin_new_field']);

        // Update the meta field.
        update_post_meta($post_id, '_my_meta_value_key', $mydata);
    }

    /**
     * Render Meta Box content.
     *
     * @param WP_Post $post The post object.
     */
    public function content($post) {
        foreach ($this->fields as $field) {
            $control = new $field['control']($field['name'],$field['label']);
            $control->printField();
        }
    }

    /*
     * Add The Box Nonce To The Meta Box
     */

    private function add_nonce() {
        // Add an nonce field so we can check for it later.
        wp_nonce_field($this->name . '_box', $this->name . '_box_nonce');
    }

    /*
     * load the content of the box
     */

    public function load_box_content($post) {
        $this->add_nonce();
        $this->content($post);
    }

}
