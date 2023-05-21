<?php

namespace App\Enum;

class AppointmentEnum
{
	const IN_PROGRESS = 'In progress';
	const ACCEPTED = 'Accepted';
	const REJECTED = 'Rejected';
	const CANCELLED = 'Cancelled';

	public static function getStatus($status)
	{
		switch ($status) {
			case 0:
				return self::IN_PROGRESS;
				break;
			case 1:
				return self::ACCEPTED;
				break;
			case 2:
				return self::REJECTED;
				break;
			case 3:
				return self::CANCELLED;
				break;
			default:
				return self::IN_PROGRESS;
				break;
		}
	}
}
