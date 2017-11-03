<?php namespace Plugin\Modules;

defined('ABSPATH') or die;

use Core\Config\Config;
use Core\Request\Request;
use Core\Resource\Resource;

class Feedback
{
	public function registerPostType()
	{
		$labels = [
		    'name'               => _x('Feedback', 'post type general name'),
		    'singular_name'      => _x('Feedback', 'post type singular name'),
		    'add_new'            => _x('Add New', 'book'),
		    'add_new_item'       => __('Add New Feedback'),
		    'edit_item'          => __('Edit Feedback'),
		    'new_item'           => __('New Feedback'),
		    'all_items'          => __('All Feedback'),
		    'view_item'          => __('View Feedback'),
		    'search_items'       => __('Search Feedback'),
		    'not_found'          => __('No feedback found'),
		    'not_found_in_trash' => __('No products found in the Trash'), 
		    'parent_item_colon'  => '',
		    'menu_name'          => 'Feedback'
		];

		  $args = [
		    'labels'        => $labels,
		    'description'   => 'Customer feedback management.',
		    'public'        => true,
		    'menu_position' => 5,
		    'supports'      => ['title', 'editor'],
		    'has_archive'   => true,
		];

		register_post_type('feedback', $args);
	}

	public function registerTaxonomy()
    {
        $labels = [
            'name'              => _x('Feedback Types', 'taxonomy general name'),
            'singular_name'     => _x('Feedback Type', 'taxonomy singular name'),
            'search_items'      => __('Search Feedback Types'),
            'all_items'         => __('All Feedback Types'),
            'parent_item'       => __('Parent Feedback Type'),
            'parent_item_colon' => __('Parent Feedback Type:'),
            'edit_item'         => __('Edit Feedback Type'), 
            'update_item'       => __('Update Feedback Type'),
            'add_new_item'      => __('Add New Feedback Type'),
            'new_item_name'     => __('New Feedback Type'),
            'menu_name'         => __('Feedback Types'),
        ];

        $args = [
            'labels' => $labels,
            'hierarchical' => true,
        ];

        register_taxonomy('feedback_type', 'feedback', $args);
    }

    public function handleListShortCode($atts, $content, $shortcode)
	{
		wp_enqueue_script($handle = Config::get('name'));

		$types = array_intersect(
			explode(', ', @$atts['category']),
			$default = array('idea', 'question', 'problem', 'price')
		);

		wp_localize_script(
			$handle, 'ninja_feedback_config', array(
				'feedback_types' => $types ? $types : $default,
				'ajax_url' => admin_url('admin-ajax.php')
			)
		);

		return Resource::view('front.feedback-posts');
	}

	public function handleFormShortCode($atts, $content, $shortcode)
	{
		return Resource::view('front.feedback-form');
	}

	public function getFeedbackByCategory()
	{
        $query = new \WP_Query(array(
			'post_type' => 'feedback',
			'posts_per_page' => 10,
            'tax_query' => array(
                array(
                    'taxonomy' => 'feedback_type',
                    'field' => 'slug',
                    'terms' => explode(',', Request::get('category'))
                )
            )
		));

		foreach ($query->posts as $post) {
			$post->author = array(
				'url' => get_author_posts_url($post->post_author),
				'email' => get_the_author_meta('email', $post->post_author),
				'user_nicename' => get_the_author_meta('user_nicename', $post->post_author),
			);

			$post->terms = array_map(function($term) {
				return array(
					'id' => $term->term_id,
					'name' => $term->name,
					'slug' => $term->slug,
					'taxonomy' => $term->taxonomy,
					'term_link' => get_term_link($term->term_id),
				);
			}, wp_get_post_terms($post->ID, 'feedback_type'));
		}

		wp_send_json($query->posts);
	}
}