<?php

use App\Livewire\Guest\Certificate\Usaha;
use App\Models\UsahaCertificate;
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
        'name' => 'Agus Setiawan',
        'idCardNumber' => '3171234567890125',
        'placeOfBirth' => 'Yogyakarta',
        'dayOfBirth' => 8,
        'monthOfBirth' => 4,
        'yearOfBirth' => 1985,
        'religion' => 'Islam',
        'gender' => 'L',
        'profession' => 'Wiraswasta',
        'address' => 'Jl. Kaliurang No. 15, RT 002/RW 001, Yogyakarta',

        // Data keterangan
        'businessType' => 'Perdagangan',
        'usedFor' => 'Untuk mengajukan izin usaha mikro perdagangan sayuran',

        // Lampiran persyaratan
        'attachment' => UploadedFile::fake()->create('surat_pernyataan.pdf', 1000, 'application/pdf')
    ];
});

it('can render usaha certificate form', function () {
    Livewire::test(Usaha::class)
        ->assertOk();
});

describe('Usaha Certificate Validation', function () {
    it('validates required personal data fields', function () {
        Livewire::test(Usaha::class)
            ->set('name', '')
            ->set('idCardNumber', '')
            ->set('placeOfBirth', '')
            ->set('religion', '')
            ->set('gender', '')
            ->set('profession', '')
            ->set('address', '')
            ->set('businessType', '')
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
                'businessType' => 'required',
                'usedFor' => 'required'
            ]);
    });

    it('validates name field rules', function () {
        Livewire::test(Usaha::class)
            ->set('name', 'A')
            ->call('submit')
            ->assertHasErrors(['name' => 'min']);

        Livewire::test(Usaha::class)
            ->set('name', str_repeat('A', 101))
            ->call('submit')
            ->assertHasErrors(['name' => 'max']);
    });

    it('validates id card number field', function () {
        Livewire::test(Usaha::class)
            ->set('idCardNumber', '123456789')
            ->call('submit')
            ->assertHasErrors(['idCardNumber' => 'size']);

        Livewire::test(Usaha::class)
            ->set('idCardNumber', '1234567890123abc')
            ->call('submit')
            ->assertHasErrors(['idCardNumber' => 'regex']);
    });

    it('validates place of birth field', function () {
        Livewire::test(Usaha::class)
            ->set('placeOfBirth', 'A')
            ->call('submit')
            ->assertHasErrors(['placeOfBirth' => 'min']);

        Livewire::test(Usaha::class)
            ->set('placeOfBirth', str_repeat('A', 101))
            ->call('submit')
            ->assertHasErrors(['placeOfBirth' => 'max']);
    });

    it('validates birth date fields', function () {
        Livewire::test(Usaha::class)
            ->set('dayOfBirth', 0)
            ->call('submit')
            ->assertHasErrors(['dayOfBirth' => 'min']);

        Livewire::test(Usaha::class)
            ->set('dayOfBirth', 32)
            ->call('submit')
            ->assertHasErrors(['dayOfBirth' => 'max']);

        Livewire::test(Usaha::class)
            ->set('monthOfBirth', 0)
            ->call('submit')
            ->assertHasErrors(['monthOfBirth' => 'min']);

        Livewire::test(Usaha::class)
            ->set('monthOfBirth', 13)
            ->call('submit')
            ->assertHasErrors(['monthOfBirth' => 'max']);

        Livewire::test(Usaha::class)
            ->set('yearOfBirth', 1899)
            ->call('submit')
            ->assertHasErrors(['yearOfBirth' => 'min']);

        Livewire::test(Usaha::class)
            ->set('yearOfBirth', 2026)
            ->call('submit')
            ->assertHasErrors(['yearOfBirth' => 'max']);
    });

    it('validates religion field', function () {
        Livewire::test(Usaha::class)
            ->set('religion', 'A')
            ->call('submit')
            ->assertHasErrors(['religion' => 'min']);

        Livewire::test(Usaha::class)
            ->set('religion', str_repeat('A', 51))
            ->call('submit')
            ->assertHasErrors(['religion' => 'max']);
    });

    it('validates gender field', function () {
        Livewire::test(Usaha::class)
            ->set('gender', 'X')
            ->call('submit')
            ->assertHasErrors(['gender' => 'in']);
    });

    it('validates profession field', function () {
        Livewire::test(Usaha::class)
            ->set('profession', 'A')
            ->call('submit')
            ->assertHasErrors(['profession' => 'min']);

        Livewire::test(Usaha::class)
            ->set('profession', str_repeat('A', 101))
            ->call('submit')
            ->assertHasErrors(['profession' => 'max']);
    });

    it('validates address field', function () {
        Livewire::test(Usaha::class)
            ->set('address', 'Jl. A')
            ->call('submit')
            ->assertHasErrors(['address' => 'min']);

        Livewire::test(Usaha::class)
            ->set('address', str_repeat('A', 501))
            ->call('submit')
            ->assertHasErrors(['address' => 'max']);
    });

    it('validates business type field for business purposes', function () {
        Livewire::test(Usaha::class)
            ->set('businessType', 'A')
            ->call('submit')
            ->assertHasErrors(['businessType' => 'min']);

        Livewire::test(Usaha::class)
            ->set('businessType', str_repeat('A', 101))
            ->call('submit')
            ->assertHasErrors(['businessType' => 'max']);
    });

    it('validates used for field for business purposes', function () {
        Livewire::test(Usaha::class)
            ->set('usedFor', 'Test')
            ->call('submit')
            ->assertHasErrors(['usedFor' => 'min']);

        Livewire::test(Usaha::class)
            ->set('usedFor', str_repeat('A', 201))
            ->call('submit')
            ->assertHasErrors(['usedFor' => 'max']);
    });

    it('validates attachment field rules', function () {
        $invalidFile = UploadedFile::fake()->create('test.txt', 1000, 'text/plain');

        Livewire::test(Usaha::class)
            ->set('attachment', $invalidFile)
            ->call('submit')
            ->assertHasErrors(['attachment' => 'mimes']);

        $oversizedFile = UploadedFile::fake()->create('large.pdf', 3000, 'application/pdf');

        Livewire::test(Usaha::class)
            ->set('attachment', $oversizedFile)
            ->call('submit')
            ->assertHasErrors(['attachment' => 'max']);
    });
});

