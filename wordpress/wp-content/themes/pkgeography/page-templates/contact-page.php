<?php

/**
 * Template Name: Contact Page
 */


if ( have_posts() ) the_post();

$errors = array();
$bot = false;

if ( isset($_POST['gpk_cabatcha']) && $_POST['gpk_cabatcha'] ) {

	/**
	 * Collect quick info
	 */
	$quickInfo = array(
			'IP' => $_SERVER['REMOTE_ADDR'],
			'USER_AGENT' => $_SERVER['USER_AGENT']
		);

	/**
	 * Check if it is possible bot
	 */
	if ( isset($_POST[$_POST['gpk_cabatcha']]) && $_POST[$_POST['gpk_cabatcha']] ) {


		/**
		 * Send alert email to admin
		 */
		wp_mail('admin@geography.pk', 'Attention: Possible bot detected - Geography of Pakistan', implode('<br />', $quickInfo));

		$bot = true;
	}

	/**
	 * Send email to admin with user enquiry
	 */
	else {

		$enquirer_name = isset($_POST['enquirer_name']) && $_POST['enquirer_name'] ? htmlentities($_POST['enquirer_name']) : '';
		$email = isset($_POST['email']) && $_POST['email'] ? htmlentities($_POST['email']) : '';
		$enquiry = isset($_POST['enquiry']) && $_POST['enquiry'] ? htmlentities($_POST['enquiry']) : '';


		/**
		 * Validation
		 */
		if ( ! $enquirer_name ) {
			$errors['name'] = 'Please provide your name.';
		}

		elseif ( $enquirer_name && strlen($enquirer_name) > 100 ) {
			$errors['name'] = 'Given name is too long.';
		}

		elseif ( ! $email || strlen($email) > 255 || ! filter_var($email, FILTER_VALIDATE_EMAIL) ) {
			$errors['email'] = 'A valid email is required.';
		}

		elseif ( ! $enquiry ) {
			$errors['message'] = 'Your message is required.';
		}

		elseif ( $enquiry && strlen($enquiry) > 5000 ) {
			$errors['message'] = 'Your message is bit too long... o.O';
		}

		else {

			$enquiry .= '<br /><hr />';
			$enquiry .= implode(PHP_EOL, $quickInfo);

			if ( wp_mail('admin@geography.pk', 'Message by ' . $enquirer_name . ' - Geography of Pakistan', $enquiry, 'From: ' . $enquirer_name . '<' . $email . '>' . "\r\n" ) ) {
				header('Location: thank-you/?done=1&lang=en');
			}

		}
	}



}

get_header();

?>

<!-- contents -->
<div class="gpk-content gpk-page gpk-template">
	<div class="container">
		<div class="row">
			<div class="col-md-12 gpk-main" role="main">
				<div class="page-header">
					<h1 class="post-title"><?php the_title(); ?></h1>
				</div>

				<?php the_content(); ?>

				<div class="form-horizontal pkg-contact-form">
					<form autocomplete="off" action="<?php echo htmlentities(get_bloginfo('url') . '/contact/'); ?>" method="POST" enctype="multiform/form-data">
						<div class="form-group<?php if (isset($errors['name'])) echo ' has-error'; ?>">
							<label for="nameField" class="col-sm-2 control-label">Name:</label>
							<div class="col-sm-8">
								<input type="text" name="enquirer_name" id="nameField" value="<?php echo (isset($_POST['enquirer_name']) && $_POST['enquirer_name'] ? htmlentities($_POST['enquirer_name']) : ''); ?>" class="form-control" maxlength="100">
								<?php if ( isset($errors['name']) ) echo '<p class="text-danger text-right gpk-form-alerts"><i class="fa fa-info-circle"></i> ' . $errors['name'] . '</p>'; ?>
							</div>
						</div>
						<div class="form-group<?php if (isset($errors['email'])) echo ' has-error'; ?>">
							<label for="emailField" class="col-sm-2 control-label">Email:</label>
							<div class="col-sm-8">
								<input type="text" name="email" id="emailField" value="<?php echo (isset($_POST['email']) && $_POST['email'] ? htmlentities($_POST['email']) : ''); ?>" class="form-control" maxlength="255">
								<?php if ( isset($errors['email']) ) echo '<p class="text-danger text-right gpk-form-alerts"><i class="fa fa-info-circle"></i> ' . $errors['email'] . '</p>'; ?>
							</div>
						</div>
						<div class="form-group<?php if (isset($errors['message'])) echo ' has-error'; ?>">
							<label for="enquiryField" class="col-sm-2 control-label">Message:</label>
							<div class="col-sm-8">
								<textarea rows="10" name="enquiry" id="enquiryField" value="<?php echo (isset($_POST['enquiry']) && $_POST['enquiry'] ? htmlentities($_POST['enquiry']) : ''); ?>" class="form-control" placeholder="Enter your message here..." maxlength="5000"></textarea>
								<?php if ( isset($errors['message']) ) echo '<p class="text-danger text-right gpk-form-alerts"><i class="fa fa-info-circle"></i> ' . $errors['message'] . '</p>'; ?>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-8 col-sm-offset-2">
								<input type="hidden" tabindex="-1" name="gpk_<?php echo sha1(time()); ?>" value="" class="cabatcha form-control">
								<input type="hidden" tabindex="-1" name="gpk_cabatcha" value="gpk_<?php echo sha1(time()); ?>" class="form-control">
								<button type="submit" id="submitEnquiry" class="btn btn-success">Send Enquiry &raquo;</button>
								<p class="gpk-contact-notice">
									We may record and send information about your IP address and browser with this enquiry. Read our <a href="/about/privacy/">privacy policy</a> for more information.
								</p>
							</div>
						</div>
					</form>
				</div>
			</div>

			<?php # get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>