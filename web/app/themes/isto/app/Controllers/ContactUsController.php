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
		$body = "
		User: {$data['name']}<br>
		Email: {$data['email']}<br>
		Phone: {$data['phone']}<br>
		Message: {$data['message']}<br>
		";

		add_filter( 'wp_mail_content_type', fn() => 'text/html' );

		$email = wp_mail(
			get_option('admin_email'),
			'Contact form request - ' . get_option('blogname'),
			$body
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
		$email = Arr::get($data, 'email');
		$phone = Arr::get($data, 'phone');
		$cities = Arr::get($data, 'cities');
		$message = Arr::get($data, 'message');
		$privacy_policy = Arr::get($data, 'privacy_policy');

		if (
			!$name ||
		    !$email ||
		    !$phone ||
		    empty($cities) ||
		    !$message ||
		    !$privacy_policy
		) {
			return [];
		}

		return [
			'name' => $name,
			'email' => $email,
			'phone' => $phone,
			'cities' => $cities,
			'message' => $message,
			'privacy_policy' => $privacy_policy,
		];
	}

	private function saveRequest()
	{
		// @TODO save item to custom post type
	}
}
