<?php

declare(strict_types=1);

namespace App\Controllers;

use Illuminate\Support\Arr;
use WP_REST_Controller;
use WP_REST_Response;
use WP_REST_Server;

class ContactUsController extends WP_REST_Controller
{
	public function register_routes(): void
	{
		$namespace = 'isto/v1';
		$base = 'contactus';

		register_rest_route( $namespace, '/' . $base, [
			[
				'methods'             => WP_REST_Server::CREATABLE,
				'callback'            => [$this, 'post_process_contact_us_form'],
				'permission_callback' => '__return_true',
			],
		]);
	}

	public function post_process_contact_us_form($request): WP_REST_Response
	{
		$data = $this->validate_input($request->get_params());

		if (empty($data)) {
			return new WP_REST_Response([
				'code' => 'failed_fields_validation',
				'message' => 'Bad request.',
				'data' => [
					'status' => 500,
				],
			], 500);
		}

		$this->saveRequest($data);

		$emailSent = $this->send_email($data);

		if (!$emailSent) {
			return new WP_REST_Response([
				'code' => 'failed_send_email',
				'message' => 'Unexpected error while sending email.',
				'data' => [
					'status' => 500,
				],
			], 500);
		}

		return new WP_REST_Response([
			'data' => $data,
		]);
	}

	private function send_email(array $data): bool
	{
		$emailTitle = $data['product_link'] ? 'Product form request - ' : 'Contact form request - ';
		$productIds = $data['products'];

		$body = "
		User: {$data['name']}<br>
		Email: {$data['email']}<br>
		Phone: {$data['phone']}<br>
		";

		if ($data['product_id']) {
			$post = get_post($data['product_id']);
			$permalink = get_permalink($post);
			$body .= "
			Product name: {$post->post_title}<br>
			Product link: <a href='{$permalink}'>{$post->post_title}</a><br>
			";
		}

		if (!empty($productIds)) {
			$body .= "<br><div><strong>Products</strong></div>";
			foreach ($productIds as $productId) {
				$post = get_post($productId);
				$permalink = get_permalink($post);
				$body .= "<div><a href=\"{$permalink}\">{$post->post_title}</a></div>";
			}
			$body .= "<br>";
		}

		$body .= "Message: {$data['message']}<br>";

		add_filter( 'wp_mail_content_type', fn() => 'text/html' );

		$additionalEmail = '';

		if ($data['city'] === 'Vilnius') {
			$additionalEmail = 'vilnius@isto.lt';
		} elseif ($data['city'] === 'Klaipėda') {
			$additionalEmail = 'klaipeda@isto.lt';
		}

		$email = wp_mail(
			get_option('admin_email'),
			$emailTitle . get_option('blogname'),
			$body,
			[
				'Cc: ' . $additionalEmail,
			]
		);

		remove_filter( 'wp_mail_content_type', fn() => 'text/html' );

		if (!$email) {
			return false;
		}

		return true;
	}

	private function validate_input(array $data): array
	{
		$name = Arr::get($data, 'name');
		$type = Arr::get($data, 'type');
		$products = Arr::get($data, 'products');
		$referer = Arr::get($data, 'referer');
		$email = Arr::get($data, 'email');
		$phone = Arr::get($data, 'phone');
		$city = Arr::get($data, 'city');
		$message = Arr::get($data, 'message');
		$productId = Arr::get($data, 'productId');
		$privacy_policy = Arr::get($data, 'privacy_policy');

		if (
			!$name ||
		    !$email ||
		    !$phone ||
		    !$city ||
		    !$message ||
		    !$privacy_policy
		) {
			return [];
		}

		return [
			'name' => $name,
			'type' => $type,
			'products' => $products,
			'referer' => $referer,
			'email' => $email,
			'phone' => $phone,
			'city' => $city,
			'message' => $message,
			'product_id' => $productId,
			'privacy_policy' => $privacy_policy,
		];
	}

	private function saveRequest($data)
	{
		$postId = wp_insert_post([
			'post_title' => $data['name'],
			'post_content' => '',
			'post_status' => 'publish',
			'post_type' => 'inquiries',
		]);

		$products = empty($data['products']) ? [$data['product_id']] : $data['products'];

		update_field('products', $products, $postId);
		update_field('type', $data['type'], $postId);
		update_field('message', $data['message'], $postId);
		update_field('cities', [$data['city']], $postId);
		update_field('phone', $data['phone'], $postId);
		update_field('email', $data['email'], $postId);
		update_field('email', $data['email'], $postId);
		update_field('name', $data['name'], $postId);
		update_field('referer', $data['referer'], $postId);
	}
}
