<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.  
     *
     * @return void
     */
    public function run()
    {
        //Users
        Permission::create([

            'name' => 'Navegar usuarios',
            'slug'=> 'users.index',
            'description' => 'Lista y navega todos los usuarios del sistema',
        
        ]);
        Permission::create([

            'name' => 'Ver detalle de usuarios',
            'slug'=> 'users.show',
            'description' => 'Ver en detalle cada usuario del sistema',
        
        ]);
        Permission::create([

            'name' => 'Edicion de usuarios',
            'slug'=> 'users.edit',
            'description' => 'Edita cualquier dato de un usuario del sistema',
        
        ]);
        Permission::create([

            'name' => 'Eliminar usuarios',
            'slug'=> 'users.destroy',
            'description' => 'Elimina cualquier usuario del sistema',
        
        ]);



        //Roles
        Permission::create([

            'name' => 'Navegar roles',
            'slug'=> 'roles.index',
            'description' => 'Lista y navega todos los roles del sistema',
        
        ]);
        Permission::create([

            'name' => 'Ver detalle de rol',
            'slug'=> 'roles.show',
            'description' => 'Ver en detalle cada rol del sistema',
        
        ]);
        Permission::create([

            'name' => 'Creacion de rol',
            'slug'=> 'roles.create',
            'description' => 'Crear un rol del sistema',
        
        ]);
        Permission::create([

            'name' => 'Edicion de roles',
            'slug'=> 'roles.edit',
            'description' => 'Edita cualquier dato de un usuario del sistema',
        
        ]);
        Permission::create([

            'name' => 'Eliminar rol',
            'slug'=> 'roles.destroy',
            'description' => 'Elimina cualquier rol del sistema',
        
        ]);

        //Productos
        Permission::create([

            'name' => 'Navegar productos',
            'slug'=> 'products.index',
            'description' => 'Lista y navega todos los productos del sistema',
        
        ]);
        Permission::create([

            'name' => 'Ver detalle de producto',
            'slug'=> 'products.show',
            'description' => 'Ver en detalle cada producto del sistema',
        
        ]);
        Permission::create([

            'name' => 'Creacion de productos',
            'slug'=> 'products.create',
            'description' => 'Crear un producto del sistema',
        
        ]);
        Permission::create([

            'name' => 'Edicion de productos',
            'slug'=> 'products.edit',
            'description' => 'Edita cualquier producto del sistema',
        
        ]);
        Permission::create([

            'name' => 'Eliminar producto',
            'slug'=> 'products.destroy',
            'description' => 'Elimina cualquier producto del sistema',
        
        ]);

        //Oficinas
        Permission::create([

            'name' => 'Navegar oficinas',
            'slug'=> 'offices.index',
            'description' => 'Lista y navega todos las oficinas',
        
        ]);
        Permission::create([

            'name' => 'Ver detalle de oficinas',
            'slug'=> 'offices.show',
            'description' => 'Ver en detalle una oficina',
        
        ]);
        Permission::create([

            'name' => 'Creacion de oficinas',
            'slug'=> 'offices.create',
            'description' => 'Crear una oficina',
        
        ]);
        Permission::create([

            'name' => 'Edicion de oficinas',
            'slug'=> 'offices.edit',
            'description' => 'Edita cualquier dato de una oficina',
        
        ]);
        Permission::create([

            'name' => 'Eliminar oficinas',
            'slug'=> 'offices.destroy',
            'description' => 'Elimina cualquier tipo de oficina',
        
        ]);

        //Tipo de Papeletas
        Permission::create([

            'name' => 'Navegar tipo de papeletas',
            'slug'=> 'leavetypes.index',
            'description' => 'Lista y navega todos los tipos de papeletas',
        
        ]);
        Permission::create([

            'name' => 'Ver detalle de tipo de papeleta',
            'slug'=> 'leavetypes.show',
            'description' => 'Ver en detalle tipo de papeleta',
        
        ]);
        Permission::create([

            'name' => 'Creacion de tipo de papeleta',
            'slug'=> 'leavetypes.create',
            'description' => 'Crear un tipo de papeleta',
        
        ]);
        Permission::create([

            'name' => 'Edicion de tipo de papeleta',
            'slug'=> 'leavetypes.edit',
            'description' => 'Edita cualquier dato de un tipo de papeleta',
        
        ]);
        Permission::create([

            'name' => 'Eliminar tipo de papeleta',
            'slug'=> 'leavetypes.destroy',
            'description' => 'Elimina cualquier tipo de papeleta del sistema',
        
        ]);

        //Papeletas
        Permission::create([

            'name' => 'Navegar papeletas',
            'slug'=> 'leaves.index',
            'description' => 'Lista y navega todos las  papeletas',
        
        ]);
        Permission::create([

            'name' => 'Ver detalle de una papeleta',
            'slug'=> 'leaves.show',
            'description' => 'Ver en detalle una papeleta',
        
        ]);
        Permission::create([

            'name' => 'Creacion de una papeleta',
            'slug'=> 'leaves.create',
            'description' => 'Crear una papeleta',
        
        ]);
        Permission::create([

            'name' => 'Edicion de papeleta',
            'slug'=> 'leaves.edit',
            'description' => 'Edita cualquier dato de papeleta',
        
        ]);
        Permission::create([

            'name' => 'Eliminar  papeleta',
            'slug'=> 'leaves.destroy',
            'description' => 'Elimina cualquier papeleta del sistema',
        
        ]);
        Permission::create([

            'name' => 'Imprimir  papeleta',
            'slug'=> 'leaves.pdf',
            'description' => 'Imprimir la papeleta de salida.',
        
        ]);

        
        //Evaluacion
        Permission::create([

            'name' => 'Navegar evaluacion papeletas',
            'slug'=> 'evaluations.index',
            'description' => 'Lista y navega todos las  papeletas',
        
        ]);
        Permission::create([

            'name' => 'Ver detalle de evaluacion de una papeleta',
            'slug'=> 'evaluations.show',
            'description' => 'Ver en detalle una papeleta',
        
        ]);
        
        Permission::create([

            'name' => 'Evaluacion de papeleta',
            'slug'=> 'evaluations.edit',
            'description' => 'Evaluacion de papeleta',
        
        ]);
        
        

        
    }
}
