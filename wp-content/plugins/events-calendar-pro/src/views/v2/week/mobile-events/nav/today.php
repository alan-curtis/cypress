<?php
/**
 * View: Week View Nav Today Button
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events-pro/v2/week/mobile-events/nav/today.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://m.tri.be/1aiy
 *
 * @var string $today_url The URL to the today page, if any, or an empty string.
 *
 * @version 5.0.1
 *
 */
?>
<li class="tribe-events-c-nav__list-item tribe-events-c-nav__list-item--today">
	<a
		href="<?php echo esc_url( $today_url ); ?>"
		class="tribe-events-c-nav__today tribe-common-b2"
		data-js="tribe-events-view-link"
		aria-label="<?php esc_attr_e( 'Click to select today\'s date', 'tribe-events-calendar-pro' ); ?>"
		title="<?php esc_attr_e( 'Click to select today\'s date', 'tribe-events-calendar-pro' ); ?>"
	>
		<?php esc_html_e( 'Today', 'tribe-events-calendar-pro' ); ?>
	</a>
</li>
