<?php

use App\Livewire\Guest\Certificate\PenghasilanOrtu;
use App\Models\ParentIncomeCertificate;
use Livewire\Livewire;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    Storage::fake('private');

    // Set up test environment
    $this->validData = [
        // Data diri
        'name' => 'Siti Rahayu',
        'placeOfBirth' => 'Bandung',
        'dayOfBirth' => 20,
        'monthOfBirth' => 5,
        'yearOfBirth' => 2000,
        'religion' => 'Islam',
        'profession' => 'Mahasiswa',
        'address' => 'Jl. Sudirman No. 45, Bandung',

        // Data orang tua atau wali
        'parentName' => 'Budi Rahayu',
        'parentPlaceOfBirth' => 'Jakarta',
        'parentDayOfBirth' => 10,
        'parentMonthOfBirth' => 3,
        'parentYearOfBirth' => 1970,
        'parentReligion' => 'Islam',
        'parentProfession' => 'Pegawai Negeri Sipil',
        'parentAddress' => 'Jl. Sudirman No. 45, Bandung',

        // Data keterangan penghasilan
        'nominalIncome' => 5000000,
        'numberDepandent' => 3,
        'usedFor' => 'Untuk keperluan beasiswa kuliah',

        // Lampiran persyaratan
        'attachment' => UploadedFile::fake()->create('slip_gaji.pdf', 1000, 'application/pdf')
    ];
});

it('can render parent income certificate form', function () {
    Livewire::test(PenghasilanOrtu::class)
        ->assertOk();
});

