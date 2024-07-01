<?php
/**
 * Plugin Name: Google SEO Mastermind - SEO Plugin
 * Plugin URI: https://www.facebook.com/groups/368478557332648
 * Description: Your one-stop plugin for elevating search engine rankings, driving traffic, and boosting conversions with streamlined on-page optimization tools and automatic sitemap updates!
 * Version: 1.0
 * Author: Google SEO Mastermind
 * Author URI: https://servicelifter.com
 * License: GPL2
 */

// Schedule sitemap generation every 2 hours
function custom_sitemap_activation() {
    if (!wp_next_scheduled('custom_sitemap_event')) {
        wp_schedule_event(time(), 'every_two_hours', 'custom_sitemap_event');
    }
}
register_activation_hook(__FILE__, 'custom_sitemap_activation');

// Remove scheduled event when the plugin is deactivated
function custom_sitemap_deactivation() {
    wp_clear_scheduled_hook('custom_sitemap_event');
}
register_deactivation_hook(__FILE__, 'custom_sitemap_deactivation');

// Sitemap generation function
function custom_sitemap_generator() {
    // Check if an XML file already exists and remove it
    $sitemap_path = ABSPATH . 'sitemap.xml';
    if (file_exists($sitemap_path)) {
        unlink($sitemap_path);
    }

    // Open the XML file for writing
    $xml_file = fopen($sitemap_path, 'w');

    // Write the XML header
    $xml_header = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $xml_header .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
    fwrite($xml_file, $xml_header);

    // Generate URLs for posts, pages, categories, and authors
    $post_types = array('post', 'page');
    $taxonomies = array('category', 'author');

    foreach ($post_types as $post_type) {
        $args = array(
            'post_type' => $post_type,
            'post_status' => 'publish',
            'posts_per_page' => -1,
        );
        $posts = get_posts($args);

        foreach ($posts as $post) {
            $noindex = get_post_meta($post->ID, '_custom_noindex', true);
            if (!$noindex) {
                $url = get_permalink($post);
                $date = get_the_date('Y-m-d\TH:i:sP', $post);
                custom_sitemap_add_url($xml_file, $url, $date);
            }
        }
    }

    foreach ($taxonomies as $taxonomy) {
        $terms = get_terms($taxonomy);

        foreach ($terms as $term) {
            $noindex = get_term_meta($term->term_id, '_custom_noindex', true);
            if (!$noindex) {
                $url = get_term_link($term);
                custom_sitemap_add_url($xml_file, $url);
            }
        }
    }

    // Write the closing tag and close the file
    fwrite($xml_file, '</urlset>');
    fclose($xml_file);
}

// Helper function to add URLs to the sitemap
function custom_sitemap_add_url($xml_file, $url, $lastmod = '') {
    $url_entry = '  <url>' . "\n";
    $url_entry .= '    <loc>' . htmlspecialchars((string)$url) . '</loc>' . "\n";
    if (!empty($lastmod)) {
        $url_entry .= '    <lastmod>' . $lastmod . '</lastmod>' . "\n";
    }
    $url_entry .= '  </url>' . "\n";

    fwrite($xml_file, $url_entry);
}

// Hook the sitemap generation function to the scheduled event
add_action('custom_sitemap_event', 'custom_sitemap_generator');

// Custom Meta Title and Description
function custom_meta_box() {
    // Define the post types that the meta box will be added to
    $screens = array('post', 'page');
    
    // Add the meta box
    add_meta_box(
        'custom_meta_box_id',
        'Custom Meta Settings',
        'custom_meta_box_callback',
        $screens
    );
}
// Hook the function to the 'add_meta_boxes' action
add_action('add_meta_boxes', 'custom_meta_box');

