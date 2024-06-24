export interface Timer {
    isActive: boolean;
    startTime: number;
    elapsedTime: number;
    intervalId: number | null;
    updateIntervalId: number | null;
    activityId: number | null;
    sectionId: number | null;
}

export interface TimerState {
    timers: { [key: string]: Timer };
}