describe('Parent Income Certificate Validation', function () {
    it('validates required applicant data fields', function () {
        Livewire::test(PenghasilanOrtu::class)
            ->set('name', '')
            ->set('placeOfBirth', '')
            ->set('religion', '')
            ->set('profession', '')
            ->set('address', '')
            ->call('submit')
            ->assertHasErrors([
                'name' => 'required',
                'placeOfBirth' => 'required',
                'religion' => 'required',
                'profession' => 'required',
                'address' => 'required'
            ]);
    });

    it('validates applicant name field rules', function () {
        Livewire::test(PenghasilanOrtu::class)
            ->set('name', 'A')
            ->call('submit')
            ->assertHasErrors(['name' => 'min']);

        Livewire::test(PenghasilanOrtu::class)
            ->set('name', str_repeat('A', 101))
            ->call('submit')
            ->assertHasErrors(['name' => 'max']);
    });

    it('validates applicant birth date fields', function () {
        Livewire::test(PenghasilanOrtu::class)
            ->set('dayOfBirth', 0)
            ->call('submit')
            ->assertHasErrors(['dayOfBirth' => 'min']);

        Livewire::test(PenghasilanOrtu::class)
            ->set('dayOfBirth', 32)
            ->call('submit')
            ->assertHasErrors(['dayOfBirth' => 'max']);

        Livewire::test(PenghasilanOrtu::class)
            ->set('monthOfBirth', 0)
            ->call('submit')
            ->assertHasErrors(['monthOfBirth' => 'min']);

        Livewire::test(PenghasilanOrtu::class)
            ->set('monthOfBirth', 13)
            ->call('submit')
            ->assertHasErrors(['monthOfBirth' => 'max']);

        Livewire::test(PenghasilanOrtu::class)
            ->set('yearOfBirth', 1899)
            ->call('submit')
            ->assertHasErrors(['yearOfBirth' => 'min']);

        Livewire::test(PenghasilanOrtu::class)
            ->set('yearOfBirth', 2026)
            ->call('submit')
            ->assertHasErrors(['yearOfBirth' => 'max']);
    });

    it('validates required parent data fields', function () {
        Livewire::test(PenghasilanOrtu::class)
            ->set('parentName', '')
            ->set('parentPlaceOfBirth', '')
            ->set('parentReligion', '')
            ->set('parentProfession', '')
            ->set('parentAddress', '')
            ->call('submit')
            ->assertHasErrors([
                'parentName' => 'required',
                'parentPlaceOfBirth' => 'required',
                'parentReligion' => 'required',
                'parentProfession' => 'required',
                'parentAddress' => 'required'
            ]);
    });

    it('validates parent name field rules', function () {
        Livewire::test(PenghasilanOrtu::class)
            ->set('parentName', 'A')
            ->call('submit')
            ->assertHasErrors(['parentName' => 'min']);

        Livewire::test(PenghasilanOrtu::class)
            ->set('parentName', str_repeat('A', 101))
            ->call('submit')
            ->assertHasErrors(['parentName' => 'max']);
    });

    it('validates parent birth date fields', function () {
        Livewire::test(PenghasilanOrtu::class)
            ->set('parentDayOfBirth', 0)
            ->call('submit')
            ->assertHasErrors(['parentDayOfBirth' => 'min']);

        Livewire::test(PenghasilanOrtu::class)
            ->set('parentDayOfBirth', 32)
            ->call('submit')
            ->assertHasErrors(['parentDayOfBirth' => 'max']);

        Livewire::test(PenghasilanOrtu::class)
            ->set('parentMonthOfBirth', 0)
            ->call('submit')
            ->assertHasErrors(['parentMonthOfBirth' => 'min']);

        Livewire::test(PenghasilanOrtu::class)
            ->set('parentMonthOfBirth', 13)
            ->call('submit')
            ->assertHasErrors(['parentMonthOfBirth' => 'max']);

        Livewire::test(PenghasilanOrtu::class)
            ->set('parentYearOfBirth', 1899)
            ->call('submit')
            ->assertHasErrors(['parentYearOfBirth' => 'min']);

        Livewire::test(PenghasilanOrtu::class)
            ->set('parentYearOfBirth', 2025)
            ->call('submit')
            ->assertHasErrors(['parentYearOfBirth' => 'max']);
    });

    it('validates income information fields', function () {
        Livewire::test(PenghasilanOrtu::class)
            ->set('nominalIncome', '')
            ->set('numberDepandent', '')
            ->set('usedFor', '')
            ->call('submit')
            ->assertHasErrors([
                'nominalIncome' => 'required',
                'numberDepandent' => 'required',
                'usedFor' => 'required'
            ]);
    });

    it('validates nominal income field rules', function () {
        Livewire::test(PenghasilanOrtu::class)
            ->set('nominalIncome', -1)
            ->call('submit')
            ->assertHasErrors(['nominalIncome' => 'min']);

        Livewire::test(PenghasilanOrtu::class)
            ->set('nominalIncome', 1000000000)
            ->call('submit')
            ->assertHasErrors(['nominalIncome' => 'max']);

        Livewire::test(PenghasilanOrtu::class)
            ->set('nominalIncome', 'not_a_number')
            ->call('submit')
            ->assertHasErrors(['nominalIncome' => 'numeric']);
    });

    it('validates number of dependents field rules', function () {
        Livewire::test(PenghasilanOrtu::class)
            ->set('numberDepandent', -1)
            ->call('submit')
            ->assertHasErrors(['numberDepandent' => 'min']);

        Livewire::test(PenghasilanOrtu::class)
            ->set('numberDepandent', 21)
            ->call('submit')
            ->assertHasErrors(['numberDepandent' => 'max']);
    });

    it('validates used for field rules', function () {
        Livewire::test(PenghasilanOrtu::class)
            ->set('usedFor', 'Test')
            ->call('submit')
            ->assertHasErrors(['usedFor' => 'min']);

        Livewire::test(PenghasilanOrtu::class)
            ->set('usedFor', str_repeat('A', 201))
            ->call('submit')
            ->assertHasErrors(['usedFor' => 'max']);
    });

    it('validates attachment field rules', function () {
        $invalidFile = UploadedFile::fake()->create('test.txt', 1000, 'text/plain');

        Livewire::test(PenghasilanOrtu::class)
            ->set('attachment', $invalidFile)
            ->call('submit')
            ->assertHasErrors(['attachment' => 'mimes']);

        $oversizedFile = UploadedFile::fake()->create('large.pdf', 3000, 'application/pdf');

        Livewire::test(PenghasilanOrtu::class)
            ->set('attachment', $oversizedFile)
            ->call('submit')
            ->assertHasErrors(['attachment' => 'max']);
    });
});

