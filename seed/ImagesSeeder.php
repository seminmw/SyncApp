<?php

require_once 'init.php';


class ImagesSeeder
{

    /**
     * @param int $count
     */
    public function seed(int $count) {
        $imagesRepository = new ImagesRepository();
        $faker = Faker\Factory::create();

        for ($i = 0; $i < $count; $i++) {
            $name = $faker->name() . ".jpg";
            $imagesRepository->create($name);

            printf("%d) %s created...\n", $i + 1, $name);
        }
    }
}