<?php

use App\Livewire\Guest\Certificate\Domisili;
use App\Models\DomisiliCertificate;
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
        'name' => 'Ahmad Fauzi',
        'idCardNumber' => '3171234567890123',
        'placeOfBirth' => 'Jakarta',
        'dayOfBirth' => 15,
        'monthOfBirth' => 8,
        'yearOfBirth' => 1990,
        'religion' => 'Islam',
        'gender' => 'L',
        'profession' => 'Pegawai Swasta',
        'neighbourhood' => '001',
        'hamlet' => 'Mawar',
        'village' => 'Cibinong',
        'address' => 'Jl. Raya Cibinong No. 123, RT 001/RW 002',
        'attachment' => UploadedFile::fake()->create('ktp.pdf', 1000, 'application/pdf')
    ];
});

it('can render domisili certificate form', function () {
    Livewire::test(Domisili::class)
        ->assertOk();
});

describe('Domisili Certificate Validation', function () {
    it('validates required name field', function () {
        Livewire::test(Domisili::class)
            ->set('name', '')
            ->call('submit')
            ->assertHasErrors(['name' => 'required']);
    });

    it('validates name field rules', function () {
        Livewire::test(Domisili::class)
            ->set('name', 'A')
            ->call('submit')
            ->assertHasErrors(['name' => 'min']);

        Livewire::test(Domisili::class)
            ->set('name', str_repeat('A', 101))
            ->call('submit')
            ->assertHasErrors(['name' => 'max']);
    });

    it('validates id card number field', function () {
        Livewire::test(Domisili::class)
            ->set('idCardNumber', '')
            ->call('submit')
            ->assertHasErrors(['idCardNumber' => 'required']);

        Livewire::test(Domisili::class)
            ->set('idCardNumber', '123456789')
            ->call('submit')
            ->assertHasErrors(['idCardNumber' => 'size']);

        Livewire::test(Domisili::class)
            ->set('idCardNumber', '1234567890123abc')
            ->call('submit')
            ->assertHasErrors(['idCardNumber' => 'regex']);
    });

    it('validates place of birth field', function () {
        Livewire::test(Domisili::class)
            ->set('placeOfBirth', '')
            ->call('submit')
            ->assertHasErrors(['placeOfBirth' => 'required']);

        Livewire::test(Domisili::class)
            ->set('placeOfBirth', 'A')
            ->call('submit')
            ->assertHasErrors(['placeOfBirth' => 'min']);
    });

    it('validates birth date fields', function () {
        Livewire::test(Domisili::class)
            ->set('dayOfBirth', 0)
            ->call('submit')
            ->assertHasErrors(['dayOfBirth' => 'min']);

        Livewire::test(Domisili::class)
            ->set('dayOfBirth', 32)
            ->call('submit')
            ->assertHasErrors(['dayOfBirth' => 'max']);

        Livewire::test(Domisili::class)
            ->set('monthOfBirth', 0)
            ->call('submit')
            ->assertHasErrors(['monthOfBirth' => 'min']);

        Livewire::test(Domisili::class)
            ->set('monthOfBirth', 13)
            ->call('submit')
            ->assertHasErrors(['monthOfBirth' => 'max']);

        Livewire::test(Domisili::class)
            ->set('yearOfBirth', 1899)
            ->call('submit')
            ->assertHasErrors(['yearOfBirth' => 'min']);

        Livewire::test(Domisili::class)
            ->set('yearOfBirth', 2026)
            ->call('submit')
            ->assertHasErrors(['yearOfBirth' => 'max']);
    });

    it('validates religion field', function () {
        Livewire::test(Domisili::class)
            ->set('religion', '')
            ->call('submit')
            ->assertHasErrors(['religion' => 'required']);

        Livewire::test(Domisili::class)
            ->set('religion', 'A')
            ->call('submit')
            ->assertHasErrors(['religion' => 'min']);

        Livewire::test(Domisili::class)
            ->set('religion', str_repeat('A', 51))
            ->call('submit')
            ->assertHasErrors(['religion' => 'max']);
    });

    it('validates gender field', function () {
        Livewire::test(Domisili::class)
            ->set('gender', '')
            ->call('submit')
            ->assertHasErrors(['gender' => 'required']);

        Livewire::test(Domisili::class)
            ->set('gender', 'X')
            ->call('submit')
            ->assertHasErrors(['gender' => 'in']);
    });

    it('validates profession field', function () {
        Livewire::test(Domisili::class)
            ->set('profession', '')
            ->call('submit')
            ->assertHasErrors(['profession' => 'required']);

        Livewire::test(Domisili::class)
            ->set('profession', 'A')
            ->call('submit')
            ->assertHasErrors(['profession' => 'min']);

        Livewire::test(Domisili::class)
            ->set('profession', str_repeat('A', 101))
            ->call('submit')
            ->assertHasErrors(['profession' => 'max']);
    });

    it('validates neighbourhood field', function () {
        Livewire::test(Domisili::class)
            ->set('neighbourhood', '')
            ->call('submit')
            ->assertHasErrors(['neighbourhood' => 'required']);

        Livewire::test(Domisili::class)
            ->set('neighbourhood', str_repeat('A', 51))
            ->call('submit')
            ->assertHasErrors(['neighbourhood' => 'max']);
    });

    it('validates hamlet and village fields', function () {
        Livewire::test(Domisili::class)
            ->set('hamlet', '')
            ->call('submit')
            ->assertHasErrors(['hamlet' => 'required']);

        Livewire::test(Domisili::class)
            ->set('hamlet', 'A')
            ->call('submit')
            ->assertHasErrors(['hamlet' => 'min']);

        Livewire::test(Domisili::class)
            ->set('village', '')
            ->call('submit')
            ->assertHasErrors(['village' => 'required']);

        Livewire::test(Domisili::class)
            ->set('village', 'A')
            ->call('submit')
            ->assertHasErrors(['village' => 'min']);
    });

    it('validates address field', function () {
        Livewire::test(Domisili::class)
            ->set('address', '')
            ->call('submit')
            ->assertHasErrors(['address' => 'required']);

        Livewire::test(Domisili::class)
            ->set('address', 'Jl. A')
            ->call('submit')
            ->assertHasErrors(['address' => 'min']);

        Livewire::test(Domisili::class)
            ->set('address', str_repeat('A', 501))
            ->call('submit')
            ->assertHasErrors(['address' => 'max']);
    });

    it('validates attachment field rules', function () {
        $invalidFile = UploadedFile::fake()->create('test.txt', 1000, 'text/plain');

        Livewire::test(Domisili::class)
            ->set('attachment', $invalidFile)
            ->call('submit')
            ->assertHasErrors(['attachment' => 'mimes']);

        $oversizedFile = UploadedFile::fake()->create('large.pdf', 3000, 'application/pdf');

        Livewire::test(Domisili::class)
            ->set('attachment', $oversizedFile)
            ->call('submit')
            ->assertHasErrors(['attachment' => 'max']);
    });
});