// The callback function for the custom meta box
function custom_meta_box_callback($post) {
    // Add nonce for security
    wp_nonce_field('custom_meta_box_nonce_action', 'custom_meta_box_nonce');

    // Retrieve and store existing metadata
    $meta_title = get_post_meta($post->ID, '_custom_meta_title', true);
    $meta_description = get_post_meta($post->ID, '_custom_meta_description', true);
    $noindex = get_post_meta($post->ID, '_custom_noindex', true);
    $nofollow = get_post_meta($post->ID, '_custom_nofollow', true);
    $schema = get_post_meta($post->ID, '_custom_schema', true);
    $link_counts = custom_count_links($post->ID);
    $target_keyword = get_post_meta($post->ID, '_custom_target_keyword', true);
    $meta_og_image = get_post_meta($post->ID, '_custom_meta_og_image', true);

    // Create the HTML form elements for the meta box
    $html_element = '<label for="custom_meta_title">Meta Title:</label>' .
        '<input type="text" id="custom_meta_title" name="custom_meta_title" value="' . esc_attr($meta_title) . '" placeholder="Enter your Meta Title here..." />' .
        '<label for="custom_meta_description">Meta Description:</label>' .
        '<textarea id="custom_meta_description" name="custom_meta_description" placeholder="Enter your Meta Description here...">' . esc_textarea($meta_description) . '</textarea>' .
        '<label for="custom_schema">Schema (auto wrapped in JSON LD):</label>' .
        '<textarea id="custom_schema" name="custom_schema" placeholder="Enter your Schema here...">' . esc_textarea($schema) . '</textarea>' .
        '<label for="custom_target_keyword">Target Keyword:</label>' .
        '<p>Note: Keyword density has been proven to be an inaccurate metric. Please use it at your own risk!</p>' .
        '<input type="text" id="custom_target_keyword" name="custom_target_keyword" value="' . esc_attr($target_keyword) . '"  placeholder="Enter your Keyword here..." />';

    // Calculate keyword density if target keyword is set
    if (!empty($target_keyword)) {
        $keyword_density = calculate_keyword_density($post->post_content, $target_keyword);
        $html_element .= '<p id="p_density">Keyword Density: ' . $keyword_density . '%</p>';
    }
    
    // Upload Open Graph Image
    $html_element .= '<label for="custom_meta_og_image">Open Graph Image:</label>' .
                '<input type="text" id="custom_meta_og_image" name="custom_meta_og_image" value="' . esc_attr($meta_og_image) . '" placeholder="Enter the Open Graph Image URL here..." />' .
                '<button type="button" style="margin-left: 10px;" class="button" id="custom_meta_og_image_button">Choose Image</button>' .
                '<br><br>';

echo <<<HTML
<script>
function calculateKeywordDensity(content, keyword) {
    keyword = keyword.toLowerCase().trim();
    content = content.toLowerCase().replace(/<\/?[^>]+(>|$)/g, ""); // Strip HTML tags

    const wordCount = content.split(/\s+/).length;
    const keywordCount = content.split(keyword).length - 1;

    if (wordCount === 0) {
        return 0;
    }

    const density = (keywordCount / wordCount) * 100;
    return parseFloat(density.toFixed(2));
}

jQuery(document).ready(function($) {
    var custom_uploader;
    $('#custom_meta_og_image_button').click(function(e) {
        e.preventDefault();
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Open Graph Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            $('#custom_meta_og_image').val(attachment.url);
        });
        custom_uploader.open();
    });

    // Function to update keyword density live
    function updateKeywordDensity() {
        const content = $('#content').val();
        const targetKeyword = $('#custom_target_keyword').val();
        const keywordDensity = calculateKeywordDensity(content, targetKeyword);
        $('#p_density').text('Keyword Density: ' + keywordDensity + '%');
    }

    // Update keyword density when content or target keyword changes
    $('#content, #custom_target_keyword').on('input', updateKeywordDensity);
});
</script>
HTML;

    $html_element .=    '<label>Other SEO Options:</label>' .
                        '<div class="checkboxes">' .
                        '<label for="custom_noindex">' .
                            
                            '<label class="switch">' .
                                '<input type="checkbox" id="custom_noindex" name="custom_noindex"' . checked($noindex, 'yes', false) . '>' .
                                '<span class="slider round"></span>' .
                            '</label>' .
                            '<span>Noindex</span>' .
                        '</label>' .
                        '<label for="custom_nofollow">' .
                            
                            '<label class="switch">' .
                                '<input type="checkbox" id="custom_nofollow" name="custom_nofollow"' . checked($nofollow, 'yes', false) . '>' .
                                '<span class="slider round"></span>' .
                            '</label>' .
                            '<span>Nofollow</span>' .
                        '</label>' .
                    '</div>' .
                    '<label>Link Information:</label>' .
                    '<div>' .
                        '<p>Internal links: ' . $link_counts['internal'] . '</p>' .
                        '<p>External links: ' . $link_counts['external'] . '</p>' .
                    '</div>' .
                '</div>' .
				'<div class="serp-preview">' .
				'<h4>Google SERP Preview:</h4>' .
				'<p class="serp-preview-title">' . (!empty($meta_title) ? esc_html($meta_title) : 'Page Title') . '</p>' .
				'<p class="serp-preview-description">' . (!empty($meta_description) ? esc_html($meta_description) : 'Page description will appear here') . '</p>' .
				'</div>' .
				'</div>'; // Close .custom-meta-box   
    echo $html_element; 
}

