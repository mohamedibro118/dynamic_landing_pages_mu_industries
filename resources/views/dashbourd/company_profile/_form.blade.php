<div class="row">
    <div class="row" style="justify-content: space-between">
        <x-input-wedgits.pageSitting :page="$agent?->companyprofile ?? null" />
    </div>
    <div class="col-md-4 mt-2">
        <x-bladewind.filepicker name="logo" placeholder="company logo" id="headerlogo" :url="asset($agent?->companyprofile?->logo ?? null)" min_width="250"
            min_height="250" />
    </div>
</div>
