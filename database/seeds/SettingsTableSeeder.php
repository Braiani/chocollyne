<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'site.title',
                'display_name' => 'Site Title',
                'value' => 'CHOCOLLYNE',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Site',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'site.description',
                'display_name' => 'Site Description',
                'value' => 'Site com vendas de BomBons recheados deliciosos',
                'details' => '',
                'type' => 'text',
                'order' => 2,
                'group' => 'Site',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'site.logo',
                'display_name' => 'Site Logo',
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 3,
                'group' => 'Site',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'site.google_analytics_tracking_id',
                'display_name' => 'Google Analytics Tracking ID',
                'value' => NULL,
                'details' => '',
                'type' => 'text',
                'order' => 4,
                'group' => 'Site',
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'admin.bg_image',
                'display_name' => 'Admin Background Image',
                'value' => 'settings/November2018/fF7fFW9s3FNGED7lAjYb.png',
                'details' => '',
                'type' => 'image',
                'order' => 5,
                'group' => 'Admin',
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'admin.title',
                'display_name' => 'Admin Title',
                'value' => 'Chocollyne',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Admin',
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'admin.description',
                'display_name' => 'Admin Description',
                'value' => 'Bem-vindo ao painel administativo do Chocollyne',
                'details' => '',
                'type' => 'text',
                'order' => 2,
                'group' => 'Admin',
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'admin.loader',
                'display_name' => 'Admin Loader',
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 3,
                'group' => 'Admin',
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'admin.icon_image',
                'display_name' => 'Admin Icon Image',
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 4,
                'group' => 'Admin',
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'admin.google_analytics_client_id',
            'display_name' => 'Google Analytics Client ID (used for admin dashboard)',
                'value' => NULL,
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Admin',
            ),
            10 => 
            array (
                'id' => 11,
                'key' => 'info.frete',
                'display_name' => 'Informações Frete',
                'value' => 'O frete é um valor fixo de R$ 10,00 para qualquer região de Campo Grande.',
                'details' => NULL,
                'type' => 'text',
                'order' => 6,
                'group' => 'Info',
            ),
            11 => 
            array (
                'id' => 12,
                'key' => 'info.cancelamento',
                'display_name' => 'Cancelamento de reserva',
                'value' => 'As reservas podem ser canceladas em até 24h do pedido.',
                'details' => NULL,
                'type' => 'text',
                'order' => 7,
                'group' => 'Info',
            ),
            12 => 
            array (
                'id' => 13,
                'key' => 'info.duvidas',
                'display_name' => 'Dúvidas',
                'value' => 'Qualquer dúvida pode ser encaminhada para o e-mail: admin@admin.com',
                'details' => NULL,
                'type' => 'text',
                'order' => 8,
                'group' => 'Info',
            ),
            13 => 
            array (
                'id' => 14,
                'key' => 'site.endereco',
                'display_name' => 'Endereço',
                'value' => 'Rua Loren Ipsun, 458, Campo Grande - MS',
                'details' => NULL,
                'type' => 'text',
                'order' => 9,
                'group' => 'Site',
            ),
            14 => 
            array (
                'id' => 15,
                'key' => 'site.telefone',
                'display_name' => 'Telefone',
                'value' => '67981707696',
                'details' => NULL,
                'type' => 'text',
                'order' => 10,
                'group' => 'Site',
            ),
            15 => 
            array (
                'id' => 16,
                'key' => 'site.email',
                'display_name' => 'E-mail de contato',
                'value' => 'contato@chocollyne.local',
                'details' => NULL,
                'type' => 'text',
                'order' => 11,
                'group' => 'Site',
            ),
        ));
        
        
    }
}