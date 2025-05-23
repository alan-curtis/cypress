<?php
/**
 * View: Week View - Event Tooltip
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/week/grid-body/events-day/event/tooltip.php
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
 */

?>
<div class="tribe-events-pro-week-grid__event-tooltip-template tribe-common-a11y-hidden">
	<div
		class="tribe-events-pro-week-grid__event-tooltip"
		id="tribe-events-tooltip-content-<?php echo esc_attr( $event->ID ); ?>"
		role="tooltip"
	>
		<?php $this->template( 'week/grid-body/events-day/event/tooltip/featured-image', [ 'event' => $event ] ); ?>
		<?php $this->template( 'week/grid-body/events-day/event/tooltip/date', [ 'event' => $event ] ); ?>
		<?php $this->template( 'week/grid-body/events-day/event/tooltip/title', [ 'event' => $event ] ); ?>
		<?php $this->template( 'week/grid-body/events-day/event/tooltip/description', [ 'event' => $event ] ); ?>
		<?php $this->template( 'week/grid-body/events-day/event/tooltip/cost', [ 'event' => $event ] ); ?>
	</div>
</div>
