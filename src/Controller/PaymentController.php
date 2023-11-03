<?php

namespace App\Controller;

use Stripe\Stripe;
use App\Entity\Produit;
use App\Entity\Commande;
use App\Entity\Transporteur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class PaymentController extends AbstractController
{
    private EntityManagerInterface $em;
    private UrlGeneratorInterface $generator;

    public function __construct(EntityManagerInterface $em, UrlGeneratorInterface $generator)
    {
        $this->em = $em;
        $this->generator = $generator;
    }

    #[Route('/order/create-session-stripe/{id}', name: 'payment_stripe',methods: ['POST'])]
    //il s'agit ici de l'id de la commande en cours qui nous sert aussi de référence
    public function stripeCheckout($id): RedirectResponse
    {
        $productStripe = [];
        //recupére la commande en cours
      $order = $this->em->getRepository(Commande::class)->findOneBy(['id' => $id]);
    // dd($order);
     //si commande introuvable ou n'existe pas
     if(!$order){
        return $this->redirectToRoute('panier_index');
     }

     foreach ($order->getPaniers()->getValues() as $product) {
        //pour recup le nom du produit
        $productData = $this->em->getRepository(Produit::class)->findOneBy(['id' => $product->getPanPro()]);
        //dd($productData);
        //les info demandé par stripe
        $producStripe[] = [
            'price_data' => [
                'currency' => 'eur',
                'unit_amount' => $product->getPanPrixUnite() * 100,
                'product_data' => [
                    'name' => $productData->getProNom()
                ]
                ],
                'quantity' => $product->getPanQuantite()
            ];
     }

     $transporteurData = $this->em->getRepository(Transporteur::class)->findOneBy(['id' => $order->getComTransporteur()]);
//dd($transporteurData);
     $producStripe[] = [
        'price_data' => [
            'currency' => 'eur',
            'unit_amount' => $transporteurData->getTraPrix() * 100,
            'product_data' => [
                'name' => $transporteurData->getTraNom()
            ]
            ],
            'quantity' => 1,
        ];
//dd($producStripe);
    Stripe::setApiKey('sk_test_51O4gGGGvIgBTzRRgBa14AvfL4wgEmJzvpnGifyiZaXno0TUPKp0QnTEkKu2BJnOEg18DCGlNN9skzyl8kmi4kvLV00uyd9aRzr');
    

//header('Content-Type: application/json');

//$YOUR_DOMAIN = 'http://localhost:4242';

$checkout_session = \Stripe\Checkout\Session::create([
    'customer_email' => $this->getUser()->getEmail(),
    'payment_method_types' => ['card'],
    'line_items' => [[
        $producStripe
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    // 'price' => '{{PRICE_ID}}',
    // 'quantity' => 1,
    ]],
  'mode' => 'payment',
  'success_url' => $this->generator->generate('payment_success', [
    'id' => $order->getId()
  ],UrlGeneratorInterface::ABSOLUTE_URL),
  'cancel_url' => $this->generator->generate('payment_error', [
    'id' => $order->getId()
  ],UrlGeneratorInterface::ABSOLUTE_URL),
  //'success_url' => $YOUR_DOMAIN . '/success.html',
 // 'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

    // $order->setComStripeSessionId($checkout_session->id);
    // $this->em->flush();
    return new RedirectResponse($checkout_session->url);


    }

    #[Route('/order/success/{id}', name: 'payment_success')]
    public function StripeSuccess(EntityManagerInterface $em,$id): Response{
        $order = $this->em->getRepository(Commande::class)->findOneBy(['id' => $id]);
        $order->setComIsPaid(true);
        $em->persist($order);
        $em->flush();
        //return $this->render('order/succes.html.twig');
        return $this->render('commande/success.html.twig');
    }

    #[Route('/order/error/{id}', name: 'payment_error')]
    public function StripeError($id): Response{
        //return $this->render('order/error.html.twig');
        return $this->render('commande/error.html.twig');
    }


}

