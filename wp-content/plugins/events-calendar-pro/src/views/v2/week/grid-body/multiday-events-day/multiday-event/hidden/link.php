<?php
/**
 * View: Week View - Single Multiday Event Hidden Link
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events-pro/v2/week/grid-body/multiday-events-day/multiday-event/hidden/link.php
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
 * @version 5.1.1
 */

 ?>
<a
	href="<?php echo esc_url( $event->permalink ); ?>"
	class="tribe-events-pro-week-grid__multiday-event-hidden-link"
	data-js="tribe-events-tooltip"
	data-tooltip-content="#tribe-events-tooltip-content-<?php echo esc_attr( $event->ID ); ?>"
	aria-describedby="tribe-events-tooltip-content-<?php echo esc_attr( $event->ID ); ?>"
>
	<?php $this->template( 'week/grid-body/multiday-events-day/multiday-event/hidden/link/featured', [ 'event' => $event ] ); ?>
	<?php $this->template( 'week/grid-body/multiday-events-day/multiday-event/hidden/link/title', [ 'event' => $event ] ); ?>
	<?php $this->template( 'week/grid-body/multiday-events-day/multiday-event/hidden/link/recurring', [ 'event' => $event ] ); ?>
</a>
