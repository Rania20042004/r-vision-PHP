<?php
$etudiant=["nom"=>"Abdelali",
           "prenom"=>"Rania" ,
           "matricule"=>1,
           "note"=>20];
foreach($etudiant as $e=>$v){
    echo $v;
};


$produit=["banane"=>0.8,
          "pain"=>1.0,
          "lait"=>2.1
        ];
echo "<h1>Liste des produits</h1>";
echo "<ul>";
foreach ($produit as $nom => $prix) {
    echo "<li>Produit : $nom - Prix : $prix </li>";
}
echo "</ul>";


$scores=["Rania"=>20,
         "Marwa"=>19,
         "Ines"=>18,
         "Hakima"=>17,
         "Aziz"=>16];
$total = 0;
foreach ($scores as $nom => $score) {
    $total += $score;
    $moyenne = $total / count($scores);
};
echo $moyenne;


$pays=["Brésil" => 214326223,
    "Russie" => 145912025,
    "Nigéria" => 223804632 ];
arsort($pays);
echo "<h1>Population des pays (ordre décroissant)</h1>";
echo "<ul>";
foreach ($pays as $pays => $population) {
    echo "<li>$pays : $population habitants</li>";
       }
       echo "</ul>";


