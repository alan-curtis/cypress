<?php
/**
 * View: Map View - Single Event Tooltip Featured Icon
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events-pro/v2/week/grid-body/events-day/event/tooltip/date/featured.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://m.tri.be/1aiy
 *
 * @since 5.1.1
 *
 * @var WP_Post $event The event post object with properties added by the `tribe_get_event` function.
 *
 * @see tribe_get_event() For the format of the event object.
 *
 * @version 5.2.0
 */

if ( empty( $event->featured ) ) {
	return;
}
?>
<em
	class="tribe-events-pro-week-grid__event-tooltip-datetime-featured-icon"
	aria-label="<?php esc_attr_e( 'Featured', 'tribe-events-calendar-pro' ); ?>"
	title="<?php esc_attr_e( 'Featured', 'tribe-events-calendar-pro' ); ?>"
>
	<?php $this->template( 'components/icons/featured', [ 'classes' => [ 'tribe-events-pro-week-grid__event-tooltip-datetime-featured-icon-svg' ] ] ); ?>
</em>
