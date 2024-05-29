<x-navbar-layout>
    <x-slot name="slot">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="biodata-tab" data-bs-toggle="tab" data-bs-target="#biodata" type="button" role="tab" aria-controls="biodata" aria-selected="true">biodata</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="Dokumen-tab" data-bs-toggle="tab" data-bs-target="#Dokumen" type="button" role="tab" aria-controls="Dokumen" aria-selected="false">Dokumen</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="biodata" role="tabpanel" aria-labelledby="biodata-tab">
                @include('page-siswa.home')
            </div>
            <div class="tab-pane fade" id="Dokumen" role="tabpanel" aria-labelledby="Dokumen-tab">
               @include('page-siswa.dokumen')
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <p>Contact content goes here...</p>
            </div>
        </div>
    </x-slot>
</x-navbar-layout>