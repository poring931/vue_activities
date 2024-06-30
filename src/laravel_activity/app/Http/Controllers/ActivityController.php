<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivitySection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ActivityController extends Controller
{
    private const CACHE_TIME = 600;

    public function index(Request $request): array
    {
        $sectionId = $request->input('section_id');
        $pageNum = $request->input('page', 1); // Если параметр pageNum не передан, используем значение 1 по умолчанию

        // Используем условия для фильтрации данных
        $query = ActivitySection::query()->whereHas(
            'activities'
        )
            ->whereNull('activity_section_id');

        if ($sectionId) {
            $query->where('id', $sectionId);
        }


        $cacheKey = 'activity_sections_' . $sectionId . '_page_' . $pageNum;

        return cache()->remember($cacheKey, self::CACHE_TIME, function () use ($query, $pageNum) {
            $activitySections = $query->get();

            return $this->getSectionsWithActivities($activitySections, $pageNum);
        });

        return $this->getSectionsWithActivities($activitySections, $pageNum);
    }

    private function getSectionsWithActivities($sections, $pageNum = 1, $parentSection = null): array
    {
        $data = [];

        foreach ($sections as $section) {
            // Сортируем активности по created_at
            $sortedActivities = $section->activities()->orderBy('created_at', 'desc')->get();

            // Пагинируем отсортированные активности
            $sectionActivities = $this->paginate($sortedActivities, 10, $pageNum, [])
                ->appends(['section_id' => $section->id]);

            $sectionData = [
                'section' => [
                    'id' => $section->id,
                    'name' => $section->name,
                    'description' => $section->description,
                    'depth' => $section->depth,
                    'parent_section_id' => $parentSection ? $parentSection->id : null,
                ],
                'activities' => $sectionActivities,
            ];

            if ($section->children) {
                $sectionData['children'] = $this->getSectionsWithActivities($section->children, $pageNum, $section);
            }

            $data[$section->id] = $sectionData;
        }

        return $data;
    }


    private function paginate($items, $perPage, $page = null, $options = []): LengthAwarePaginator
    {
        $page = $page ?? LengthAwarePaginator::resolveCurrentPage() ?? 1;
        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator(
            $items->forPage($page, $perPage),
            $items->count(),
            $perPage,
            $page,
            $options
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $activity = new Activity();
        $activity->start_date = now();
        $activity->activity_section_id = $request->sectionId;
        $activity->save();

        return response()->json($activity, 201);
    }

    public function update(Request $request, $id)
    {
        // Найти активность по ID
        $activity = Activity::findOrFail($id);

        // Преобразовать текущую длительность из формата H:i:s в секунды
        $currentDurationSeconds = $this->convertToSeconds($activity->duration);

        // Преобразовать новую длительность из миллисекунд в секунды
        $newDurationSeconds = $request->duration / 1000;

        // Сложить длительности
        $totalDurationSeconds = $currentDurationSeconds + $newDurationSeconds;

        // Преобразовать итоговую длительность обратно в формат H:i:s
        $activity->duration = $this->convertToTimeFormat($totalDurationSeconds);

        // Обновить время окончания активности
        $activity->end_date = now();

        // Сохранить изменения
        $activity->save();

        return response()->json($activity);
    }

// Функция для преобразования длительности из формата H:i:s в секунды
    private function convertToSeconds($duration)
    {
        $parts = explode(':', $duration);
        $seconds = 0;

        if (count($parts) == 3) {
            // Формат H:i:s
            $seconds = $parts[0] * 3600 + $parts[1] * 60 + $parts[2];
        } elseif (count($parts) == 2) {
            // Формат i:s
            $seconds = $parts[0] * 60 + $parts[1];
        } elseif (count($parts) == 1) {
            // Формат s
            $seconds = $parts[0];
        }

        return $seconds;
    }

// Функция для преобразования длительности из секунд в формат H:i:s
    private function convertToTimeFormat($seconds)
    {
        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds % 3600) / 60);
        $seconds = $seconds % 60;

        return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
