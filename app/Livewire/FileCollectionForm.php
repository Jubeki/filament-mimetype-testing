<?php

namespace App\Livewire;

use App\Models\FileCollection;
use App\Models\Post;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class FileCollectionForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                FileUpload::make('files')
                    ->multiple()
                    ->disk('local')
                    ->storeFileNamesIn('file_names')
                    ->required()
                    ->acceptedFileTypes(['application/pdf', 'image/jpg', 'image/jpeg', 'image/png'])
                    ->maxSize(5120)
                    ->maxFiles(5)

            ])
            ->statePath('data');
    }

    public function create(): void
    {
        FileCollection::create($this->form->getState());
    }

    public function render(): View
    {
        return view('livewire.file-collection-form');
    }
}