// Retrieve link counts for inbound and outbound
function custom_count_links($post_id) {
    $post = get_post($post_id);
    $content = apply_filters('the_content', $post->post_content);
    $home_url = home_url();
    $internal_links = 0;
    $external_links = 0;

    // Check if content is empty and return early if it is
    if (empty($content)) {
        return array(
            'internal' => $internal_links,
            'external' => $external_links,
        );
    }

    $doc = new DOMDocument();
    libxml_use_internal_errors(true);
    $doc->loadHTML($content);
    libxml_clear_errors();

    $links = $doc->getElementsByTagName('a');

    foreach ($links as $link) {
        $href = $link->getAttribute('href');

        if (strpos($href, $home_url) === 0 || strpos($href, '/') === 0) {
            $internal_links++;
        } else {
            $external_links++;
        }
    }

    return array(
        'internal' => $internal_links,
        'external' => $external_links,
    );
}

// Canonicalize each individual post or page
function output_custom_canonical_url() {
    if (is_page() || is_single()) {
        global $post;

        $canonical_url = get_permalink($post->ID);
        if (!empty($canonical_url)) {
            echo '<link rel="canonical" href="' . esc_url($canonical_url) . '">';
        }
    } elseif (is_singular()) {
        global $post;

        $canonical_url = get_permalink($post->ID);
        if (!empty($canonical_url)) {
            echo '<link rel="canonical" href="' . esc_url($canonical_url) . '">';
        }
    } elseif (is_home()) {
        $canonical_url = home_url('/');
        echo '<link rel="canonical" href="' . esc_url($canonical_url) . '">';
    } elseif (is_category() || is_tag() || is_tax()) {
        $term = get_queried_object();
        $canonical_url = get_term_link($term, $term->taxonomy);
        if (!is_wp_error($canonical_url)) {
            echo '<link rel="canonical" href="' . esc_url($canonical_url) . '">';
        }
    } elseif (is_archive()) {
        if (is_date()) {
            if (is_day()) {
                $canonical_url = get_day_link(get_query_var('year'), get_query_var('monthnum'), get_query_var('day'));
            } elseif (is_month()) {
                $canonical_url = get_month_link(get_query_var('year'), get_query_var('monthnum'));
            } elseif (is_year()) {
                $canonical_url = get_year_link(get_query_var('year'));
            }
        } elseif (is_author()) {
            $canonical_url = get_author_posts_url(get_query_var('author'), get_query_var('author_name'));
        } elseif (is_post_type_archive()) {
            $canonical_url = get_post_type_archive_link(get_query_var('post_type'));
        }
        if (!empty($canonical_url)) {
            echo '<link rel="canonical" href="' . esc_url($canonical_url) . '">';
        }
    }
}
add_action('wp_head', 'output_custom_canonical_url', 2);

