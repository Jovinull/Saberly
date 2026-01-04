<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        /**
         * Fotos disponíveis em /public/backend/assets/images/avatars
         * Padrão: avatar-1.png ... avatar-25.png
         */
        $avatar = function (int $n) {
            $n = max(1, min(25, $n));
            return "backend/assets/images/avatars/avatar-{$n}.png";
        };

        /**
         * Helpers para dividir nome e preencher first/last name
         */
        $splitName = function (string $fullName): array {
            $parts = preg_split('/\s+/', trim($fullName)) ?: [];
            $first = $parts[0] ?? null;
            $last = count($parts) > 1 ? implode(' ', array_slice($parts, 1)) : null;

            return [$first, $last];
        };

        $makeUser = function (string $name, string $email, string $role, int $avatarNumber, string $phone, string $address) use ($now, $avatar, $splitName) {
            [$first, $last] = $splitName($name);

            return [
                'first_name' => $first,
                'last_name' => $last,
                'name' => $name,
                'email' => $email,
                'password' => Hash::make('password'),
                'photo' => $avatar($avatarNumber),
                'phone' => $phone,
                'address' => $address,
                'role' => $role,
                'status' => '1',
                'bio' => null,
                'day' => null,
                'month' => null,
                'year' => null,
                'city' => null,
                'country' => null,
                'experience' => null,
                'gender' => 'male',
                'created_at' => $now,
                'updated_at' => $now,
            ];
        };

        /**
         * Lista de usuários:
         * - Mantém admin/user básicos
         * - Cria VÁRIOS instrutores com fotos diferentes
         * - Usa upsert para evitar duplicar ao rodar seed de novo
         */
        $users = [
            // Admin
            $makeUser(
                'Admin User',
                'admin@example.com',
                'admin',
                1,
                '1234567890',
                '123 Admin Street'
            ),

            // Instrutor principal (mantém o seu)
            $makeUser(
                'Instructor User',
                'instructor@example.com',
                'instructor',
                2,
                '0987654321',
                '456 Instructor Avenue'
            ),

            // Usuário comum (mantém o seu)
            $makeUser(
                'Regular User',
                'user@example.com',
                'user',
                3,
                '5555555555',
                '789 User Lane'
            ),

            // -----------------------
            // MAIS INSTRUTORES
            // -----------------------
            $makeUser('Ana Souza', 'ana.souza@example.com', 'instructor', 4, '11911112222', 'Avenida Paulista, 1000'),
            $makeUser('Bruno Lima', 'bruno.lima@example.com', 'instructor', 5, '21922223333', 'Rua das Laranjeiras, 200'),
            $makeUser('Carla Menezes', 'carla.menezes@example.com', 'instructor', 6, '31933334444', 'Rua do Sol, 45'),
            $makeUser('Diego Ferreira', 'diego.ferreira@example.com', 'instructor', 7, '81944445555', 'Av. Recife, 150'),
            $makeUser('Eduarda Martins', 'eduarda.martins@example.com', 'instructor', 8, '71955556666', 'Rua Chile, 90'),
            $makeUser('Felipe Santos', 'felipe.santos@example.com', 'instructor', 9, '85966667777', 'Av. Beira Mar, 500'),
            $makeUser('Gabriela Rocha', 'gabriela.rocha@example.com', 'instructor', 10, '61977778888', 'SQS 308, Bloco B'),
            $makeUser('Henrique Almeida', 'henrique.almeida@example.com', 'instructor', 11, '51988889999', 'Rua Padre Chagas, 70'),
            $makeUser('Isabela Costa', 'isabela.costa@example.com', 'instructor', 12, '41910111213', 'Av. Batel, 330'),
            $makeUser('João Pedro', 'joao.pedro@example.com', 'instructor', 13, '31912131415', 'Praça Sete, 10'),
            $makeUser('Larissa Freitas', 'larissa.freitas@example.com', 'instructor', 14, '81914151617', 'Rua da Aurora, 120'),
            $makeUser('Marcos Vinícius', 'marcos.vinicius@example.com', 'instructor', 15, '21916171819', 'Av. Atlântica, 99'),
            $makeUser('Natália Ribeiro', 'natalia.ribeiro@example.com', 'instructor', 16, '11918192021', 'Rua Augusta, 500'),
            $makeUser('Otávio Silva', 'otavio.silva@example.com', 'instructor', 17, '71920212223', 'Av. Tancredo Neves, 1'),
            $makeUser('Patrícia Nunes', 'patricia.nunes@example.com', 'instructor', 18, '85922232425', 'Rua dos Tabajaras, 80'),
            $makeUser('Rafael Gomes', 'rafael.gomes@example.com', 'instructor', 19, '61924252627', 'SHN Quadra 2, 15'),
            $makeUser('Sofia Barros', 'sofia.barros@example.com', 'instructor', 20, '51926272829', 'Rua da Praia, 400'),
            $makeUser('Thiago Oliveira', 'thiago.oliveira@example.com', 'instructor', 21, '41928293031', 'Rua XV de Novembro, 20'),
            $makeUser('Vanessa Carvalho', 'vanessa.carvalho@example.com', 'instructor', 22, '31930313233', 'Av. Afonso Pena, 1200'),
            $makeUser('William Andrade', 'william.andrade@example.com', 'instructor', 23, '81932333435', 'Rua Benfica, 12'),
            $makeUser('Yasmin Pereira', 'yasmin.pereira@example.com', 'instructor', 24, '21934353637', 'Rua Voluntários da Pátria, 210'),
            $makeUser('Zeca Moura', 'zeca.moura@example.com', 'instructor', 25, '11936373839', 'Rua Oscar Freire, 88'),
        ];

        /**
         * Upsert por email (evita duplicar ao rodar novamente)
         * Atualiza nome, foto, role, status e updated_at se já existir.
         */
        DB::table('users')->upsert(
            $users,
            ['email'],
            ['first_name', 'last_name', 'name', 'photo', 'phone', 'address', 'role', 'status', 'updated_at']
        );
    }
}
