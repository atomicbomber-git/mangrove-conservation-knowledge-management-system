<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\ProgramPemerintah;

class ProgramPemerintahCreateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCanInputForm()
    {
        $this->artisan("migrate:fresh");

        $this->browse(function (Browser $browser) {
            $user = factory(User::class)
                ->create(["type" => User::TYPE_ADMIN]);

            $programPemerintahFormData = tap(factory(ProgramPemerintah::class)->make(), function ($data) {
                $data->tanggal_mulai = $data->tanggal_mulai->format("m/d/Y");
                $data->tanggal_selesai = $data->tanggal_selesai->format("m/d/Y");
            })
            ->toArray();

            $testCase = $browser->loginAs($user)
                ->visit(route("program-pemerintah.create"));

            foreach ($programPemerintahFormData as $key => $value) {
                $testCase->type($key, $value);
            }

            $testCase
                ->press("Tambah Program Pemerintah")
                ->assertUrlIs(route("program-pemerintah.index"))
                ->screenshot("Program Pemerintah Input");
        });
    }
}