// Save all custom meta data inputed from above
function save_custom_meta_data($post_id) {
    if (!isset($_POST['custom_meta_box_nonce']) || !wp_verify_nonce($_POST['custom_meta_box_nonce'], 'custom_meta_box_nonce_action')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $meta_title = sanitize_text_field($_POST['custom_meta_title']);
    $meta_description = sanitize_textarea_field($_POST['custom_meta_description']);
    $noindex = isset($_POST['custom_noindex']) && $_POST['custom_noindex'] == 'on' ? 'yes' : 'no';
    $nofollow = isset($_POST['custom_nofollow']) && $_POST['custom_nofollow'] == 'on' ? 'yes' : 'no';
    $schema = sanitize_textarea_field($_POST['custom_schema']);
    $target_keyword = sanitize_text_field($_POST['custom_target_keyword']);
    $meta_og_image = sanitize_text_field($_POST['custom_meta_og_image']);

    update_post_meta($post_id, '_custom_meta_title', $meta_title);
    update_post_meta($post_id, '_custom_meta_description', $meta_description);
    update_post_meta($post_id, '_custom_noindex', $noindex);
    update_post_meta($post_id, '_custom_nofollow', $nofollow);
    update_post_meta($post_id, '_custom_schema', $schema);
    update_post_meta($post_id, '_custom_target_keyword', $target_keyword);
    update_post_meta($post_id, '_custom_meta_og_image', $meta_og_image);

}
add_action('save_post', 'save_custom_meta_data');

// Output custom meta data to the page
function output_custom_meta_data() {
    if (is_page()) {
        global $post;

        $meta_description = get_post_meta($post->ID, '_custom_meta_description', true);
        
        $schema = get_post_meta($post->ID, '_custom_schema', true);

        if (!empty($meta_description)) {
            echo '<meta name="description" content="' . esc_attr($meta_description) . '">';
        }

        if (!empty($schema)) {
            echo '<script type="application/ld+json">' . $schema . '</script>';
        }
    }
}
add_action('wp_head', 'output_custom_meta_data', 1);

// The robots meta tag has a filter hook of its own, and takes an array of directives as parameter.
// I removed the noindex + nofollow from the function above
function modify_robots_meta( $directives ) {
    // Instead of using the global post, best practice would be to use the get_post function, as the global scope might be changed in the future
    $post = get_post();

    // If post is not found, simply return the default
    if ( empty( $post ) ) {
        return $directives;
    }

    $blog_public = (bool) get_option( 'blog_public' );

    // If the website is not public, return the default
    if ( ! $blog_public ) {
        return $directives;
    }

    $noindex = get_post_meta( $post->ID, '_custom_noindex', true );
    $nofollow = get_post_meta( $post->ID, '_custom_nofollow', true );

    // Now, we established that we're in a public post, and want to do our own robots meta. Unset whatever parameters you are modifying
    unset( $directives['noindex'], $directives['nofollow'] );

    // If noindex is set, add it to the directives array
    if ( $noindex === 'yes' ) {
        $directives['noindex'] = true;
    }

    // If nofollow is set, add it to the directives array
    if ( $nofollow === 'yes' ) {
        $directives['nofollow'] = true;
    }
    
    // Always return the directives, no matter the settings
    return $directives;
}
add_filter( 'wp_robots', 'modify_robots_meta' );

// Calculate keyword density output
function calculate_keyword_density($content, $keyword) {
    $keyword = strtolower(trim($keyword));
    $content = strtolower(strip_tags($content));

    $word_count = str_word_count($content);
    $keyword_count = substr_count($content, $keyword);

    if ($word_count == 0) {
        return 0;
    }

    $density = ($keyword_count / $word_count) * 100;

    return round($density, 2);
}

function output_custom_open_graph_image() {
    if (is_page() || is_single()) {
        global $post;

        $og_image_url = get_post_meta($post->ID, '_custom_meta_og_image', true);
        if (!empty($og_image_url)) {
            echo '<meta property="og:image" content="' . esc_url($og_image_url) . '">';
        }
    }
}
add_action('wp_head', 'output_custom_open_graph_image', 1);

// Set custom meta title for document
function custom_document_title($title) {
    if (is_page()) {
        global $post;
        $meta_title = get_post_meta($post->ID, '_custom_meta_title', true);
        if (!empty($meta_title)) {
            $title = esc_html($meta_title);
        }
    }
    return $title;
}
add_filter('pre_get_document_title', 'custom_document_title', 10);
add_action('wp_head', 'output_custom_meta_data', 1);

// Styling CSS and script functions
function custom_sitemap_and_meta_admin_styles() {
    echo '
<style>
	#wpfooter {
		position: static;
	}
	#editor .postbox:last-child > .inside {
		border-top: 1px solid #ddd;
	}
    #custom_meta_box_id > .inside {
        margin: 0;
        padding: 22px;
        background-color: #F0F2F5;
    }
    #custom_meta_box_id > .inside > label {
        margin: 0 0 0 11px;
        line-height: 2.4;
        font-size: 15px;
        font-weight: 600;
    }
    #custom_meta_box_id > .inside > label + p {
        margin: -11px 0 0 11px;
        line-height: 2.4;
        font-size: 12px;
        font-weight: 400;
    }
    #p_density {
        margin: -7px 10px 0 auto;
        text-align: right;
    }
    #custom_meta_box_id > .inside > input,
    #custom_meta_box_id > .inside > textarea {
        margin: -2px 0 11px;
        padding: 11px;
        width: 100%;
        border: none;
        border-radius: 12px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.06);
        font-size: 15px;
    }  
    #custom_meta_box_id > .inside > div {
        display: flex;
        margin: 2px 0 15px 12px;
        gap: 22px;
    }
    #custom_meta_box_id > .inside > div > label {
        align-items: center;
        display: flex;
    }
    #custom_meta_box_id > .inside > div > label > span {
        margin: 0 0 0 8px;
        font-size: 16px;
        font-weight: 400;
    }
    #custom_schema {
    	height: 180px;
    }
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
    }
    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: .4s;
    }
    .slider.round {
        border-radius: 17px;
        z-index: 1;
    }
    .slider.round:before {
        border-radius: 50%;
    }
    input:checked + .slider {
        background-color: #DB3535;
        box-shadow: inset 1px -1px 6px rgba(0, 0, 0, 0.2);
    }
    .checkboxes > label:last-of-type > .switch > input:checked + .slider {
        background-color: #DB3535;
        box-shadow: inset 1px -1px 6px rgba(0, 0, 0, 0.2);
    } 
    input:checked + .slider:before {
        transform: translateX(26px);
        box-shadow: 2px 1px 3px rgba(0,0,0,0.45), inset 0px 0px 0px rgba(0,0,0,0.4);
    }  
    #custom_meta_box_id > .inside > div > p {
        margin: 0;
        font-size: 14px;
        cursor: default;
    }  
    #custom_meta_box_id > .serp-preview {
		padding: 22px;
        background-color: #fff;
		border-top: 1px solid #ddd;
        cursor: default;
    }
    #custom_meta_box_id > .serp-preview > h4 {
        margin: 16px 0 4px;
        color: #70757a;
        font-size: 14px;
        font-weight: 400;
        line-height: 32px;
    }
    #custom_meta_box_id > .serp-preview > .serp-preview-title {
        margin: 5px 0 0;
        max-width: 600px;
		width: 100%;
        color: #1a0dab;
        font-family: Arial,"sans-serif";
        font-size: 20px;
        font-weight: 400;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        cursor: default;
    }
    #custom_meta_box_id > .serp-preview > .serp-preview-description {
		height: 3em;
        margin-top: 2px;
		max-width: 600px;
		width: 100%;
        overflow: hidden;
		color: #4d5156;
		font-family: Arial,"sans-serif";
        font-size: 14px;
		line-height: 1.5em;
        text-overflow: ellipsis;
		display: -webkit-box;
	   	-webkit-box-orient: vertical;
	   	-webkit-line-clamp: 2; /* number of lines to show */
    }
    .checkbox {
    	padding: 10px;
        margin-left:10px;
    }
    .postbox {
        z-index: 1;
    }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var titleInput = document.getElementById("custom_meta_title");
            var descriptionInput = document.getElementById("custom_meta_description");
            var previewTitle = document.querySelector(".serp-preview-title");
            var previewDescription = document.querySelector(".serp-preview-description");

            titleInput.addEventListener("input", function() {
                var titleValue = titleInput.value.trim();
                previewTitle.textContent = titleValue.length > 0 ? titleValue : "Page Title";
            });

            descriptionInput.addEventListener("input", function() {
                var descriptionValue = descriptionInput.value.trim();
                previewDescription.textContent = descriptionValue.length > 0 ? descriptionValue : "Page description will appear here";
            });
        });
    </script>
    ';
}
add_action('admin_head', 'custom_sitemap_and_meta_admin_styles');

