<?php

require_once 'init.php';


class ImagesSeeder
{

    /**
     * @param int $count - Кол-во вставок
     */
    public function seed(int $count)
    {
        $imagesRepository = new ImagesRepository();
        $faker = Faker\Factory::create();

        for ($i=0; $i < $count; $i++) {
            $name = $faker->name() . ".jpg";

            $imagesRepository->create($name);
        }
    }
}