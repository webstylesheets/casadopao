<?php

/*
 * Author: Fernando Rodrigues
 * E-mail: fernando.rodrigues@stylesheets.com.br
 */

class CustomOption {

    private $page;
    private $title;
    private $field;
    private $fields = array();
    private $options = array();

    public function __construct($page, $title, $field) {
        $this->page = $page;
        $this->title = $title;
        $this->field = $field;
    }

    public function run() {
        add_action('admin_init', array($this, 'generateFields'));
        add_action('admin_menu', array($this, 'add_plugin_page'));
    }

    public function add_plugin_page() {
        add_menu_page(
                'Settings Admin', $this->title, 'manage_options', $this->page, array($this, 'create_admin_page')
        );
    }

    public function addField($field, $label, $type = "text") {
        $this->fields[] = array("field" => $field, "label" => $label, "type" => $type);
    }

    public static function get_site_meta($field) {
        global $wpdb;
        return $wpdb->get_var($wpdb->prepare("SELECT option_value FROM {$wpdb->options} WHERE option_name = %s", $field));
    }

    public function generateFields() {
        global $wpdb;

        add_settings_section(
                'setting_section_id', '', array($this, 'print_section_info'), $this->page
        );

        foreach ($this->fields as $item) {

            if (filter_input(INPUT_POST, "ac") == $this->page . "_save") {

                $value = stripslashes(filter_input(INPUT_POST, $item["field"]));

                $wpdb->delete(
                        $wpdb->options, array(
                    'option_name' => $item["field"]
                        ), array('%s')
                );

                $wpdb->insert(
                        $wpdb->options, array(
                    'option_name' => $item["field"],
                    'option_value' => $value
                        ), array(
                    '%s',
                    '%s'
                        )
                );
            }

            if ($item["type"] == "text") {
                $callback = "field_text_callback";
            }

            if ($item["type"] == "textarea") {
                $callback = "field_textarea_callback";
            }

            if ($item["type"] == "editor") {
                $callback = "field_editor_callback";
            }

            add_settings_field(
                    $item["field"], $item["label"], array($this, $callback), $this->page, 'setting_section_id', array("field" => $item["field"], "label" => $item["label"])
            );
        }
    }

    public function create_admin_page() {
        foreach ($this->fields as $item) {
            $this->options[$item["field"]] = $this->get_site_meta($item["field"]);
        }
        echo '<div class="wrap">' . screen_icon();
        echo '<h2>' . $this->title . '</h2>';
        echo '<form method="post">';
        echo '<input type="hidden" name="ac" value="' . $this->page . "_save" . '" />';
        do_settings_sections($this->page);
        submit_button();
        echo '</form>';
        echo '</div>';
        echo '<style>p.submit {text-align: right;}</style>';
    }

    public function print_section_info() {
        
    }

    public function field_text_callback(array $args) {
        $value = "";
        if (isset($this->options[$args['field']])) {
            $value = esc_attr($this->options[$args['field']]);
        }
        echo '<input style="width: 100%" class="text" type="text" name="' . $args['field'] . '" value="' . $value . '" />';
    }

    public function field_textarea_callback(array $args) {
        $value = "";
        if (isset($this->options[$args['field']])) {
            $value = esc_attr($this->options[$args['field']]);
        }
        echo '<textarea style="width: 100%" rows="5" name="' . $args['field'] . '">' . $value . '</textarea>';
    }

    public function field_editor_callback(array $args) {
        $content = "";
        if (isset($this->options[$args['field']])) {
            $content = $this->options[$args['field']];
        }
        wp_editor($content, $args['field'], $settings = array());
    }

}