function seo_robots_txt_editor_menu() {
    add_menu_page('SEO', 'SEO', 'manage_options', 'seo-robots-txt-editor', 'seo_robots_txt_editor_page', 'dashicons-admin-site-alt3', 100);
}
add_action('admin_menu', 'seo_robots_txt_editor_menu');

function seo_robots_txt_editor_page() {
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }

    $robots_txt_path = ABSPATH . 'robots.txt';
    $robots_txt_content = '';

    if (file_exists($robots_txt_path)) {
        $robots_txt_content = file_get_contents($robots_txt_path);
    }

    if (isset($_POST['submit'])) {
        check_admin_referer('seo-robots-txt-editor-update');
        
        // Additionally to make this more secure, you should do a nonce check to ensure the request actually comes from the form you created
        if ( wp_verify_nonce( $_POST['custom_robots_txt'], 'custom_robots_txt_action' ) ) {
            $updated_content = stripslashes_deep($_POST['robots_txt_content']);
            file_put_contents($robots_txt_path, $updated_content);
            $robots_txt_content = $updated_content;
            echo '<div id="message" class="updated notice is-dismissible"><p>' . __('Robots.txt file updated successfully.', 'seo-robots-txt-editor') . '</p></div>';
        }
    }

    ?>
    <div class="wrap">
        <h1><?php _e('SEO Robots.txt Editor', 'seo-robots-txt-editor'); ?></h1>
		<p>Recommended syntax for Robots.txt is the following:</p>
        <p>User-agent: *<br>
        Disallow: <br>
        Sitemap: https://www.example.com/sitemap.xml</p>
        <form method="post" action="">
            <?php wp_nonce_field('seo-robots-txt-editor-update'); ?>
            <input type="hidden" name="custom_robots_txt" value="<?php echo wp_create_nonce('custom_robots_txt_action'); ?>">
            <table class="form-table">
                <tr>
                    <td style="padding:0px 0px;">
                        <textarea name="robots_txt_content" rows="10" cols="80" class="large-text code"><?php echo esc_textarea($robots_txt_content); ?></textarea>
                    </td>
                </tr>
            </table>

            <p class="submit">
                <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save Changes', 'seo-robots-txt-editor'); ?>">
            </p>
        </form>
    </div>
<div>
<p><strong>Authors:</strong> This plugin was created by Schieler Mew, Daniel Nielson and Kellie Watson of Google SEO Mastermind</p>
</div>
    <?php
}