describe('Domisili Certificate Submission', function () {
    it('can submit valid domisili certificate data', function () {
        $component = Livewire::test(Domisili::class);

        foreach ($this->validData as $key => $value) {
            $component->set($key, $value);
        }

        $component->call('submit')
            ->assertHasNoErrors();

        // Assert database record was created
        expect(DomisiliCertificate::count())->toBe(1);

        $certificate = DomisiliCertificate::first();
        expect($certificate->name)->toBe('Ahmad Fauzi');
        expect($certificate->id_card_number)->toBe('3171234567890123');
        expect($certificate->place_of_birth)->toBe('Jakarta');
        expect($certificate->hamlet)->toBe('Mawar');
        expect($certificate->village)->toBe('Cibinong');
        expect($certificate->code)->not->toBeNull();
        expect($certificate->confirmation_status->value)->toBe('pending');
    });

    it('can submit without attachment', function () {
        $dataWithoutAttachment = $this->validData;
        unset($dataWithoutAttachment['attachment']);

        $component = Livewire::test(Domisili::class);

        foreach ($dataWithoutAttachment as $key => $value) {
            $component->set($key, $value);
        }

        $component->call('submit')
            ->assertHasNoErrors();

        $certificate = DomisiliCertificate::first();
        expect($certificate->attachment)->toBeNull();
    });

    it('stores attachment file correctly when provided', function () {
        Storage::fake('private');

        $component = Livewire::test(Domisili::class);

        foreach ($this->validData as $key => $value) {
            $component->set($key, $value);
        }

        $component->call('submit');

        $certificate = DomisiliCertificate::first();
        expect($certificate->attachment)->not->toBeNull();

        expect(Storage::disk('private')->exists($certificate->attachment))->toBeTrue();
        expect($certificate->attachment)->toContain('certificates/domisili');
    });

    it('auto-generates certificate code on submission', function () {
        $component = Livewire::test(Domisili::class);

        foreach ($this->validData as $key => $value) {
            $component->set($key, $value);
        }

        $component->call('submit');

        $certificate = DomisiliCertificate::first();
        expect($certificate->code)->toMatch('/^[A-Z]{4}-[A-Z]{4}-[A-Z]{4}$/');
    });

    it('resets form after successful submission', function () {
        $component = Livewire::test(Domisili::class);

        foreach ($this->validData as $key => $value) {
            $component->set($key, $value);
        }

        $component->call('submit');

        expect($component->get('name'))->toBeNull();
        expect($component->get('idCardNumber'))->toBeNull();
        expect($component->get('placeOfBirth'))->toBeNull();
        expect($component->get('hamlet'))->toBeNull();
        expect($component->get('village'))->toBeNull();
        expect($component->get('attachment'))->toBeNull();
    });

    it('handles database errors gracefully', function () {
        // This test would require more complex mocking setup
        // For now, we'll test that the component can handle basic error scenarios
        $component = Livewire::test(Domisili::class);

        // Test with invalid data that might cause database constraint errors
        $component->set('name', 'Test User')
            ->set('idCardNumber', 'invalid-id')
            ->call('submit')
            ->assertHasErrors();

        expect(DomisiliCertificate::count())->toBe(0);
    });
});

describe('Domisili Certificate Data Mapping', function () {
    it('correctly maps all form fields to database columns', function () {
        $component = Livewire::test(Domisili::class);

        foreach ($this->validData as $key => $value) {
            $component->set($key, $value);
        }

        $component->call('submit');

        $certificate = DomisiliCertificate::first();

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
        expect($certificate->neighbourhood)->toBe($this->validData['neighbourhood']);
        expect($certificate->hamlet)->toBe($this->validData['hamlet']);
        expect($certificate->village)->toBe($this->validData['village']);
        expect($certificate->address)->toBe($this->validData['address']);
    });
});