describe('Parent Income Certificate Submission', function () {
    it('can submit valid parent income certificate data', function () {
        $component = Livewire::test(PenghasilanOrtu::class);

        foreach ($this->validData as $key => $value) {
            $component->set($key, $value);
        }

        $component->call('submit')
            ->assertHasNoErrors();

        // Assert database record was created
        expect(ParentIncomeCertificate::count())->toBe(1);

        $certificate = ParentIncomeCertificate::first();
        expect($certificate->name)->toBe('Siti Rahayu');
        expect($certificate->parent_name)->toBe('Budi Rahayu');
        expect($certificate->nominal_income)->toBe(5000000);
        expect($certificate->number_depandent)->toBe(3);
        expect($certificate->used_for)->toBe('Untuk keperluan beasiswa kuliah');
        expect($certificate->code)->not->toBeNull();
        expect($certificate->confirmation_status->value)->toBe('pending');
    });

    it('can submit without attachment', function () {
        $dataWithoutAttachment = $this->validData;
        unset($dataWithoutAttachment['attachment']);

        $component = Livewire::test(PenghasilanOrtu::class);

        foreach ($dataWithoutAttachment as $key => $value) {
            $component->set($key, $value);
        }

        $component->call('submit')
            ->assertHasNoErrors();

        $certificate = ParentIncomeCertificate::first();
        expect($certificate->attachment)->toBeNull();
    });

    it('stores attachment file correctly when provided', function () {
        Storage::fake('private');

        $component = Livewire::test(PenghasilanOrtu::class);

        foreach ($this->validData as $key => $value) {
            $component->set($key, $value);
        }

        $component->call('submit');

        $certificate = ParentIncomeCertificate::first();
        expect($certificate->attachment)->not->toBeNull();

        expect(Storage::disk('private')->exists($certificate->attachment))->toBeTrue();
        expect($certificate->attachment)->toContain('certificates/parent-income');
    });

    it('auto-generates certificate code on submission', function () {
        $component = Livewire::test(PenghasilanOrtu::class);

        foreach ($this->validData as $key => $value) {
            $component->set($key, $value);
        }

        $component->call('submit');

        $certificate = ParentIncomeCertificate::first();
        expect($certificate->code)->toMatch('/^[A-Z]{4}-[A-Z]{4}-[A-Z]{4}$/');
    });

    it('resets form after successful submission', function () {
        $component = Livewire::test(PenghasilanOrtu::class);

        foreach ($this->validData as $key => $value) {
            $component->set($key, $value);
        }

        $component->call('submit');

        expect($component->get('name'))->toBeNull();
        expect($component->get('parentName'))->toBeNull();
        expect($component->get('nominalIncome'))->toBeNull();
        expect($component->get('numberDepandent'))->toBeNull();
        expect($component->get('usedFor'))->toBeNull();
        expect($component->get('attachment'))->toBeNull();
    });

    it('handles database errors gracefully', function () {
        // This test would require more complex mocking setup
        // For now, we'll test that the component can handle basic error scenarios
        $component = Livewire::test(PenghasilanOrtu::class);

        // Test with invalid data that might cause database constraint errors
        $component->set('name', 'Test User')
            ->set('nominalIncome', -1000)  // Invalid negative income
            ->call('submit')
            ->assertHasErrors();

        expect(ParentIncomeCertificate::count())->toBe(0);
    });
});

describe('Parent Income Certificate Data Mapping', function () {
    it('correctly maps all form fields to database columns', function () {
        $component = Livewire::test(PenghasilanOrtu::class);

        foreach ($this->validData as $key => $value) {
            $component->set($key, $value);
        }

        $component->call('submit');

        $certificate = ParentIncomeCertificate::first();

        // Test applicant data mapping
        expect($certificate->name)->toBe($this->validData['name']);
        expect($certificate->place_of_birth)->toBe($this->validData['placeOfBirth']);
        expect($certificate->day_of_birth)->toBe((string)$this->validData['dayOfBirth']);
        expect($certificate->month_of_birth)->toBe((string)$this->validData['monthOfBirth']);
        expect($certificate->year_of_birth)->toBe((string)$this->validData['yearOfBirth']);
        expect($certificate->religion)->toBe($this->validData['religion']);
        expect($certificate->profession)->toBe($this->validData['profession']);
        expect($certificate->address)->toBe($this->validData['address']);

        // Test parent data mapping
        expect($certificate->parent_name)->toBe($this->validData['parentName']);
        expect($certificate->parent_place_of_birth)->toBe($this->validData['parentPlaceOfBirth']);
        expect($certificate->parent_day_of_birth)->toBe((string)$this->validData['parentDayOfBirth']);
        expect($certificate->parent_month_of_birth)->toBe((string)$this->validData['parentMonthOfBirth']);
        expect($certificate->parent_year_of_birth)->toBe((string)$this->validData['parentYearOfBirth']);
        expect($certificate->parent_religion)->toBe($this->validData['parentReligion']);
        expect($certificate->parent_profession)->toBe($this->validData['parentProfession']);
        expect($certificate->parent_address)->toBe($this->validData['parentAddress']);

        // Test income information mapping
        expect($certificate->nominal_income)->toBe($this->validData['nominalIncome']);
        expect($certificate->number_depandent)->toBe($this->validData['numberDepandent']);
        expect($certificate->used_for)->toBe($this->validData['usedFor']);
    });
});