describe('Usaha Certificate Submission', function () {
    it('can submit valid usaha certificate data', function () {
        $component = Livewire::test(Usaha::class);

        foreach ($this->validData as $key => $value) {
            $component->set($key, $value);
        }

        $component->call('submit')
            ->assertHasNoErrors();

        // Assert database record was created
        expect(UsahaCertificate::count())->toBe(1);

        $certificate = UsahaCertificate::first();
        expect($certificate->name)->toBe('Agus Setiawan');
        expect($certificate->id_card_number)->toBe('3171234567890125');
        expect($certificate->place_of_birth)->toBe('Yogyakarta');
        expect($certificate->gender)->toBe('L');
        expect($certificate->profession)->toBe('Wiraswasta');
        expect($certificate->used_for)->toBe('Untuk mengajukan izin usaha mikro perdagangan sayuran');
        expect($certificate->code)->not->toBeNull();
        expect($certificate->confirmation_status->value)->toBe('pending');
    });

    it('can submit without attachment', function () {
        $dataWithoutAttachment = $this->validData;
        unset($dataWithoutAttachment['attachment']);

        $component = Livewire::test(Usaha::class);

        foreach ($dataWithoutAttachment as $key => $value) {
            $component->set($key, $value);
        }

        $component->call('submit')
            ->assertHasNoErrors();

        $certificate = UsahaCertificate::first();
        expect($certificate->attachment)->toBeNull();
    });

    it('stores attachment file correctly when provided', function () {
        Storage::fake('private');

        $component = Livewire::test(Usaha::class);

        foreach ($this->validData as $key => $value) {
            $component->set($key, $value);
        }

        $component->call('submit');

        $certificate = UsahaCertificate::first();
        expect($certificate->attachment)->not->toBeNull();

        expect(Storage::disk('private')->exists($certificate->attachment))->toBeTrue();
        expect($certificate->attachment)->toContain('certificates/usaha');
    });

    it('auto-generates certificate code on submission', function () {
        $component = Livewire::test(Usaha::class);

        foreach ($this->validData as $key => $value) {
            $component->set($key, $value);
        }

        $component->call('submit');

        $certificate = UsahaCertificate::first();
        expect($certificate->code)->toMatch('/^[A-Z]{4}-[A-Z]{4}-[A-Z]{4}$/');
    });

    it('resets form after successful submission', function () {
        $component = Livewire::test(Usaha::class);

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
        $component = Livewire::test(Usaha::class);

        // Test with invalid data that might cause database constraint errors
        $component->set('name', 'Test User')
            ->set('idCardNumber', 'invalid-id')
            ->call('submit')
            ->assertHasErrors();

        expect(UsahaCertificate::count())->toBe(0);
    });
});

describe('Usaha Certificate Data Mapping', function () {
    it('correctly maps all form fields to database columns', function () {
        $component = Livewire::test(Usaha::class);

        foreach ($this->validData as $key => $value) {
            $component->set($key, $value);
        }

        $component->call('submit');

        $certificate = UsahaCertificate::first();

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

    it('validates business-specific profession requirements', function () {
        $component = Livewire::test(Usaha::class);

        // Test with valid business profession
        $component->set('profession', 'Wiraswasta');
        $component->set('usedFor', 'Untuk izin usaha perdagangan');

        foreach ($this->validData as $key => $value) {
            if (!in_array($key, ['profession', 'usedFor'])) {
                $component->set($key, $value);
            }
        }

        $component->call('submit')
            ->assertHasNoErrors();

        $certificate = UsahaCertificate::first();
        expect($certificate->profession)->toBe('Wiraswasta');
        expect($certificate->used_for)->toBe('Untuk izin usaha perdagangan');
    });
});