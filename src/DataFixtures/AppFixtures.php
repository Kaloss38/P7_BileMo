<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\Customer;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $manager;

    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $this->manager = $manager;
        
        $this->createProducts();
        $this->createCustomer();

        $this->manager->flush();
    }
    
    public function createProducts()
    {
        $products = [
            [
                "name" => "Pixel 6 Pro",
                "description" => "Le Google Pixel 6 Pro est le modèle le plus abouti de la firme américaine en 2021. Bien plus qu'un photophone premium avec ses performances de haute volée, son superbe écran et ses finitions très soignées, le flagship livre une expérience complète sur l'OS de son constructeur.",
                "price" => 599.00,
                "fabricationYear" => "2021",
                "manufacturer" => "Google",
            ],
            [
                "name" => "Iphone 13 Pro",
                "description" => "ll ne s'agit pas d'une révolution en soi, l'iPhone 13 Pro se situant dans la lignée de son prédécesseur. Mais Apple nous sert un smartphone complet à qui il est difficile de reprocher quelque chose. Dommage que son prix soit plus élevé que celui du Google Pixel 6 Pro qui performe dans les mêmes domaines. Malgré tout, les améliorations apportées du côté de l'écran, de la partie photo/vidéo et de l'autonomie suffisent pour faire de lui un must have pour tous les habitués d'iOS.",
                "price" => 1199.00,
                "fabricationYear" => "2022",
                "manufacturer" => "Apple",
            ],
            [
                "name" => "Galaxy Z Flip 3",
                "description" => "Samsung a bien pensé son Galaxy Z Flip 3. Le corps, la charnière et l'écran sont fabriqués avec des matériaux qui rendent le smartphone plus solide sans oublier qu'il est désormais étanche. Un écran secondaire plus grand, un écran principal de qualité et une partie logicielle améliorée placent le Z Flip 3 au même niveau que la plupart des autres téléphones à 1000 euros. Cela ne veut pas dire que l'appareil n'est pas exempt de tout défaut. L'autonomie est faiblarde, le pli sur l'écran intérieur est toujours là, le smartphone ne résiste pas à la poussière et sa durabilité à long terme est inconnue.",
                "price" => 799.00,
                "fabricationYear" => "2020",
                "manufacturer" => "Samsung",
            ],
            [
                "name" => "Mi 11",
                "description" => "Le Mi 11 trace clairement la route de Xiaomi sur le segment du haut de gamme. Son design, son sublime écran et sa puissance de feu lui font même côtoyer les sommets aux côtés du Galaxy S21 et de l’iPhone 12. Et le tout avec un prix légèrement inférieur. Pourtant, il manque de constance dans un domaine décisif, la photo. L’ensemble est satisfaisant, mais on est en droit d’attendre un peu mieux, notamment en mode « Nuit ». Et puisque « le diable est dans les détails », la partie audio et logiciel frisent le très bon sans l’atteindre.",
                "price" => 599.00,
                "fabricationYear" => "2020",
                "manufacturer" => "Xiaomi",
            ],
            [
                "name" => "iPhone SE",
                "description" => "L'iPhone SE (2020) n'est pas seulement un très bon iPhone, c'est aussi l'un des meilleurs smartphones à petit prix actuellement. Si son design est très proche de celui de l'iPhone 8, à l’intérieur on retrouve le dernier A13 Bionic qui équipe les iPhone 11. Le changement va bien au-delà d'une simple modification des spécifications avec de gros progrès sur la partie photo et l'autonomie.",
                "price" => 489.00,
                "fabricationYear" => "2020",
                "manufacturer" => "Apple",
            ],
            [
                "name" => "Realme GT",
                "description" => "realme ne chôme pas. À l’image de ses concurrents Xiaomi ou Samsung, le constructeur chinois inonde littéralement le marché de ses produits en 2021 et a présenté en juin, le realme GT. Un smartphone de milieu de gamme à la fiche technique pour le moins impressionnante.",
                "price" => 437.00,
                "fabricationYear" => "2020",
                "manufacturer" => "Realme",
            ],
            [
                "name" => "OnePlus Nord 2",
                "description" => "OnePlus a marqué les esprits avec son premier Nord. Un solide retour de la marque sur le marché du milieu de gamme et un essai transformé par cette deuxième génération. Le OnePlus Nord 2 affiche en effet une fiche technique bien alléchante avec des concessions acceptables. La série 9 de OnePlus est à notre avis la plus menacée par ce smartphone qui partage bon nombre de ses caractéristiques mais dont le prix de départ est bien moins élevé : à partir de 719€ et 919€.",
                "price" => 476.00,
                "fabricationYear" => "2021",
                "manufacturer" => "OnePlus",
            ],
            [
                "name" => "Redmi Note 10 Pro",
                "description" => "Le Xiaomi Redmi Note 10 Pro a quasiment tout pour plaire : un bon écran AMOLED et 120 Hz pour une expérience ultra-fluide, une configuration technique qui fait le job, une partie photo efficace même en basse luminosité grâce à son excellent capteur principal et son mode nuit, une autonomie séduisante et une charge vraiment rapide. Le smartphone n'est pas compatible 5G mais à ce prix, difficile de lui en tenir rigueur.",
                "price" => 476.00,
                "fabricationYear" => "2021",
                "manufacturer" => "Xiaomi",
            ],
            [
                "name" => "Redmi Note 10 5G",
                "description" => "Le Xiaomi Redmi Note 10 5G est l'un des smartphones 5G les moins chers du marché. Il profite d'un écran 90 Hz, d'un capteur principal de 48 mégapixels et d'une batterie de 5000 mAh. On aurait aimé que Xiaomi apporte le même soin à la fiche technique de ce modèle qu'à la version 4G.",
                "price" => 550.00,
                "fabricationYear" => "2021",
                "manufacturer" => "Xiaomi",
            ],
            [
                "name" => "Power U30",
                "description" => "En misant (presque) tout sur son autonomie, le Power U30 réussit son pari puisque c’est actuellement le smartphone le plus endurant dans cette catégorie de prix. Au détriment d’un design un peu bourru, d’un écran correct sans plus et d’un appareil photo juste bon à être utilisé avec application en journée. Et pourtant, on a du mal à lui en vouloir car il ne fait pas d'esbroufe. Il met en avant son autonomie monstre et il ne nous ment pas.",
                "price" => 129.00,
                "fabricationYear" => "2021",
                "manufacturer" => "Wiko",
            ],
        ];

        foreach($products as $product)
        {
            $newProduct = new Product();
            $newProduct->setName($product['name']);
            $newProduct->setDescription($product['description']);
            $newProduct->setPrice($product['price']);
            $newProduct->setFabricationYear($product['fabricationYear']);
            $newProduct->setManufacturer($product['manufacturer']);

            $this->manager->persist($newProduct);
        }
    }

    public function createCustomer()
    {
        $customer = new Customer();
        $customer->setFirstname('John');
        $customer->setLastname('Doe');
        $customer->setEmail('customer@email.fr');
        $password = $this->hasher->hashPassword($customer, 'Customer');
        $customer->setPassword($password);

        $this->manager->persist($customer);
    }
}
