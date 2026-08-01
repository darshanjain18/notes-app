<?php

namespace App\Observers;

use App\Models\Note;
use Illuminate\Support\Str;

class NoteObserver
{
    /**
     * Handle the Note "created" event.
     */
    public function creating(Note $note): void
    {
        $note->slug = Str::slug($note->title);

    }

    /**
     * Handle the Note "updated" event.
     */
    public function updated(Note $note): void
    {
        //
    }

    /**
     * Handle the Note "deleted" event.
     */
    public function deleted(Note $note): void
    {
        //
    }

    /**
     * Handle the Note "restored" event.
     */
    public function restored(Note $note): void
    {
        //
    }

    /**
     * Handle the Note "force deleted" event.
     */
    public function forceDeleted(Note $note): void
    {
        //
    }
}
