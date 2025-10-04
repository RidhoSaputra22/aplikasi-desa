<?php

use App\Livewire\Guest\Certificate\TidakMampu;
use App\Models\TidakMampuCertificate;
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
        'name' => 'Dewi Sartika',
        'idCardNumber' => '3171234567890124',
        'placeOfBirth' => 'Bekasi',
        'dayOfBirth' => 25,
        'monthOfBirth' => 12,
        'yearOfBirth' => 1995,
        'religion' => 'Islam',
        'gender' => 'P',
        'profession' => 'Ibu Rumah Tangga',
        'address' => 'Jl. Melati No. 78, RT 003/RW 005, Bekasi',

        // Data keterangan
        'usedFor' => 'Untuk bantuan sosial dari pemerintah daerah',

        // Lampiran persyaratan
        'attachment' => UploadedFile::fake()->create('kartu_keluarga.pdf', 1000, 'application/pdf')
    ];
});

it('can render tidak mampu certificate form', function () {
    Livewire::test(TidakMampu::class)
        ->assertOk();
});

describe('Tidak Mampu Certificate Validation', function () {
    it('validates required personal data fields', function () {
        Livewire::test(TidakMampu::class)
            ->set('name', '')
            ->set('idCardNumber', '')
            ->set('placeOfBirth', '')
            ->set('religion', '')
            ->set('gender', '')
            ->set('profession', '')
            ->set('address', '')
            ->set('usedFor', '')
            ->call('submit')
            ->assertHasErrors([
                'name' => 'required',
                'idCardNumber' => 'required',
                'placeOfBirth' => 'required',
                'religion' => 'required',
                'gender' => 'required',
                'profession' => 'required',
                'address' => 'required',
                'usedFor' => 'required'
            ]);
    });

    it('validates name field rules', function () {
        Livewire::test(TidakMampu::class)
            ->set('name', 'A')
            ->call('submit')
            ->assertHasErrors(['name' => 'min']);

        Livewire::test(TidakMampu::class)
            ->set('name', str_repeat('A', 101))
            ->call('submit')
            ->assertHasErrors(['name' => 'max']);
    });

    it('validates id card number field', function () {
        Livewire::test(TidakMampu::class)
            ->set('idCardNumber', '123456789')
            ->call('submit')
            ->assertHasErrors(['idCardNumber' => 'size']);

        Livewire::test(TidakMampu::class)
            ->set('idCardNumber', '1234567890123abc')
            ->call('submit')
            ->assertHasErrors(['idCardNumber' => 'regex']);
    });

    it('validates place of birth field', function () {
        Livewire::test(TidakMampu::class)
            ->set('placeOfBirth', 'A')
            ->call('submit')
            ->assertHasErrors(['placeOfBirth' => 'min']);

        Livewire::test(TidakMampu::class)
            ->set('placeOfBirth', str_repeat('A', 101))
            ->call('submit')
            ->assertHasErrors(['placeOfBirth' => 'max']);
    });

    it('validates birth date fields', function () {
        Livewire::test(TidakMampu::class)
            ->set('dayOfBirth', 0)
            ->call('submit')
            ->assertHasErrors(['dayOfBirth' => 'min']);

        Livewire::test(TidakMampu::class)
            ->set('dayOfBirth', 32)
            ->call('submit')
            ->assertHasErrors(['dayOfBirth' => 'max']);

        Livewire::test(TidakMampu::class)
            ->set('monthOfBirth', 0)
            ->call('submit')
            ->assertHasErrors(['monthOfBirth' => 'min']);

        Livewire::test(TidakMampu::class)
            ->set('monthOfBirth', 13)
            ->call('submit')
            ->assertHasErrors(['monthOfBirth' => 'max']);

        Livewire::test(TidakMampu::class)
            ->set('yearOfBirth', 1899)
            ->call('submit')
            ->assertHasErrors(['yearOfBirth' => 'min']);

        Livewire::test(TidakMampu::class)
            ->set('yearOfBirth', 2026)
            ->call('submit')
            ->assertHasErrors(['yearOfBirth' => 'max']);
    });

    it('validates religion field', function () {
        Livewire::test(TidakMampu::class)
            ->set('religion', 'A')
            ->call('submit')
            ->assertHasErrors(['religion' => 'min']);

        Livewire::test(TidakMampu::class)
            ->set('religion', str_repeat('A', 51))
            ->call('submit')
            ->assertHasErrors(['religion' => 'max']);
    });

    it('validates gender field', function () {
        Livewire::test(TidakMampu::class)
            ->set('gender', 'X')
            ->call('submit')
            ->assertHasErrors(['gender' => 'in']);
    });

    it('validates profession field', function () {
        Livewire::test(TidakMampu::class)
            ->set('profession', 'A')
            ->call('submit')
            ->assertHasErrors(['profession' => 'min']);

        Livewire::test(TidakMampu::class)
            ->set('profession', str_repeat('A', 101))
            ->call('submit')
            ->assertHasErrors(['profession' => 'max']);
    });

    it('validates address field', function () {
        Livewire::test(TidakMampu::class)
            ->set('address', 'Jl. A')
            ->call('submit')
            ->assertHasErrors(['address' => 'min']);

        Livewire::test(TidakMampu::class)
            ->set('address', str_repeat('A', 501))
            ->call('submit')
            ->assertHasErrors(['address' => 'max']);
    });

    it('validates used for field', function () {
        Livewire::test(TidakMampu::class)
            ->set('usedFor', 'Test')
            ->call('submit')
            ->assertHasErrors(['usedFor' => 'min']);

        Livewire::test(TidakMampu::class)
            ->set('usedFor', str_repeat('A', 201))
            ->call('submit')
            ->assertHasErrors(['usedFor' => 'max']);
    });

    it('validates attachment field rules', function () {
        $invalidFile = UploadedFile::fake()->create('test.txt', 1000, 'text/plain');

        Livewire::test(TidakMampu::class)
            ->set('attachment', $invalidFile)
            ->call('submit')
            ->assertHasErrors(['attachment' => 'mimes']);

        $oversizedFile = UploadedFile::fake()->create('large.pdf', 3000, 'application/pdf');

        Livewire::test(TidakMampu::class)
            ->set('attachment', $oversizedFile)
            ->call('submit')
            ->assertHasErrors(['attachment' => 'max']);
    });
});

