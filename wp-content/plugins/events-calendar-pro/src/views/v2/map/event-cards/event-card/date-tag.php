<?php
/**
 * View: Map View - Single Event Date Tag
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events-pro/v2/map/event-cards/event-card/date-tag.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://m.tri.be/1aiy
 *
 * @version 5.0.0
 *
 * @var WP_Post            $event        The event post object with properties added by the `tribe_get_event` function.
 * @var \DateTimeInterface $request_date The request date object. This will be "today" if the user did not input any
 *                                       date, or the user input date.
 * @var bool               $is_past      Whether the current display mode is "past" or not.
 *
 * @see tribe_get_event() For the format of the event object.
 *
 */

use Tribe__Date_Utils as Date;

/*
 * If the request date is after the event start date, show the request date to avoid users from seeing dates "in the
 * past" in relation to the date they requested (or today's date).
 */
$display_date = empty( $is_past ) && ! empty( $request_date )
	? max( $event->dates->start_display, $request_date )
	: $event->dates->start_display;

$event_month     = $display_date->format( 'M' );
$event_day_num   = $display_date->format( 'j' );
$event_date_attr = $display_date->format( Date::DBDATEFORMAT );
?>
<div class="tribe-events-pro-map__event-date-tag tribe-common-g-col">
	<time class="tribe-events-pro-map__event-date-tag-datetime" datetime="<?php echo esc_attr( $event_date_attr ); ?>">
		<span class="tribe-events-pro-map__event-date-tag-month">
			<?php echo esc_html( $event_month ); ?>
		</span>
		<span class="tribe-events-pro-map__event-date-tag-daynum tribe-common-h5">
			<?php echo esc_html( $event_day_num ); ?>
		</span>
	</time>
</div>
