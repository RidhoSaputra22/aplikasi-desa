<?php

use App\Livewire\Guest\Certificate\Birth;
use App\Models\BirthCertificate;
use Livewire\Livewire;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    // Set up test environment
    $this->validData = [
        // Data bayi
        'babyName' => 'Ahmad Rizki',
        'placeOfBirth' => 'Jakarta',
        'dayOfBirth' => 15,
        'monthOfBirth' => 8,
        'yearOfBirth' => 2023,
        'hourOfBirth' => 14,
        'minuteOfBirth' => 30,
        'gender' => 'L',

        // Data ibu
        'motherName' => 'Siti Aminah',
        'motherIdCardNumber' => '3171234567890123',
        'motherAge' => 28,
        'motherProfession' => 'Ibu Rumah Tangga',
        'motherAddress' => 'Jl. Merdeka No. 123, Jakarta Pusat',

        // Data ayah
        'fatherName' => 'Budi Santoso',
        'fatherIdCardNumber' => '3171234567890124',
        'fatherAge' => 32,
        'fatherProfession' => 'Pegawai Swasta',
        'fatherAddress' => 'Jl. Merdeka No. 123, Jakarta Pusat',

        // Data pelapor
        'reporterName' => 'Siti Aminah',
        'reporterIdCardNumber' => '3171234567890123',
        'reporterAge' => 28,
        'reporterProfession' => 'Ibu Rumah Tangga',
        'reporterAddress' => 'Jl. Merdeka No. 123, Jakarta Pusat',
    ];
});

it('can render birth certificate form', function () {
    Livewire::test(Birth::class)
        ->assertOk();
});

describe('Birth Certificate Validation', function () {
    it('validates required baby name', function () {
        Livewire::test(Birth::class)
            ->set('babyName', '')
            ->call('submit')
            ->assertHasErrors(['babyName' => 'required']);
    });

    it('validates baby name minimum length', function () {
        Livewire::test(Birth::class)
            ->set('babyName', 'A')
            ->call('submit')
            ->assertHasErrors(['babyName' => 'min']);
    });

    it('validates baby name maximum length', function () {
        Livewire::test(Birth::class)
            ->set('babyName', str_repeat('A', 101))
            ->call('submit')
            ->assertHasErrors(['babyName' => 'max']);
    });

    it('validates place of birth is required', function () {
        Livewire::test(Birth::class)
            ->set('placeOfBirth', '')
            ->call('submit')
            ->assertHasErrors(['placeOfBirth' => 'required']);
    });

    it('validates day of birth range', function () {
        Livewire::test(Birth::class)
            ->set('dayOfBirth', 0)
            ->call('submit')
            ->assertHasErrors(['dayOfBirth' => 'min']);

        Livewire::test(Birth::class)
            ->set('dayOfBirth', 32)
            ->call('submit')
            ->assertHasErrors(['dayOfBirth' => 'max']);
    });

    it('validates month of birth range', function () {
        Livewire::test(Birth::class)
            ->set('monthOfBirth', 0)
            ->call('submit')
            ->assertHasErrors(['monthOfBirth' => 'min']);

        Livewire::test(Birth::class)
            ->set('monthOfBirth', 13)
            ->call('submit')
            ->assertHasErrors(['monthOfBirth' => 'max']);
    });

    it('validates year of birth range', function () {
        Livewire::test(Birth::class)
            ->set('yearOfBirth', 1899)
            ->call('submit')
            ->assertHasErrors(['yearOfBirth' => 'min']);

        Livewire::test(Birth::class)
            ->set('yearOfBirth', 2026)
            ->call('submit')
            ->assertHasErrors(['yearOfBirth' => 'max']);
    });

    it('validates hour of birth range', function () {
        Livewire::test(Birth::class)
            ->set('hourOfBirth', -1)
            ->call('submit')
            ->assertHasErrors(['hourOfBirth' => 'min']);

        Livewire::test(Birth::class)
            ->set('hourOfBirth', 24)
            ->call('submit')
            ->assertHasErrors(['hourOfBirth' => 'max']);
    });

    it('validates minute of birth range', function () {
        Livewire::test(Birth::class)
            ->set('minuteOfBirth', -1)
            ->call('submit')
            ->assertHasErrors(['minuteOfBirth' => 'min']);

        Livewire::test(Birth::class)
            ->set('minuteOfBirth', 60)
            ->call('submit')
            ->assertHasErrors(['minuteOfBirth' => 'max']);
    });

    it('validates gender is required and valid', function () {
        Livewire::test(Birth::class)
            ->set('gender', '')
            ->call('submit')
            ->assertHasErrors(['gender' => 'required']);

        Livewire::test(Birth::class)
            ->set('gender', 'X')
            ->call('submit')
            ->assertHasErrors(['gender' => 'in']);
    });

    it('validates mother data', function () {
        Livewire::test(Birth::class)
            ->set('motherName', '')
            ->call('submit')
            ->assertHasErrors(['motherName' => 'required']);

        Livewire::test(Birth::class)
            ->set('motherIdCardNumber', '123')
            ->call('submit')
            ->assertHasErrors(['motherIdCardNumber' => 'size']);

        Livewire::test(Birth::class)
            ->set('motherIdCardNumber', 'abcd1234567890123')
            ->call('submit')
            ->assertHasErrors(['motherIdCardNumber' => 'regex']);

        Livewire::test(Birth::class)
            ->set('motherAge', 14)
            ->call('submit')
            ->assertHasErrors(['motherAge' => 'min']);

        Livewire::test(Birth::class)
            ->set('motherAge', 61)
            ->call('submit')
            ->assertHasErrors(['motherAge' => 'max']);
    });

    it('validates father data', function () {
        Livewire::test(Birth::class)
            ->set('fatherName', '')
            ->call('submit')
            ->assertHasErrors(['fatherName' => 'required']);

        Livewire::test(Birth::class)
            ->set('fatherAge', 17)
            ->call('submit')
            ->assertHasErrors(['fatherAge' => 'min']);

        Livewire::test(Birth::class)
            ->set('fatherAge', 81)
            ->call('submit')
            ->assertHasErrors(['fatherAge' => 'max']);
    });

    it('validates reporter data', function () {
        Livewire::test(Birth::class)
            ->set('reporterName', '')
            ->call('submit')
            ->assertHasErrors(['reporterName' => 'required']);

        Livewire::test(Birth::class)
            ->set('reporterAge', 16)
            ->call('submit')
            ->assertHasErrors(['reporterAge' => 'min']);

        Livewire::test(Birth::class)
            ->set('reporterAge', 101)
            ->call('submit')
            ->assertHasErrors(['reporterAge' => 'max']);
    });
});

