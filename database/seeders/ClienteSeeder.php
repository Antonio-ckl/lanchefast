<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'nome'=>'Cliente Exemplo',
            'endereco'=>'Rua Exemplo, 123',
            'telefone'=>'11999999999',
            'cpf'=>'12345678901',
            'email'=>'Cliente@test.com',
            'senha'=>bcrypt('123456')
        ]);
        Cliente::create([
            'nome'=>'Cliente 2',
            'endereco'=>'Rua Exemplo, 4321',
            'telefone'=>'11888888888',
            'cpf'=>'10987654321',
            'email'=>'Cliente404@test.com',
            'senha'=>Hash::make('123456')
                ]);
    }
}