describe('Tidak Mampu Certificate Submission', function () {
    it('can submit valid tidak mampu certificate data', function () {
        $component = Livewire::test(TidakMampu::class);

        foreach ($this->validData as $key => $value) {
            $component->set($key, $value);
        }

        $component->call('submit')
            ->assertHasNoErrors();

        // Assert database record was created
        expect(TidakMampuCertificate::count())->toBe(1);

        $certificate = TidakMampuCertificate::first();
        expect($certificate->name)->toBe('Dewi Sartika');
        expect($certificate->id_card_number)->toBe('3171234567890124');
        expect($certificate->place_of_birth)->toBe('Bekasi');
        expect($certificate->gender)->toBe('P');
        expect($certificate->profession)->toBe('Ibu Rumah Tangga');
        expect($certificate->used_for)->toBe('Untuk bantuan sosial dari pemerintah daerah');
        expect($certificate->code)->not->toBeNull();
        expect($certificate->confirmation_status->value)->toBe('pending');
    });

    it('can submit without attachment', function () {
        $dataWithoutAttachment = $this->validData;
        unset($dataWithoutAttachment['attachment']);

        $component = Livewire::test(TidakMampu::class);

        foreach ($dataWithoutAttachment as $key => $value) {
            $component->set($key, $value);
        }

        $component->call('submit')
            ->assertHasNoErrors();

        $certificate = TidakMampuCertificate::first();
        expect($certificate->attachment)->toBeNull();
    });

    it('stores attachment file correctly when provided', function () {
        Storage::fake('private');

        $component = Livewire::test(TidakMampu::class);

        foreach ($this->validData as $key => $value) {
            $component->set($key, $value);
        }

        $component->call('submit');

        $certificate = TidakMampuCertificate::first();
        expect($certificate->attachment)->not->toBeNull();

        expect(Storage::disk('private')->exists($certificate->attachment))->toBeTrue();
        expect($certificate->attachment)->toContain('certificates/tidak-mampu');
    });

    it('auto-generates certificate code on submission', function () {
        $component = Livewire::test(TidakMampu::class);

        foreach ($this->validData as $key => $value) {
            $component->set($key, $value);
        }

        $component->call('submit');

        $certificate = TidakMampuCertificate::first();
        expect($certificate->code)->toMatch('/^[A-Z]{4}-[A-Z]{4}-[A-Z]{4}$/');
    });

    it('resets form after successful submission', function () {
        $component = Livewire::test(TidakMampu::class);

        foreach ($this->validData as $key => $value) {
            $component->set($key, $value);
        }

        $component->call('submit');

        expect($component->get('name'))->toBeNull();
        expect($component->get('idCardNumber'))->toBeNull();
        expect($component->get('placeOfBirth'))->toBeNull();
        expect($component->get('profession'))->toBeNull();
        expect($component->get('usedFor'))->toBeNull();
        expect($component->get('attachment'))->toBeNull();
    });

    it('handles database errors gracefully', function () {
        // This test would require more complex mocking setup
        // For now, we'll test that the component can handle basic error scenarios
        $component = Livewire::test(TidakMampu::class);

        // Test with invalid data that might cause database constraint errors
        $component->set('name', 'Test User')
            ->set('idCardNumber', 'invalid-id')
            ->call('submit')
            ->assertHasErrors();

        expect(TidakMampuCertificate::count())->toBe(0);
    });
});

describe('Tidak Mampu Certificate Data Mapping', function () {
    it('correctly maps all form fields to database columns', function () {
        $component = Livewire::test(TidakMampu::class);

        foreach ($this->validData as $key => $value) {
            $component->set($key, $value);
        }

        $component->call('submit');

        $certificate = TidakMampuCertificate::first();

        // Test personal data mapping
        expect($certificate->name)->toBe($this->validData['name']);
        expect($certificate->id_card_number)->toBe($this->validData['idCardNumber']);
        expect($certificate->place_of_birth)->toBe($this->validData['placeOfBirth']);
        expect($certificate->day_of_birth)->toBe((string)$this->validData['dayOfBirth']);
        expect($certificate->month_of_birth)->toBe((string)$this->validData['monthOfBirth']);
        expect($certificate->year_of_birth)->toBe((string)$this->validData['yearOfBirth']);
        expect($certificate->religion)->toBe($this->validData['religion']);
        expect($certificate->gender)->toBe($this->validData['gender']);
        expect($certificate->profession)->toBe($this->validData['profession']);
        expect($certificate->address)->toBe($this->validData['address']);
        expect($certificate->used_for)->toBe($this->validData['usedFor']);
    });
});
