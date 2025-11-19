define([
	'jquery'
], function ($) {
	'use strict';

	return function (config) {
		let endTime = new Date(config.endTime);
		let interval = setInterval(function() {
			let now = new Date().getTime();
			let distance = endTime - now;

			let days = Math.floor(distance / (1000 * 60 * 60 * 24));
			let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			let seconds = Math.floor((distance % (1000 * 60)) / 1000);

			let daysText = days > 0 ? days + (days === 1 ? " day " : " days ") : "";
			let hoursText = hours + (hours === 1 ? " hour " : " hours ");
			let minutesText = minutes + (minutes === 1 ? " min " : " mins ");
			let secondsText = seconds + (seconds === 1 ? " sec" : " secs");

			// Update the banner here
			$('#countdown-timer').html(daysText + hoursText + minutesText + secondsText);

			if (distance < 0) {
				clearInterval(interval);
				$('#countdown-timer').html(config.expiredMessage);
			}
		}, 1000);
	};
});
