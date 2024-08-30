<?php

use App\Livewire\FileCollectionForm;
use Illuminate\Http\UploadedFile;

use function Pest\Livewire\livewire;

test('example', function () {

    livewire(FileCollectionForm::class)
        ->set('data.files', [
            UploadedFile::fake()->create('file1.jpg', 1024, 'text/plain'),
        ])
        ->call('create')
        ->assertHasFormErrors([
            'data.files' => 'mimetypes'
        ]);
});
