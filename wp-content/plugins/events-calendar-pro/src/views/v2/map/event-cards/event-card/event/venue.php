<?php
/**
 * View: Map - Single Event Venue
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events-pro/v2/map/event-cards/event-card/event/venue.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://m.tri.be/1aiy
 *
 * @version 5.0.0
 *
 * @var WP_Post $event The event post object with properties added by the `tribe_get_event` function.
 *
 * @see tribe_get_event() For the format of the event object.
 *
 */

if ( ! $event->venues->count() ) {
	return;
}

$separator            = esc_html_x( ', ', 'Address separator', 'tribe-events-calendar-pro' );
$venue                = $event->venues[0];
$append_after_address = array_filter( array_map( 'trim', [ $venue->city, $venue->state_province, $venue->state, $venue->province ] ) );

?>
<address class="tribe-events-pro-map__event-venue tribe-common-b3">
	<span class="tribe-events-pro-map__event-venue-title tribe-common-b3--bold">
		<?php echo wp_kses_post( $venue->post_title ); ?>
	</span>
	<span class="tribe-events-pro-map__event-venue-address">
		<?php echo esc_html( $venue->address . ( $venue->address && $append_after_address ? $separator : '' ) ); ?>
		<?php if ( $append_after_address ) : ?>
			<?php echo esc_html( reset( $append_after_address ) ); ?>
		<?php endif; ?>
	</span>
</address>
