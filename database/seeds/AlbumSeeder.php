<?php

use Illuminate\Database\Seeder;
use App\Album;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Album::create(
            array(
                'name' => 'Master of Puppets',
                'artist' => 'Metallica',
                'year' => '1986',
                'genre' => 'Thrash Metal',
                'quantity' => '3',
                'price'=> '2.86',
            )
        );
        Album::create(
            array(
                'name' => 'Black Album',
                'artist' => 'Metallica',
                'year' => '1991',
                'genre' => 'Thrash Metal',
                'quantity' => '6',
                'price'=> '4.21',
            )
        );
        Album::create(
            array(
                'name' => 'Ready to Die',
                'artist' => 'The Notorious B.I.G',
                'year' => '1994',
                'genre' => 'Hip-Hop',
                'quantity' => '3',
                'price'=> '5.10',
            )
        );
        Album::create(
            array(
                'name' => 'All Eyez on Me',
                'artist' => '2Pac',
                'year' => '1995',
                'genre' => 'Hip-Hop',
                'quantity' => '4',
                'price'=> '5.00',
            )
        );
        Album::create(
            array(
                'name' => 'The Wall',
                'artist' => 'Pink Floyd',
                'year' => '1979',
                'genre' => 'Rock Sinfónico',
                'quantity' => '4',
                'price'=> '7.89',
            )
        );
        Album::create(
            array(
                'name' => 'The Dark Side of the Moon',
                'artist' => 'Pink Floyd',
                'year' => '1973',
                'genre' => 'Rock Sinfónico',
                'quantity' => '9',
                'price'=> '10.32',
            )
        );
        Album::create(
            array(
                'name' => 'The Division Bell',
                'artist' => 'Pink Floyd',
                'year' => '1994',
                'genre' => 'Rock Sinfónico',
                'quantity' => '4',
                'price'=> '6.32',
            )
        );
        Album::create(
            array(
                'name' => 'The Slim Shady',
                'artist' => 'Eminem',
                'year' => '1999',
                'genre' => 'Hip-Hop',
                'quantity' => '12',
                'price'=> '8.56',
            )
        );
        Album::create(
            array(
                'name' => 'The Marshall Mathers',
                'artist' => 'Eminem',
                'year' => '2000',
                'genre' => 'Hip-Hop',
                'quantity' => '12',
                'price'=> '9.00',
            )
        );
        Album::create(
            array(
                'name' => '2001',
                'artist' => 'Dr. Dre',
                'year' => '2001',
                'genre' => 'Hip-Hop',
                'quantity' => '4',
                'price'=> '4.20',
            )
        );
        Album::create(
            array(
                'name' => 'The Chronic',
                'artist' => 'Dr. Dre',
                'year' => '1992',
                'genre' => 'Hip-Hop',
                'quantity' => '6',
                'price'=> '4.20',
            )
        );
        Album::create(
            array(
                'name' => 'Illmatic',
                'artist' => 'Nas',
                'year' => '1994',
                'genre' => 'Hip-Hop',
                'quantity' => '5',
                'price'=> '8.23',
            )
        );
        Album::create(
            array(
                'name' => 'Doggystyle',
                'artist' => 'Snoop Dogg',
                'year' => '1993',
                'genre' => 'Hip-Hop',
                'quantity' => '7',
                'price'=> '4.20',
            )
        );
        Album::create(
            array(
                'name' => 'The Infamous',
                'artist' => 'Mobb Deep',
                'year' => '1995',
                'genre' => 'Hip-Hop',
                'quantity' => '8',
                'price'=> '10.47',
            )
        );
        Album::create(
            array(
                'name' => 'Californication',
                'artist' => 'Red Hot Chili Peppers',
                'year' => '1999',
                'genre' => 'Rock',
                'quantity' => '10',
                'price'=> '15.32',
            )
        );
        Album::create(
            array(
                'name' => 'Gorillaz',
                'artist' => 'Gorillaz',
                'year' => '2001',
                'genre' => 'Rock',
                'quantity' => '7',
                'price'=> '11.11',
            )
        );
        Album::create(
            array(
                'name' => 'By the Way',
                'artist' => 'Red Hot Chili Peppers',
                'year' => '2002',
                'genre' => 'Rock',
                'quantity' => '10',
                'price'=> '12.32',
            )
        );
        Album::create(
            array(
                'name' => 'MTV Unplugged',
                'artist' => 'Alice in Chains',
                'year' => '1996',
                'genre' => 'Grunge',
                'quantity' => '14',
                'price'=> '12.65',
            )
        );
        Album::create(
            array(
                'name' => 'Dirt',
                'artist' => 'Alice in Chains',
                'year' => '1992',
                'genre' => 'Grunge',
                'quantity' => '10',
                'price'=> '14.21',
            )
        );
        Album::create(
            array(
                'name' => 'Nevermind',
                'artist' => 'Nirvana',
                'year' => '1991',
                'genre' => 'Grunge',
                'quantity' => '10',
                'price'=> '15.23',
            )
        );
        Album::create(
            array(
                'name' => 'Apppetite for Destruction',
                'artist' => 'Guns N Roses',
                'year' => '1987',
                'genre' => 'Hard Rock',
                'quantity' => '10',
                'price'=> '14.23',
            )
        );
        Album::create(
            array(
                'name' => 'Luzbelito',
                'artist' => 'Patricio Rey y sus Redonditos de Ricota',
                'year' => '1996',
                'genre' => 'Rock',
                'quantity' => '10',
                'price'=> '16.74',
            )
        );
        Album::create(
            array(
                'name' => 'El último concierto',
                'artist' => 'Soda Stereo',
                'year' => '1997',
                'genre' => 'Rock',
                'quantity' => '10',
                'price'=> '20.55',
            )
        );
    }
}
