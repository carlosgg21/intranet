<?php

namespace App\Http\Livewire;

use App\Models\Process;
use App\Models\ProcessFile;
use App\Models\ProcessFileStatus;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ProcessProcessFilesDetail extends Component
{
    use WithPagination;
    use WithFileUploads;
    use AuthorizesRequests;

    public Process $process;
    public ProcessFile $processFile;
    public $processFileStatusesForSelect = [];
    public $processFileFile;
    public $uploadIteration = 0;
    public $processFileCreatedDate;
    public $processFileApprovalDate;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New ProcessFile';

    protected $rules = [
        'processFile.code'                   => ['required', 'max:255', 'string'],
        'processFile.title'                  => ['required', 'max:255', 'string'],
        'processFile.description'            => ['nullable', 'max:255', 'string'],
        'processFileCreatedDate'             => ['nullable', 'date'],
        'processFile.created_by'             => ['nullable', 'max:255', 'string'],
        'processFile.reviewed_by'            => ['required', 'max:255', 'string'],
        'processFile.appoved_by'             => ['required', 'max:255', 'string'],
        'processFileApprovalDate'            => ['required', 'date'],
        'processFile.process_file_status_id' => [
            'required',
            'exists:process_file_statuses,id',
        ],
        'processFileFile' => ['file', 'max:1024', 'nullable'],
    ];

    public function mount(Process $process): void
    {
        $this->process = $process;
        $this->processFileStatusesForSelect = ProcessFileStatus::pluck(
            'name',
            'id'
        );
        $this->resetProcessFileData();
    }

    public function resetProcessFileData(): void
    {
        $this->processFile = new ProcessFile();

        $this->processFileFile = null;
        $this->processFileCreatedDate = null;
        $this->processFileApprovalDate = null;
        $this->processFile->process_file_status_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newProcessFile(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.process_process_files.new_title');
        $this->resetProcessFileData();

        $this->showModal();
    }

    public function editProcessFile(ProcessFile $processFile): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.process_process_files.edit_title');
        $this->processFile = $processFile;

        $this->processFileCreatedDate = optional(
            $this->processFile->created_date
        )->format('Y-m-d');
        $this->processFileApprovalDate = optional(
            $this->processFile->approval_date
        )->format('Y-m-d');

        $this->dispatchBrowserEvent('refresh');

        $this->showModal();
    }

    public function showModal(): void
    {
        $this->resetErrorBag();
        $this->showingModal = true;
    }

    public function hideModal(): void
    {
        $this->showingModal = false;
    }

    public function save(): void
    {
        $this->validate();

        if (!$this->processFile->process_id) {
            $this->authorize('create', ProcessFile::class);

            $this->processFile->process_id = $this->process->id;
        } else {
            $this->authorize('update', $this->processFile);
        }

        if ($this->processFileFile) {
            $this->processFile->file = $this->processFileFile->store('public');
        }

        $this->processFile->created_date = \Carbon\Carbon::make(
            $this->processFileCreatedDate
        );
        $this->processFile->approval_date = \Carbon\Carbon::make(
            $this->processFileApprovalDate
        );

        $this->processFile->save();

        $this->uploadIteration++;

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', ProcessFile::class);

        collect($this->selected)->each(function (string $id) {
            $processFile = ProcessFile::findOrFail($id);

            if ($processFile->file) {
                Storage::delete($processFile->file);
            }

            $processFile->delete();
        });

        $this->selected = [];
        $this->allSelected = false;

        $this->resetProcessFileData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];

            return;
        }

        foreach ($this->process->processFiles as $processFile) {
            array_push($this->selected, $processFile->id);
        }
    }

    public function render(): View
    {
        return view('livewire.process-process-files-detail', [
            'processFiles' => $this->process->processFiles()->paginate(20),
        ]);
    }
}
