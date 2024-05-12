<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivitySection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): array
    {
        $activitySections = ActivitySection::with('activities')
            ->whereNull('activity_section_id')
            ->whereHas(
                'activities'
            )->get();

        return $this->getSectionsWithActivities($activitySections);
    }

    private function getSectionsWithActivities($sections, $parentSection = null): array
    {
        $data = [];

        foreach ($sections as $section) {
            $sectionActivities = $this->paginate($section->activities, 10, 1, [])
                ->appends(
                    ['section_id' => $section->id]
                );
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
                $sectionData['children'] = $this->getSectionsWithActivities($section->children, $section);
            }

            $data[] = $sectionData;
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
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
