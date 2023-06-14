<?php

namespace App\DataFixtures;

use App\Entity\Allergy;
use App\Entity\Card;
use App\Entity\Category;
use App\Entity\DaySlot;
use App\Entity\Dish;
use App\Entity\EveningSlot;
use App\Entity\Menu;
use App\Entity\Reservation;
use App\Entity\Schedule;
use App\Entity\Table;
use App\Entity\User;
use App\Repository\DishRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

/**
 * Summary of AppFixtures
 */
class AppFixtures extends Fixture
{
    /**
     * @var Generator
     */
    private Generator $faker;

    /**
     * Summary of __construct
     */
    public function __construct(
        private DishRepository $dishRepository
    ) {
    }
    /**
     * Summary of load
     * @param ObjectManager $manager
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create('fr_FR');

         //Allergy
         $allergies = [];
         for ($n = 0; $n < 5; $n++) {
             $allergy = new Allergy();
             $allergy->setName($this->faker->word());
             //  $allergy->addUser($users[mt_rand(0, count($users) - 1)]);
 
             $allergies[] = $allergy;
             $manager->persist($allergy);
         }

        // Users
        $users = [];

        $admin = new User();
        $admin->setFullName('Admin')
            ->setEmail('admin@admin.fr')
            ->setRoles(['ROLE_USER', 'ROLE_ADMIN'])
            ->setPlainPassword('password');

        $users[] = $admin;
        $manager->persist($admin);


        for ($j = 0; $j < 10; $j++) {
            $user = new User();
            $user->setFullName($this->faker->name())
                ->setEmail($this->faker->email())
                ->setRoles(['ROLE_USER'])
                ->setPlainPassword('password')
                ->setNbPeople(mt_rand(1, 20))
                ->setIsVerified(mt_rand(0, 1) == 1 ? true : false);
            //  for ($b = 0; $b < mt_rand(0, 5); $b++) {
               $user->addAllergy($allergies[mt_rand(0, count($allergies) - 1)]);
        }
        $users[] = $user;
        $manager->persist($user);

       
        //Dish
        $dishes = [];
        for ($n = 0; $n < 30; $n++) {
            $dish = new Dish();
            $dish->setTitle($this->faker->word())
                ->setDescription($this->faker->text(30))
                ->setPrice(mt_rand(10, 24));
                

            $dishes[] = $dish;
            $manager->persist($dish);
        }

        //Category
        $categories = [];
        for ($i = 0; $i < 10; $i++) {
            $category = new Category();
            $category->setName($this->faker->word());

            for ($b = 0; $b < mt_rand(0, 5); $b++) {
                $category->addDish($dishes[mt_rand(0, count($dishes) - 1)]);
            }
            $categories[] = $category;
            $manager->persist($category);
        }


        //Card
        $cards = [];
        for ($j = 0; $j < 6; $j++) {
            $card = new Card();
            $card->setName($this->faker->word());
            $cards[] = $card;
            $manager->persist($card);
        }
        //Menu
        $menus = [];
        for ($n = 0; $n < 5; $n++) {
            $menu = new Menu();
            $menu->setTitle($this->faker->word())
                ->setDescription($this->faker->text(30))
                ->setConditions($this->faker->text(30))
                ->setPrice(mt_rand(10, 24));

            $menus[] = $menu;
            $manager->persist($menu);

            $manager->persist($menu);
        }
        // //Schedule
        $schedules = [];
        for ($n = 0; $n < 7; $n++) {
            $schedule = new Schedule();
            $schedule->setDay($this->faker->word())
                ->setOpeningTimeMidday($this->faker->time('H:i'))
                ->setClosingTimeMidday($this->faker->time('H:i'))
                ->setOpeningTimeEvening($this->faker->time('H:i'))
                ->setClosingTimeEvening($this->faker->time('H:i'));

            $schedules[] = $schedule;
            $manager->persist($schedule);

            $manager->persist($schedule);
        }
        // //DaySlot
        // $daySlots = [];
        // for ($n = 0; $n < 13; $n++) {
        //     $daySlot = new DaySlot();
        //     $daySlot->setTime($this->faker->time('H:i'))
        //         ->setIsAvailable(mt_rand(0, 1) == 1 ? true : false);

        //     $daySlots[] = $daySlot;
        //     $manager->persist($daySlot);

        //     $manager->persist($daySlot);
        // }
        

        //table
        $tables = [];
        for ($n = 0; $n < 20; $n++) {
            $table = new Table();
            $table->setNumber(mt_rand(1, 20))
                  ->setNbPlaces(mt_rand(1, 8))
                  ->setisAvailable(mt_rand(0, 1) == 1 ? true : false);

            $tables[] = $table;
            $manager->persist($table);

            $manager->persist($table);
        }
        $reservations = [];
        for ($i = 0; $i < 10; $i++) {
            $reservation = new Reservation();
            $reservation->setNbPeople(mt_rand(1, 8)) 
                         ->setNbChildren(mt_rand(1, 8)) 
                         ->setFullname($this->faker->name())
                         ->setUser($users[mt_rand(0, count($users) - 1)])
                        //  ->setDaySlot($daySlots[mt_rand(0, count($daySlots) - 1)])
                         ;
                         for ($b = 0; $b < mt_rand(0, 5); $b++) {
                                 $reservation->addAllergy($allergies[mt_rand(0, count($allergies) - 1)]);
                             }
                         
            // for ($b = 0; $b < mt_rand(0, 5); $b++) {
            //     $reservation->setTable($tables[mt_rand(0, count($tables) - 1)]);
            // }
                         
            $reservations[] = $reservation;
            $manager->persist($reservation);
        }


        $manager->flush();
    }
}
