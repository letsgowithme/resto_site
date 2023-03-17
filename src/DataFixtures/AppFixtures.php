<?php

namespace App\DataFixtures;

use App\Entity\Allergy;
use App\Entity\Category;
use App\Entity\Dish;
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
)
{

 
}
/**
 * Summary of load
 * @param ObjectManager $manager
 * @return void
 */
public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create('fr_FR');

        // Users
        $users = [];

        $admin = new User();
        $admin->setFullName('Administrateur')
               ->setEmail('administrateur@diet.fr')
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
               ->setNbGuests(mt_rand(1, 20))
               ->setIsVerified(mt_rand(0, 1) == 1 ? true : false)
            ;
            // for ($b = 0; $b < mt_rand(0, 5); $b++) {
            //  $user->addAllergies($allergies[mt_rand(0, count($allergies) - 1)]);
             }
               $users[] = $user;
           $manager->persist($user);
           
         //Allergy
            $allergies = [];
            for ($n = 0; $n < 5; $n++) {
            $allergy = new Allergy();
            $allergy->setName($this->faker->word());
            // $allergy->addUser($users[mt_rand(0, count($users) - 1)]);
            $allergies[] = $allergy;
            $manager->persist($allergy);
        }

            //Category
        for ($i = 0; $i < 10; $i++) {   
            $category = new Category();
            $category->setName($this->faker->words(1, true).' '.$i);
       
            $manager->persist($category);
        }
        //Dish
        $dishes = [];
        for ($n = 0; $n < 5; $n++) {
        $dish = new Dish();
        $dish->setTitle($this->faker->word())
        ->setDescription($this->faker->text(8))
        ->setPrice(mt_rand(10, 24));
        // $allergy->addUser($users[mt_rand(0, count($users) - 1)]);
        $dishes[] = $dish;
        $manager->persist($dish);
        
            $manager->persist($category);
        }

        $manager->flush();
    }
    }


