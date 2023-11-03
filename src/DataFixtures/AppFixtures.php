<?php

namespace App\DataFixtures;

use App\Entity\Vente;
use App\Entity\Panier;
use App\Entity\Adresse;
use App\Entity\Produit;
use App\Entity\Commande;
use App\Entity\Categorie;
use App\Entity\Livraison;
use App\Entity\Fournisseur;
use App\Entity\Utilisateur;
use App\Entity\BonLivraison;
use App\Entity\Transporteur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
/////////////////////
        $categoriePs5 = new Categorie();
        $categoriePs5->setCatNom("PS5");
        $categoriePs5->setCatImage("ps5Logo.jpg");
        $manager->persist($categoriePs5);



        $sousCatPs5Jeux = new Categorie();
        $sousCatPs5Jeux->setCatNom("JEUX PS5");
        $sousCatPs5Jeux->setCatImage("ps5Jeux2.jpg");
        $sousCatPs5Jeux->setCatParent($categoriePs5);
        $manager->persist($sousCatPs5Jeux);

        $jeuxPs5GodOfWar = new Produit();
        $jeuxPs5GodOfWar->setProNom("God of war");
        $jeuxPs5GodOfWar->setProPrix(79.99);
        $jeuxPs5GodOfWar->setProImage("ps5JeuxGodOfWar.jpg");
        $jeuxPs5GodOfWar->setProDescription("Embarquez pour un voyage épique et émouvant, alors que Kratos et Atreus luttent pour s'accrocher et lâcher prise.*
        Au cœur des royaumes nordiques déchirés par la fureur des Ases, ils ont tout fait pour empêcher la fin des temps. Mais malgré leurs efforts, Fimbulvetr approche dangereusement.*
        Observez leur dynamique père-fils évoluer alors qu'ils luttent pour leur survie : Atreus assoiffé d'une connaissance qui pourra l'aider à comprendre la prophétie de « Loki », et Kratos peinant à se défaire de son passé et à devenir le père dont son fils a besoin.*
        Voyez comment le destin leur imposera un choix : la sûreté des neuf royaumes ou la leur. Et pendant ce temps, Asgard rassemble ses forces...*
        Ceux qui défient le destin*
        Atreus part en quête du savoir qui l'aidera à comprendre la prophétie de « Loki » et le rôle qu'il doit jouer dans le Ragnarök. Kratos doit choisir entre rester paralysé par la peur de répéter ses erreurs ou se libérer du passé pour devenir le père dont Atreus a besoin.");
        $manager->persist($jeuxPs5GodOfWar);
        $sousCatPs5Jeux->addProduit($jeuxPs5GodOfWar);

        $jeuxPs5TheLastOfUsP2 = new Produit();
        $jeuxPs5TheLastOfUsP2->setProNom("The last of us part 2");
        $jeuxPs5TheLastOfUsP2->setProPrix(79.99);
        $jeuxPs5TheLastOfUsP2->setProImage("ps5JeuxTheLastOfUsP2.jpg");
        $manager->persist($jeuxPs5TheLastOfUsP2);
        $sousCatPs5Jeux->addProduit($jeuxPs5TheLastOfUsP2);

        $jeuxPs5TheLastOfUsP1 = new Produit();
        $jeuxPs5TheLastOfUsP1->setProNom("The last of us part 1");
        $jeuxPs5TheLastOfUsP1->setProPrix(79.99);
        $jeuxPs5TheLastOfUsP1->setProImage("ps5JeuxTheLastOfUsP1.jpg");
        $manager->persist($jeuxPs5TheLastOfUsP1);
        $sousCatPs5Jeux->addProduit($jeuxPs5TheLastOfUsP1);



        $sousCatPs5Console = new Categorie();
        $sousCatPs5Console->setCatNom("Consoles PS5");
        $sousCatPs5Console->setCatImage("ps5Console.jpg");
        $sousCatPs5Console->setCatParent($categoriePs5);
        $manager->persist($sousCatPs5Console);

        $consolePS5 = new Produit();
        $consolePS5->setProNom("Console PS5 standart");
        $consolePS5->setProPrix(499.99);
        $consolePS5->setProImage("ps5ConsoleBox.jpg");
        $manager->persist($consolePS5);
        $sousCatPs5Console->addProduit($consolePS5);

        $consolePS5HFW = new Produit();
        $consolePS5HFW->setProNom("Console PS5 standart + Horizon Forbidden West PS5");
        $consolePS5HFW->setProPrix(549.99);
        $consolePS5HFW->setProImage("ps5Console+HorizonFW.webp");
        $manager->persist($consolePS5HFW);
        $sousCatPs5Console->addProduit($consolePS5HFW);

        $consolePS5GOW = new Produit();
        $consolePS5GOW->setProNom("Console PS5 standart + God Of War Ragnarök PS5");
        $consolePS5GOW->setProPrix(549.99);
        $consolePS5GOW->setProImage("ps5Console+GOW.webp");
        $manager->persist($consolePS5GOW);
        $sousCatPs5Console->addProduit($consolePS5GOW);



        $sousCatPs5Accessoires = new Categorie();
        $sousCatPs5Accessoires->setCatNom("Accessoires PS5");
        $sousCatPs5Accessoires->setCatImage("ps5Accessoire.jpg");
        $sousCatPs5Accessoires->setCatParent($categoriePs5);
        $manager->persist($sousCatPs5Accessoires);

        $accessoirePS5 = new Produit();
        $accessoirePS5->setProNom("Casque Playstation VR");
        $accessoirePS5->setProPrix(239.99);
        $accessoirePS5->setProImage("ps5AccessoireCasqueVR.jpg");
        $manager->persist($accessoirePS5);
        $sousCatPs5Accessoires->addProduit($accessoirePS5);

        $accessoirePS5M = new Produit();
        $accessoirePS5M->setProNom("Manette Playstation 5 officielle DualSense");
        $accessoirePS5M->setProPrix(69.95);
        $accessoirePS5M->setProImage("ps5AccessoireManette.jpg");
        $manager->persist($accessoirePS5M);
        $sousCatPs5Accessoires->addProduit($accessoirePS5M);

        $accessoirePS5 = new Produit();
        $accessoirePS5->setProNom("Casque-micro sans fil Pulse 3D pour Playtation 5");
        $accessoirePS5->setProPrix(89.99);
        $accessoirePS5->setProImage("ps5AccessoireCasque.jpg");
        $manager->persist($accessoirePS5);
        $sousCatPs5Accessoires->addProduit($accessoirePS5);
////////////////////////////////////////////

        $categorieXboxSeries = new Categorie();
        $categorieXboxSeries->setCatNom("XBOX SERIES");
        $categorieXboxSeries->setCatImage("xboxSeriesLogo.svg.png");
        $manager->persist($categorieXboxSeries);



        $sousCategorieXboxSeriesJeux = new Categorie();
        $sousCategorieXboxSeriesJeux->setCatNom("JEUX XBOX SERIES");
        $sousCategorieXboxSeriesJeux->setCatImage("xboxSeriesJeux.jpg");
        $sousCategorieXboxSeriesJeux->setCatParent($categorieXboxSeries);
        $manager->persist($sousCategorieXboxSeriesJeux);

        $jeuxXboxSeriesCODMW3 = new Produit();
        $jeuxXboxSeriesCODMW3->setProNom("Call of duty moderne warfare 3");
        $jeuxXboxSeriesCODMW3->setProPrix(79.99);
        $jeuxXboxSeriesCODMW3->setProImage("xboxSeriesJeuxCODMW3.jpg");
        $manager->persist($jeuxXboxSeriesCODMW3);
        $sousCategorieXboxSeriesJeux->addProduit($jeuxXboxSeriesCODMW3);

        $jeuxXboxSeriesDeadSpace= new Produit();
        $jeuxXboxSeriesDeadSpace->setProNom("Dead Space");
        $jeuxXboxSeriesDeadSpace->setProPrix(79.99);
        $jeuxXboxSeriesDeadSpace->setProImage("xboxSeriesJeuxDeadSpace.jpg");
        $manager->persist($jeuxXboxSeriesDeadSpace);
        $sousCategorieXboxSeriesJeux->addProduit($jeuxXboxSeriesDeadSpace);

        $jeuxXboxSeriesStarfield= new Produit();
        $jeuxXboxSeriesStarfield->setProNom("Starfield");
        $jeuxXboxSeriesStarfield->setProPrix(79.99);
        $jeuxXboxSeriesStarfield->setProImage("xboxSeriesJeuxStarfield.jpg");
        $manager->persist($jeuxXboxSeriesStarfield);
        $sousCategorieXboxSeriesJeux->addProduit($jeuxXboxSeriesStarfield);



        $sousCategorieXboxSeriesConsole = new Categorie();
        $sousCategorieXboxSeriesConsole->setCatNom("Consoles XBOX SERIES");
        $sousCategorieXboxSeriesConsole->setCatImage("xboxSeriesConsole.jpg");
        $sousCategorieXboxSeriesConsole->setCatParent($categorieXboxSeries);
        $manager->persist($sousCategorieXboxSeriesConsole);

        $consoleXboxSeries = new Produit();
        $consoleXboxSeries->setProNom("Console Xbox Serie standart");
        $consoleXboxSeries->setProPrix(499.99);
        $consoleXboxSeries->setProImage("xboxSeriesConsoleStandart.jpg");
        $manager->persist($consoleXboxSeries);
        $sousCategorieXboxSeriesConsole->addProduit($consoleXboxSeries);

        $consoleXboxSeriesD4 = new Produit();
        $consoleXboxSeriesD4->setProNom("Console Xbox Serie standart + Diablo 4");
        $consoleXboxSeriesD4->setProPrix(599.99);
        $consoleXboxSeriesD4->setProImage("xboxSeriesConsole+diablo4.jpg");
        $manager->persist($consoleXboxSeriesD4);
        $sousCategorieXboxSeriesConsole->addProduit($consoleXboxSeriesD4);

        $consoleXboxSeriesHalo = new Produit();
        $consoleXboxSeriesHalo->setProNom("Console Xbox Serie standart + Halo Infinite");
        $consoleXboxSeriesHalo->setProPrix(599.99);
        $consoleXboxSeriesHalo->setProImage("xboxSeriesConsole+Halo.jpg");
        $manager->persist($consoleXboxSeriesHalo);
        $sousCategorieXboxSeriesConsole->addProduit($consoleXboxSeriesHalo);



        $sousCategorieXboxSeriesAccessoires = new Categorie();
        $sousCategorieXboxSeriesAccessoires->setCatNom("Accessoires XBOX SERIES");
        $sousCategorieXboxSeriesAccessoires->setCatImage("xboxSeriesAccessoire.jpg");
        $sousCategorieXboxSeriesAccessoires->setCatParent($categorieXboxSeries);
        $manager->persist($sousCategorieXboxSeriesAccessoires);

        $accessoireXboxSeriesManette = new Produit();
        $accessoireXboxSeriesManette->setProNom("Manette Wireless Xbox Series");
        $accessoireXboxSeriesManette->setProPrix(69.99);
        $accessoireXboxSeriesManette->setProImage("xboxSeriesAccessoireManette.jpg");
        $manager->persist($accessoireXboxSeriesManette);
        $sousCategorieXboxSeriesAccessoires->addProduit($accessoireXboxSeriesManette);

        $accessoireXboxSeriesCasque = new Produit();
        $accessoireXboxSeriesCasque->setProNom("Casque officiel Xbox Series");
        $accessoireXboxSeriesCasque->setProPrix(99.99);
        $accessoireXboxSeriesCasque->setProImage("xboxSeriesAccessoireCasque.jpg");
        $manager->persist($accessoireXboxSeriesCasque);
        $sousCategorieXboxSeriesAccessoires->addProduit($accessoireXboxSeriesCasque);

        $accessoireXboxSeriesStationR = new Produit();
        $accessoireXboxSeriesStationR->setProNom("Station Recharge pour Manette Xbox Series");
        $accessoireXboxSeriesStationR->setProPrix(34.99);
        $accessoireXboxSeriesStationR->setProImage("xboxSeriesAccessoireStationRecharge.jpg");
        $manager->persist($accessoireXboxSeriesStationR);
        $sousCategorieXboxSeriesAccessoires->addProduit($accessoireXboxSeriesStationR);
////////////////////////////////////


        $categorieSwitch = new Categorie();
        $categorieSwitch->setCatNom("Switch");
        $categorieSwitch->setCatImage("switchLogo.png");
        $manager->persist($categorieSwitch);



        $categorieSwitchJeux = new Categorie();
        $categorieSwitchJeux->setCatNom("JEUX Switch");
        $categorieSwitchJeux->setCatImage("switchJeux.jpg");
        $categorieSwitchJeux->setCatParent($categorieSwitch);
        $manager->persist($categorieSwitchJeux);

        $jeuxSwitchMarioOD= new Produit();
        $jeuxSwitchMarioOD->setProNom("Mario Odyssey");
        $jeuxSwitchMarioOD->setProPrix(59.99);
        $jeuxSwitchMarioOD->setProImage("switchJeuxMarioOdyssey.jpg");
        $manager->persist($jeuxSwitchMarioOD);
        $categorieSwitchJeux->addProduit($jeuxSwitchMarioOD);

        $jeuxSwitchSplatoon2= new Produit();
        $jeuxSwitchSplatoon2->setProNom("Splatoon 2");
        $jeuxSwitchSplatoon2->setProPrix(59.99);
        $jeuxSwitchSplatoon2->setProImage("switchJeuxSplatoon2.jpg");
        $manager->persist($jeuxSwitchSplatoon2);
        $categorieSwitchJeux->addProduit($jeuxSwitchSplatoon2);

        $jeuxSwitchZeldaBOTW= new Produit();
        $jeuxSwitchZeldaBOTW->setProNom("Zelda Breath Of The Wild");
        $jeuxSwitchZeldaBOTW->setProPrix(59.99);
        $jeuxSwitchZeldaBOTW->setProImage("switchJeuxZeldaBOTW.webp");
        $manager->persist($jeuxSwitchZeldaBOTW);
        $categorieSwitchJeux->addProduit($jeuxSwitchZeldaBOTW);



        $categorieSwitchConsole = new Categorie();
        $categorieSwitchConsole->setCatNom("Consoles Switch");
        $categorieSwitchConsole->setCatImage("switchConsole.jpg");
        $categorieSwitchConsole->setCatParent($categorieSwitch);
        $manager->persist($categorieSwitchConsole);

        $consoleSwitch = new Produit();
        $consoleSwitch->setProNom("Console Switch Standart");
        $consoleSwitch->setProPrix(349.99);
        $consoleSwitch->setProImage("switchConsoleStandart.jpg");
        $manager->persist($consoleSwitch);
        $categorieSwitchConsole->addProduit($consoleSwitch);

        $consoleSwitchMK8 = new Produit();
        $consoleSwitchMK8->setProNom("Console Switch Standart + Mario Kart 8");
        $consoleSwitchMK8->setProPrix(449.99);
        $consoleSwitchMK8->setProImage("switchConsole+MK8.jpg");
        $manager->persist($consoleSwitchMK8);
        $categorieSwitchConsole->addProduit($consoleSwitchMK8);

        $consoleSwitchSports = new Produit();
        $consoleSwitchSports->setProNom("Console Switch Standart + Sports");
        $consoleSwitchSports->setProPrix(449.99);
        $consoleSwitchSports->setProImage("switchConsole+Sports.jpg");
        $manager->persist($consoleSwitchSports);
        $categorieSwitchConsole->addProduit($consoleSwitchSports);


        $categorieSwitchAccesoires = new Categorie();
        $categorieSwitchAccesoires->setCatNom("Accessoires Switch");
        $categorieSwitchAccesoires->setCatImage("switchAccessoire.png");
        $categorieSwitchAccesoires->setCatParent($categorieSwitch);
        $manager->persist($categorieSwitchAccesoires);

        $accessoireSwitchJoyCon = new Produit();
        $accessoireSwitchJoyCon->setProNom("Joy-Con pour Nintendo Switch");
        $accessoireSwitchJoyCon->setProPrix(69.99);
        $accessoireSwitchJoyCon->setProImage("switchAccessoireJoyCon.jpg");
        $manager->persist($accessoireSwitchJoyCon);
        $categorieSwitchAccesoires->addProduit($accessoireSwitchJoyCon);

        $accessoireSwitchMalette = new Produit();
        $accessoireSwitchMalette->setProNom("Malette de rangement pour Nintendo Switch");
        $accessoireSwitchMalette->setProPrix(34.99);
        $accessoireSwitchMalette->setProImage("switchAccessoireMalette.jpg");
        $manager->persist($accessoireSwitchMalette);
        $categorieSwitchAccesoires->addProduit($accessoireSwitchMalette);

        $accessoireSwitchManettePro = new Produit();
        $accessoireSwitchManettePro->setProNom("Manette Pro pour Nintendo Switch");
        $accessoireSwitchManettePro->setProPrix(14.99);
        $accessoireSwitchManettePro->setProImage("switchAccessoireManettePro.jpg");
        $manager->persist($accessoireSwitchManettePro);
        $categorieSwitchAccesoires->addProduit($accessoireSwitchManettePro);
////////////////////////////////////////////

        $categoriePs4 = new Categorie();
        $categoriePs4->setCatNom("PS4");
        $categoriePs4->setCatImage("ps4Logo.jpg");
        $manager->persist($categoriePs4);

        $categoriePs4Jeux = new Categorie();
        $categoriePs4Jeux->setCatNom("JEUX PS4");
        $categoriePs4Jeux->setCatImage("ps4Jeux.jpg");
        $categoriePs4Jeux->setCatParent($categoriePs4);
        $manager->persist($categoriePs4Jeux);

        $jeuxPs4GOW = new Produit();
        $jeuxPs4GOW->setProNom("God of war ps4");
        $jeuxPs4GOW->setProPrix(59.99);
        $jeuxPs4GOW->setProImage("ps4JeuxGOW.jpg");
        $manager->persist($jeuxPs4GOW);
        $categoriePs4Jeux->addProduit($jeuxPs4GOW);

        $jeuxPs4Rachet = new Produit();
        $jeuxPs4Rachet->setProNom("Rachet & Clanck");
        $jeuxPs4Rachet->setProPrix(59.99);
        $jeuxPs4Rachet->setProImage("ps4JeuxRachet.jpg");
        $manager->persist($jeuxPs4Rachet);
        $categoriePs4Jeux->addProduit($jeuxPs4Rachet);

        $jeuxPs4U4 = new Produit();
        $jeuxPs4U4->setProNom("Uncharted 4");
        $jeuxPs4U4->setProPrix(59.99);
        $jeuxPs4U4->setProImage("ps4JeuxUncharted4.jpg");
        $manager->persist($jeuxPs4U4);
        $categoriePs4Jeux->addProduit($jeuxPs4U4);



        $categoriePs4Console = new Categorie();
        $categoriePs4Console->setCatNom("Consoles PS4");
        $categoriePs4Console->setCatImage("ps4Console.jpg");
        $categoriePs4Console->setCatParent($categoriePs4);
        $manager->persist($categoriePs4Console);

        $consolePs4 = new Produit();
        $consolePs4->setProNom("Console Ps4 Standart");
        $consolePs4->setProPrix(399.99);
        $consolePs4->setProImage("ps4ConsoleStandart.jpg");
        $manager->persist($consolePs4);
        $categoriePs4Console->addProduit($consolePs4);

        $consolePs4Pro = new Produit();
        $consolePs4Pro->setProNom("Console Ps4 Pro");
        $consolePs4Pro->setProPrix(449.99);
        $consolePs4Pro->setProImage("ps4ConsolePro.jpg");
        $manager->persist($consolePs4Pro);
        $categoriePs4Console->addProduit($consolePs4Pro);

        $consolePs4CODMW2 = new Produit();
        $consolePs4CODMW2->setProNom("Console Ps4 Standart + Call Of Duty Moderne Warfare 2");
        $consolePs4CODMW2->setProPrix(449.99);
        $consolePs4CODMW2->setProImage("ps4Console+CODMW2.jpg");
        $manager->persist($consolePs4CODMW2);
        $categoriePs4Console->addProduit($consolePs4CODMW2);



        $categoriePs4Accessoires = new Categorie();
        $categoriePs4Accessoires->setCatNom("Accessoires PS4");
        $categoriePs4Accessoires->setCatImage("ps4Accessoire.jpg");
        $categoriePs4Accessoires->setCatParent($categoriePs4);
        $manager->persist($categoriePs4Accessoires);

        $accessoirePs4Manette = new Produit();
        $accessoirePs4Manette->setProNom("Manette Ps4 Officiel");
        $accessoirePs4Manette->setProPrix(59.99);
        $accessoirePs4Manette->setProImage("ps4AccessoireManette.jpg");
        $manager->persist($accessoirePs4Manette);
        $categoriePs4Accessoires->addProduit($accessoirePs4Manette);

        $accessoirePs4Pulse3D = new Produit();
        $accessoirePs4Pulse3D->setProNom("Pulse 3D sans fil");
        $accessoirePs4Pulse3D->setProPrix(89.99);
        $accessoirePs4Pulse3D->setProImage("ps4AccessoirePulse3D.jpg");
        $manager->persist($accessoirePs4Pulse3D);
        $categoriePs4Accessoires->addProduit($accessoirePs4Pulse3D);

        $accessoirePs4T300 = new Produit();
        $accessoirePs4T300->setProNom("Thrustmaster T300 RS GT Racing Wheel");
        $accessoirePs4T300->setProPrix(359);
        $accessoirePs4T300->setProImage("ps4AccessoireT300.jpg");
        $manager->persist($accessoirePs4T300);
        $categoriePs4Accessoires->addProduit($accessoirePs4T300);
///////////////////////////////////////////////////

        $categorieXboxOne = new Categorie();
        $categorieXboxOne->setCatNom("XBOX ONE");
        $categorieXboxOne->setCatImage("xboxOneLogo.jpg");
        $manager->persist($categorieXboxOne);

        $categorieXboxOneJeux = new Categorie();
        $categorieXboxOneJeux->setCatNom("JEUX XBOX ONE");
        $categorieXboxOneJeux->setCatImage("xboxOneJeux.jpg");
        $categorieXboxOneJeux->setCatParent($categorieXboxOne);
        $manager->persist($categorieXboxOneJeux);

        $jeuxXboxOneGears5 = new Produit();
        $jeuxXboxOneGears5->setProNom("Gears Of War 5");
        $jeuxXboxOneGears5->setProPrix(59.99);
        $jeuxXboxOneGears5->setProImage("xboxOneJeuxGearsOfWar5.jpg");
        $manager->persist($jeuxXboxOneGears5);
        $categorieXboxOneJeux->addProduit($jeuxXboxOneGears5);

        $jeuxXboxOneHalo = new Produit();
        $jeuxXboxOneHalo->setProNom("Halo Xbox One");
        $jeuxXboxOneHalo->setProPrix(59.99);
        $jeuxXboxOneHalo->setProImage("xboxOneJeuxHalo.jpg");
        $manager->persist($jeuxXboxOneHalo);
        $categorieXboxOneJeux->addProduit($jeuxXboxOneHalo);

        $jeuxXboxOneSOD2 = new Produit();
        $jeuxXboxOneSOD2->setProNom("State Of Decay 2 Xbox One");
        $jeuxXboxOneSOD2->setProPrix(59.99);
        $jeuxXboxOneSOD2->setProImage("xboxOneJeuxSOD2.jpeg");
        $manager->persist($jeuxXboxOneSOD2);
        $categorieXboxOneJeux->addProduit($jeuxXboxOneSOD2);



        $categorieXboxOneConsole = new Categorie();
        $categorieXboxOneConsole->setCatNom("Consoles XBOX ONE");
        $categorieXboxOneConsole->setCatImage("xboxOneConsole.jpg");
        $categorieXboxOneConsole->setCatParent($categorieXboxOne);
        $manager->persist($categorieXboxOneConsole);

        $consolexboxOne = new Produit();
        $consolexboxOne->setProNom("Console Xbox One Standart");
        $consolexboxOne->setProPrix(399.99);
        $consolexboxOne->setProImage("xboxOneConsoleStandart.jpg");
        $manager->persist($consolexboxOne);
        $categorieXboxOneConsole->addProduit($consolexboxOne);

        $consolexboxOneFifa15 = new Produit();
        $consolexboxOneFifa15->setProNom("Console Xbox One Standart + Fifa 2015");
        $consolexboxOneFifa15->setProPrix(449.99);
        $consolexboxOneFifa15->setProImage("xboxOneConsole+fifa15.jpg");
        $manager->persist($consolexboxOneFifa15);
        $categorieXboxOneConsole->addProduit($consolexboxOneFifa15);

        $consolexboxOneForzaH3 = new Produit();
        $consolexboxOneForzaH3->setProNom("Console Xbox One Standart + Forza Hozizon 3");
        $consolexboxOneForzaH3->setProPrix(449.99);
        $consolexboxOneForzaH3->setProImage("xboxOneConsole+ForzaH3.jpg");
        $manager->persist($consolexboxOneForzaH3);
        $categorieXboxOneConsole->addProduit($consolexboxOneForzaH3);



        $categorieXboxOneAccesoires = new Categorie();
        $categorieXboxOneAccesoires->setCatNom("Accessoires XBOX ONE");
        $categorieXboxOneAccesoires->setCatImage("xboxOneAccessoire.jpg");
        $categorieXboxOneAccesoires->setCatParent($categorieXboxOne);
        $manager->persist($categorieXboxOneAccesoires);

        $accessoireXboxOneAlim = new Produit();
        $accessoireXboxOneAlim->setProNom("YCCTEAM Alimentation pour Xbox One");
        $accessoireXboxOneAlim->setProDescription('YCCTEAM Alimentation pour Xbox One AC Adaptateur Secteur Brique Bloc Chargeur Kit de Remplacement de Câble pour Xbox One Console, Auto Tension 100-240V');
        $accessoireXboxOneAlim->setProPrix(32.99);
        $accessoireXboxOneAlim->setProImage("xboxOneAccessoireAlimentation.jpg");
        $manager->persist($accessoireXboxOneAlim);
        $categorieXboxOneAccesoires->addProduit($accessoireXboxOneAlim);

        $accessoireXboxOneBC = new Produit();
        $accessoireXboxOneBC->setProNom("Batteries Manette pour Xbox One");
        $accessoireXboxOneBC->setProDescription("Batteries Manette pour Xbox One, Kits Batterie et Chargeur pour Manette Xbox Series X|S avec 2x2800mAh Batteries, Batterie Rechargeable pour Xbox Series X|S/One S/One X/One Elite");
        $accessoireXboxOneBC->setProPrix(19.99);
        $accessoireXboxOneBC->setProImage("xboxOneAccessoireBatterieChargeur.jpg");
        $manager->persist($accessoireXboxOneBC);
        $categorieXboxOneAccesoires->addProduit($accessoireXboxOneBC);

        $accessoireXboxOneManette = new Produit();
        $accessoireXboxOneManette->setProNom("Xbox Manette sans fil Carbon Black");
        $accessoireXboxOneManette->setProDescription("Xbox Manette sans fil Carbon Black avec Câble USB-C pour PC, Xbox Series X, Xbox Series S, Xbox One, Windows 10 & 11, Android et iOS ");
        $accessoireXboxOneManette->setProPrix(59.93);
        $accessoireXboxOneManette->setProImage("xboxOneAccessoireManette.jpg");
        $manager->persist($accessoireXboxOneManette);
        $categorieXboxOneAccesoires->addProduit($accessoireXboxOneManette);
//////////////////////////////////////////////////

        $categoriePc = new Categorie();
        $categoriePc->setCatNom("PC");
        $categoriePc->setCatImage("PcLogo.png");
        $manager->persist($categoriePc);

        $categoriePcJeux = new Categorie();
        $categoriePcJeux->setCatNom("JEUX PC");
        $categoriePcJeux->setCatImage("pcJeux.jpg");
        $categoriePcJeux->setCatParent($categoriePc);
        $manager->persist($categoriePcJeux);

        $jeuxPcTRC = new Produit();
        $jeuxPcTRC->setProNom("Tomb Raider Collection");
        $jeuxPcTRC->setProPrix(34.99);
        $jeuxPcTRC->setProImage("pcJeuxTRC.jpg");
        $manager->persist($jeuxPcTRC);
        $categoriePcJeux->addProduit($jeuxPcTRC);

        $jeuxPcTRTAOD = new Produit();
        $jeuxPcTRTAOD->setProNom("Tomb Raider the angel of darkness");
        $jeuxPcTRTAOD->setProPrix(14.99);
        $jeuxPcTRTAOD->setProImage("pcJeuxTRTAOD.jpg");
        $manager->persist($jeuxPcTRTAOD);
        $categoriePcJeux->addProduit($jeuxPcTRTAOD);

        $jeuxPcTRU = new Produit();
        $jeuxPcTRU->setProNom("Tomb Raider Underworld");
        $jeuxPcTRU->setProPrix(14.99);
        $jeuxPcTRU->setProImage("pcJeuxTRU.jpg");
        $manager->persist($jeuxPcTRU);
        $categoriePcJeux->addProduit($jeuxPcTRU);




        $categoriePcConsole = new Categorie();
        $categoriePcConsole->setCatNom("PC Gaming");
        $categoriePcConsole->setCatImage("pcGaming.jpg");
        $categoriePcConsole->setCatParent($categoriePc);
        $manager->persist($categoriePcConsole);

        $PcCyberpower = new Produit();
        $PcCyberpower->setProNom("CyberpowerPC Luxe PC Gamer");
        $PcCyberpower->setProPrix(1310.14);
        $PcCyberpower->setProDescription("CyberpowerPC Luxe PC Gamer - Intel Core i9-11900KF, Nvidia RTX 3060 12Go, RAM 32Go, SSD NVMe 1To, 650W 80+ PSU, WiFi, Refroidissement Liquide, Windows 11, 4000D Airflow");
        $PcCyberpower->setProImage("pcGamerCyberpower.jpg");
        $manager->persist($PcCyberpower);
        $categoriePcConsole->addProduit($PcCyberpower);

        $PcINFOMAX = new Produit();
        $PcINFOMAX->setProNom("INFOMAX PC GAMER");
        $PcINFOMAX->setProPrix(3669.99);
        $PcINFOMAX->setProDescription("INFOMAX | PC Gamer, Ordinateur de Bureau, PC Gaming - Processeur Intel Core i9-13900KF • NVIDIA RTX 4090 24 GO • RAM DDR5 32 GO RGB • SSD 2 to • BOÎTIER ARGB Aquarius • Watercooling • FREEDOS");
        $PcINFOMAX->setProImage("pcGamerINFOMAX.jpg");
        $manager->persist($PcINFOMAX);
        $categoriePcConsole->addProduit($PcINFOMAX);

        $PcMegaport = new Produit();
        $PcMegaport->setProNom("Megaport High End PC Gamer");
        $PcMegaport->setProPrix(2269);
        $PcMegaport->setProDescription("Megaport High End PC Gamer • Intel Core i9-11900KF • Windows 11 • Nvidia GeForce RTX4080 • 32Go 3200MHz DDR4 • 1To M.2 SSD • Refroidissement Liquide • Unité Centrale Ordinateur de Bureau");
        $PcMegaport->setProImage("pcGamerMegaport.jpg");
        $manager->persist($PcMegaport);
        $categoriePcConsole->addProduit($PcMegaport);




        $categoriePcAccesoires = new Categorie();
        $categoriePcAccesoires->setCatNom("Accessoires PC");
        $categoriePcAccesoires->setCatImage("pcAccessoire.png");
        $categoriePcAccesoires->setCatParent($categoriePc);
        $manager->persist($categoriePcAccesoires);

        $accessoirePcBureau = new Produit();
        $accessoirePcBureau->setProNom("HLFURNIEU Bureau Gaming");
        $accessoirePcBureau->setProPrix(104.95);
        $accessoirePcBureau->setProDescription("HLFURNIEU 140 × 60 cm Bureau Gaming, Bureau Gamer Informatique Ergonomique, Table Gaming en Fibre de Carbone, Gaming Desk avec Porte Gobelet et Crochet pour Casque, Noir");
        $accessoirePcBureau->setProImage("pcAccessoireBureau.jpg");
        $manager->persist($accessoirePcBureau);
        $categoriePcAccesoires->addProduit($accessoirePcBureau);

        $accessoirePcClavier = new Produit();
        $accessoirePcClavier->setProNom("EMPIRE GAMING - Clavier Gaming AZERTY ");
        $accessoirePcClavier->setProPrix(33.99);
        $accessoirePcClavier->setProDescription("EMPIRE GAMING - Pack MK800 Filaire - Clavier Gaming AZERTY (Layout Français) RGB 105 Touches 19 Touches Anti-Ghosting - Souris Gamer 2400 DPI - Tapis de Souris - PC PS4 PS5 Xbox One/Series Mac");
        $accessoirePcClavier->setProImage("pcAccessoireClavier.jpg");
        $manager->persist($accessoirePcClavier);
        $categoriePcAccesoires->addProduit($accessoirePcClavier);

        $accessoirePcEcran = new Produit();
        $accessoirePcEcran->setProNom("KOORUI 24");
        $accessoirePcEcran->setProPrix(129.99);
        $accessoirePcEcran->setProDescription("KOORUI 24'' Ecran PC Gaming Incurvé 1800R, Moniteur PC Dalle VA, Résolution FHD (1080P), 165Hz, DCI-P3 90%, Lunette Ultra-Mince, Inclinaison réglable, Prend en Charge HDMI/DP");
        $accessoirePcEcran->setProImage("pcAccessoireEcran.jpg");
        $manager->persist($accessoirePcEcran);
        $categoriePcAccesoires->addProduit($accessoirePcEcran);
////////////////////////////////////


        $FouPlay = new Fournisseur();
        $FouPlay->setFouNom("Play");
        $FouPlay->setFouPrenom("Station");
        $FouPlay->setFouSocieteNom("Playstation");
        $FouPlay->setFouRue("5 Rue du psn");
        $FouPlay->setFouVille("Tokyo");
        $FouPlay->setFouCodePostal("00000");
        $FouPlay->setFouPays("Japon");
        $FouPlay->setFouTelephone("0123456789");
        $FouPlay->setFouEmail("playstation@gmail.com");
        $manager->persist($FouPlay);
        
        $FouXbox = new Fournisseur();
        $FouXbox->setFouNom("X");
        $FouXbox->setFouPrenom("Box");
        $FouXbox->setFouSocieteNom("Xbox");
        $FouXbox->setFouRue("10 Rue du gamepass");
        $FouXbox->setFouVille("New York");
        $FouXbox->setFouCodePostal("00000");
        $FouXbox->setFouPays("USA");
        $FouXbox->setFouTelephone("0123456789");
        $FouXbox->setFouEmail("xbox@gmail.com");
        $manager->persist($FouXbox);

        $FouNintendo = new Fournisseur();
        $FouNintendo->setFouNom("Nin");
        $FouNintendo->setFouPrenom("Tendo");
        $FouNintendo->setFouSocieteNom("Nintendo");
        $FouNintendo->setFouRue("15 Rue du portable");
        $FouNintendo->setFouVille("Tokyo");
        $FouNintendo->setFouCodePostal("00000");
        $FouNintendo->setFouPays("Japon");
        $FouNintendo->setFouTelephone("0123456789");
        $FouNintendo->setFouEmail("nintendo@gmail.com");
        $manager->persist($FouNintendo);

        $FouSteam = new Fournisseur();
        $FouSteam->setFouNom("Newell");
        $FouSteam->setFouPrenom("Gabe");
        $FouSteam->setFouSocieteNom("Steam");
        $FouSteam->setFouRue("20 Rue du pc");
        $FouSteam->setFouVille("New York");
        $FouSteam->setFouCodePostal("00000");
        $FouSteam->setFouPays("USA");
        $FouSteam->setFouTelephone("0123456789");
        $FouSteam->setFouEmail("steam@gmail.com");
        $manager->persist($FouSteam);

        $vente = new Vente();
        $vente->setVenDelliv(2);
        $vente->setVenQte1(0);
        $vente->setVenPrix1(79.99);
        $manager->persist($vente);
        $FouPlay->addVente($vente);
        $jeuxPs5GodOfWar->addVente($vente);

        $vente = new Vente();
        $vente->setVenDelliv(2);
        $vente->setVenQte1(0);
        $vente->setVenPrix1(599.99);
        $manager->persist($vente);
        $FouPlay->addVente($vente);
        $consolePS5->addVente($vente);

        $vente = new Vente();
        $vente->setVenDelliv(2);
        $vente->setVenQte1(0);
        $vente->setVenPrix1(649.99);
        $manager->persist($vente);
        $FouPlay->addVente($vente);
        $consolePS5GOW->addVente($vente);
///////////////////////////////////////


        $commercial1 = new Utilisateur();
        $commercial1->setemail("commercial1@gmail.com");
        $commercial1->setRoles([]);
        $commercial1->setPassword('123456');
        $commercial1->setUtiRue('5 rue du commerce');
        $commercial1->setUtiVille('Market City');
        $commercial1->setUtiNom('Vendeur');
        $commercial1->setUtiPrenom('Demerd');
        $commercial1->setUtiTelephone('0606060606');
        $commercial1->setUtiCodePostal('66666');
        $commercial1->setUtiPays('France');
        $manager->persist($commercial1);

        $adresseCommcial1 = new Adresse();
        $adresseCommcial1->setAdrNom('Vendeur');
        $adresseCommcial1->setAdrPrenom('Demerd');
        $adresseCommcial1->setAdrRue('5 rue du commerce');
        $adresseCommcial1->setAdrCodePostal('66666');
        $adresseCommcial1->setAdrTelephone('0606060606');
        $adresseCommcial1->setAdrVille('Market City');
        $adresseCommcial1->setAdrPays('France');
        $manager->persist($adresseCommcial1);
        $adresseCommcial1->setAdrUti($commercial1);

        $adresseCommcial1 = new Adresse();
        $adresseCommcial1->setAdrNom('Vendeur');
        $adresseCommcial1->setAdrPrenom('Demerd');
        $adresseCommcial1->setAdrRue("5 rue de l'arnaque");
        $adresseCommcial1->setAdrCodePostal('99999');
        $adresseCommcial1->setAdrTelephone('0606060606');
        $adresseCommcial1->setAdrVille('TaBarnark City');
        $adresseCommcial1->setAdrPays('Quebec');
        $manager->persist($adresseCommcial1);
        $adresseCommcial1->setAdrUti($commercial1);


        $client1 = new Utilisateur();
        $client1->setemail("client1@gmail.com");
        $client1->setRoles([]);
        $client1->setPassword('123456');
        $client1->setUtiRue('5 rue de jachete');
        $client1->setUtiVille('Market City');
        $client1->setUtiNom('Client1');
        $client1->setUtiPrenom('Demerd');
        $client1->setUtiTelephone('0606060606');
        $client1->setUtiCodePostal('66666');
        $client1->setUtiPays('France');
        $client1->setUtiCommercial($commercial1);
        $manager->persist($client1);

        $adresseClient1 = new Adresse();
        $adresseClient1->setAdrNom('Client1');
        $adresseClient1->setAdrPrenom('Demerd');
        $adresseClient1->setAdrRue('5 rue de jachete');
        $adresseClient1->setAdrCodePostal('66666');
        $adresseClient1->setAdrTelephone('0707070070');
        $adresseClient1->setAdrVille('Market City');
        $adresseClient1->setAdrPays('France');
        $manager->persist($adresseClient1);
        $adresseClient1->setAdrUti($client1);

        $adresseClient1 = new Adresse();
        $adresseClient1->setAdrNom('Femme de Client1');
        $adresseClient1->setAdrPrenom('Demerda');
        $adresseClient1->setAdrRue('5 rue de jachete');
        $adresseClient1->setAdrCodePostal('66666');
        $adresseClient1->setAdrTelephone('0614253689');
        $adresseClient1->setAdrVille('Market City');
        $adresseClient1->setAdrPays('France');
        $manager->persist($adresseClient1);
        $adresseClient1->setAdrUti($client1);


        $client2 = new Utilisateur();
        $client2->setemail("client2@gmail.com");
        $client2->setRoles([]);
        $client2->setPassword('123456');
        $client2->setUtiRue('5 rue de jachete');
        $client2->setUtiVille('Sold City');
        $client2->setUtiNom('Client2');
        $client2->setUtiPrenom('Debil');
        $client2->setUtiTelephone('0611223344');
        $client2->setUtiCodePostal('66667');
        $client2->setUtiPays('France');
        $client2->setUtiCommercial($commercial1);
        $manager->persist($client2);

        $adresseClient2 = new Adresse();
        $adresseClient2->setAdrNom('MR Client2');
        $adresseClient2->setAdrPrenom('Marc');
        $adresseClient2->setAdrRue('5 rue de Machette');
        $adresseClient2->setAdrCodePostal('66666');
        $adresseClient2->setAdrTelephone('061777779');
        $adresseClient2->setAdrVille('Murder City');
        $adresseClient2->setAdrPays('Jungle');
        $manager->persist($adresseClient2);
        $adresseClient2->setAdrUti($client2);

        $adresseClient2 = new Adresse();
        $adresseClient2->setAdrNom('Madame de  Client2');
        $adresseClient2->setAdrPrenom('LaBourik');
        $adresseClient2->setAdrRue('5 rue de Machette');
        $adresseClient2->setAdrCodePostal('66666');
        $adresseClient2->setAdrTelephone('06145789');
        $adresseClient2->setAdrVille('Murder City');
        $adresseClient2->setAdrPays('Jungle');
        $manager->persist($adresseClient2);
        $adresseClient2->setAdrUti($client2);

////////////////////////////////////////////

        $commande1client1 = new Commande();
        $commande1client1->setComCommentaire("attention aux chiens");
        $commande1client1->setComAdresseLivraison("A la maison");
        $commande1client1->setComAdresseFacturation("A la maison");
        $commande1client1->setComIsPaid(false);
        $manager->persist($commande1client1);
        $client1->addCommande($commande1client1);

        $commande2client1 = new Commande();
        $commande2client1->setComCommentaire("attention aux chiennes");
        $commande2client1->setComAdresseLivraison("Chez moi");
        $commande2client1->setComAdresseFacturation("Chez moi");
        $commande2client1->setComIsPaid(true);
        $manager->persist($commande2client1);
        $client1->addCommande($commande2client1);

        $CouscousSimo = new Transporteur();
        $CouscousSimo->setTraNom("CouscousSimo");
        $CouscousSimo->setTraDescription("Vous livre votre semoule en 2-3 jours");
        $CouscousSimo->setTraPrix(5.99);
        $manager->persist($CouscousSimo);
        $CouscousSimo->addCommande($commande1client1);

        $marcTransPorc= new Transporteur();
        $marcTransPorc->setTraNom("MarcTransPorc");
        $marcTransPorc->setTraDescription("Specialiste en livraison de porc");
        $marcTransPorc->setTraPrix(15);
        $manager->persist($marcTransPorc);
        $marcTransPorc->addCommande($commande2client1);

        $laPoste= new Transporteur();
        $laPoste->setTraNom("LaPoste");
        $laPoste->setTraDescription("Perd votre colis en 2-3 jours");
        $laPoste->setTraPrix(9.99);
        $manager->persist($laPoste);

////////////////////////////////////////

        $panier = new Panier();
        $panier->setPanPrixUnite(666);
        $panier->setPanQuantite(1);
        $manager->persist($panier);
        $commande1client1->addPanier($panier);
        $consolePS5->addPanier($panier);

        $panier = new Panier();
        $panier->setPanPrixUnite(777);
        $panier->setPanQuantite(1);
        $manager->persist($panier);
        $commande1client1->addPanier($panier);
        $consolePS5->addPanier($panier);

        $panier = new Panier();
        $panier->setPanPrixUnite(77);
        $panier->setPanQuantite(1);
        $manager->persist($panier);
        $commande1client1->addPanier($panier);
        $accessoirePS5M->addPanier($panier);

 ////////////////////////////////////    

        $bonL1 = new BonLivraison();
        $manager->persist($bonL1);
        $commande1client1->addBonLivraison($bonL1);

        $bonL2 = new BonLivraison();
        $manager->persist($bonL2);
        $commande2client1->addBonLivraison($bonL2);

//////////////////////////////////////////

        $livraison = new Livraison();
        $livraison->setLivQteLivrer(2);
        $manager->persist($livraison);
        $bonL1->addLivraison($livraison);
        $consolePS5->addLivraison($livraison);

        $manager->flush();

    }
}
