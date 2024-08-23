<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $createProduct = Permission::create([
            'name' => 'product.create'
        ]);
        $updateProduct = Permission::create([
            'name' => 'product.update'
        ]);
        $readProduct = Permission::create([
            'name' => 'product.read'
        ]);
        $deleteProduct = Permission::create([
            'name' => 'product.delete'
        ]);

        $createProduct->assignRole(['Administrator', 'Superuser']);
        $updateProduct->assignRole(['Administrator', 'Superuser']);
        $readProduct->assignRole(['Administrator', 'Superuser']);
        $deleteProduct->assignRole(['Superuser']);
    }
}