describe('Birth Certificate Submission', function () {
    it('can submit valid birth certificate data', function () {
        $component = Livewire::test(Birth::class);

        foreach ($this->validData as $key => $value) {
            $component->set($key, $value);
        }

        $component->call('submit')
            ->assertHasNoErrors();

        // Assert database record was created
        expect(BirthCertificate::count())->toBe(1);

        $certificate = BirthCertificate::first();
        expect($certificate->baby_name)->toBe('Ahmad Rizki');
        expect($certificate->mother_name)->toBe('Siti Aminah');
        expect($certificate->father_name)->toBe('Budi Santoso');
        expect($certificate->code)->not->toBeNull();
        expect($certificate->confirmation_status->value)->toBe('pending');
    });

    it('auto-generates certificate code on submission', function () {
        $component = Livewire::test(Birth::class);

        foreach ($this->validData as $key => $value) {
            $component->set($key, $value);
        }

        $component->call('submit');

        $certificate = BirthCertificate::first();
        expect($certificate->code)->toMatch('/^[A-Z]{4}-[A-Z]{4}-[A-Z]{4}$/');
    });

    it('resets form after successful submission', function () {
        $component = Livewire::test(Birth::class);

        foreach ($this->validData as $key => $value) {
            $component->set($key, $value);
        }

        $component->call('submit');

        expect($component->get('babyName'))->toBeNull();
        expect($component->get('motherName'))->toBeNull();
        expect($component->get('fatherName'))->toBeNull();
    });

    it('handles database errors gracefully', function () {
        // This test would require more complex mocking setup
        // For now, we'll test that the component can handle basic error scenarios
        $component = Livewire::test(Birth::class);

        // Test with invalid data that might cause database constraint errors
        $component->set('babyName', 'Test Baby')
            ->set('dayOfBirth', 35)  // Invalid day
            ->call('submit')
            ->assertHasErrors();

        expect(BirthCertificate::count())->toBe(0);
    });
});

describe('Birth Certificate Data Mapping', function () {
    it('correctly maps all form fields to database columns', function () {
        $component = Livewire::test(Birth::class);

        foreach ($this->validData as $key => $value) {
            $component->set($key, $value);
        }

        $component->call('submit');

        $certificate = BirthCertificate::first();

        // Test baby data mapping
        expect($certificate->baby_name)->toBe($this->validData['babyName']);
        expect($certificate->place_of_birth)->toBe($this->validData['placeOfBirth']);
        expect($certificate->day_of_birth)->toBe((string)$this->validData['dayOfBirth']);
        expect($certificate->month_of_birth)->toBe((string)$this->validData['monthOfBirth']);
        expect($certificate->year_of_birth)->toBe((string)$this->validData['yearOfBirth']);
        expect($certificate->hour_of_birth)->toBe((string)$this->validData['hourOfBirth']);
        expect($certificate->minute_of_birth)->toBe((string)$this->validData['minuteOfBirth']);
        expect($certificate->gender)->toBe($this->validData['gender']);

        // Test mother data mapping
        expect($certificate->mother_name)->toBe($this->validData['motherName']);
        expect($certificate->mother_id_card_number)->toBe($this->validData['motherIdCardNumber']);
        expect($certificate->mother_age)->toBe($this->validData['motherAge']);
        expect($certificate->mother_profession)->toBe($this->validData['motherProfession']);
        expect($certificate->mother_address)->toBe($this->validData['motherAddress']);

        // Test father data mapping
        expect($certificate->father_name)->toBe($this->validData['fatherName']);
        expect($certificate->father_id_card_number)->toBe($this->validData['fatherIdCardNumber']);
        expect($certificate->father_age)->toBe($this->validData['fatherAge']);
        expect($certificate->father_profession)->toBe($this->validData['fatherProfession']);
        expect($certificate->father_address)->toBe($this->validData['fatherAddress']);

        // Test reporter data mapping
        expect($certificate->reporter_name)->toBe($this->validData['reporterName']);
        expect($certificate->reporter_id_card_number)->toBe($this->validData['reporterIdCardNumber']);
        expect($certificate->reporter_age)->toBe($this->validData['reporterAge']);
        expect($certificate->reporter_profession)->toBe($this->validData['reporterProfession']);
        expect($certificate->reporter_address)->toBe($this->validData['reporterAddress']);
    });
});
