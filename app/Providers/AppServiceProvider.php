<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Modules\General\Models\Document;
use Modules\General\Policies\DocumentPolicy;

use Modules\Jobs\Models\Document as JobsDocument;
use Modules\Jobs\Policies\DocumentPolicy as JobsDocumentPolicy;

use Modules\Motors\Models\Document as MotorsDocument;
use Modules\Motors\Policies\DocumentPolicy as MotorsDocumentPolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Document::class, DocumentPolicy::class);
        Gate::policy(JobsDocument::class, JobsDocumentPolicy::class);
        Gate::policy(MotorsDocument::class, MotorsDocumentPolicy::class);
    }
}
