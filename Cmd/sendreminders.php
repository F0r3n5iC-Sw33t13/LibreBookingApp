<?php
/**
Copyright 2013 Stephen Oliver, Nick Korbel

This file is part of phpScheduleIt.

phpScheduleIt is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

phpScheduleIt is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with phpScheduleIt.  If not, see <http://www.gnu.org/licenses/>.
 */

define('ROOT_DIR', '../');
require_once(ROOT_DIR . 'Domain/Access/namespace.php');
require_once(ROOT_DIR . 'Domain/Reminder.php');

Log::Debug('Running sendreminders.php');

try
{
	$repository = new ReminderRepository();
	$now = Date::Now();

	$startNotices = $repository->GetReminderNotices($now, ReservationReminderType::Start);
	Log::Debug('Found %s start reminders', count($startNotices));
	foreach ($startNotices as $notice)
	{
		var_dump($notice);
	}

	$endNotices = $repository->GetReminderNotices(Date::Now(), ReservationReminderType::End);
	Log::Debug('Found %s end reminders', count($endNotices));
	foreach ($endNotices as $notice)
	{
		var_dump($notice);
	}
} catch (Exception $ex)
{
	Log::Error('Error running sendreminders.php: %s', $ex);
}

Log::Debug('Finished running sendreminders.php');
?>