<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\ActivitySection;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// #   docker-compose exec php-fpm php /var/www/laravel_activity/artisan  db:seed --class=ActivitySeeder
class ActivitySeeder extends Seeder
{


    public function run(): void
    {
        foreach ($this->getExportedItems() as $key => $activityGroup) {
            $section = ActivitySection::firstOrNew(['name' => $activityGroup['name']]);
            $section->save();

            foreach ($activityGroup['items'] as $activity) {
                $startDateTime = Carbon::parse($activity['start_date'] . ' ' . $activity['start_time']);
                $endDateTime = Carbon::parse($activity['end_date'] . ' ' . $activity['end_time']);

                // Вычисляем продолжительность между начальной и конечной датой
                $duration = $startDateTime->diff($endDateTime)->format('%H:%I:%S');

                $activity = Activity::create([
                                                 'start_date' => $startDateTime,
                                                 'end_date' => $endDateTime,
                                                 'duration' => $duration,
                                                 'activity_section_id' => $section->id
                                             ]);
            }
        }
    }

    public function getExportedItems(): array
    {
        return
            [
                'run' => [
                    'name' => 'Кардио. Эллипсоид',
                    'items' => [
                        [
                            'start_date' => '2023-11-16',
                            'start_time' => '21:22:23',
                            'end_date' => '2023-11-16',
                            'end_time' => '21:43:50',
                            'duration' => '00:21:27'
                        ],
                        [
                            'start_date' => '2023-11-17',
                            'start_time' => '12:42:52',
                            'end_date' => '2023-11-17',
                            'end_time' => '13:03:21',
                            'duration' => '00:20:29'
                        ],
                        [
                            'start_date' => '2023-11-17',
                            'start_time' => '17:50:24',
                            'end_date' => '2023-11-17',
                            'end_time' => '18:02:55',
                            'duration' => '00:12:31'
                        ],
                        [
                            'start_date' => '2023-11-18',
                            'start_time' => '10:32:50',
                            'end_date' => '2023-11-18',
                            'end_time' => '10:53:03',
                            'duration' => '00:20:13'
                        ],
                        [
                            'start_date' => '2023-11-18',
                            'start_time' => '16:49:50',
                            'end_date' => '2023-11-18',
                            'end_time' => '17:11:08',
                            'duration' => '00:21:18'
                        ],
                        [
                            'start_date' => '2023-11-19',
                            'start_time' => '10:35:13',
                            'end_date' => '2023-11-19',
                            'end_time' => '11:05:50',
                            'duration' => '00:30:37'
                        ],
                        [
                            'start_date' => '2023-11-19',
                            'start_time' => '18:41:06',
                            'end_date' => '2023-11-19',
                            'end_time' => '19:12:23',
                            'duration' => '00:31:17'
                        ],
                        [
                            'start_date' => '2023-11-20',
                            'start_time' => '17:00:26',
                            'end_date' => '2023-11-20',
                            'end_time' => '17:37:26',
                            'duration' => '00:37:00'
                        ],
                        [
                            'start_date' => '2023-11-21',
                            'start_time' => '18:30:19',
                            'end_date' => '2023-11-21',
                            'end_time' => '19:10:19',
                            'duration' => '00:40:00'
                        ],
                        [
                            'start_date' => '2023-11-22',
                            'start_time' => '18:15:41',
                            'end_date' => '2023-11-22',
                            'end_time' => '19:01:53',
                            'duration' => '00:46:12'
                        ],
                        [
                            'start_date' => '2023-11-23',
                            'start_time' => '17:57:44',
                            'end_date' => '2023-11-23',
                            'end_time' => '18:46:37',
                            'duration' => '00:48:53'
                        ],
                        [
                            'start_date' => '2023-11-24',
                            'start_time' => '18:03:54',
                            'end_date' => '2023-11-24',
                            'end_time' => '18:52:07',
                            'duration' => '00:48:13'
                        ],
                        [
                            'start_date' => '2023-11-25',
                            'start_time' => '18:35:10',
                            'end_date' => '2023-11-25',
                            'end_time' => '19:16:33',
                            'duration' => '00:41:23'
                        ],
                        [
                            'start_date' => '2023-11-26',
                            'start_time' => '10:53:05',
                            'end_date' => '2023-11-26',
                            'end_time' => '11:34:35',
                            'duration' => '00:41:30'
                        ],
                        [
                            'start_date' => '2023-11-27',
                            'start_time' => '18:15:23',
                            'end_date' => '2023-11-27',
                            'end_time' => '19:01:34',
                            'duration' => '00:46:11'
                        ],
                        [
                            'start_date' => '2023-11-28',
                            'start_time' => '18:00:00',
                            'end_date' => '2023-11-28',
                            'end_time' => '18:44:00',
                            'duration' => '00:44:00'
                        ],
                        [
                            'start_date' => '2023-11-28',
                            'start_time' => '18:54:46',
                            'end_date' => '2023-11-28',
                            'end_time' => '18:54:48',
                            'duration' => '00:00:02'
                        ],
                        [
                            'start_date' => '2023-11-28',
                            'start_time' => '18:54:54',
                            'end_date' => '2023-11-28',
                            'end_time' => '18:55:15',
                            'duration' => '00:00:21'
                        ],
                        [
                            'start_date' => '2023-11-29',
                            'start_time' => '16:34:29',
                            'end_date' => '2023-11-29',
                            'end_time' => '17:20:38',
                            'duration' => '00:46:09'
                        ],
                        [
                            'start_date' => '2023-11-30',
                            'start_time' => '17:21:46',
                            'end_date' => '2023-11-30',
                            'end_time' => '17:21:57',
                            'duration' => '00:00:11'
                        ],
                        [
                            'start_date' => '2023-11-30',
                            'start_time' => '17:24:06',
                            'end_date' => '2023-11-30',
                            'end_time' => '18:10:13',
                            'duration' => '00:46:07'
                        ],
                        [
                            'start_date' => '2023-12-01',
                            'start_time' => '17:32:08',
                            'end_date' => '2023-12-01',
                            'end_time' => '18:18:28',
                            'duration' => '00:46:20'
                        ],
                        [
                            'start_date' => '2023-12-03',
                            'start_time' => '10:46:52',
                            'end_date' => '2023-12-03',
                            'end_time' => '11:25:08',
                            'duration' => '00:38:16'
                        ],
                        [
                            'start_date' => '2023-12-04',
                            'start_time' => '18:07:07',
                            'end_date' => '2023-12-04',
                            'end_time' => '18:53:06',
                            'duration' => '00:45:59'
                        ],
                        [
                            'start_date' => '2023-12-05',
                            'start_time' => '14:25:57',
                            'end_date' => '2023-12-05',
                            'end_time' => '15:12:08',
                            'duration' => '00:46:11'
                        ],
                        [
                            'start_date' => '2023-12-06',
                            'start_time' => '17:49:41',
                            'end_date' => '2023-12-06',
                            'end_time' => '18:33:33',
                            'duration' => '00:43:52'
                        ],
                        [
                            'start_date' => '2023-12-07',
                            'start_time' => '16:33:59',
                            'end_date' => '2023-12-07',
                            'end_time' => '17:19:44',
                            'duration' => '00:45:45'
                        ],
                        [
                            'start_date' => '2023-12-08',
                            'start_time' => '17:15:01',
                            'end_date' => '2023-12-08',
                            'end_time' => '18:01:26',
                            'duration' => '00:46:25'
                        ],
                        [
                            'start_date' => '2023-12-09',
                            'start_time' => '09:56:25',
                            'end_date' => '2023-12-09',
                            'end_time' => '10:26:36',
                            'duration' => '00:30:11'
                        ],
                        [
                            'start_date' => '2023-12-10',
                            'start_time' => '10:26:32',
                            'end_date' => '2023-12-10',
                            'end_time' => '10:59:21',
                            'duration' => '00:32:49'
                        ],
                        [
                            'start_date' => '2023-12-19',
                            'start_time' => '18:00:26',
                            'end_date' => '2023-12-19',
                            'end_time' => '18:46:00',
                            'duration' => '00:45:34'
                        ],
                        [
                            'start_date' => '2023-12-20',
                            'start_time' => '14:46:03',
                            'end_date' => '2023-12-20',
                            'end_time' => '15:22:26',
                            'duration' => '00:36:23'
                        ],
                        [
                            'start_date' => '2023-12-21',
                            'start_time' => '17:28:33',
                            'end_date' => '2023-12-21',
                            'end_time' => '18:10:56',
                            'duration' => '00:42:23'
                        ],
                        [
                            'start_date' => '2023-12-22',
                            'start_time' => '17:49:39',
                            'end_date' => '2023-12-22',
                            'end_time' => '18:33:36',
                            'duration' => '00:43:57'
                        ],
                        [
                            'start_date' => '2023-12-23',
                            'start_time' => '10:56:35',
                            'end_date' => '2023-12-23',
                            'end_time' => '11:27:32',
                            'duration' => '00:30:57'
                        ],
                        [
                            'start_date' => '2023-12-24',
                            'start_time' => '10:55:07',
                            'end_date' => '2023-12-24',
                            'end_time' => '11:25:59',
                            'duration' => '00:30:52'
                        ],
                        [
                            'start_date' => '2023-12-25',
                            'start_time' => '17:40:47',
                            'end_date' => '2023-12-25',
                            'end_time' => '18:26:28',
                            'duration' => '00:45:41'
                        ],
                        [
                            'start_date' => '2023-12-26',
                            'start_time' => '17:15:01',
                            'end_date' => '2023-12-26',
                            'end_time' => '18:00:48',
                            'duration' => '00:45:47'
                        ],
                        [
                            'start_date' => '2023-12-27',
                            'start_time' => '17:41:03',
                            'end_date' => '2023-12-27',
                            'end_time' => '18:27:43',
                            'duration' => '00:46:40'
                        ],
                        [
                            'start_date' => '2023-12-28',
                            'start_time' => '13:54:48',
                            'end_date' => '2023-12-28',
                            'end_time' => '14:33:55',
                            'duration' => '00:39:07'
                        ],
                        [
                            'start_date' => '2023-12-29',
                            'start_time' => '16:43:43',
                            'end_date' => '2023-12-29',
                            'end_time' => '17:29:48',
                            'duration' => '00:46:05'
                        ],
                        [
                            'start_date' => '2023-12-30',
                            'start_time' => '11:03:08',
                            'end_date' => '2023-12-30',
                            'end_time' => '11:33:54',
                            'duration' => '00:30:46'
                        ],
                        [
                            'start_date' => '2023-12-31',
                            'start_time' => '10:40:52',
                            'end_date' => '2023-12-31',
                            'end_time' => '11:11:24',
                            'duration' => '00:30:32'
                        ],
                        [
                            'start_date' => '2024-01-01',
                            'start_time' => '18:48:43',
                            'end_date' => '2024-01-01',
                            'end_time' => '19:34:24',
                            'duration' => '00:45:41'
                        ],
                        [
                            'start_date' => '2024-01-02',
                            'start_time' => '18:09:25',
                            'end_date' => '2024-01-02',
                            'end_time' => '18:54:25',
                            'duration' => '00:45:00'
                        ],
                        [
                            'start_date' => '2024-01-03',
                            'start_time' => '18:29:41',
                            'end_date' => '2024-01-03',
                            'end_time' => '19:15:43',
                            'duration' => '00:46:02'
                        ],
                        [
                            'start_date' => '2024-01-04',
                            'start_time' => '18:42:26',
                            'end_date' => '2024-01-04',
                            'end_time' => '19:28:53',
                            'duration' => '00:46:27'
                        ],
                        [
                            'start_date' => '2024-01-05',
                            'start_time' => '17:57:34',
                            'end_date' => '2024-01-05',
                            'end_time' => '18:43:23',
                            'duration' => '00:45:49'
                        ],
                        [
                            'start_date' => '2024-01-06',
                            'start_time' => '10:57:35',
                            'end_date' => '2024-01-06',
                            'end_time' => '11:28:13',
                            'duration' => '00:30:38'
                        ],
                        [
                            'start_date' => '2024-01-07',
                            'start_time' => '19:11:52',
                            'end_date' => '2024-01-07',
                            'end_time' => '19:58:00',
                            'duration' => '00:46:08'
                        ],
                        [
                            'start_date' => '2024-01-08',
                            'start_time' => '18:22:23',
                            'end_date' => '2024-01-08',
                            'end_time' => '19:07:52',
                            'duration' => '00:45:29'
                        ],
                        [
                            'start_date' => '2024-01-09',
                            'start_time' => '17:06:47',
                            'end_date' => '2024-01-09',
                            'end_time' => '17:39:52',
                            'duration' => '00:33:05'
                        ],
                        [
                            'start_date' => '2024-01-10',
                            'start_time' => '16:58:23',
                            'end_date' => '2024-01-10',
                            'end_time' => '17:43:33',
                            'duration' => '00:45:10'
                        ],
                        [
                            'start_date' => '2024-01-11',
                            'start_time' => '16:30:05',
                            'end_date' => '2024-01-11',
                            'end_time' => '17:16:15',
                            'duration' => '00:46:10'
                        ],
                        [
                            'start_date' => '2024-01-12',
                            'start_time' => '16:51:22',
                            'end_date' => '2024-01-12',
                            'end_time' => '17:36:40',
                            'duration' => '00:45:18'
                        ],
                        [
                            'start_date' => '2024-01-13',
                            'start_time' => '18:05:15',
                            'end_date' => '2024-01-13',
                            'end_time' => '18:50:21',
                            'duration' => '00:45:06'
                        ],
                        [
                            'start_date' => '2024-01-14',
                            'start_time' => '16:21:30',
                            'end_date' => '2024-01-14',
                            'end_time' => '17:07:16',
                            'duration' => '00:45:46'
                        ],
                        [
                            'start_date' => '2024-01-15',
                            'start_time' => '16:41:30',
                            'end_date' => '2024-01-15',
                            'end_time' => '17:27:19',
                            'duration' => '00:45:49'
                        ],
                        [
                            'start_date' => '2024-01-16',
                            'start_time' => '15:59:52',
                            'end_date' => '2024-01-16',
                            'end_time' => '16:45:52',
                            'duration' => '00:46:00'
                        ],
                        [
                            'start_date' => '2024-01-17',
                            'start_time' => '16:25:47',
                            'end_date' => '2024-01-17',
                            'end_time' => '17:11:45',
                            'duration' => '00:45:58'
                        ],
                        [
                            'start_date' => '2024-01-18',
                            'start_time' => '13:31:03',
                            'end_date' => '2024-01-18',
                            'end_time' => '14:12:43',
                            'duration' => '00:41:40'
                        ],
                        [
                            'start_date' => '2024-01-19',
                            'start_time' => '18:20:00',
                            'end_date' => '2024-01-19',
                            'end_time' => '19:05:44',
                            'duration' => '00:45:44'
                        ],
                        [
                            'start_date' => '2024-01-20',
                            'start_time' => '16:06:25',
                            'end_date' => '2024-01-20',
                            'end_time' => '16:52:10',
                            'duration' => '00:45:45'
                        ],
                        [
                            'start_date' => '2024-01-21',
                            'start_time' => '17:47:55',
                            'end_date' => '2024-01-21',
                            'end_time' => '18:34:09',
                            'duration' => '00:46:14'
                        ],
                        [
                            'start_date' => '2024-01-22',
                            'start_time' => '16:10:38',
                            'end_date' => '2024-01-22',
                            'end_time' => '16:56:20',
                            'duration' => '00:45:42'
                        ],
                        [
                            'start_date' => '2024-01-23',
                            'start_time' => '17:50:20',
                            'end_date' => '2024-01-23',
                            'end_time' => '18:31:04',
                            'duration' => '00:40:44'
                        ],
                        [
                            'start_date' => '2024-01-24',
                            'start_time' => '16:17:58',
                            'end_date' => '2024-01-24',
                            'end_time' => '17:03:55',
                            'duration' => '00:45:57'
                        ],
                        [
                            'start_date' => '2024-01-25',
                            'start_time' => '14:48:26',
                            'end_date' => '2024-01-25',
                            'end_time' => '15:27:12',
                            'duration' => '00:38:46'
                        ],
                        [
                            'start_date' => '2024-01-26',
                            'start_time' => '16:52:28',
                            'end_date' => '2024-01-26',
                            'end_time' => '17:38:12',
                            'duration' => '00:45:44'
                        ],
                        [
                            'start_date' => '2024-01-27',
                            'start_time' => '15:43:11',
                            'end_date' => '2024-01-27',
                            'end_time' => '16:28:54',
                            'duration' => '00:45:43'
                        ],
                        [
                            'start_date' => '2024-01-28',
                            'start_time' => '16:40:01',
                            'end_date' => '2024-01-28',
                            'end_time' => '17:25:49',
                            'duration' => '00:45:48'
                        ],
                        [
                            'start_date' => '2024-01-29',
                            'start_time' => '17:37:35',
                            'end_date' => '2024-01-29',
                            'end_time' => '18:22:57',
                            'duration' => '00:45:22'
                        ],
                        [
                            'start_date' => '2024-01-30',
                            'start_time' => '16:54:11',
                            'end_date' => '2024-01-30',
                            'end_time' => '17:26:13',
                            'duration' => '00:32:02'
                        ],
                        [
                            'start_date' => '2024-01-31',
                            'start_time' => '16:33:36',
                            'end_date' => '2024-01-31',
                            'end_time' => '17:19:32',
                            'duration' => '00:45:56'
                        ],
                        [
                            'start_date' => '2024-02-01',
                            'start_time' => '16:02:27',
                            'end_date' => '2024-02-01',
                            'end_time' => '16:48:12',
                            'duration' => '00:45:45'
                        ],
                        [
                            'start_date' => '2024-02-02',
                            'start_time' => '16:24:31',
                            'end_date' => '2024-02-02',
                            'end_time' => '17:07:34',
                            'duration' => '00:43:03'
                        ],
                        [
                            'start_date' => '2024-02-03',
                            'start_time' => '17:13:56',
                            'end_date' => '2024-02-03',
                            'end_time' => '17:59:46',
                            'duration' => '00:45:50'
                        ],
                        [
                            'start_date' => '2024-02-04',
                            'start_time' => '16:13:18',
                            'end_date' => '2024-02-04',
                            'end_time' => '16:58:55',
                            'duration' => '00:45:37'
                        ],
                        [
                            'start_date' => '2024-02-05',
                            'start_time' => '14:57:40',
                            'end_date' => '2024-02-05',
                            'end_time' => '15:43:46',
                            'duration' => '00:46:06'
                        ],
                        [
                            'start_date' => '2024-02-06',
                            'start_time' => '16:31:48',
                            'end_date' => '2024-02-06',
                            'end_time' => '17:17:32',
                            'duration' => '00:45:44'
                        ],
                        [
                            'start_date' => '2024-02-07',
                            'start_time' => '19:39:47',
                            'end_date' => '2024-02-07',
                            'end_time' => '20:21:11',
                            'duration' => '00:41:24'
                        ],
                        [
                            'start_date' => '2024-02-08',
                            'start_time' => '16:23:22',
                            'end_date' => '2024-02-08',
                            'end_time' => '17:09:00',
                            'duration' => '00:45:38'
                        ],
                        [
                            'start_date' => '2024-02-09',
                            'start_time' => '18:07:11',
                            'end_date' => '2024-02-09',
                            'end_time' => '18:52:43',
                            'duration' => '00:45:32'
                        ],
                        [
                            'start_date' => '2024-02-10',
                            'start_time' => '16:39:24',
                            'end_date' => '2024-02-10',
                            'end_time' => '17:25:13',
                            'duration' => '00:45:49'
                        ],
                        [
                            'start_date' => '2024-02-11',
                            'start_time' => '17:36:15',
                            'end_date' => '2024-02-11',
                            'end_time' => '18:21:15',
                            'duration' => '00:45:00'
                        ],
                        [
                            'start_date' => '2024-02-13',
                            'start_time' => '14:00:51',
                            'end_date' => '2024-02-13',
                            'end_time' => '14:42:34',
                            'duration' => '00:41:43'
                        ],
                        [
                            'start_date' => '2024-02-14',
                            'start_time' => '16:29:15',
                            'end_date' => '2024-02-14',
                            'end_time' => '17:15:21',
                            'duration' => '00:46:06'
                        ],
                        [
                            'start_date' => '2024-02-15',
                            'start_time' => '16:11:18',
                            'end_date' => '2024-02-15',
                            'end_time' => '16:57:00',
                            'duration' => '00:45:42'
                        ],
                        [
                            'start_date' => '2024-02-16',
                            'start_time' => '15:33:28',
                            'end_date' => '2024-02-16',
                            'end_time' => '16:19:16',
                            'duration' => '00:45:48'
                        ],
                        [
                            'start_date' => '2024-02-17',
                            'start_time' => '17:04:01',
                            'end_date' => '2024-02-17',
                            'end_time' => '17:49:14',
                            'duration' => '00:45:13'
                        ],
                        [
                            'start_date' => '2024-02-18',
                            'start_time' => '18:40:37',
                            'end_date' => '2024-02-18',
                            'end_time' => '19:25:47',
                            'duration' => '00:45:10'
                        ],
                        [
                            'start_date' => '2024-02-19',
                            'start_time' => '16:59:41',
                            'end_date' => '2024-02-19',
                            'end_time' => '17:45:39',
                            'duration' => '00:45:58'
                        ],
                        [
                            'start_date' => '2024-02-20',
                            'start_time' => '16:25:21',
                            'end_date' => '2024-02-20',
                            'end_time' => '17:11:02',
                            'duration' => '00:45:41'
                        ],
                        [
                            'start_date' => '2024-02-21',
                            'start_time' => '16:26:24',
                            'end_date' => '2024-02-21',
                            'end_time' => '17:12:10',
                            'duration' => '00:45:46'
                        ],
                        [
                            'start_date' => '2024-02-22',
                            'start_time' => '16:46:23',
                            'end_date' => '2024-02-22',
                            'end_time' => '17:31:23',
                            'duration' => '00:45:00'
                        ],
                        [
                            'start_date' => '2024-02-23',
                            'start_time' => '15:44:17',
                            'end_date' => '2024-02-23',
                            'end_time' => '16:09:03',
                            'duration' => '00:24:46'
                        ],
                        [
                            'start_date' => '2024-02-24',
                            'start_time' => '17:17:40',
                            'end_date' => '2024-02-24',
                            'end_time' => '18:02:51',
                            'duration' => '00:45:11'
                        ],
                        [
                            'start_date' => '2024-02-25',
                            'start_time' => '18:04:01',
                            'end_date' => '2024-02-25',
                            'end_time' => '18:49:44',
                            'duration' => '00:45:43'
                        ],
                        [
                            'start_date' => '2024-02-26',
                            'start_time' => '17:01:26',
                            'end_date' => '2024-02-26',
                            'end_time' => '17:47:17',
                            'duration' => '00:45:51'
                        ],
                        [
                            'start_date' => '2024-02-27',
                            'start_time' => '15:32:56',
                            'end_date' => '2024-02-27',
                            'end_time' => '16:18:34',
                            'duration' => '00:45:38'
                        ],
                        [
                            'start_date' => '2024-02-28',
                            'start_time' => '17:02:08',
                            'end_date' => '2024-02-28',
                            'end_time' => '17:47:39',
                            'duration' => '00:45:31'
                        ],
                        [
                            'start_date' => '2024-02-29',
                            'start_time' => '17:12:58',
                            'end_date' => '2024-02-29',
                            'end_time' => '17:58:48',
                            'duration' => '00:45:50'
                        ],
                        [
                            'start_date' => '2024-03-01',
                            'start_time' => '16:52:06',
                            'end_date' => '2024-03-01',
                            'end_time' => '17:37:53',
                            'duration' => '00:45:47'
                        ],
                        [
                            'start_date' => '2024-03-02',
                            'start_time' => '18:03:27',
                            'end_date' => '2024-03-02',
                            'end_time' => '18:48:48',
                            'duration' => '00:45:21'
                        ],
                        [
                            'start_date' => '2024-03-03',
                            'start_time' => '16:46:23',
                            'end_date' => '2024-03-03',
                            'end_time' => '17:32:12',
                            'duration' => '00:45:49'
                        ],
                        [
                            'start_date' => '2024-03-04',
                            'start_time' => '17:39:03',
                            'end_date' => '2024-03-04',
                            'end_time' => '17:41:58',
                            'duration' => '00:02:55'
                        ],
                        [
                            'start_date' => '2024-03-04',
                            'start_time' => '17:49:19',
                            'end_date' => '2024-03-04',
                            'end_time' => '18:24:56',
                            'duration' => '00:35:37'
                        ],
                        [
                            'start_date' => '2024-03-05',
                            'start_time' => '17:00:15',
                            'end_date' => '2024-03-05',
                            'end_time' => '17:46:00',
                            'duration' => '00:45:45'
                        ],
                        [
                            'start_date' => '2024-03-06',
                            'start_time' => '16:01:52',
                            'end_date' => '2024-03-06',
                            'end_time' => '16:47:08',
                            'duration' => '00:45:16'
                        ],
                        [
                            'start_date' => '2024-03-07',
                            'start_time' => '16:58:34',
                            'end_date' => '2024-03-07',
                            'end_time' => '17:44:19',
                            'duration' => '00:45:45'
                        ],
                        [
                            'start_date' => '2024-03-08',
                            'start_time' => '16:42:58',
                            'end_date' => '2024-03-08',
                            'end_time' => '17:28:54',
                            'duration' => '00:45:56'
                        ],
                        [
                            'start_date' => '2024-03-09',
                            'start_time' => '15:51:43',
                            'end_date' => '2024-03-09',
                            'end_time' => '16:37:22',
                            'duration' => '00:45:39'
                        ],
                        [
                            'start_date' => '2024-03-10',
                            'start_time' => '16:23:48',
                            'end_date' => '2024-03-10',
                            'end_time' => '16:24:22',
                            'duration' => '00:00:34'
                        ],
                        [
                            'start_date' => '2024-03-10',
                            'start_time' => '16:26:10',
                            'end_date' => '2024-03-10',
                            'end_time' => '17:11:43',
                            'duration' => '00:45:33'
                        ],
                        [
                            'start_date' => '2024-03-11',
                            'start_time' => '15:40:22',
                            'end_date' => '2024-03-11',
                            'end_time' => '16:26:05',
                            'duration' => '00:45:43'
                        ],
                        [
                            'start_date' => '2024-03-12',
                            'start_time' => '17:28:00',
                            'end_date' => '2024-03-12',
                            'end_time' => '17:28:24',
                            'duration' => '00:00:24'
                        ],
                        [
                            'start_date' => '2024-03-12',
                            'start_time' => '17:29:56',
                            'end_date' => '2024-03-12',
                            'end_time' => '18:15:33',
                            'duration' => '00:45:37'
                        ],
                        [
                            'start_date' => '2024-03-13',
                            'start_time' => '16:28:49',
                            'end_date' => '2024-03-13',
                            'end_time' => '17:14:40',
                            'duration' => '00:45:51'
                        ],
                        [
                            'start_date' => '2024-03-14',
                            'start_time' => '17:35:27',
                            'end_date' => '2024-03-14',
                            'end_time' => '18:20:27',
                            'duration' => '00:45:00'
                        ],
                        [
                            'start_date' => '2024-03-15',
                            'start_time' => '17:27:06',
                            'end_date' => '2024-03-15',
                            'end_time' => '18:12:06',
                            'duration' => '00:45:00'
                        ],
                        [
                            'start_date' => '2024-03-16',
                            'start_time' => '17:19:42',
                            'end_date' => '2024-03-16',
                            'end_time' => '18:05:22',
                            'duration' => '00:45:40'
                        ],
                        [
                            'start_date' => '2024-03-17',
                            'start_time' => '17:52:44',
                            'end_date' => '2024-03-17',
                            'end_time' => '18:38:22',
                            'duration' => '00:45:38'
                        ],
                        [
                            'start_date' => '2024-03-18',
                            'start_time' => '17:23:05',
                            'end_date' => '2024-03-18',
                            'end_time' => '18:08:20',
                            'duration' => '00:45:15'
                        ],
                        [
                            'start_date' => '2024-03-19',
                            'start_time' => '16:38:52',
                            'end_date' => '2024-03-19',
                            'end_time' => '17:23:52',
                            'duration' => '00:45:00'
                        ],
                        [
                            'start_date' => '2024-03-20',
                            'start_time' => '17:38:12',
                            'end_date' => '2024-03-20',
                            'end_time' => '18:20:19',
                            'duration' => '00:42:07'
                        ],
                        [
                            'start_date' => '2024-03-21',
                            'start_time' => '17:33:27',
                            'end_date' => '2024-03-21',
                            'end_time' => '18:19:06',
                            'duration' => '00:45:39'
                        ],
                        [
                            'start_date' => '2024-03-22',
                            'start_time' => '16:41:29',
                            'end_date' => '2024-03-22',
                            'end_time' => '17:26:48',
                            'duration' => '00:45:19'
                        ],
                        [
                            'start_date' => '2024-03-23',
                            'start_time' => '12:03:06',
                            'end_date' => '2024-03-23',
                            'end_time' => '12:31:48',
                            'duration' => '00:28:42'
                        ],
                        [
                            'start_date' => '2024-03-24',
                            'start_time' => '17:49:50',
                            'end_date' => '2024-03-24',
                            'end_time' => '18:35:27',
                            'duration' => '00:45:37'
                        ],
                        [
                            'start_date' => '2024-03-25',
                            'start_time' => '16:14:33',
                            'end_date' => '2024-03-25',
                            'end_time' => '17:00:22',
                            'duration' => '00:45:49'
                        ],
                        [
                            'start_date' => '2024-03-26',
                            'start_time' => '16:21:40',
                            'end_date' => '2024-03-26',
                            'end_time' => '17:07:34',
                            'duration' => '00:45:54'
                        ],
                        [
                            'start_date' => '2024-03-27',
                            'start_time' => '16:40:33',
                            'end_date' => '2024-03-27',
                            'end_time' => '17:26:26',
                            'duration' => '00:45:53'
                        ],
                        [
                            'start_date' => '2024-03-28',
                            'start_time' => '16:26:47',
                            'end_date' => '2024-03-28',
                            'end_time' => '17:12:34',
                            'duration' => '00:45:47'
                        ],
                        [
                            'start_date' => '2024-03-29',
                            'start_time' => '16:03:53',
                            'end_date' => '2024-03-29',
                            'end_time' => '16:48:59',
                            'duration' => '00:45:06'
                        ],
                        [
                            'start_date' => '2024-03-30',
                            'start_time' => '17:18:27',
                            'end_date' => '2024-03-30',
                            'end_time' => '18:03:45',
                            'duration' => '00:45:18'
                        ],
                        [
                            'start_date' => '2024-03-31',
                            'start_time' => '17:16:24',
                            'end_date' => '2024-03-31',
                            'end_time' => '18:01:24',
                            'duration' => '00:45:00'
                        ],
                        [
                            'start_date' => '2024-04-01',
                            'start_time' => '17:31:25',
                            'end_date' => '2024-04-01',
                            'end_time' => '18:16:25',
                            'duration' => '00:45:00'
                        ],
                        [
                            'start_date' => '2024-04-02',
                            'start_time' => '17:21:03',
                            'end_date' => '2024-04-02',
                            'end_time' => '18:06:54',
                            'duration' => '00:45:51'
                        ],
                        [
                            'start_date' => '2024-04-03',
                            'start_time' => '17:31:08',
                            'end_date' => '2024-04-03',
                            'end_time' => '18:16:53',
                            'duration' => '00:45:45'
                        ],
                        [
                            'start_date' => '2024-04-04',
                            'start_time' => '21:55:58',
                            'end_date' => '2024-04-04',
                            'end_time' => '22:41:39',
                            'duration' => '00:45:41'
                        ],
                        [
                            'start_date' => '2024-04-05',
                            'start_time' => '22:07:40',
                            'end_date' => '2024-04-05',
                            'end_time' => '22:53:25',
                            'duration' => '00:45:45'
                        ],
                        [
                            'start_date' => '2024-04-06',
                            'start_time' => '22:05:50',
                            'end_date' => '2024-04-06',
                            'end_time' => '22:51:43',
                            'duration' => '00:45:53'
                        ],
                        [
                            'start_date' => '2024-04-07',
                            'start_time' => '21:36:04',
                            'end_date' => '2024-04-07',
                            'end_time' => '22:22:05',
                            'duration' => '00:46:01'
                        ],
                        [
                            'start_date' => '2024-04-08',
                            'start_time' => '16:25:02',
                            'end_date' => '2024-04-08',
                            'end_time' => '17:10:47',
                            'duration' => '00:45:45'
                        ],
                        [
                            'start_date' => '2024-04-09',
                            'start_time' => '18:24:26',
                            'end_date' => '2024-04-09',
                            'end_time' => '19:10:29',
                            'duration' => '00:46:03',
                        ],
                        [
                            'start_date' => '2024-04-12',
                            'start_time' => '18:02:19',
                            'end_date' => '2024-04-12',
                            'end_time' => '18:48:00',
                            'duration' => '00:45:41',
                        ],
                        [
                            'start_date' => '2024-04-13',
                            'start_time' => '16:17:14',
                            'end_date' => '2024-04-13',
                            'end_time' => '16:17:56',
                            'duration' => '00:00:42',
                        ],
                        [
                            'start_date' => '2024-04-13',
                            'start_time' => '16:18:19',
                            'end_date' => '2024-04-13',
                            'end_time' => '17:03:19',
                            'duration' => '00:45:00',
                        ],
                        [
                            'start_date' => '2024-04-15',
                            'start_time' => '16:08:42',
                            'end_date' => '2024-04-15',
                            'end_time' => '16:55:12',
                            'duration' => '00:46:30',
                        ],
                        [
                            'start_date' => '2024-04-17',
                            'start_time' => '16:35:48',
                            'end_date' => '2024-04-17',
                            'end_time' => '17:21:43',
                            'duration' => '00:45:55',
                        ],
                        [
                            'start_date' => '2024-04-18',
                            'start_time' => '16:21:48',
                            'end_date' => '2024-04-18',
                            'end_time' => '17:07:29',
                            'duration' => '00:45:41',
                        ],
                        [
                            'start_date' => '2024-04-19',
                            'start_time' => '15:31:59',
                            'end_date' => '2024-04-19',
                            'end_time' => '16:17:49',
                            'duration' => '00:45:50',
                        ],
                    ]
                ],
                'study' => [
                    'name' => 'Обучение',
                    'items' => [
                        [
                            'start_date' => '2023-11-12',
                            'start_time' => '15:11:38',
                            'end_date' => '2023-11-12',
                            'end_time' => '15:56:17',
                            'duration' => '00:44:39',
                        ],
                        [
                            'start_date' => '2023-11-12',
                            'start_time' => '19:25:16',
                            'end_date' => '2023-11-12',
                            'end_time' => '20:47:40',
                            'duration' => '01:22:24',
                        ],
                        [
                            'start_date' => '2023-11-13',
                            'start_time' => '18:35:57',
                            'end_date' => '2023-11-13',
                            'end_time' => '19:58:41',
                            'duration' => '01:22:44',
                        ],
                        [
                            'start_date' => '2023-11-18',
                            'start_time' => '18:29:43',
                            'end_date' => '2023-11-18',
                            'end_time' => '18:51:11',
                            'duration' => '00:21:28',
                        ],
                        [
                            'start_date' => '2023-11-20',
                            'start_time' => '18:20:46',
                            'end_date' => '2023-11-20',
                            'end_time' => '18:32:50',
                            'duration' => '00:12:04',
                        ],
                        [
                            'start_date' => '2023-11-20',
                            'start_time' => '18:40:08',
                            'end_date' => '2023-11-20',
                            'end_time' => '18:47:13',
                            'duration' => '00:07:05',
                        ],
                        [
                            'start_date' => '2023-11-20',
                            'start_time' => '20:16:17',
                            'end_date' => '2023-11-20',
                            'end_time' => '20:34:30',
                            'duration' => '00:18:13',
                        ],
                        [
                            'start_date' => '2023-11-23',
                            'start_time' => '19:29:01',
                            'end_date' => '2023-11-23',
                            'end_time' => '20:09:01',
                            'duration' => '00:40:00',
                        ],

                    ]
                ],
                'work' => [
                    'name' => 'Работа',
                    'children' => [
                        'name' => 'haisse',
                        'value' => 1400,
                        'items' => [
                            [
                                'start_date' => '2023-05-17',
                                'start_time' => '17:14:54',
                                'end_date' => '2023-05-17',
                                'end_time' => '17:51:00',
                                'duration' => '00:36:06',
                            ],
                            [
                                'start_date' => '2023-05-17',
                                'start_time' => '17:51:05',
                                'end_date' => '2023-05-17',
                                'end_time' => '17:51:06',
                                'duration' => '00:00:01',
                            ],
                            [
                                'start_date' => '2023-05-17',
                                'start_time' => '17:51:11',
                                'end_date' => '2023-05-17',
                                'end_time' => '17:51:15',
                                'duration' => '00:00:04',
                            ],
                            [
                                'start_date' => '2023-05-17',
                                'start_time' => '18:25:03',
                                'end_date' => '2023-05-17',
                                'end_time' => '18:42:58',
                                'duration' => '00:17:55',
                            ],
                            [
                                'start_date' => '2023-05-17',
                                'start_time' => '18:44:52',
                                'end_date' => '2023-05-17',
                                'end_time' => '19:43:32',
                                'duration' => '00:58:40',
                            ],
                            [
                                'start_date' => '2023-05-17',
                                'start_time' => '19:44:26',
                                'end_date' => '2023-05-17',
                                'end_time' => '19:46:33',
                                'duration' => '00:02:07',
                            ],
                            [
                                'start_date' => '2023-05-17',
                                'start_time' => '20:23:33',
                                'end_date' => '2023-05-17',
                                'end_time' => '20:56:46',
                                'duration' => '00:33:13',
                            ],
                            [
                                'start_date' => '2023-05-18',
                                'start_time' => '17:28:22',
                                'end_date' => '2023-05-18',
                                'end_time' => '19:00:48',
                                'duration' => '01:32:26',
                            ],
                            [
                                'start_date' => '2023-05-18',
                                'start_time' => '19:01:17',
                                'end_date' => '2023-05-18',
                                'end_time' => '19:09:09',
                                'duration' => '00:07:52',
                            ],
                            [
                                'start_date' => '2023-05-18',
                                'start_time' => '19:50:00',
                                'end_date' => '2023-05-18',
                                'end_time' => '21:20:53',
                                'duration' => '01:30:53',
                            ],
                            [
                                'start_date' => '2023-05-19',
                                'start_time' => '15:27:24',
                                'end_date' => '2023-05-19',
                                'end_time' => '16:33:57',
                                'duration' => '01:06:33',
                            ],
                            [
                                'start_date' => '2023-05-19',
                                'start_time' => '16:42:20',
                                'end_date' => '2023-05-19',
                                'end_time' => '17:47:31',
                                'duration' => '01:05:11',
                            ],
                            [
                                'start_date' => '2023-05-19',
                                'start_time' => '17:50:04',
                                'end_date' => '2023-05-19',
                                'end_time' => '18:14:34',
                                'duration' => '00:24:30',
                            ],
                            [
                                'start_date' => '2023-05-19',
                                'start_time' => '18:17:15',
                                'end_date' => '2023-05-19',
                                'end_time' => '18:29:52',
                                'duration' => '00:12:37',
                            ],
                            [
                                'start_date' => '2023-05-19',
                                'start_time' => '18:39:15',
                                'end_date' => '2023-05-19',
                                'end_time' => '18:57:59',
                                'duration' => '00:18:44',
                            ],
                            [
                                'start_date' => '2023-05-20',
                                'start_time' => '13:15:55',
                                'end_date' => '2023-05-20',
                                'end_time' => '13:49:49',
                                'duration' => '00:33:54',
                            ],
                            [
                                'start_date' => '2023-05-20',
                                'start_time' => '13:58:21',
                                'end_date' => '2023-05-20',
                                'end_time' => '14:25:53',
                                'duration' => '00:27:32',
                            ],
                            [
                                'start_date' => '2023-05-20',
                                'start_time' => '14:33:52',
                                'end_date' => '2023-05-20',
                                'end_time' => '15:38:44',
                                'duration' => '01:04:52',
                            ],
                            [
                                'start_date' => '2023-05-20',
                                'start_time' => '16:37:36',
                                'end_date' => '2023-05-20',
                                'end_time' => '17:24:18',
                                'duration' => '00:46:42',
                            ],
                            [
                                'start_date' => '2023-05-20',
                                'start_time' => '17:51:43',
                                'end_date' => '2023-05-20',
                                'end_time' => '18:56:23',
                                'duration' => '01:04:40',
                            ],
                            [
                                'start_date' => '2023-05-20',
                                'start_time' => '19:04:17',
                                'end_date' => '2023-05-20',
                                'end_time' => '19:13:46',
                                'duration' => '00:09:29',
                            ],
                            [
                                'start_date' => '2023-05-20',
                                'start_time' => '19:18:20',
                                'end_date' => '2023-05-20',
                                'end_time' => '19:20:01',
                                'duration' => '00:01:41',
                            ],
                            [
                                'start_date' => '2023-05-20',
                                'start_time' => '19:25:15',
                                'end_date' => '2023-05-20',
                                'end_time' => '20:19:44',
                                'duration' => '00:54:29',
                            ],
                            [
                                'start_date' => '2023-05-20',
                                'start_time' => '20:34:11',
                                'end_date' => '2023-05-20',
                                'end_time' => '21:14:37',
                                'duration' => '00:40:26',
                            ],
                            [
                                'start_date' => '2023-05-21',
                                'start_time' => '10:11:59',
                                'end_date' => '2023-05-21',
                                'end_time' => '10:16:43',
                                'duration' => '00:04:44',
                            ],
                            [
                                'start_date' => '2023-05-21',
                                'start_time' => '10:30:50',
                                'end_date' => '2023-05-21',
                                'end_time' => '11:12:27',
                                'duration' => '00:41:37',
                            ],
                            [
                                'start_date' => '2023-05-21',
                                'start_time' => '13:50:26',
                                'end_date' => '2023-05-21',
                                'end_time' => '14:33:06',
                                'duration' => '00:42:40',
                            ],
                            [
                                'start_date' => '2023-05-21',
                                'start_time' => '14:33:25',
                                'end_date' => '2023-05-21',
                                'end_time' => '15:03:01',
                                'duration' => '00:29:36',
                            ],
                            [
                                'start_date' => '2023-05-21',
                                'start_time' => '15:52:17',
                                'end_date' => '2023-05-21',
                                'end_time' => '17:26:04',
                                'duration' => '01:33:47',
                            ],
                            [
                                'start_date' => '2023-05-21',
                                'start_time' => '17:34:45',
                                'end_date' => '2023-05-21',
                                'end_time' => '17:59:46',
                                'duration' => '00:25:01',
                            ],
                            [
                                'start_date' => '2023-05-21',
                                'start_time' => '18:36:22',
                                'end_date' => '2023-05-21',
                                'end_time' => '19:20:53',
                                'duration' => '00:44:31',
                            ],
                            [
                                'start_date' => '2023-05-21',
                                'start_time' => '19:24:41',
                                'end_date' => '2023-05-21',
                                'end_time' => '20:38:12',
                                'duration' => '01:13:31',
                            ],
                            [
                                'start_date' => '2023-05-21',
                                'start_time' => '20:42:11',
                                'end_date' => '2023-05-21',
                                'end_time' => '21:25:55',
                                'duration' => '00:43:44',
                            ],
                            [
                                'start_date' => '2023-05-22',
                                'start_time' => '17:59:36',
                                'end_date' => '2023-05-22',
                                'end_time' => '18:00:44',
                                'duration' => '00:01:08',
                            ],
                            [
                                'start_date' => '2023-05-22',
                                'start_time' => '18:02:24',
                                'end_date' => '2023-05-22',
                                'end_time' => '18:54:24',
                                'duration' => '00:52:00',
                            ],
                            [
                                'start_date' => '2023-05-22',
                                'start_time' => '19:00:03',
                                'end_date' => '2023-05-22',
                                'end_time' => '20:31:20',
                                'duration' => '01:31:17',
                            ],
                            [
                                'start_date' => '2023-05-22',
                                'start_time' => '20:32:45',
                                'end_date' => '2023-05-22',
                                'end_time' => '21:01:01',
                                'duration' => '00:28:16',
                            ],
                            [
                                'start_date' => '2023-05-23',
                                'start_time' => '14:41:10',
                                'end_date' => '2023-05-23',
                                'end_time' => '15:10:24',
                                'duration' => '00:29:14',
                            ],
                            [
                                'start_date' => '2023-05-23',
                                'start_time' => '18:26:27',
                                'end_date' => '2023-05-23',
                                'end_time' => '19:47:52',
                                'duration' => '01:21:25',
                            ],
                            [
                                'start_date' => '2023-05-23',
                                'start_time' => '19:48:02',
                                'end_date' => '2023-05-23',
                                'end_time' => '19:49:44',
                                'duration' => '00:01:42',
                            ],

                        ]

                    ]
                ]
            ];
    }
}
