<?php

use Illuminate\Database\Seeder;
use App\Movie;
class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie::create(
            array(
                'name' => 'Pulp Fiction',
                'director' => 'Quentin Tarantino',
                'year' => '1994',
                'genre' => 'Drama',
                'quantity' => '6',
                'price'=> '12.36',
            )
        );
        Movie::create(
            array(
                'name' => 'The Matrix',
                'director' => 'Lana & Lilly Wachowski ',
                'year' => '1999',
                'genre' => 'Ciencia Ficción',
                'quantity' => '4',
                'price'=> '10.24',
            )
        );
        Movie::create(
            array(
                'name' => 'Titanic',
                'director' => 'James Cameron',
                'year' => '1997',
                'genre' => 'Romántica',
                'quantity' => '6',
                'price'=> '4.56',
            )
        );
        Movie::create(
            array(
                'name' => 'Fight Club',
                'director' => 'David Fincher',
                'year' => '1999',
                'genre' => 'Drama',
                'quantity' => '1',
                'price'=> '16.37',
            )
        );
        Movie::create(
            array(
                'name' => 'Memento',
                'director' => 'Christopher Nolan',
                'year' => '2001',
                'genre' => 'Suspenso',
                'quantity' => '5',
                'price'=> '10.74',
            )
        );
        Movie::create(
            array(
                'name' => 'Se7en',
                'director' => 'David Fincher',
                'year' => '1995',
                'genre' => 'Crimen, Drama',
                'quantity' => '4',
                'price'=> '8.96',
            )
        );
        Movie::create(
            array(
                'name' => 'Gladiator',
                'director' => 'Ridley Scott',
                'year' => '2000',
                'genre' => 'Accion',
                'quantity' => '14',
                'price'=> '8.71',
            )
        );
        Movie::create(
            array(
                'name' => 'El Sexto Sentido',
                'director' => 'M. Night Shyamalan ',
                'year' => '1999',
                'genre' => 'Misterio, Drama',
                'quantity' => '9',
                'price'=> '10.25',
            )
        );
        Movie::create(
            array(
                'name' => 'Esperando la Carroza',
                'director' => 'Alejandro Doria',
                'year' => '1985',
                'genre' => 'Comedia',
                'quantity' => '15',
                'price'=> '10.68',
            )
        );
        Movie::create(
            array(
                'name' => 'El Profesional',
                'director' => 'Luc Besson',
                'year' => '1994',
                'genre' => 'Accion, Drama',
                'quantity' => '7',
                'price'=> '8.88',
            )
        );
        Movie::create(
            array(
                'name' => 'Terminator',
                'director' => 'James Cameron',
                'year' => '1984',
                'genre' => 'Ciencia Ficción',
                'quantity' => '9',
                'price'=> '10.56',
            )
        );
        Movie::create(
            array(
                'name' => 'Scarface',
                'director' => 'Brian De Palma',
                'year' => '1983',
                'genre' => 'Crimen, Drama',
                'quantity' => '14',
                'price'=> '9.99',
            )
        );
        Movie::create(
            array(
                'name' => 'The Truman Show',
                'director' => 'Peter Weir',
                'year' => '1998',
                'genre' => 'Drama',
                'quantity' => '7',
                'price'=> '12.56',
            )
        );
        Movie::create(
            array(
                'name' => 'El Señor de los Anillos: la Comunidad del Anillo',
                'director' => 'Peter Jackson',
                'year' => '2001',
                'genre' => 'Fantasía',
                'quantity' => '15',
                'price'=> '16.54',
            )
        );
        Movie::create(
            array(
                'name' => 'El Padrino',
                'director' => 'Francis Ford Coppola ',
                'year' => '1972',
                'genre' => 'Crimen, Drama',
                'quantity' => '7',
                'price'=> '12.54',
            )
        );
        Movie::create(
            array(
                'name' => 'Forrest Gump',
                'director' => 'Robert Zemeckis',
                'year' => '1994',
                'genre' => 'Comedia',
                'quantity' => '1',
                'price'=> '12.32',
            )
        );
        Movie::create(
            array(
                'name' => 'Milagros Inesperados',
                'director' => 'Frank Darabont',
                'year' => '1999',
                'genre' => 'Drama',
                'quantity' => '3',
                'price'=> '13.54',
            )
        );
        Movie::create(
            array(
                'name' => 'Sueños de Libertad',
                'director' => 'Frank Darabont',
                'year' => '1994',
                'genre' => 'Drama',
                'quantity' => '5',
                'price'=> '10.11',
            )
        );
        Movie::create(
            array(
                'name' => 'Star Wars I La Amenaza Fantasma',
                'director' => 'George Lucas',
                'year' => '1999',
                'genre' => 'Ciencia Ficción',
                'quantity' => '5',
                'price'=> '10.25',
            )
        );
        Movie::create(
            array(
                'name' => 'Star Wars V El Imperio Contraataca',
                'director' => 'Irvin Kershner',
                'year' => '1980',
                'genre' => 'Ciencia Ficcion',
                'quantity' => '6',
                'price'=> '13.21',
            )
        );
    }
}
